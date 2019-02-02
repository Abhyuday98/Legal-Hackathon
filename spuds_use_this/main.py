from flask import Flask, request#, render_template
import json
import urllib
import pyodbc
#txt = urllib.urlopen(target_url).read()
app = Flask(__name__)

@app.route("/load__first_response")
def load__first_response():
    
    return load()
def load():
    import chat_bot2
    cnxnSt = pyodbc.connect("Driver={MySQL ODBC 8.0 ANSI Driver};Server=localhost;Database=chat_bot;UID=root;PWD=;")
    cursorUrls = cnxnSt.cursor()

    question = cursorUrls.execute("select question from conversation where id='1';")
    for q in question:
        print(q[0])
    print(type(q[0]))
    answer = chat_bot2.response(q[0])
    #print(answer)
    
    cursorUrls.execute('UPDATE conversation SET answer ="'+answer+'" WHERE id = 1 ;').commit()
    cursorUrls.execute(('insert into conversation_history(question, answer, context, tags) values("{}","{}","{}","{}");').format(q[0],answer, chat_bot2.CONTEXT, chat_bot2.TAGS)).commit()

    #d = request.args.get('question')
    #return (d)
    #data = data['question']
    #import chat_bot2
    
    return ""
    #with open('input.txt','r') as file2:
    #data = file2.read()
    #data = data.rstrip('/r')
#with open('output.txt', 'w') as file:  # Use file to refer to the file object

    

@app.route("/start_bot")
    
def start_bot():
    import chat_bot
    return "Started"

if __name__ == "__main__":
    #import chat_bot
    
    app.run(debug=True)

import pyodbc
import json
#import rhinoscriptsyntax as rs
cnxnSt = pyodbc.connect("Driver={MySQL ODBC 8.0 ANSI Driver};Server=localhost;Database=chat_bot;UID=root;PWD=;")
cursorUrls = cnxnSt.cursor()
json_dict=  {"intents": [
                    {"tag": "greeting",
                    "patterns": ["Hi", "How are you", "Is anyone there?", "Hello", "Good day"],
                    "responses": ["Hello, thanks for visiting", "Good to see you again", "Hi there, how can I help?"],
                    "context_set": ""
                    },
                    {"tag": "goodbye",
                    "patterns": ["Bye", "See you later", "Goodbye"],
                    "responses": ["See you later, thanks for visiting", "Have a nice day", "Bye! Come back again soon."]
                    },
                    {"tag": "thanks",
                    "patterns": ["Thanks", "Thank you", "That's helpful"],
                    "responses": ["Happy to help!", "Any time!", "My pleasure"]
                    }
            ]
            }
cursorUrls.execute("SELECT url, chat_bot.data_urls.tags FROM chat_bot.legal_data, chat_bot.data_urls where chat_bot.data_urls.urls=chat_bot.legal_data.url group by url, chat_bot.data_urls.tags")
print()
urls =[]
tags={}
for url in cursorUrls:
    urls.append(url[0])
    print(url)
    tags[url[0]]=url[1]
#print(urls)
for url in urls:
    dict={}
    cursorUrls.execute("SELECT question FROM chat_bot.legal_data where url='{}';".format(url))
    u = url
    tag=url
    #tag = u[0:len(u)][u.rfind('/')+1::]
    if tag.rfind('/')==len(tag)-1:
        tag = tag[0:len(tag)-1]
        #print(tag)
    tag = tag[tag.rfind('/')+1::]
    #print(tag)
    dict["tag"] = tag

    for row in cursorUrls:
        
        q = row[0]
        #print(q)
        
        if 'patterns' in dict: 
            dict["patterns"].append(q)
        else:
            dict["patterns"]=[q]
    if 'responses' in dict: 
        dict["responses"].append(url)
    else:
        dict["responses"]=[url]
    dict["context_set"] = tags[url]
    json_dict["intents"].append(dict)   
    #j=str(json_dict)
#ilter = "JSON File (*.json)|*.json|All Files (*.*)|*.*||"
#filename = rs.SaveFileName("Save JSON file as", filter)

# If the file name exists, write a JSON string into the file.
#if filename:
    # Writing JSON data
with open("intents1.json", 'w') as f:
        json.dump(json_dict, f)
#with open('intents1.json','w') as file:
    #file.write(str(j))
        #print(u[0:len(u)-1][u.rfind('/')+1::])
        #dict['tag']=u[0:len(u)-1][u.rfind('/')::]

    
#cursorUrls.execute("SELECT url, question FROM chat_bot.legal_data ;")

#json_dict['intents'].append()
#print(json_dict['intents'][0])
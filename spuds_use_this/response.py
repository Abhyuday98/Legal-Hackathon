
# create a data structure to hold user context
import pyodbc
context = {}

ERROR_THRESHOLD = 0.25
def classify(sentence):
    # generate probabilities from the model
    results = model.predict([bow(sentence, words)])[0]
    # filter out predictions below a threshold
    results = [[i,r] for i,r in enumerate(results) if r>ERROR_THRESHOLD]
    # sort by strength of probability
    results.sort(key=lambda x: x[1], reverse=True)
    return_list = []
    for r in results:
        return_list.append((classes[r[0]], r[1]))
    # return tuple of intent and probability
    return return_list

def response(sentence, userID='123', show_details=False):
    results = classify(sentence)
    # if we have a classification then find the matching intent tag
    if results:
        # loop as long as there are matches to process
        while results:
            for i in intents['intents']:
                # find a tag matching the first result
                if i['tag'] == results[0][0]:
                    # set context for this intent if necessary
                    if 'context_set' in i:
                        if show_details: print ('context:', i['context_set'])
                        context[userID] = i['context_set']

                    # check if this intent is contextual and applies to this user's conversation
                    if not 'context_filter' in i or \
                        (userID in context and 'context_filter' in i and i['context_filter'] == context[userID]):
                        if show_details: print ('tag:', i['tag'])
                        # a random response from the intent
                        return str(random.choice(i['responses']))

            results.pop(0)
#question 
#with open('input.txt','r') as file2:
#    data = file2.read()
#   data = data.rstrip('/r')
#with open('output.txt', 'w') as file:  # Use file to refer to the file object
        
#with open('../Mysql_Driver_Settings.txt','r') as driver_file:
        #line=""
        #for line in driver_file:
        #    line=line.rstrip("\n")
cnxnSt = pyodbc.connect("Driver={MySQL ODBC 8.0 ANSI Driver};Server=localhost;Database=chat_bot;UID=root;PWD=;")
cursorUrls = cnxnSt.cursor()

question = cursorUrls.execute("select question from conversation where id='1';")
for q in question:
    print(q[0])

answer = response(q)
question = cursorUrls.execute("UPDATE conversation SET answer ='{}' WHERE id = '1';".format(answer))

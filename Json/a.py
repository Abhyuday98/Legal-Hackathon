import json


with open("intents1.json", 'w') as f:
    with open("intents.json",'r') as f1:
        a=f1.read()
    json.dump(a, f)
import requests
import threading
import time
import json


def sendData(ip_address,action):
    url = "http://"+ip_address+"/?action="+action
    print(url)
    response = requests.get(url)
    return response.json()
    #project/requests/updatestate/request_id/rid/state/__new_state_string
    #url = "http://54.175.106.223/project/requests/updatestate/="+action



def retrieveData():
    response = requests.get("http://54.175.106.223/project/requests/find/6")
    response = response.json()
    json.dumps(response["data"])
    for object in response["data"]:
        ip_address= object["ip_address"]
        action= object["action"]
        rid= object["request_id"]
        print ip_address
        print action
        print rid

        esp_response = sendData(ip_address,action)
        #project/requests/updatestate/request_id/rid/state/__new_state_string
        if esp_response['success']:
            #if esp_response['success'] == "true" 
            url = "http://54.175.106.223/project/requests/updatestate/request_id/"+rid+"/state/completed"
            response = requests.get(url)
            print response.text


while(1):
    retrieveData()
    time.sleep(1)


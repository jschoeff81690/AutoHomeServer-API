import requests
import threading
import time
import json
import boto.sqs



def sendData(message):
	try:
		msg = json.loads(message.get_body())
		print msg["ip_address"]
		print msg["action"]
		payload="action="+msg["action"]
		url = "http://" + msg["ip_address"] 
		#url="http://192.168.137.141"
		print(url)
	
		response = requests.post(url, data=payload)
	except Exception as e:
		print e
	# return response.json()
    # project/requests/updatestate/request_id/rid/state/__new_state_string
    # url = "http://54.175.106.223/project/requests/updatestate/="+action

conn = boto.sqs.connect_to_region("us-east-1", aws_access_key_id='AKIAIFI6HPSYEYORJLUA', aws_secret_access_key='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')

q = conn.get_queue('system25')
#q.purge();

while(True):
	# print '%s: %s' % (m, m.get_body())
	message = q.read(wait_time_seconds=20)
	if(message is not None):
		print message.get_body()
		sendData(message)
		q.delete_message(message)
	else:
		print "None"
	time.sleep(1)


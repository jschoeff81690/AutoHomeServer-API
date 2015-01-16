api:

Devices:
- Add a device
  API Call: IP_ADDRESS/project/devices/add/<Device_Name>/<Type_ID>/
  Returns JSON OBJECT: 
  	* Object always contains 'response' boolean.
		+ On Success - JSON object of newly created device, response=1
		+ On Error   - JSON Object with 'error_message' string, response=0
		
- Query a Device by ID
  API Call: IP_ADDRESS/project/devices/find/<Device_ID>/
  Returns JSON OBJECT: 
  	* Object always contains 'response' boolean.
		+ On Success - JSON object of queried device, response=1
		+ On Error   - JSON Object with 'error_message' string, response=0

- Query a Device by Device Name and System ID
  API Call: IP_ADDRESS/project/devices/find/<Device_Name>/<System_ID>
  Returns JSON OBJECT: 
  	* Object always contains 'response' boolean.
		+ On Success - JSON object of queried device, response=1
		+ On Error   - JSON Object with 'error_message' string, response=0

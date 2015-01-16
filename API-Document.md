Web Server API
============
- All Queries Will respond with a JSON object unless otherwise noted.
- ALL JSON responses will a boolean variable 'success' indicated the query had no errors
	+ On Success - JSON object, 'success'=1
	+ On Error   - JSON Object with 'error_message' string, 'success'=0
	+ 
###Devices

- Add a device
  + API Call: <code>IP_ADDRESS/project/devices/add/<Device_Name>/<Type_ID>/</code>
  + Returns JSON OBJECT of newly created device 
- Query a Device by ID
  + API Call: <code>IP_ADDRESS/project/devices/find/<Device_ID>/</code>
  + Returns JSON OBJECT: 
  	* Object always contains 'response' boolean.
		+ On Success - JSON object of queried device, response=1
		+ On Error   - JSON Object with 'error_message' string, response=0

- Query a Device by Device Name and System ID
  API Call: IP_ADDRESS/project/devices/find/<Device_Name>/<System_ID>
  Returns JSON OBJECT: 
  	* Object always contains 'response' boolean.
		+ On Success - JSON object of queried device, response=1
		+ On Error   - JSON Object with 'error_message' string, response=0

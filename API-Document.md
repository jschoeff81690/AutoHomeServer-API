Web Server API
============
- All Queries Will respond with a JSON object unless otherwise noted.
- ALL JSON responses will a boolean variable 'success' indicated the query had no errors
	+ On Success - JSON object, 'success'=1
	+ On Error   - JSON Object with 'error_message' string, 'success'=0

###Devices

- Add a device<br>
  <b>API Call:</b> <code>IP_ADDRESS/project/devices/add/&lt;Device_Name&gt;/&lt;Type_ID&gt;/</code><br>
  <b>Returns:</b> JSON OBJECT of newly created device 
- Query a Device by ID
  API Call: <code>IP_ADDRESS/project/devices/find/<Device_ID>/</code>
  Returns JSON OBJECT of queried device
- Query a Device by Device Name and System ID
  API Call: IP_ADDRESS/project/devices/find/<Device_Name>/<System_ID></code>
  Returns JSON OBJECT of queried device

Web Server API
============
- All Queries Will respond with a JSON object unless otherwise noted.
- ALL JSON responses will have a boolean variable 'success' indicated the query had no errors
	+ On Success - JSON object, 'success'=1
	+ On Error   - JSON Object with 'error_message' string, 'success'=0

###Devices

- <b>Add a device</b><br>
  <em>API Call:</em> <code>IP_ADDRESS/project/devices/add/&lt;Device_Name&gt;/&lt;Type_ID&gt;/</code><br>
  <em>Returns:</em> JSON OBJECT of newly created device 
- <b>Query a Device by ID</b><br>
  <em>API Call:</em> <code>IP_ADDRESS/project/devices/find/&lt;Device_ID&gt;/</code><br>
  <em>Returns:</em> JSON OBJECT of queried device<br>
- <b>Query a Device by Device Name and System ID</b><br>
  <em>API Call:</em> <code>IP_ADDRESS/project/devices/find/&lt;Device_Name&gt;/&lt;System_ID&gt;</code><br>
  <em>Returns:</em> JSON OBJECT of queried device<br>

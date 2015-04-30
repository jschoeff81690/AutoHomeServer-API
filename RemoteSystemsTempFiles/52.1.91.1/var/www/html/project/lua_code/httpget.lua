-- tested on NodeMCU 0.9.5 build 20141222...20150108
-- sends connection time and heap size to http://benlo.com/esp8266/test.php

print('httpget.lua started')
local chipid,ip=...

print(chipid)
print(ip)


Tstart  = tmr.now()

conn = nil
conn=net.createConnection(net.TCP, 0) 

-- show the retrieved web page

conn:on("receive", function(conn, payload) 
                       success = true
                       print(payload) 
                       end) 

-- when connected, request page (send parameters to a script)
conn:on("connection", function(conn, payload) 
                       print('\nConnected') 
                       conn:send("GET /project/requests/send_email/"
                        .." HTTP/1.1\r\n" 
                        .."Host: 52.1.91.1\r\n" 
                        .."\r\n")
                       end) 
-- when disconnected, let it be known
conn:on("disconnection", function(conn, payload) print('\nDisconnected') end)
                                             
conn:connect(80,"52.1.91.1")

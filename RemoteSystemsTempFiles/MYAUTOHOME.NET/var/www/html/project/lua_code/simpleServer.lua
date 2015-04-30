-- A simple http server
lighton=0
pin=4
gpio.mode(pin,gpio.OUTPUT)

srv=net.createServer(net.TCP) 
srv:listen(80,function(conn) 
  conn:on("receive",function(conn,payload) 
    local indexStart, indexEnd = string.find(payload,"action=");
  	local action
  	print(payload) 
  	if indexStart ~= nil then 
	  	action = string.sub(payload,0,indexStart-1);
	  	print action

  		if indexEnd ~= nil then 
	  		action = string.sub(action,indexEnd+1);
	  		local find, find1 = string.find(action,"on");
	  		if find ~= nil then 
				lighton=1 
				gpio.write(pin,gpio.HIGH)
			end

	  		local find, find1 = string.find(action,"off");
	  		if find ~= nil then 
				lighton=0 
				gpio.write(pin,gpio.LOW)
			end
			print("LED: "..lighton);
	  	else   
		    action = "Error finding action";
		end
	  	print(action);
	else    
	    action = "Error finding action"
	    print(action);
	end
  end)
	conn:send('HTTP/1.1 200 OK\n\n')
	conn:send('<!DOCTYPE HTML>\n')
	conn:send('<html>\n')
	conn:send('<head><meta  content="text/html; charset=utf-8">\n')
	conn:send('<title>ESP8266</title></head>\n')
	conn:send('<body><h1>Sample GPIO output control</h1>\n')
	conn:on("sent",function(conn) conn:close() end)
end)
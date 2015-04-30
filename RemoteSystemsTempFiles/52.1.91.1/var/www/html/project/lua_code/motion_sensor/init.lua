print(node.chipid())
print("set up wifi mode")
file.open("config.lua", "r")
local ap = string.gsub(file.readline(), "%s+", "")
local pass = string.gsub(file.readline(), "%s+", "")
local server_ip = string.gsub(file.readline(), "%s+", "")
print(ap)
print(pass)
print(server_ip)
file.close()
	
wifi.setmode(wifi.STATION)
wifi.sta.config(ap,pass)
 --here SSID and PassWord should be modified according your wireless router
wifi.sta.connect()
tmr.alarm(1, 1000, 1, function() 
    if wifi.sta.getip()== nil then 
    	print("IP unavailable, Waiting...") 
    else 
    	tmr.stop(1)
		ip=wifi.sta.getip()
    	print("Configuration done, IP is "..ip)
		--dofile("httpget.lua")
        --assert(loadfile("httpget.lua"))(node.chipid(),string.gsub(ip,"%.", "/"))
        assert(loadfile("httppost.lua"))(node.chipid(), ip)
    end 
 end)

print(node.chipid())
print("set up wifi mode")
local c = loadfile("config.lua")
if(c == nil)then
    print("Missing config")
    --assert red LED
else
    local ap, pass, server_ip = c()
    wifi.setmode(wifi.STATION)
    wifi.sta.config(ap,pass)
     --here SSID and PassWord should be modified according your wireless router
    wifi.sta.connect()
    tmr.alarm(1, 1000, 1, function() 
        if wifi.sta.getip()== nil then 
        	print("IP unavailable, Waiting...") 
        else 
        	tmr.stop(1)
    		local ip=wifi.sta.getip()
        	print("Configuration done, IP is "..ip)
            assert(loadfile("send_ip.lc"))()
            assert(loadfile("interrupt.lc"))()
            -- dofile("timer.lc") -- uses update_meta.lua
        end 
     end)
end

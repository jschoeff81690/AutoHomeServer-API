print('temperature.lua started')
local adc = adc.read(0)
local tmp,temp, resistance;
resistance = 221000/((3.3/(adc/1000)) - 1)
tmp = assert(loadfile("loge.lc"))(resistance); -- Saving the Log(resistance) so not to calculate it 4 times later
temp = 1/(0.0014 + (0.000218 * tmp) + (0.0000000996741 * tmp * tmp * tmp)); 
temp =  math.floor(((temp - 273.15)*1.80 + 32)+.5);  --- convert kelvin to Farenheit
print ("F: "..temp);
tmp = nil
adc = nil
resistance = nil
--begin POST

local success
local content = ("chip_id="..node.chipid().."&value="..temp.."&key=state")
tmp = nil
conn = nil
conn=net.createConnection(net.TCP, 0)
conn:on("receive", function(conn, payload) 
                       success = true
                       print(payload) 
                       end) 
conn:on("connection", function(conn, payload) 
                       print('\nConnected')
                       local post = ("POST /api/devices/update_meta"
                        .." HTTP/1.1\r\n" 
                        .."Host: 52.1.91.1\r\n" 
                        .."Content-Type: application/x-www-form-urlencoded\r\n"
                        .."Content-Length: "..string.len(content).."\r\n\r\n"
                        ..content)
                       conn:send(post)
                       end)
conn:on("disconnection", function(conn, payload) print('\nDisconnected') end)
tmr.delay(5000)      
conn:connect(80,"52.1.91.1")
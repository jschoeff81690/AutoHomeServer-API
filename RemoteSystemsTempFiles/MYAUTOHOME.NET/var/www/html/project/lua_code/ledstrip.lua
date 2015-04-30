function led(r,g,b)
	r_max=255
	g_max=255
	b_max=266
    pwm.setduty(8,map(r,0,255,0,r_max))
    pwm.setduty(4,map(g,0,255,0,g_max))
    pwm.setduty(3,map(b,0,255,0,b_max))
end


function map(x, in_min, in_max, out_min,  out_max)
temp = (x - in_min) * (out_max - out_min) / (in_max - in_min) + out_min
print (temp)
  return temp
end
gpio.mode(8,gpio.OUTPUT)
gpio.mode(4,gpio.OUTPUT)
gpio.mode(3,gpio.OUTPUT)
pwm.setup(8,1000,255)
pwm.setup(4,1000,255)
pwm.setup(3,1000,255)
pwm.start(8)
pwm.start(4)
pwm.start(3)


srv=net.createServer(net.TCP) 
srv:listen(80,function(conn) 
  conn:on("receive",function(conn,payload)
  print (payload)
  local indexStart, indexEnd = string.find(payload,"action=");
  print (indexEnd)
  if indexStart ~= nil then 
	action = string.sub(payload,8)
	print(action)
  value = cjson.decode(action)
  led(value["red"],value["green"],value["blue"])
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

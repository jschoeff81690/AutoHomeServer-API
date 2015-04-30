function led(r,g,b)
    pwm.setduty(8,r)
    pwm.setduty(4,g)
    pwm.setduty(3,b)
end

pwm.setup(8,100,512)
pwm.setup(4,100,512)
pwm.setup(3,100,512)
pwm.start(8)
pwm.start(4)
pwm.start(3)


srv=net.createServer(net.TCP) 
srv:listen(80,function(conn) 
  conn:on("receive",function(conn,payload) 
  local indexStart, indexEnd = string.find(payload,"json=");
  action = string.sub(payload,6)
  print(action)

  end)
	conn:send('HTTP/1.1 200 OK\n\n')
	conn:send('<!DOCTYPE HTML>\n')
	conn:send('<html>\n')
	conn:send('<head><meta  content="text/html; charset=utf-8">\n')
	conn:send('<title>ESP8266</title></head>\n')
	conn:send('<body><h1>Sample GPIO output control</h1>\n')
	conn:on("sent",function(conn) conn:close() end)
end)
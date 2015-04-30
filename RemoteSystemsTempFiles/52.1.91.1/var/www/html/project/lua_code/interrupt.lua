local pin = 4    --> GPIO2

function onChange ()
    print('The pin value has changed to '..gpio.read(pin))
	dofile("httpget.lua")
	tmr.delay(100000)
end

gpio.mode(pin, gpio.INT)
gpio.trig(pin, 'down', onChange)
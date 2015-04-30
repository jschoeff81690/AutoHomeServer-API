local pin = 5    --> GPIO14
local last_t = tmr.now()
function onChange ()
	local t = tmr.now()
	local diff = (t-last_t)/100
	if diff > 30000 then
		print('The pin value has changed ')
		print ('diff: '..diff)
		last_t = t
	end
end

gpio.mode(pin, gpio.INT)
gpio.trig(pin, 'low', onChange)
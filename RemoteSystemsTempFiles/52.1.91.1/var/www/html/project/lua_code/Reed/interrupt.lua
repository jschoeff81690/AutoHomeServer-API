local pin = 5    --> GPIO14
local data = "Not Tripped"

function onChange ()
	tmr.delay(5000)
	if gpio.read(pin) == 1 then
		data = "Not Tripped"
	else
		data = "Tripped"
	end
	assert(loadfile("update_meta.lc"))(data)
end
gpio.mode(pin, gpio.INT)
onChange(gpio.read(pin))
gpio.trig(pin, 'both', onChange)
--LCD MODULE
--print("LCD MODULE")

-- Set module name as parameter of require
local modname = ...
local M = {}
_G[modname] = M




-- Delays
local long_delay_time = 1.65 --ms
local delay_time = 45

-- Timer module
-- local tmr = tmr
-- local gpio = gpio
-- local bit = bit

-- -- Limited to local environment
-- setfenv(1,M)

----------------------------------------------------------
-- Implementation
----------------------------------------------------------



function M.lcd_delay_us(x)
	tmr.delay(x)	
end

function M.lcd_delay_ms(x)
	tmr.delay(x*1000)	
end

function M.set_port(c)
	print(c)
	-- Bit: 7   6   5   4   3   2   1   0
	-- LCD: E   -   -   Rs  D7  D6  D5  D4
	-- ESP: 4   -   -   5   13  12  14  16
	-- Lua: 2   -   -   1   7   6   5   0
	local e=2;
	local r=1;
	local d7=7;
	local d6=6;
	local d5=5;
	local d4=0;
	-- set the bits 
	gpio.mode(e, gpio.OUTPUT)
	gpio.mode(r, gpio.OUTPUT)
	gpio.mode(d7, gpio.OUTPUT)
	gpio.mode(d6, gpio.OUTPUT)
	gpio.mode(d5, gpio.OUTPUT)
	gpio.mode(d4, gpio.OUTPUT)
	-- PORT
	-- Bit: 7   6   5   4   3   2   1   0
	-- LCD: E   -   -   Rs  D7  D6  D5  D4
	-- ESP: 4   -   -   5   13  12  14  16
	-- Lua: 2   -   -   1   7   6   5   0
    gpio.write(e,  bit.rshift(c,7))
    gpio.write(r,  bit.band(bit.rshift(c,4), 0x1))
    gpio.write(d7, bit.band(bit.rshift(c,3), 0x1))
    gpio.write(d6, bit.band(bit.rshift(c,2), 0x1))
    gpio.write(d5, bit.band(bit.rshift(c,1), 0x1))
    gpio.write(d4, bit.band(c, 0x1))
end

function M.send_char (c)
	--sends char
	--top half of char first (upper nibble)
	local temp = c;
	M.set_port(0x10);
	M.lcd_delay_us(delay_time);
	c = bit.rshift(c, 4);
	c = bit.band(c, 0xF);
	c = bit.bor(c, 0x90);

	M.set_port(c);
	M.lcd_delay_us(delay_time);
	c = bit.band(c, 0x1F);
	M.set_port(c);
	M.lcd_delay_us(delay_time);
	M.set_port(0x10);
	M.lcd_delay_ms(long_delay_time);
	--bottom half of char
	c = temp;
	c = bit.band(c, 0xF);
	c = bit.bor(c, 0x90);
	M.set_port(c);
	M.lcd_delay_us(delay_time);
	c = bit.band(c, 0x1F);
	M.set_port(c);
	M.lcd_delay_us(delay_time);
end

function M.send_command (c)
	--sends command
	local temp;
	temp = c;
	M.set_port(0);
	M.lcd_delay_us(delay_time);
	c = bit.rshift(c, 4);
	c = bit.band(c, 0xF);
	c = bit.bor(c, 0x80);
	M.set_port(c);
	M.lcd_delay_us(delay_time);
	c = bit.band(c, 0xF);
	M.set_port(c);
	M.lcd_delay_us(delay_time);
	M.set_port(0);
	M.lcd_delay_us(delay_time);
	c = temp;
	c = bit.band(command, 0xF);
	c = bit.bor(command, 0x80);
	M.set_port(command);
	M.lcd_delay_us(delay_time);
	c = bit.band(command, 0xF);
	M.set_port(command);
	lcd_delay_ms(long_delay_time);
end


function M.lcd_init ()
	print("-init")
	--init lcd
	M.lcd_delay_ms(40);
	M.send_command(0x33);
	M.send_command(0x32);
	M.send_command(0x2C);
	M.send_command(0x0C); --turned off blink and cursor, set to 0x0F to turn on
	M.send_command(0x01);
end
return M

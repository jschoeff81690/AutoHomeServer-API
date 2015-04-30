--LCD MODULE
--print("LCD MODULE")

-- Set module name as parameter of require
local modname = ...
local M = {}
_G[modname] = M


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

-- Delays
local long_delay_time = 1.65 --ms
local delay_time = 45

-- Timer module
local tmr = tmr

-- Limited to local environment
setfenv(1,M)

----------------------------------------------------------
-- Implementation
----------------------------------------------------------



function lcd_init ()
	--init lcd
	send_command(0x33);
	send_command(0x32);
	send_command(0x2C);
	send_command(0x0C); --turned off blink and cursor, set to 0x0F to turn on
	send_command(0x01);
end

function send_char (c)
	--sends char
	--top half of char first (upper nibble)
	local temp = c;
	set_port(0x10);
	lcd_delay(delay_time);
	c = bit.rshift(c, 4);
	c = bit.band(c, 0xF);
	c = bit.bor(c, 0x90);

	set_port(c);
	lcd_delay(delay_time);
	c = bit.band(c, 0x1F);
	set_port(c);
	lcd_delay(100);
	set_port(0x10);
	lcd_long_delay(long_delay_time);
	--bottom half of char
	c = temp;
	c = bit.band(c, 0xF);
	c = bit.bor(c, 0x90);
	set_port(c);
	lcd_delay(delay_time);
	c = bit.band(c, 0x1F);
	set_port(c);
	lcd_delay(delay_time);
end

function send_command (c)
	--sends command
	local temp;
	temp = c;
	set_port(0);
	lcd_delay(delay_time);
	c = bit.rshift(c, 4);
	c = bit.band(c, 0xF);
	c = bit.bor(c, 0x80);
	set_port(c);
	lcd_delay(delay_time);
	c = bit.band(c, 0xF);
	set_port(c);
	lcd_delay(delay_time);
	set_port(0);
	lcd_delay(delay_time);
	c = temp;
	c = bit.band(command, 0xF);
	c = bit.bor(command, 0x80);
	set_port(command);
	lcd_delay(delay_time);
	c = bit.band(command, 0xF);
	set_port(command);
	lcd_delay(long_delay_time);
end

function set_port(c)
	-- set the bits 
	gpio.mode(4, gpio.OUTPUT)
	gpio.mode(5, gpio.OUTPUT)
	gpio.mode(12, gpio.OUTPUT)
	gpio.mode(13, gpio.OUTPUT)
	gpio.mode(14, gpio.OUTPUT)
	gpio.mode(16, gpio.OUTPUT)
	-- PORT
	-- Bit: 7   6   5   4   3   2   1   0
	-- LCD: E   -   -   Rs  D7  D6  D5  D4
	-- ESP: 4   -   -   5   13  12  14  16
	-- Lua: 2   -   -   1   7   6   5   0
    gpio.write(e, bit.rshift(c,7))
    gpio.write(rs, bit.band(bit.rshift(c,4), 0x1))
    gpio.write(d7, bit.band(bit.rshift(c,3), 0x1))
    gpio.write(d6, bit.band(bit.rshift(c,2), 0x1))
    gpio.write(d5, bit.band(bit.rshift(c,1), 0x1))
    gpio.write(d4, bit.band(c, 0x1))
end

function lcd_delay_us(x)
	tmr.delay(x)	
end

function lcd_long_delay_ms(x)
	tmr.delay(x*1000)	
end

return M

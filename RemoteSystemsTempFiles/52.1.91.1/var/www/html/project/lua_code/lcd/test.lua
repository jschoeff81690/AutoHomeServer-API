
require("lcd");
-- lcd.set_port( 0x82 );
lcd.lcd_init()
lcd = nil
package.loaded["lcd"]=nil

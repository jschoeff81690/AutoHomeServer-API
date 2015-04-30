print ("Timer started");
tmr.alarm(0, 10000, 1, function() 
    assert(loadfile("update_meta.lc"))(adc.read(0))
end) -- eof timer for temperature
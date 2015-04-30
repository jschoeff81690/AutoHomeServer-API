<?php

class aes_util {
	private $td;
	private $key;
	private $iv;
	
	//open mycryp library AES 256 in cbc mode module
	function __construct() {
		$this->td = mcrypt_module_open('rijndael-128', '', 'cbc', '');
		
	}
	//release the mycrpt module
	function __destruct() {
		mcrypt_module_close($this->td);
	}
	//set key and IV
	function set_key($key, $iv){
		if(strlen($key) == 32 && strlen($iv) == 16) {
			$this->key = $key;
			$this->iv = $iv;
			return 1;
		}
			return 0;
	}
	
	//encrypt plaintext
	function encrypt($plain_text) {
		//inits AES 256 with key and IV
		mcrypt_generic_init ($this->td,$this->key,$this->iv);
		
		//perform encryption
		$cipher = mcrypt_generic ( $this->td ,$plain_text );
		
		// close encryption handler 
		mcrypt_generic_deinit($this->td);
		return $cipher;
	}
	function decrypt($cipher){
		// Initialize encryption module for decryption 
		mcrypt_generic_init($this->td, $this->key, $this->iv);

		// Decrypt encrypted string 
		$plaintext = mdecrypt_generic($this->td, $cipher);
		
		// close  decryption handle and close module 
		mcrypt_generic_deinit($this->td);
		return $plaintext;
	}

	function generate_iv(){
		$size = mcrypt_get_iv_size('rijndael-128', 'cbc'); 
		return mcrypt_create_iv($size, MCRYPT_DEV_RANDOM);
	}	

}


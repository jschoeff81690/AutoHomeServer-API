<?php

 header('Access-Control-Allow-Origin: http://www.myautohome.net');
 header('Access-Control-Allow-Origin: http://myautohome.net');
 header('Access-Control-Allow-Origin: http://52.1.91.1');
date_default_timezone_set ( 'UTC' );

require_once ('system/app.php'); // holds all config information
$app = APP::get_instance ();
$app->configure ();

?>

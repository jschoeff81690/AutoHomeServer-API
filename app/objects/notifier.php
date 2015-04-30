<?php
class notifier {

	function __construct() {
		$this->app = APP::get_instance ();
		$this->app->load_model('device_model');
	}


	function notify($device_id, $action) {
		$device = $this->app->device_model->get_device($device_id);
		if($device) {
			$notification_type = 'send_'.strtolower($device['device_name']);
			$this->$notification_type($device, $action);
		}
		else
			return false;
		return true;
	}
	
	function send_email($device, $action) {
		$this->email("jschoeff81690@gmail.com",$action);	


	}

	function email($address,$text) {
		$mail = new PHPMailer;

		//Tell PHPMailer to use SMTP
		$mail->isSMTP();

		//Enable SMTP debugging
		// 0 = off (for production use)
		// 1 = client messages
		// 2 = client and server messages
		$mail->SMTPDebug = 2;

		//Ask for HTML-friendly debug output
		$mail->Debugoutput = 'html';

		//Set the hostname of the mail server
		$mail->Host = 'smtp.gmail.com';

		//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
		$mail->Port = 587;

		//Set the encryption system to use - ssl (deprecated) or tls
		$mail->SMTPSecure = 'tls';

		//Whether to use SMTP authentication
		$mail->SMTPAuth = true;

		//Username to use for SMTP authentication - use full email address for gmail
		$mail->Username = "autohome0@gmail.com";

		//Password to use for SMTP authentication
		$mail->Password = "SENIOR+PASSWORD";

		//Set who the message is to be sent from
		$mail->setFrom('autohome0@gmail.com', 'AutoHome');


		//Set who the message is to be sent to
		$mail->addAddress($address, $this->app->user->_get('name'));

		//Set the subject line
		$mail->Subject = 'AutoHome Notification';

		//Read an HTML message body from an external file, convert referenced images to embedded,
		//convert HTML into a basic plain-text alternative body
//		$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
		$mail->Body = $text;
		//Replace the plain text body with one created manually
		$mail->AltBody = $text;

		//send the message, check for errors
		if (!$mail->send()) {
			echo "Mailer Error: " . $mail->ErrorInfo;
		} else {
			echo "Message sent!";
		}	
	}

	function send($address, $text) {
		$client = Aws\Ses\SesClient::factory ( array (
				'region' => 'us-east-1' 
		) );
		
		$result = $client->sendEmail ( array (
				
				// Source is required
				'Source' => 'autohome0@gmail.com',
				
				// Destination is required
				'Destination' => array (
						'ToAddresses' => array (
								$address 
						) 
				),
				
				// Message is required
				'Message' => array (
						
						// Subject is required
						'Subject' => array (
								
								// Data is required
								'Data' => 'Notification' 
						),
						
						// Body is required
						'Body' => array (
								'Text' => array (
										
										// Data is required
										'Data' => $text 
								) 
						) 
				) 
		) );
		echo "<pre>";
		echo var_dump ( $result );
		echo "<pre>";
	}
}

?>

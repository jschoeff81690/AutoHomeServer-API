<?php
require 'vendor/autoload.php';

// Create a service builder using a configuration file
$s3 = Aws\Sqs\SqsClient::factory ( array (
		'key' => 'AKIAIFI6HPSYEYORJLUA',
		'secret' => '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' 
) );

$result = $client->createQueue ( array (
		'QueueName' => 'my-queue' 
) );
$queueUrl = $result->get ( 'QueueUrl' );
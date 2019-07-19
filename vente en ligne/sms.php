<?php

// In production, these should be environment variables. E.g.:
// $auth_token = $_ENV["TWILIO_ACCOUNT_SID"]

// A Twilio number you own with SMS capabilities
require __DIR__ . '/Twilio/autoload.php';
use Twilio\Rest\Client;
$account_sid = 'ACe04b9da61ee21753e644aa24f94069e6';
$auth_token = '76f008ec9a2fce958c9bb34ed1725f64';
//$twilio_number = "+15017122661";
$twilio_number = "+12512998639";
$client = new Client($account_sid, $auth_token);
$client->messages->create(
    // Where to send a text message (your cell phone?)
    '+243973697114',
    array(
        'from' => $twilio_number,
        'body' => 'I sent this message in under 10 minutes!'
    )
);
?>
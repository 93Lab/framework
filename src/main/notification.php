<?php
namespace src\main;

class Notification
{
  function __construct() {
	}

  function sms($phone, $message) {
		$message = urlencode($message);
		$route = 4;
		$postData = array(
		    'authkey' => SMS_API,
		    'mobiles' => $phone,
		    'message' => $message,
		    'sender' => SMS_SENDER_ID,
		    'route' => $route
		);
		$ch = curl_init();
		curl_setopt_array($ch, array(
		    CURLOPT_URL => SMS_HOST,
		    CURLOPT_RETURNTRANSFER => true,
		    CURLOPT_POST => true,
		    CURLOPT_POSTFIELDS => $postData
		    //,CURLOPT_FOLLOWLOCATION => true
		));
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		$output = curl_exec($ch);
		curl_close($ch);
	}

	function emailapi($email, $subject, $msg, $text) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($ch, CURLOPT_USERPWD, 'api:'.MAILGUN_API);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_URL, 'https://api.mailgun.net/v2/'.MAILGUN_DOMAIN.'/messages');
    curl_setopt($ch, CURLOPT_POSTFIELDS, array(
      'from' => 'Uniform Sarees <info@tatabye.com>',
      'to' => $email,
      'subject' => $subject,
      'text'    => $text,
      'html' => $msg
    ));
    $result = curl_exec($ch);
    curl_close($ch);
    //print_r($result);
	}

  function __destruct() {

	}
}

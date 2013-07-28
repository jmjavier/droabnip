<?php

$token = // add your authentication token here (username:TOKEN) from https://pinboard.in/settings/password
$email = "yourname@example.com"; //replace with your email address
$auth = 'https://api.pinboard.in/v1/posts/recent?count=10&auth_token='.$token;
$posts = simplexml_load_file($auth);

foreach($posts as $post){
	$message .= $href = (string)$post->attributes()->href."\r\n";
	$message .= $description = (string)$post->attributes()->description."\r\n";
	$message .= $tags = (string)$post->attributes()->tag."\r\n";
	$message .= "\r\n";
}

$message = wordwrap($message, 70, "\r\n");

mail($email, 'Pinboard Reminder', $message);

?>
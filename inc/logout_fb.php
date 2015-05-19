<?php

require 'facebook.php';

$facebook = new Facebook(array(
	'appId' => '1612870002281473',
	'secret' => 'cf2cdacb7838167bafda99d671c613df'
));

$facebook->destroySession();
header('Location: index.php');
?>

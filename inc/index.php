<?php

require 'facebook.php';

$facebook = new Facebook(array(
	'appId' => get_option('fb_app_id'),
	'secret' => get_option('fb_app_key')
));

if($facebook->getUser() == 0){
	$loginUrl = $facebook->getLoginUrl();
	echo "<a href = '$loginUrl'>";
	echo "<img src='../png/fb_login.jpeg'>";
	echo "</a>";
}
else{
	
	$api = $facebook->api('me');
	echo "Hi " . $api[name];
	
	//echo "<br><a href ='logout_fb.php'>Logout</a>";
	
}

?>
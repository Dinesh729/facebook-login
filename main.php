<?php

/*
Plugin Name: Facebook Login

Author: Dinesh Thakur

Plugin URI: http://www.thinksoftsolutions.com/

Description: This plugin will add allow you to login with facebook.

Version: 1.0

Author URI: http://www.thinksoftsolutions.com/

*/
include_once (plugin_dir_path(__FILE__) . 'fb-login.php');

	add_action('init', 'faceB_login');
	
	function faceB_login(){
		add_shortcode('fb_signin', 'facebook_login_h');
	}
	
	function facebook_login_h(){
		require plugin_dir_path(__FILE__) . 'inc/facebook.php';
		$facebook = new Facebook(array(
			'appId' => get_option('fb_app_id'),
			'secret' => get_option('fb_app_key')
		));
		if($facebook->getUser() == 0){
			$loginUrl = $facebook->getLoginUrl();
			echo "<a href = '$loginUrl'>";
			echo "<img src=".plugins_url()."/facebook-login/inc/loginfb.png>";
			echo "</a>";
		} else {	
			$api = $facebook->api('me');			//wp_redirect( home_url() );			//echo "Hi " . $api[name]."You are login with facebook";
			echo "Hi <b>" . $api[name].'</b> You are login with facebook';
		}
	} ?>

<style>
body{

    font-family:Arial;

    color:#333;

    font-size:14px;

}
</style>
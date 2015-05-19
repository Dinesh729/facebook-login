<?php
/**
 * @package WordPress
 * @subpackage Classic_Theme
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

	<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
        <link rel="icon" type="image/x-icon" href="<?php echo get_option('nt_favicon'); ?>" />

	<style type="text/css" media="screen">
		@import url( <?php bloginfo('stylesheet_url'); ?> );
                <link rel="stylesheet" type="text/css"  href="<?php bloginfo('template_directory'); ?>/<?php echo get_option('nt_color_scheme'); ?>.css" /> 
	</style>

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php wp_get_archives('type=monthly&format=link'); ?>
	<?php //comments_popup_script(); // off by default ?>
	<?php wp_head(); ?>
</head>
    
    <style><?php echo get_option('nt_custom_css'); ?></style>

<body <?php body_class(); ?>>
<div id="rap">
    
<h1 id="header"><img src="<?php echo get_option('nt_logo'); ?>" /><a href="<?php bloginfo('url'); ?>/"><?php bloginfo('name'); ?></a></h1>

<div id="content">
<!-- end header -->

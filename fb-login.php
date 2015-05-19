<?php
function mytheme_add_init() {
$file_dir= plugins_url();
wp_enqueue_style("functions", $file_dir."/facebook-login/css/functions.css", false, "1.0", "all");
wp_enqueue_script("rm_script", $file_dir."/facebook-login/js/rm_script.js", false, "1.0");

}

ob_start();
global $wpdb;

session_start();

$themename = "FB Login";
$shortname = "fb";

$options = array (
  
array( "name" => $themename." Options",
    "type" => "title"),
  
 
array( "name" => "General",
    "type" => "section"),
array( "type" => "open"),
  
array( "name" => "App ID",
    "desc" => "Enter Facebook App ID",
    "id" => $shortname."_app_id",
    "type" => "text",
    "std" => "",
	"placeholder" => "Facebook App ID"
	),
     
array( "name" => "Secret Key",
    "desc" => "Enter Facebook Secret Key",
    "id" => $shortname."_app_key",
    "type" => "text",
    "std" => ""
	),
  
array( "type" => "close")
  
);

function mytheme_add_admin() {
  
global $themename, $shortname, $options;
  
if ( $_GET['page'] == basename(__FILE__) ) {
  
    if ( 'save' == $_REQUEST['action'] ) {
  
        foreach ($options as $value) {
        update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }
  
foreach ($options as $value) {
    if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }
  
    header("Location: admin.php?page=fb-login.php&saved=true");
die;
  
} 
else if( 'reset' == $_REQUEST['action'] ) {
  
    foreach ($options as $value) {
        delete_option( $value['id'] ); }
  
    header("Location: admin.php?page=fb-login.php&reset=true");
die;
  
}
}
  
add_menu_page($themename, $themename, 'administrator', basename(__FILE__), 'mytheme_admin');
}
 
function mytheme_admin() {
  
global $themename, $shortname, $options;
$i=0;
  
if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';
  
?>
<div class="wrap rm_wrap">
<h2><?php echo $themename; ?> Settings</h2>
  
<div class="rm_opts">
<form method="post">

    
<?php foreach ($options as $value) {
switch ( $value['type'] ) {
  
case "open":
?>
  
<?php break;
  
case "close":
?>
  
</div>
</div>
<br />
 
  
<?php break;
  
case "title":
?>
<p>To easily use the facebok App ID and Secret Key.</p>
 
  
<?php break;
  
case 'text':
?>
 
<div class="rm_input rm_text">
    <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
    <input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id'])  ); } else { echo $value['std']; } ?>" />
 <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
  
 </div>
<?php
break;
  
case 'textarea':
?>
 
<div class="rm_input rm_textarea">
    <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
    <textarea name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id']) ); } else { echo $value['std']; } ?></textarea>
 <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
  
 </div>
   
<?php
break;
  
case 'select':
?>
 
<div class="rm_input rm_select">
    <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
     
<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
<?php foreach ($value['options'] as $option) { ?>
        <option <?php if (get_settings( $value['id'] ) == $option) { echo 'selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?>
</select>
 
    <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
</div>
<?php
break;
  
case "checkbox":
?>
 
<div class="rm_input rm_checkbox">
    <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
     
<?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
 
 
    <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
 </div>
<?php break;

case "section":
 
$i++;

?>
 
<div class="rm_section">
<div class="rm_title"><h3><img src="<?php echo plugins_url() ; ?>/facebook-login/images/trans.png" class="inactive" alt="""><?php echo $value['name']; ?></h3><span class="submit"><input name="save<?php echo $i; ?>" type="submit" value="Save changes" />
</span><div class="clearfix"></div></div>
<div class="rm_options">
 
  
<?php break;
  
}
}
?>
  
<input type="hidden" name="action" value="save" />
</form>
<form method="post">
<p class="submit">
<input name="reset" type="submit" value="Reset" />
<input type="hidden" name="action" value="reset" /><h3><pre>ShortCode</h3><h4>For Post/Page: [fb_signin]</br>For Page Template:  echo do_shortcode('[fb_signin]'); </h4>
</p>
</form>

 </div> 
  
 </div>
 
<?php
}

add_action('admin_init', 'mytheme_add_init');
add_action('admin_menu', 'mytheme_add_admin');

?>
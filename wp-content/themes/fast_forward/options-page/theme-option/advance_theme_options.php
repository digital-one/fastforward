<div class="wrap">
<?php screen_icon('themes'); ?> <h2><?php echo $themename; ?> Settings</h2>
<?php 
if ( $_REQUEST['saved'] )
{ 
	echo '<div id="message"><p><strong>'.$themename.' settings saved.</strong></p></div>';

/** Define some vars **/

$uploads = get_template_directory();
$css_dir = plugins_url('options-page'); // Shorten code, save 1 call

/** Capture CSS output **/
ob_start();
require('styles.php');

}
if ( $_REQUEST['reset'] ) echo '<div id="message"><p><strong>'.$themename.' settings reset.</strong></p></div>';
?>
<form method="post" enctype="multipart/form-data">

<?php foreach ($options as $value) {
		switch ( $value['type'] ) {
	case "upload":
?>
<table width="100%" border="0" style="padding:5px 10px;">
<tr>
<td colspan="2" width="100%"><h3 style="font-family:Georgia,'Times New Roman',Times,serif;">Theme Logo</h3></td>
</tr>
<tr>
<td width="30%"><strong><?php echo $value['name']; ?></strong></td>
<td width="70%">
<label for="<?php echo $value['id']; ?>">
<input id="<?php echo $value['id']; ?>" type="text" size="36" name="<?php echo $value['id']; ?>" value="<?php echo get_settings( $value['id'] ); ?>" />
<input id="upload_image_button" type="button" value="Upload logo" />
<br /><?php echo $value['desc']; ?>
</label><br />
<img src="<?php echo get_settings( $value['id'] );  ?>" id="main" alt="" /></td>
</tr>
</table>

<script>
jQuery(document).ready(function() {
 
jQuery('#upload_image_button').click(function() {
 formfield = jQuery('#<?php echo $value['id']; ?>').attr('name');
 tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
 return false;
});
 
window.send_to_editor = function(html) {
 imgurl = jQuery('img#main',html).attr('src');
 jQuery('#<?php echo $value['id']; ?>').val(imgurl);
 tb_remove();
}
});
</script>
<?php 
 break;
 
 
 case "twitter_id":   
 case "vimeo_id": 
 case "facebook_id":
 case "copyright_id":
     case "amzonlink_id":
          case "amzonlinkcom_id":
     
     ?>

<table width="100%" border="0" style="padding:5px 10px;">
<tr>
<td width="30%"><h3 style="font-family:Georgia,'Times New Roman',Times,serif;"><?php echo $value['id']; ?></h3></td>

<td width="70%">
<label for="<?php echo $value['id']; ?>">
<input id="<?php echo $value['id']; ?>" type="text" size="36" name="<?php echo $value['id']; ?>" value="<?php echo get_settings( $value['id'] ); ?>" />

<br /><?php echo $value['desc']; ?>
</label></td>
</tr>
</table>

<?php break;?>

<?php }
}
?>

<table width="100%" border="0" style="padding:10px;">
<tr>
<td width="10%">
<p class="submit">
<input name="save" type="submit" class="button-primary" value="Save changes" />
<input type="hidden" name="action" value="save" /></p>
</td>
</tr>
</table>

</form>

</div>
<script>
jQuery(document).ready(function() {
 
jQuery('#upload_image_button').click(function() {
 formfield = jQuery('#upload_image').attr('name');
 tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
 return false;
});
 
window.send_to_editor = function(html) {
 imgurl = jQuery('img',html).attr('src');
 jQuery('#upload_image').val(imgurl);
 tb_remove();
}
 
});
</script>
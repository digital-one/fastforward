<?php

define('OPTIONS_PAGE_VERSION', '1.6');
define('OPTIONS_PAGE_URL', plugin_dir_url(__FILE__));

load_plugin_textdomain('optionspage', false, dirname(plugin_basename(__FILE__)) . '/lang/');

/* Make sure we don't expose any info if called directly */

if (!function_exists('add_action')) {
    echo "Hi there!  I'm just a little plugin, don't mind me.";
    exit;
}

/* If the user can't edit theme options, no use running this plugin */

add_action('init', 'optionspage_rolescheck', 20);

function optionspage_rolescheck() {

    add_action('admin_menu', 'optionspage_add_page');
}

/* Register plugin activation hooks */

register_activation_hook(__FILE__, 'optionspage_activation_hook');

function optionspage_activation_hook() {
    register_uninstall_hook(__FILE__, 'optionspage_delete_options');
}

/* When uninstalled, deletes options */

register_uninstall_hook(__FILE__, 'optionspage_delete_options');



$themename = 'Theme';
$shortname = "ct";
$options = array(
    array("name" => $themename . " Options", "type" => "title"),
    array("type" => "open"),
    array("name" => "Upload Logo", "desc" => "Enter an URL or upload an image for the logo", "id" => "upload_image", "type" => "upload", "std" => ""),
   
    array("name" => "Twitter", "id" => "Twitter", "type" => "twitter_id"),
 array("name" => "Vimeo", "id" => "Vimeo", "type" => "vimeo_id"),
     array("name" => "Facebook", "id" => "facebook", "type" => "facebook_id"),
     array("name" => "Copyright Text", "id" => "copyright", "type" => "copyright_id"),
     array("name" => "Amzon Link", "id" => "AmzonUkLink", "type" => "amzonlink_id"),
    array("name" => "Amzoncom Link", "id" => "AmzoncomLink", "type" => "amzonlinkcom_id"),
   
);

/* Add array you want to add more option in admin and please add ID in theme-option/advance_theme_options.php file */

function optionspage_add_page() {
    global $themename, $shortname, $options;
    if ($_GET['page'] == basename(__FILE__)) {
        if ('save' == $_REQUEST['action']) {
            foreach ($options as $value) {
                update_option($value['id'], $_REQUEST[$value['id']]);
            }
            foreach ($options as $value) {

                if ($value['type'] == 'upload') {
                    $upload = wp_handle_upload($_FILES[$value['id']]);
                    if (isset($upload['url'])) {
                        update_option($value['id'], $upload['url']);
                    }
                } elseif ($value['type'] == 'footer_upload') {
                    $footerupload = wp_handle_upload($_FILES[$value['id']]);
                    if (isset($footerupload['url'])) {
                        update_option($value['id'], $footerupload['url']);
                    }
                } elseif (isset($_REQUEST[$value['id']])) {
                    $stripslashes = stripslashes($_REQUEST[$value['id']]);
                    update_option($value['id'], $stripslashes);
                }
            }
            header("Location: themes.php?page=options-page.php&saved=true");
            die;
        } else if ('reset' == $_REQUEST['action']) {
            foreach ($options as $value) {
                delete_option($value['id']);
            }
            header("Location: themes.php?page=options-page.php&reset=true");
            die;
        }
    }
    add_theme_page($themename . " Options", "" . $themename . " Options", 'edit_themes', basename(__FILE__), 'mytheme_admin');
}

function mytheme_admin() {
    global $themename, $shortname, $options;
    include_once('theme-option/advance_theme_options.php');
}

/* Loads the CSS */

function my_admin_scripts() {
    wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
    wp_register_script('my-upload', OPTIONS_FRAMEWORK_URL . '/js/media-uploader.js', array('jquery', 'media-upload', 'thickbox'));
    wp_enqueue_script('my-upload');
}

function my_admin_styles() {
    wp_enqueue_style('thickbox');
}

if (isset($_GET['page']) && $_GET['page'] == 'options-page.php') {
    add_action('admin_print_scripts', 'my_admin_scripts');
    add_action('admin_print_styles', 'my_admin_styles');
}
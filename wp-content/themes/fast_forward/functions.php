<?php

add_editor_style('css/layout.css');
add_editor_style('css/editor.css');


//custom gform validation to confirm a product quantity is selected

add_filter("gform_field_validation_1_16", "custom_validation", 10, 4);
require_once (get_template_directory() . '/options-page/options-page.php');

function custom_validation($result, $value, $form, $field) {

    $quantity_2 = GFCommon::to_number($_POST['input_15'], "");

    $quantity = GFCommon::to_number($value, "");

    if ($result["is_valid"] && intval($quantity) < 1 && intval($quantity_2) < 1) {
        $result["is_valid"] = false;
        $result["message"] = "You must select a quantity";
    }
    return $result;
}

add_filter("gform_pre_render", "populate_total");

function populate_total($form) {


    foreach ($form["fields"] as &$field)
        if ($field["id"] == 12) {
            $field["value"] = '11.99';
        }
    return $form;
}

function jquery_method() {
    wp_deregister_script('jquery');
    wp_register_script('jquery'
            , '//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', false, false);

    wp_enqueue_script('jquery');
}

if (!is_admin()) {
    add_action('init', 'jquery_method');
}

add_theme_support('post-thumbnails', array('post', 'page'));

add_action('init', 'register_my_menus');

function register_my_menus() {
    register_nav_menus(
            array(
                'menu-1' => __('Navigation menu'),
                'menu-2' => __('footer menu')
            )
    );
}

function aq_resize($url, $width, $height = null, $crop = null, $single = true) {

    //validate inputs
    if (!$url OR ! $width)
        return false;

    //define upload path & dir
    $upload_info = wp_upload_dir();
    $upload_dir = $upload_info['basedir'];
    $upload_url = $upload_info['baseurl'];

    //check if $img_url is local
    if (strpos($url, $upload_url) === false)
        return false;

    //define path of image
    $rel_path = str_replace($upload_url, '', $url);
    $img_path = $upload_dir . $rel_path;

    //check if img path exists, and is an image indeed
    if (!file_exists($img_path) OR ! getimagesize($img_path))
        return false;

    //get image info
    $info = pathinfo($img_path);
    $ext = $info['extension'];
    list($orig_w, $orig_h) = getimagesize($img_path);

    //get image size after cropping
    $dims = image_resize_dimensions($orig_w, $orig_h, $width, $height, $crop);
    $dst_w = $dims[4];
    $dst_h = $dims[5];

    //use this to check if cropped image already exists, so we can return that instead
    $suffix = "{$dst_w}x{$dst_h}";
    $dst_rel_path = str_replace('.' . $ext, '', $rel_path);
    $destfilename = "{$upload_dir}{$dst_rel_path}-{$suffix}.{$ext}";

    if (!$dst_h) {
        //can't resize, so return original url
        $img_url = $url;
        $dst_w = $orig_w;
        $dst_h = $orig_h;
    }
    //else check if cache exists
    elseif (file_exists($destfilename) && getimagesize($destfilename)) {
        $img_url = "{$upload_url}{$dst_rel_path}-{$suffix}.{$ext}";
    }
    //else, we resize the image and return the new resized image url
    else {

        // Note: This pre-3.5 fallback check will edited out in subsequent version
        if (function_exists('wp_get_image_editor')) {

            $editor = wp_get_image_editor($img_path);

            if (is_wp_error($editor) || is_wp_error($editor->resize($width, $height, $crop)))
                return false;

            $resized_file = $editor->save();

            if (!is_wp_error($resized_file)) {
                $resized_rel_path = str_replace($upload_dir, '', $resized_file['path']);
                $img_url = $upload_url . $resized_rel_path;
            } else {
                return false;
            }
        } else {

            $resized_img_path = image_resize($img_path, $width, $height, $crop); // Fallback foo
            if (!is_wp_error($resized_img_path)) {
                $resized_rel_path = str_replace($upload_dir, '', $resized_img_path);
                $img_url = $upload_url . $resized_rel_path;
            } else {
                return false;
            }
        }
    }

    //return the output
    if ($single) {
        //str return
        $image = $img_url;
    } else {
        //array return
        $image = array(
            0 => $img_url,
            1 => $dst_w,
            2 => $dst_h
        );
    }

    return $image;
}

add_theme_support('post-thumbnails');
if (function_exists('register_sidebar'))
    register_sidebar();
register_sidebar(array(
    'name' => __('Twitter Sidebar', 'fastforward'),
    'id' => 'sidebar-2',
    'description' => __('Additional sidebar that appears on the right.', 'fastforward'),
    'before_widget' => '<section id="twitter">',
    'after_widget' => '</section>',
    'before_title' => '<h4>',
    'after_title' => '</h4>',
));

register_sidebar(array(
    'name' => __('NewsLetter Sidebar', 'fastforward'),
    'id' => 'newletter',
    'description' => __('Additional sidebar that appears on the right.', 'fastforward'),
    'before_widget' => '<div class="gamma">',
    'after_widget' => '</div>',
    'before_title' => '<h4>',
    'after_title' => '</h4>',
));
?>

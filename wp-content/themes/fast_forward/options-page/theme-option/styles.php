<?php
$body = "body{	 
	background: #".get_option($shortname.'_theme_color').";
	color:#".get_option($shortname.'_body_color').";
	font-style:".get_option($shortname.'_body_font_style').";
	font-size: ".get_option($shortname.'_body_font_size')."px;
	line-height:".get_option($shortname.'_body_line_hight')."px;
	font-family:".get_option($shortname.'_body_line_hight').";
	}";
$body .= "
h1{
	line-height:".get_option($shortname.'_h_one_line_hight')."px;
	color:#".get_option($shortname.'_h_one_color').";
	font-style:".get_option($shortname.'_h_one_font_style').";
	font-size:".get_option($shortname.'_h_one_font_size')."px;
	font-family:".get_option($shortname.'_h_one_font_family').";
	}";
$body .= "
h2{
	line-height:".get_option($shortname.'_h_two_line_hight')."px;
	color:#".get_option($shortname.'_h_two_color').";
	font-style:".get_option($shortname.'_h_two_font_style').";
	font-size:".get_option($shortname.'_h_two_font_size')."px;
	font-family:".get_option($shortname.'_h_two_font_family').";
	}";
$body .= "
h3{
	line-height:".get_option($shortname.'_h_three_line_hight')."px;
	color:".get_option($shortname.'_h_three_color').";
	font-style:".get_option($shortname.'_h_three_font_style').";
	font-size:".get_option($shortname.'_h_three_font_size')."px;
	font-family:".get_option($shortname.'_h_three_font_family').";
	}";
$body .= "
h4{
	line-height: ".get_option($shortname.'_h_four_line_hight')."px;
	color:#".get_option($shortname.'_h_four_color').";
	font-style:".get_option($shortname.'_h_four_font_style').";
	font-size:".get_option($shortname.'_h_four_font_size')."px;
	font-family:".get_option($shortname.'_h_four_font_family').";
	}";
$body .= "
h5{
	line-height:".get_option($shortname.'_h_five_line_hight')."px;
	color:#".get_option($shortname.'_h_five_color').";
	font-style:".get_option($shortname.'_h_five_font_style').";
	font-size:".get_option($shortname.'_h_five_font_size')."px;
	font-family:".get_option($shortname.'_h_five_font_family').";
	}";
$body .= "
h6{
	line-height:".get_option($shortname.'_h_six_line_hight')."px;
	color:#".get_option($shortname.'_h_six_color').";
	font-style:".get_option($shortname.'_h_six_font_style').";
	font-size:".get_option($shortname.'_h_six_font_size')."px;
	font-family:".get_option($shortname.'_h_six_font_family').";
	}";
?>
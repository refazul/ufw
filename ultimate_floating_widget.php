<?php
/**
 * @package Ultimate Floating Widget
 * @version 1.0
 */
/*
Plugin Name: Ultimate Floating Widget
Plugin URI: http://fw.all-spark.com
Description: The Ultimate Floating Widget Plugin lets you add some spices to your website!
Author: Refazul Refat
Version: 1.0
Author URI: http://fw.all-spark.com
*/

require_once('settings.php');

define("FLOATING_BLOCK_DELIMITER",';;;');
define("FLOATING_BLOCK_DIR",plugins_url('/ultimate_floating_widget'));


register_activation_hook( __FILE__, 'ultimate_floating_block_install' );
register_deactivation_hook( __FILE__, 'ultimate_floating_block_uninstall' );


function ultimate_floating_block_install()
{	
	update_option('floating-block-general','animation_speed::400;;;overlay_opacity::0.5;;;overlay_color::000000');
	update_option('floating-block-icon','width::32;;;height::32;;;top_radius::0;;;bottom_radius::0;;;top_margin::0;;;bottom_margin::0;;;left_margin::0;;;right_margin::0');
	update_option('floating-sequence','');
}

function ultimate_floating_block_uninstall()
{
	delete_option('floating-block-general');
	delete_option('floating-block-icon');
	delete_option('floating-block-theme');
	
	$sequences=floating_block_get_sequences();
	foreach($sequences as $current)
	{		
		delete_option('floating-block-'.$current);
	}
	delete_option('floating-sequence');
}

add_action( 'admin_menu', 'register_ultimate_floating_block' );

function register_ultimate_floating_block(){
    add_menu_page( 'Ultimate Floating Widgets', 'Floating Widgets', 'manage_options', 'ultimate_floating_widget/admin-options.php', '' ,plugins_url( 'ultimate_floating_widget/css/images/block.png' ), 99 ); 
	
	add_action( 'admin_init', 'ultimate_floating_block_init' );		
}
include_once('render.php');

function ultimate_floating_block_init()
{
	
	/* Load jquery,jquery-ui,jquery-ui-css */
	wp_register_style( 'jquery-ui-theme', plugins_url( '/css/ui/'.FLOATING_BLOCK_THEME.'/jquery.ui.theme.css', __FILE__ ) );
	wp_enqueue_style( 'jquery-ui-theme' );
	
	wp_register_style( 'jquery-ui-css', plugins_url( '/css/ui/'.FLOATING_BLOCK_THEME.'/jquery-ui.min.css', __FILE__ ) );
	wp_enqueue_style( 'jquery-ui-css' );
	
	wp_register_script( 'jquery-latest', plugins_url( '/js/jquery-1.9.1.js', __FILE__ ) );
	wp_enqueue_script( 'jquery-latest' );
	
	wp_register_script( 'jquery-ui', plugins_url( '/js/jquery-ui-1.10.3.custom.min.js', __FILE__ ) );
	wp_enqueue_script( 'jquery-ui' );
	/* End Loading */
		
	/* Farbtastic Color Picker */
	wp_register_style( 'farbtastic-css', plugins_url( '/css/farbtastic.css', __FILE__ ) );
	wp_enqueue_style( 'farbtastic-css' );
	
	wp_register_script( 'farbtastic-js', plugins_url( '/js/farbtastic.js', __FILE__ ) );
	wp_enqueue_script( 'farbtastic-js' );
	/* End */
	
	/* Media Uploader */
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_enqueue_style('thickbox');
	/* End */
	
	/* Custom CSS */	
	wp_register_style( 'custom-css', plugins_url( '/css/style.css', __FILE__ ), array(),'4.5' );
	wp_enqueue_style( 'custom-css' );
	/* End */
}

/* Ajax Actions */
add_action('wp_ajax_floating_block_get_playlists','floating_block_get_playlists_callback');

add_action('wp_ajax_floating_block_general_options', 'floating_block_general_options_callback');
add_action('wp_ajax_floating_block_icon_options', 'floating_block_icon_options_callback');

function floating_block_get_playlists_callback(){

	$user=$_POST['user'];	
	
	$url='https://soundcloud.com/'.$user;		
	$client_id='7edcd2046933258eca7783c62d8aff72';
	
	unset($args);	
	$args['url']=$url;
	$args['client_id']=$client_id;
	
	$url=esc_url_raw(add_query_arg($args,'http://api.soundcloud.com/resolve.json'));
	$html=wp_remote_get($url);
	$body=wp_remote_retrieve_body($html);
	
	$json=json_decode($body);
	if(isset($json->errors))
	{
		echo 'false';
		die();
	}
	$user_id=$json->id;
	
	unset($args);
	unset($json);
	$args['client_id']=$client_id;
	$url=esc_url_raw(add_query_arg($args,'http://api.soundcloud.com/users/'.$user_id.'/playlists.json'));
	$html=wp_remote_get($url);
	$body=wp_remote_retrieve_body($html);
	
	$json=json_decode($body);
	if(isset($json->errors))
	{
		echo 'false';
		die();
	}
	
	$output='';	
	
	foreach($json as $current)
	{
		$title=$current->title;
		$count=$current->track_count;
		$permalink_url=$current->permalink_url;		
		
		$output.='<option value="'.$permalink_url.'">'.$title.' ('.$count.')</option>';
	}
	echo $output;
		
	die();
}


function floating_block_general_options_callback() {

	global $wpdb;
	$animation_speed = ( $_POST['animation_speed'] );
	$overlay_opacity = ( $_POST['overlay_opacity'] );
	$overlay_color = ( $_POST['overlay_color'] );
	
	$save_string='';
	$save_string.='animation_speed::'.$animation_speed.FLOATING_BLOCK_DELIMITER;
	$save_string.='overlay_opacity::'.$overlay_opacity.FLOATING_BLOCK_DELIMITER;
	$save_string.='overlay_color::'.$overlay_color;
	
	update_option('floating-block-general',$save_string);
	
	echo "Done !";

	die();
}
function floating_block_icon_options_callback() {

	global $wpdb;
	$width = ( $_POST['width'] );
	$height = ( $_POST['height'] );
	$top_radius = ( $_POST['top_radius'] );
	$bottom_radius = ( $_POST['bottom_radius'] );
	$top_margin = ( $_POST['top_margin'] );
	$bottom_margin = ( $_POST['bottom_margin'] );
	$left_margin = ( $_POST['left_margin'] );
	$right_margin = ( $_POST['right_margin'] );
	
	$save_string='';
	$save_string.='width::'.$width.FLOATING_BLOCK_DELIMITER;
	$save_string.='height::'.$height.FLOATING_BLOCK_DELIMITER;
	$save_string.='top_radius::'.$top_radius.FLOATING_BLOCK_DELIMITER;
	$save_string.='bottom_radius::'.$bottom_radius.FLOATING_BLOCK_DELIMITER;
	$save_string.='top_margin::'.$top_margin.FLOATING_BLOCK_DELIMITER;
	$save_string.='bottom_margin::'.$bottom_margin.FLOATING_BLOCK_DELIMITER;
	$save_string.='left_margin::'.$left_margin.FLOATING_BLOCK_DELIMITER;
	$save_string.='right_margin::'.$right_margin;
	
	update_option('floating-block-icon',$save_string);
	
	echo "Done !";

	die();
}


add_action('wp_ajax_floating_block_partial_save_youtube', 'floating_block_partial_save_youtube_callback');
add_action('wp_ajax_floating_block_partial_save_vimeo', 'floating_block_partial_save_vimeo_callback');
add_action('wp_ajax_floating_block_partial_save_google_maps', 'floating_block_partial_save_google_maps_callback');
add_action('wp_ajax_floating_block_partial_save_facebook_like_box', 'floating_block_partial_save_facebook_like_box_callback');
add_action('wp_ajax_floating_block_partial_save_twitter', 'floating_block_partial_save_twitter_callback');
add_action('wp_ajax_floating_block_partial_save_custom', 'floating_block_partial_save_custom_callback');
add_action('wp_ajax_floating_block_partial_save_soundcloud', 'floating_block_partial_save_soundcloud_callback');
add_action('wp_ajax_floating_block_partial_save_linkedin', 'floating_block_partial_save_linkedin_callback');
add_action('wp_ajax_floating_block_partial_save_pinterest', 'floating_block_partial_save_pinterest_callback');
add_action('wp_ajax_floating_block_partial_save_flickr', 'floating_block_partial_save_flickr_callback');

function floating_block_partial_save_flickr_callback() {

	global $wpdb;
	$block_id = ( $_POST['block_id'] );
	$block_type = ( $_POST['block_type'] );
	$block_title = ( $_POST['block_title'] );
	$block_color = ( $_POST['block_color'] );
	$block_position = ( $_POST['block_position'] );
	$block_texture = ( $_POST['block_texture'] );
	$texture_opacity = ( $_POST['texture_opacity'] );
	$block_icon = ( $_POST['block_icon'] );
	
	$flickr_user = ($_POST['flickr_user']);		
	$recent_count = ($_POST['recent_count']);
	$slider_width = ($_POST['slider_width']);
	$slider_height = ($_POST['slider_height']);
	
	
	$save_string='';
	$save_string.='type::'.$block_type.FLOATING_BLOCK_DELIMITER;
	$save_string.='title::'.$block_title.FLOATING_BLOCK_DELIMITER;
	$save_string.='color::'.$block_color.FLOATING_BLOCK_DELIMITER;	
	$save_string.='position::'.$block_position.FLOATING_BLOCK_DELIMITER;
	$save_string.='texture::'.$block_texture.FLOATING_BLOCK_DELIMITER;
	$save_string.='texture_opacity::'.$texture_opacity.FLOATING_BLOCK_DELIMITER;
	$save_string.='icon::'.$block_icon.FLOATING_BLOCK_DELIMITER;
	
	$save_string.='flickr_user::'.$flickr_user.FLOATING_BLOCK_DELIMITER;	
	$save_string.='recent_count::'.$recent_count.FLOATING_BLOCK_DELIMITER;
	$save_string.='slider_width::'.$slider_width.FLOATING_BLOCK_DELIMITER;
	$save_string.='slider_height::'.$slider_height.FLOATING_BLOCK_DELIMITER;
	
	update_option('floating-block-'.$block_id,$save_string);
	
	floating_block_add_sequence($block_id);

	echo "Done !";

	die();
}

function floating_block_partial_save_pinterest_callback() {

	global $wpdb;
	$block_id = ( $_POST['block_id'] );
	$block_type = ( $_POST['block_type'] );
	$block_title = ( $_POST['block_title'] );
	$block_color = ( $_POST['block_color'] );
	$block_position = ( $_POST['block_position'] );
	$block_texture = ( $_POST['block_texture'] );
	$texture_opacity = ( $_POST['texture_opacity'] );
	$block_icon = ( $_POST['block_icon'] );
	
	$pint_type = ($_POST['pint_type']);		
	$pin = ($_POST['pin']);	
	
	$save_string='';
	$save_string.='type::'.$block_type.FLOATING_BLOCK_DELIMITER;
	$save_string.='title::'.$block_title.FLOATING_BLOCK_DELIMITER;
	$save_string.='color::'.$block_color.FLOATING_BLOCK_DELIMITER;	
	$save_string.='position::'.$block_position.FLOATING_BLOCK_DELIMITER;
	$save_string.='texture::'.$block_texture.FLOATING_BLOCK_DELIMITER;
	$save_string.='texture_opacity::'.$texture_opacity.FLOATING_BLOCK_DELIMITER;
	$save_string.='icon::'.$block_icon.FLOATING_BLOCK_DELIMITER;
	
	$save_string.='pint_type::'.$pint_type.FLOATING_BLOCK_DELIMITER;	
	$save_string.='pin::'.$pin.FLOATING_BLOCK_DELIMITER;
	
	update_option('floating-block-'.$block_id,$save_string);
	
	floating_block_add_sequence($block_id);

	echo "Done !";

	die();
}

function floating_block_partial_save_linkedin_callback() {

	global $wpdb;
	$block_id = ( $_POST['block_id'] );
	$block_type = ( $_POST['block_type'] );
	$block_title = ( $_POST['block_title'] );
	$block_color = ( $_POST['block_color'] );
	$block_position = ( $_POST['block_position'] );
	$block_texture = ( $_POST['block_texture'] );
	$texture_opacity = ( $_POST['texture_opacity'] );
	$block_icon = ( $_POST['block_icon'] );
	
	$profile_url = ($_POST['profile_url']);		
	
	$save_string='';
	$save_string.='type::'.$block_type.FLOATING_BLOCK_DELIMITER;
	$save_string.='title::'.$block_title.FLOATING_BLOCK_DELIMITER;
	$save_string.='color::'.$block_color.FLOATING_BLOCK_DELIMITER;	
	$save_string.='position::'.$block_position.FLOATING_BLOCK_DELIMITER;
	$save_string.='texture::'.$block_texture.FLOATING_BLOCK_DELIMITER;
	$save_string.='texture_opacity::'.$texture_opacity.FLOATING_BLOCK_DELIMITER;
	$save_string.='icon::'.$block_icon.FLOATING_BLOCK_DELIMITER;
	
	$save_string.='profile_url::'.$profile_url.FLOATING_BLOCK_DELIMITER;	
	
	update_option('floating-block-'.$block_id,$save_string);
	
	floating_block_add_sequence($block_id);

	echo "Done !";

	die();
}

function floating_block_partial_save_soundcloud_callback() {

	global $wpdb;
	$block_id = ( $_POST['block_id'] );
	$block_type = ( $_POST['block_type'] );
	$block_title = ( $_POST['block_title'] );
	$block_color = ( $_POST['block_color'] );
	$block_position = ( $_POST['block_position'] );
	$block_texture = ( $_POST['block_texture'] );
	$texture_opacity = ( $_POST['texture_opacity'] );
	$block_icon = ( $_POST['block_icon'] );
	
	$user=$_POST['user'];
	$permalink=$_POST['permalink'];
	
	$save_string='';
	$save_string.='type::'.$block_type.FLOATING_BLOCK_DELIMITER;
	$save_string.='title::'.$block_title.FLOATING_BLOCK_DELIMITER;
	$save_string.='color::'.$block_color.FLOATING_BLOCK_DELIMITER;	
	$save_string.='position::'.$block_position.FLOATING_BLOCK_DELIMITER;
	$save_string.='texture::'.$block_texture.FLOATING_BLOCK_DELIMITER;
	$save_string.='texture_opacity::'.$texture_opacity.FLOATING_BLOCK_DELIMITER;
	$save_string.='icon::'.$block_icon.FLOATING_BLOCK_DELIMITER;
	
	$save_string.='user::'.$user.FLOATING_BLOCK_DELIMITER;
	$save_string.='permalink::'.$permalink;
	
	update_option('floating-block-'.$block_id,$save_string);
	
	floating_block_add_sequence($block_id);

	echo "Done !";

	die();
}

function floating_block_partial_save_custom_callback() {

	global $wpdb;
	$block_id = ( $_POST['block_id'] );
	$block_type = ( $_POST['block_type'] );
	$block_title = ( $_POST['block_title'] );
	$block_color = ( $_POST['block_color'] );
	$block_position = ( $_POST['block_position'] );
	$block_texture = ( $_POST['block_texture'] );
	$texture_opacity = ( $_POST['texture_opacity'] );
	$block_icon = ( $_POST['block_icon'] );
	
	$html = ($_POST['html']);
	$width = ($_POST['width']);
	$height = ($_POST['height']);
	
	$save_string='';
	$save_string.='type::'.$block_type.FLOATING_BLOCK_DELIMITER;
	$save_string.='title::'.$block_title.FLOATING_BLOCK_DELIMITER;
	$save_string.='color::'.$block_color.FLOATING_BLOCK_DELIMITER;	
	$save_string.='position::'.$block_position.FLOATING_BLOCK_DELIMITER;
	$save_string.='texture::'.$block_texture.FLOATING_BLOCK_DELIMITER;
	$save_string.='texture_opacity::'.$texture_opacity.FLOATING_BLOCK_DELIMITER;
	$save_string.='icon::'.$block_icon.FLOATING_BLOCK_DELIMITER;
	
	$save_string.='html::'.$html.FLOATING_BLOCK_DELIMITER;
	$save_string.='width::'.$width.FLOATING_BLOCK_DELIMITER;
	$save_string.='height::'.$height.FLOATING_BLOCK_DELIMITER;
	
	update_option('floating-block-'.$block_id,$save_string);
	
	floating_block_add_sequence($block_id);

	echo "Done !";

	die();
}

function floating_block_partial_save_twitter_callback() {

	$block_id = ( $_POST['block_id'] );
	$block_type = ( $_POST['block_type'] );
	$block_title = ( $_POST['block_title'] );
	$block_color = ( $_POST['block_color'] );
	$block_position = ( $_POST['block_position'] );
	$block_texture = ( $_POST['block_texture'] );
	$texture_opacity = ( $_POST['texture_opacity'] );
	$block_icon = ( $_POST['block_icon'] );
	
	$html = ($_POST['html']);
	
	$save_string='';
	$save_string.='type::'.$block_type.FLOATING_BLOCK_DELIMITER;
	$save_string.='title::'.$block_title.FLOATING_BLOCK_DELIMITER;
	$save_string.='color::'.$block_color.FLOATING_BLOCK_DELIMITER;	
	$save_string.='position::'.$block_position.FLOATING_BLOCK_DELIMITER;
	$save_string.='texture::'.$block_texture.FLOATING_BLOCK_DELIMITER;
	$save_string.='texture_opacity::'.$texture_opacity.FLOATING_BLOCK_DELIMITER;
	$save_string.='icon::'.$block_icon.FLOATING_BLOCK_DELIMITER;
	
	$save_string.='html::'.$html.FLOATING_BLOCK_DELIMITER;
	
	update_option('floating-block-'.$block_id,$save_string);
	
	floating_block_add_sequence($block_id);

	echo "Done !";
	die();
}
function floating_block_partial_save_facebook_like_box_callback() {

	$block_id = ( $_POST['block_id'] );
	$block_type = ( $_POST['block_type'] );
	$block_title = ( $_POST['block_title'] );
	$block_color = ( $_POST['block_color'] );
	$block_position = ( $_POST['block_position'] );
	$block_texture = ( $_POST['block_texture'] );
	$texture_opacity = ( $_POST['texture_opacity'] );
	$block_icon = ( $_POST['block_icon'] );
	
	$pageurl = ( $_POST['pageurl'] );	
	$colorscheme = ( $_POST['colorscheme'] );
	$showfaces = ( $_POST['showfaces'] );
	$stream = ( $_POST['stream'] );	
	$header = ( $_POST['header'] );
	
	/* Encode pageurl */
	$pageurl = urlencode ($pageurl);
	
	$save_string='';
	$save_string.='type::'.$block_type.FLOATING_BLOCK_DELIMITER;
	$save_string.='title::'.$block_title.FLOATING_BLOCK_DELIMITER;
	$save_string.='color::'.$block_color.FLOATING_BLOCK_DELIMITER;
	$save_string.='position::'.$block_position.FLOATING_BLOCK_DELIMITER;
	$save_string.='texture::'.$block_texture.FLOATING_BLOCK_DELIMITER;
	$save_string.='texture_opacity::'.$texture_opacity.FLOATING_BLOCK_DELIMITER;
	$save_string.='icon::'.$block_icon.FLOATING_BLOCK_DELIMITER;
	
	$save_string.='pageurl::'.$pageurl.FLOATING_BLOCK_DELIMITER;		
	$save_string.='colorscheme::'.$colorscheme.FLOATING_BLOCK_DELIMITER;
	$save_string.='showfaces::'.$showfaces.FLOATING_BLOCK_DELIMITER;
	$save_string.='stream::'.$stream.FLOATING_BLOCK_DELIMITER;		
	$save_string.='header::'.$header.FLOATING_BLOCK_DELIMITER;	
	
	update_option('floating-block-'.$block_id,$save_string);
	
	floating_block_add_sequence($block_id);
	
	echo "Done !";
	die();
}
function floating_block_partial_save_google_maps_callback() {

	global $wpdb;
	$block_id = ( $_POST['block_id'] );
	$block_type = ( $_POST['block_type'] );
	$block_title = ( $_POST['block_title'] );
	$block_color = ( $_POST['block_color'] );
	$block_position = ( $_POST['block_position'] );
	$block_texture = ( $_POST['block_texture'] );
	$texture_opacity = ( $_POST['texture_opacity'] );
	$block_icon = ( $_POST['block_icon'] );
	
	$src = ( $_POST['map_src'] );
	
	/* Handle Short URL */
	$headers = get_headers($src);
	$headers = array_reverse($headers);
	foreach($headers as $header) {
		if (strpos($header, 'Location: ') === 0) {
			$src = str_replace('Location: ', '', $header);
			break;
		}
	}
	
	/* Append &output=embed */	
	if(preg_match('/output=embed/',$src)==false)
	{		
		$src.='&output=embed';
	}
	
	$save_string='';
	$save_string.='type::'.$block_type.FLOATING_BLOCK_DELIMITER;
	$save_string.='title::'.$block_title.FLOATING_BLOCK_DELIMITER;
	$save_string.='color::'.$block_color.FLOATING_BLOCK_DELIMITER;
	$save_string.='position::'.$block_position.FLOATING_BLOCK_DELIMITER;
	$save_string.='texture::'.$block_texture.FLOATING_BLOCK_DELIMITER;
	$save_string.='texture_opacity::'.$texture_opacity.FLOATING_BLOCK_DELIMITER;
	$save_string.='icon::'.$block_icon.FLOATING_BLOCK_DELIMITER;
	
	$save_string.='src::'.$src.FLOATING_BLOCK_DELIMITER;	
	
	update_option('floating-block-'.$block_id,$save_string);
	
	floating_block_add_sequence($block_id);
	
	echo "Done !";

	die();
}

function floating_block_partial_save_vimeo_callback() {

	global $wpdb;
	$block_id = ( $_POST['block_id'] );
	$block_type = ( $_POST['block_type'] );
	$block_title = ( $_POST['block_title'] );
	$block_color = ( $_POST['block_color'] );
	$block_position = ( $_POST['block_position'] );
	$block_texture = ( $_POST['block_texture'] );
	$texture_opacity = ( $_POST['texture_opacity'] );
	$block_icon = ( $_POST['block_icon'] );
	
	$vid = ( $_POST['video_id'] );
	$frameborder = ( $_POST['video_frameborder'] );

	$save_string='';
	$save_string.='type::'.$block_type.FLOATING_BLOCK_DELIMITER;
	$save_string.='title::'.$block_title.FLOATING_BLOCK_DELIMITER;
	$save_string.='color::'.$block_color.FLOATING_BLOCK_DELIMITER;
	$save_string.='position::'.$block_position.FLOATING_BLOCK_DELIMITER;
	$save_string.='texture::'.$block_texture.FLOATING_BLOCK_DELIMITER;
	$save_string.='texture_opacity::'.$texture_opacity.FLOATING_BLOCK_DELIMITER;
	$save_string.='icon::'.$block_icon.FLOATING_BLOCK_DELIMITER;
	
	$save_string.='vid::'.$vid.FLOATING_BLOCK_DELIMITER;
	$save_string.='frameborder::'.$frameborder.FLOATING_BLOCK_DELIMITER;	
	
	update_option('floating-block-'.$block_id,$save_string);
	
	floating_block_add_sequence($block_id);
	
	echo "Done !";
	die();
}

function floating_block_partial_save_youtube_callback() {

	global $wpdb;
	$block_id = ( $_POST['block_id'] );
	$block_type = ( $_POST['block_type'] );
	$block_title = ( $_POST['block_title'] );
	$block_color = ( $_POST['block_color'] );
	$block_position = ( $_POST['block_position'] );
	$block_texture = ( $_POST['block_texture'] );
	$texture_opacity = ( $_POST['texture_opacity'] );
	$block_icon = ( $_POST['block_icon'] );
	
	$vid = ( $_POST['video_id'] );
	$streaming = ( $_POST['streaming'] );
	$frameborder = ( $_POST['video_frameborder'] );
	$allowfull = ( $_POST['video_allowfull'] );

	$save_string='';
	$save_string.='type::'.$block_type.FLOATING_BLOCK_DELIMITER;
	$save_string.='title::'.$block_title.FLOATING_BLOCK_DELIMITER;
	$save_string.='color::'.$block_color.FLOATING_BLOCK_DELIMITER;
	$save_string.='position::'.$block_position.FLOATING_BLOCK_DELIMITER;
	$save_string.='texture::'.$block_texture.FLOATING_BLOCK_DELIMITER;
	$save_string.='texture_opacity::'.$texture_opacity.FLOATING_BLOCK_DELIMITER;
	$save_string.='icon::'.$block_icon.FLOATING_BLOCK_DELIMITER;
	
	$save_string.='vid::'.$vid.FLOATING_BLOCK_DELIMITER;
	$save_string.='streaming::'.$streaming.FLOATING_BLOCK_DELIMITER;
	$save_string.='frameborder::'.$frameborder.FLOATING_BLOCK_DELIMITER;
	$save_string.='allowfull::'.$allowfull.FLOATING_BLOCK_DELIMITER;
		
	update_option('floating-block-'.$block_id,$save_string);
	
	floating_block_add_sequence($block_id);
	
	echo "Done !";

	die();
}

/* AJAX - saving sequence */
/* AJAX - remove sequence */

add_action('wp_ajax_floating_block_save_sequence', 'floating_block_save_sequence_callback');
add_action('wp_ajax_floating_block_remove', 'floating_block_remove_callback');

function floating_block_save_sequence_callback()
{
	$block_sequence=$_POST['block_sequence'];
	update_option('floating-sequence',$block_sequence);	
	
	echo "Done !";
	die();
}
function floating_block_remove_callback()
{
	$block_id = ( $_POST['block_id'] );
	delete_option('floating-block-'.$block_id);
	
	floating_block_remove_sequence($block_id);
	
	echo "Done !";
	die();
}

/* End */

/* General Callbacks */
function floating_block_get_settings()
{
	global $wpdb;
	$default_options=$wpdb->get_row($wpdb->prepare("SELECT * FROM $wpdb->options WHERE OPTION_NAME=%s",'floating-block-general'));
	$temp=explode(FLOATING_BLOCK_DELIMITER,$default_options->option_value);

	$t=explode('::',$temp[0]);
	$args['animation_speed']=$t[1];

	$t=explode('::',$temp[1]);
	$args['overlay_opacity']=$t[1];

	$t=explode('::',$temp[2]);
	$args['overlay_color']=$t[1];
	
	return $args;
}
function floating_block_get_icon_preference()
{
	global $wpdb;
	$default_options=$wpdb->get_row($wpdb->prepare("SELECT * FROM $wpdb->options WHERE OPTION_NAME=%s",'floating-block-icon'));
	$temp=explode(FLOATING_BLOCK_DELIMITER,$default_options->option_value);
	
	$t=explode('::',$temp[0]);
	$args['width']=$t[1];
	
	$t=explode('::',$temp[1]);
	$args['height']=$t[1];
	
	$t=explode('::',$temp[2]);
	$args['top_radius']=$t[1];
	
	$t=explode('::',$temp[3]);
	$args['bottom_radius']=$t[1];
	
	$t=explode('::',$temp[4]);
	$args['top_margin']=$t[1];
	
	$t=explode('::',$temp[5]);
	$args['bottom_margin']=$t[1];

	$t=explode('::',$temp[6]);
	$args['left_margin']=$t[1];
	
	$t=explode('::',$temp[7]);
	$args['right_margin']=$t[1];
	
	return $args;
}

function floating_block_get_sequences()
{
	global $wpdb;
	$sequence_string=$wpdb->get_row($wpdb->prepare("SELECT * FROM $wpdb->options WHERE OPTION_NAME=%s",'floating-sequence'));
	$sequences=explode(FLOATING_BLOCK_DELIMITER,$sequence_string->option_value);
	
	$result=array();
	foreach($sequences as $current)
	{		
		if(empty($current))continue;
		array_push($result,$current);
	}
	return $result;								//123;456;789;		to		array(123,456,789);
}
function floating_block_add_sequence($seq)
{	
	$sequences=floating_block_get_sequences();
	
	$result='';
	foreach($sequences as $current)
	{
		if($current==$seq)return;				//Already Exists
		$result.=$current.FLOATING_BLOCK_DELIMITER;
	}
	$result.=$seq.FLOATING_BLOCK_DELIMITER;		//Append as 123;456;789;new_sequence_id
	update_option('floating-sequence',$result);		
}
function floating_block_remove_sequence($seq)
{	
	$sequences=floating_block_get_sequences();
	
	$result='';
	foreach($sequences as $current)
	{		
		if($current==$seq)continue;				//Skip This
		$result.=$current.FLOATING_BLOCK_DELIMITER;
	}
	update_option('floating-sequence',$result);
}

function dump($var)
{
	echo '<pre>';
	print_r($var);
	echo '</pre>';
}

/* End */
?>
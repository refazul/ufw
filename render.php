<?php

add_action('wp_enqueue_scripts','floating_block_render_init');

function floating_block_render_init()
{
	/* Floating Block */
	wp_deregister_style( 'custom-css' );
	wp_register_style( 'custom-css', plugins_url( '/css/style.css', __FILE__ ) );
	wp_enqueue_style( 'custom-css' );
	
	wp_deregister_style( 'floating_block-css' );
	wp_register_style( 'floating_block-css', plugins_url( '/css/floating_block.css', __FILE__ ) );
	wp_enqueue_style( 'floating_block-css' );
	
	wp_deregister_style( 'floating_block_custom_scroll_css' );
	wp_register_style( 'floating_block_custom_scroll_css', plugins_url( '/css/jquery.mCustomScrollbar.css', __FILE__ ) );
	wp_enqueue_style( 'floating_block_custom_scroll_css' );
	
	wp_register_script( 'jquery-latest', plugins_url( '/js/jquery-1.9.1.js', __FILE__ ) );
	wp_enqueue_script( 'jquery-latest' );
	
	wp_deregister_script( 'floating_block-js' );
	wp_register_script( 'floating_block-js', plugins_url( '/js/floating_block.js', __FILE__ ) );
	wp_enqueue_script( 'floating_block-js' );
	
	wp_deregister_script( 'cufon-yui' );
	wp_register_script( 'cufon-yui', plugins_url( '/js/cufon-yui.js', __FILE__ ) );
	wp_enqueue_script( 'cufon-yui' );
	
	wp_deregister_script( 'chunk-five' );
	wp_register_script( 'chunk-five', plugins_url( '/js/ChunkFive_400.font.js', __FILE__ ) );
	wp_enqueue_script( 'chunk-five' );
	
	wp_deregister_script( 'floating_block_custom_scroll_js' );
	wp_register_script( 'floating_block_custom_scroll_js', plugins_url( '/js/jquery.mCustomScrollbar.concat.min.js', __FILE__ ) );
	wp_enqueue_script( 'floating_block_custom_scroll_js' );
	

	/* End */	
}
require_once('render-indirect.php');
require_once('render-direct.php');

add_action('wp_footer','floating_block_render');

function floating_block_render()
{
	$settings=floating_block_get_settings();
	$animation_speed=$settings['animation_speed'];
	$overlay_opacity=$settings['overlay_opacity'];
	$overlay_color=$settings['overlay_color'];
	
	$settings=floating_block_get_icon_preference();
		
	$width=$settings['width'];
	$height=$settings['height'];
	$top_radius=$settings['top_radius'];
	$bottom_radius=$settings['bottom_radius'];
	$top_margin=$settings['top_margin'];
	$bottom_margin=$settings['bottom_margin'];
	$left_margin=$settings['left_margin'];
	$right_margin=$settings['right_margin'];
	?>
	<div id="floating_block-settings" data-spacing="10" data-margin="8" data-position="middle" data-speed="<?php echo $animation_speed?>" data-opacity="<?php echo $overlay_opacity;?>" data-color="<?php echo $overlay_color;?>" data-width="<?php echo ($width+$left_margin+$right_margin);?>" data-height="<?php echo ($height+$top_margin+$bottom_margin);?>" data-topradius="<?php echo $top_radius;?>" data-bottomradius="<?php echo $bottom_radius;?>" data-itop="<?php echo $top_margin;?>" data-ibottom="<?php echo $bottom_margin;?>" data-ileft="<?php echo $left_margin;?>" data-iright="<?php echo $right_margin;?>"></div>
	<?php 	
	
	$sequences=floating_block_get_sequences();		
		
	foreach($sequences as $current)
	{
		global $wpdb;
		$result=$wpdb->get_row($wpdb->prepare("SELECT * FROM $wpdb->options WHERE OPTION_NAME = '%s'",'floating-block-'.$current));
		unset($data);
		$tmp=explode('-',$result->option_name);
		$tokens=explode(';;;',$result->option_value);		
		foreach($tokens as $token){
			$temp=explode('::',$token);
			if(isset($temp[0]) && isset($temp[1]))
				$data[$temp[0]]=$temp[1];
		}
		$data['id']=$tmp[2];
	
		$args['id']=$data['id'];
		$args['type']=$data['type'];
		$args['position']=$data['position']==1?'left':'right';		
		$args['title']=$data['title'];
		$args['opacity']=$data['texture_opacity'];
		$args['icon']=$data['icon'];
		$args['texture']=$data['texture'];
		$args['color']='#'.$data['color'];
		$args['top_radius']=$top_radius;
		$args['bottom_radius']=$bottom_radius;
		
		if($data['type']=='facebook_like_box'):
		
			$args['width']=410;		//You can try changing this
			$args['height']=575;	//You can try changing this
			$indirect_renderer=new FBS_Indirect_Renderer($args);
			
			$param['pageurl']=$data['pageurl'];
			$param['frameborder']=$data['frameborder'];
			$param['colorscheme']=$data['colorscheme']?'light':'dark';
			$param['stream']=$data['stream']?'true':'false';
			$param['showfaces']=$data['showfaces']?'true':'false';
			$param['header']=$data['header']?'true':'false';
			$indirect_renderer->render_facebook($param);
		
		elseif($data['type']=='twitter'):
		
			$args['width']=420;		//You should not change this
			$args['height']=595;	//No effect! Height is determined by your twitter widget settings
			$direct_renderer=new FBS_Direct_Renderer($args);
			
			$param['html']=$data['html'];			
			$direct_renderer->render_twitter($param);
		
		elseif($data['type']=='youtube'):
		
			$args['width']=640;		//You can try changing this
			$args['height']=480;	//You can try changing this
			$indirect_renderer=new FBS_Indirect_Renderer($args);
			
			$param['vid']=$data['vid'];
			$param['streaming']=$data['streaming'];
			$param['frameborder']=$data['frameborder'];
			$param['allowfull']=$data['allowfull'];			
			$indirect_renderer->render_youtube($param);
			
		elseif($data['type']=='google_maps'):
						
			$args['width']=640;		//You can try changing this
			$args['height']=480;	//You can try changing this
			$indirect_renderer=new FBS_Indirect_Renderer($args);
			
			$param['src']=$data['src'];			
			$indirect_renderer->render_google_maps($param);
			
		elseif($data['type']=='vimeo'):
		
			$args['width']=640;		//You can try changing this
			$args['height']=480;	//You can try changing this
			$indirect_renderer=new FBS_Indirect_Renderer($args);
			
			$param['vid']=$data['vid'];
			$param['frameborder']=$data['frameborder'];
			$param['allowfull']=$data['allowfull'];			
			$indirect_renderer->render_vimeo($param);
		
		elseif($data['type']=='soundcloud'):
		
			$args['width']=500;		//You can try changing this
			$args['height']=465;	//You can try changing this
			$direct_renderer=new FBS_Indirect_Renderer($args);
			
			$param['user']=$data['user'];
			$param['permalink']=$data['permalink'];
			$direct_renderer->render_soundcloud($param);
		
		elseif($data['type']=='linkedin'):
		
			$args['width']=416;		//You can try changing this
			$args['height']=201;	//No effect!
			$direct_renderer=new FBS_Direct_Renderer($args);
			
			$param['profile_url']=$data['profile_url'];			
			$direct_renderer->render_linkedin($param);
		
		elseif($data['type']=='pinterest'):
		
			$args['width']=253;		//You should not change this
			$args['height']=480;	//No effect! Auto Detected!!
			$indirect_renderer=new FBS_Indirect_Renderer($args);
			
			$param['pin_url']=$data['pin'];			
			$indirect_renderer->render_pin($param);
		
		elseif($data['type']=='flickr'):
		
			$args['width']=$data['slider_width'];
			$args['height']=$data['slider_height'];
			$direct_renderer=new FBS_Direct_Renderer($args);
			
			$param['flickr_user']=$data['flickr_user'];
			$param['recent_count']=$data['recent_count'];
			$param['slider_width']=$data['slider_width'];
			$param['slider_height']=$data['slider_height'];			
			$direct_renderer->render_flickr($param);
		
		elseif($data['type']=='custom'):
		
			$args['width']=$data['width'];
			$args['height']=$data['height'];
			$direct_renderer=new FBS_Direct_Renderer($args);
			
			$param['html']=$data['html'];			
			$direct_renderer->render_custom($param);
			
		endif;
	}
}
/* End */
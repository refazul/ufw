<?php

class FBS_Indirect_Renderer
{
	//id,width,height,position,title,opacity,icon,texture,color
	private $id,$width,$height,$position,$title,$opacity,$icon,$texture,$color;
	public function __construct($args)
	{	
		$this->id=$args['id'];
		$this->type=$args['type'];
		$this->width=$args['width'];
		$this->height=$args['height'];
		$this->position=$args['position'];
		$this->title=$args['title'];
		$this->opacity=$args['opacity'];
		$this->icon=$args['icon'];
		$this->texture=$args['texture'];
		$this->color=$args['color'];
		$this->top_radius=$args['top_radius'];
		$this->bottom_radius=$args['bottom_radius'];
	}
	private function render_header()
	{
		?>
		<?php if($this->position=='left'):?>
		<div data-type="<?php echo $this->type;?>" style="-webkit-border-top-right-radius: <?php echo $this->top_radius;?>px; -moz-border-radius-topright: <?php echo $this->top_radius;?>px; border-top-right-radius: <?php echo $this->top_radius;?>px;  -webkit-border-bottom-right-radius: <?php echo $this->bottom_radius;?>px; -moz-border-radius-bottomright: <?php echo $this->bottom_radius;?>px; border-bottom-right-radius: <?php echo $this->bottom_radius;?>px; background-color: <?php echo $this->color;?>" class="floating_block" data-id="<?php echo $this->id;?>" data-rendering="indirect" id="floating_block-<?php echo $this->id;?>" style="background-color:<?php echo $this->color;?>;" data-opacity="<?php echo $this->opacity;?>" data-texture="<?php echo $this->texture;?>" data-icon="<?php echo $this->icon;?>" data-width="<?php echo $this->width;?>" data-height="<?php echo $this->height;?>" data-position="<?php echo $this->position;?>" data-title="<?php echo $this->title;?>">
		<?php elseif($this->position=='right'):?>
		<div data-type="<?php echo $this->type;?>" style="-webkit-border-top-left-radius: <?php echo $this->top_radius;?>px; -moz-border-radius-topleft: <?php echo $this->top_radius;?>px; border-top-left-radius: <?php echo $this->top_radius;?>px;  -webkit-border-bottom-left-radius: <?php echo $this->bottom_radius;?>px; -moz-border-radius-bottomleft: <?php echo $this->bottom_radius;?>px; border-bottom-left-radius: <?php echo $this->bottom_radius;?>px; background-color: <?php echo $this->color;?>" class="floating_block" data-id="<?php echo $this->id;?>" data-rendering="indirect" id="floating_block-<?php echo $this->id;?>" style="background-color:<?php echo $this->color;?>;" data-opacity="<?php echo $this->opacity;?>" data-texture="<?php echo $this->texture;?>" data-icon="<?php echo $this->icon;?>" data-width="<?php echo $this->width;?>" data-height="<?php echo $this->height;?>" data-position="<?php echo $this->position;?>" data-title="<?php echo $this->title;?>">
		<?php endif;?>
			<div style="left: -10000px; position: absolute;">
				<div id="floating_block-actual-content-<?php echo $this->id;?>" >
		<?php		
	}	
	private function render_footer()
	{
		?>
				</div><!--floating_block-actual-content-x-->				
			</div><!--left-->
		</div><!--floating_block-->	
		<?php
	}
	
	public function render_facebook($args)
	{
		$this->render_header();
		
		$pageurl=$args['pageurl'];
		$frameborder=$args['frameborder'];
		$colorscheme=$args['colorscheme'];
		$showfaces=$args['showfaces'];
		$stream=$args['stream'];
		$header=$args['header'];
		
		$request_string='//www.facebook.com/plugins/likebox.php?';
		
		$request_string.='href='.$pageurl;
		//$request_string.='&amp;width';
		$request_string.='&amp;height='.$this->height;
		$request_string.='&amp;colorscheme='.$colorscheme;
		$request_string.='&amp;show_faces='.$showfaces;
		$request_string.='&amp;header='.$header;
		$request_string.='&amp;stream='.$stream;
		$request_string.='&amp;show_border=false';
		$request_string.='&amp;appId=430254560428306';
		
		?>		
		<p style="margin: 0px !important; padding:0px !important; background-color: <?php if($colorscheme=='light')echo '#fff';else echo '#000';?>;">
			<iframe src="<?php echo $request_string;?>" scrolling="no" frameborder="<?php echo $frameborder;?>" style="border:none; overflow:hidden; width: 100%; height:<?php echo $this->height;?>px;" allowTransparency="true"></iframe>
		</p>		
		<?php
		
		$this->render_footer();		
	}
	public function render_soundcloud($args)
	{
		$this->render_header();	
		
		?>		
		<iframe width="100%" height="<?php echo $this->height;?>" src="http://wt.soundcloud.com/player/?url=<?php echo $args['permalink'];?>"  scrolling="no"	frameborder="no"></iframe>		
		<?php		
		
		$this->render_footer();
	}
	
	public function render_pin($args)
	{
		$this->render_header();
		
		$pin_url=$args['pin_url'];
		
		?>		
		<a data-pin-do="embedPin" href="<?php echo $pin_url;?>"></a>
		<script type="text/javascript" src="//assets.pinterest.com/js/pinit.js"></script>		
		<?php
		
		$this->render_footer();
	}
	
	public function render_youtube($args)
	{
		$vid=$args['vid'];
		$streaming=$args['streaming'];
		$frameborder=$args['frameborder'];
		$allowfull=$args['allowfull'];		
		
		if(preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $vid, $match))
			$video_id = $match[1];
		
		$this->render_header();?>
		
		<iframe width="100%" height="<?php echo $this->height;?>" src="http://www.youtube.com/embed/<?php echo $video_id;?>?vq=<?php echo $streaming;?><?php if($allowfull==0)echo '&fs=0';?>" frameborder="<?php echo $frameborder;?>" ></iframe>
		
		<?php $this->render_footer();
	}
	public function get_vimeo_id($args)
	{
		$headers = get_headers($args);		
		// Reverse loop because we want the last matching header,
		// as Vimeo does multiple redirects with your `https` URL
		for($i = count($headers) - 1; $i >= 0; $i--) {
			$header = $headers[$i];
			if(strpos($header, "Location: ") === 0) {
				return substr($header, strlen("Location: "));
			}
		}
	}
	
	public function render_vimeo($args)
	{
		$vid=$args['vid'];		
		$frameborder=$args['frameborder'];
		$allowfull=$args['allowfull'];
				
		$url=$this->get_vimeo_id($vid);
		sscanf(parse_url($url, PHP_URL_PATH), '/%d', $video_id);
		
		$this->render_header();?>
		
		<iframe width="100%" height="405" src="http://player.vimeo.com/video/<?php echo $video_id;?>" frameborder="<?php echo $frameborder;?>" <?php if($allowfull==1) echo 'webkitAllowFullScreen mozallowfullscreen allowFullScreen';?>></iframe>
		
		<?php $this->render_footer();
	}
	
	public function render_google_maps($args)
	{
		$src=$args['src'];
		
		$this->render_header();?>
		
		<iframe width="100%" height="530" src="<?php echo $src;?>" frameborder="0" ></iframe>
		
		<?php $this->render_footer();
	}
}
?>
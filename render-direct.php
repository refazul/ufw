<?php

class FBS_Direct_Renderer
{
	//id,width,,position,title,opacity,icon,texture,color
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
		<?php if($this->position=="left"):?>
		<div data-type="<?php echo $this->type;?>" class="floating_block" data-id="<?php echo $this->id;?>" data-rendering="direct"  id="floating_block-<?php echo $this->id;?>" style="-webkit-border-top-right-radius: <?php echo $this->top_radius;?>px; -moz-border-radius-topright: <?php echo $this->top_radius;?>px; border-top-right-radius: <?php echo $this->top_radius;?>px;  -webkit-border-bottom-right-radius: <?php echo $this->bottom_radius;?>px; -moz-border-radius-bottomright: <?php echo $this->bottom_radius;?>px; border-bottom-right-radius: <?php echo $this->bottom_radius;?>px; background-color:<?php echo $this->color;?>;" data-opacity="<?php echo $this->opacity;?>" data-texture="<?php echo $this->texture;?>" data-icon="<?php echo $this->icon;?>" data-width="<?php echo $this->width;?>" data-height="<?php echo $this->height;?>" data-position="<?php echo $this->position;?>" data-title="<?php echo $this->title;?>">
		<?php elseif($this->position=="right"):?>
		<div data-type="<?php echo $this->type;?>" class="floating_block" data-id="<?php echo $this->id;?>" data-rendering="direct"  id="floating_block-<?php echo $this->id;?>" style="-webkit-border-top-left-radius: <?php echo $this->top_radius;?>px; -moz-border-radius-topleft: <?php echo $this->top_radius;?>px; border-top-left-radius: <?php echo $this->top_radius;?>px;  -webkit-border-bottom-left-radius: <?php echo $this->bottom_radius;?>px; -moz-border-radius-bottomleft: <?php echo $this->bottom_radius;?>px; border-bottom-left-radius: <?php echo $this->bottom_radius;?>px; background-color:<?php echo $this->color;?>;" data-opacity="<?php echo $this->opacity;?>" data-texture="<?php echo $this->texture;?>" data-icon="<?php echo $this->icon;?>" data-width="<?php echo $this->width;?>" data-height="<?php echo $this->height;?>" data-position="<?php echo $this->position;?>" data-title="<?php echo $this->title;?>">
		<?php endif;?>	
			<div style="background-color:<?php echo $this->color;?>;" class="floating_block-container" data-once="false" id="floating_block-container-<?php echo $this->id;?>">
				<div style="background: url(<?php echo $this->texture;;?>); position: absolute; width:100%; height: 100%; top:0px; left:0px;z-index:-1; filter: alpha(opacity=<?php echo $this->opacity*100;?>);opacity: <?php echo $this->opacity;?>"></div>
				<div class="floating_block-content" id="floating_block-content-<?php echo $this->id;?>" >
					<div id="floating_block-rendered-content-<?php echo $this->id;?>" style="width: <?php echo $this->width-16;?>px; position: absolute; left: -100000px;">
		<?php		
	}	
	private function render_footer()
	{
		?>		
					</div>
				</div>
			</div>
		</div>		
		<?php
	}	
	
	public function render_linkedin($args)	
	{
		$this->render_header();
		
		$profile_url=$args['profile_url'];
		?>
		<script src="http://platform.linkedin.com/in.js" type="text/javascript"></script>
		<script type="IN/MemberProfile" data-id="<?php echo $profile_url;?>" data-width="<?php echo $this->width-16;?>" data-format="inline" data-related="false"></script>		
		<?php
		
		$this->render_footer();		
	}
	
	public function render_twitter($args)
	{
		$this->render_header();
		
		$html=rawurldecode(stripcslashes($args['html']));
		
		echo $html;
				
		$this->render_footer();
	}
	public function render_custom($args)
	{
		$this->render_header();
		
		$html=rawurldecode(stripcslashes($args['html'])); ?>
		
		<div class="fw_custom_widget" id="fw_custom_widget-<?php echo $this->id;?>"style="width:100%; height:<?php echo $this->height+16;?>px;">
		<?php echo $html;	?>
		</div>
		
		<script type="text/javascript">
			$('#fw_custom_widget-<?php echo $this->id;?>').mCustomScrollbar({autoHideScrollbar: true,theme:'dark-thin',scrollButtons:{enable:true}});
		</script>
		
		<?php
		$this->render_footer();
	}	
	
	public function render_flickr($args)
	{
		$user_name=$args['flickr_user'];
		$recent_count=$args['recent_count'];
		$slider_width=$args['slider_width'];
		$slider_height=$args['slider_height'];
		
		$this->render_header();		
		?>			
		<div class="fw_flickr_container">
			<div class="fw_flickr_left" id="fw_flickr_left-<?php echo $this->id;?>"></div>
			<div class="fw_flickr_right" id="fw_flickr_right-<?php echo $this->id;?>"></div>
			<div class="fw_slideshow" id="fw_slideshow-<?php echo $this->id;?>" style="height: <?php echo $slider_height-8;?>px;">				
				
			</div>
		</div>
		<?php
		$this->render_footer();			
		?>
		<div class="fw_flickr_settings" data-id="<?php echo $this->id;?>" data-username="<?php echo $user_name;?>" data-tobedone="<?php echo $recent_count;?>" data-height="<?php echo $slider_height-8;?>"></div>
		<script type="text/javascript">
		
		</script>
		<?php
	}
}
?>
<div class="wrap" style="display:none;">
	<?php screen_icon('themes'); ?>
	<h2 style="font-family: verdana;">Ultimate Floating Widgets</h2>
	
	<div class="floating-block-general-options" style="width:700px">
		<h3 style="font-family: verdana;">General Options</h3>
		<div>
			<?php
			
				$settings=floating_block_get_settings();
				$animation_speed=$settings['animation_speed'];
				$overlay_opacity=$settings['overlay_opacity'];
				$overlay_color=$settings['overlay_color'];
			
			?>
			<div class="floating_block_unit_option">
				<div class="floating_block_unit_option_title">Animation Speed</div>			
				<div class="floating_block_unit_option_value" id="f-b-a-s"><?php echo $animation_speed;?> ms</div>
				<input type="hidden" id="f-b-a-s-value" value="<?php echo $animation_speed;?>"/>
				<div id="floating_block_animation_speed_slider"></div>
			</div>
			<div class="floating_block_unit_option">
				<div class="floating_block_unit_option_title">Overlay Opacity</div>
				<div class="floating_block_unit_option_value" id="f-b-o-o"><?php echo $overlay_opacity;?></div>	
				<input type="hidden" id="f-b-o-o-value" value="<?php echo $overlay_opacity;?>"/>
				<div id="floating_block_overlay_opacity_slider"></div>
			</div>
			
			
			<div class="floating_block_unit_option">						
				<div class="floating_block_unit_option_title">Overlay Color</div>			
				<div id="floating_block_overlay_color_picker" style="display:inline-block"></div>
				# <input class="select_all_text" style="width: 70px; margin-top:86px;background-color: <?php echo '#'.$overlay_color;?>" id="floating_block_overlay_color" type="text" value="<?php echo $overlay_color;?>" />
			</div>
			
			<div class="floating_block_unit_option">						
				<div class="floating_block_unit_option_title">Preview</div>
				<div style="position: relative; z-index: 1;width: 100%; height: 200px; border: 1px solid #ccc;">
					<div id="sb_block" style="cursor: pointer; background:#B6C1DA; position:relative; z-index: 100; float:left; margin-top:60px; width:22px; height:22px;"><img style="margin: 2px 2px;" src="<?php echo plugins_url('/css/images/logo/no-transparency-01.png',__FILE__);?>" width="18" height="18"/></div>
					<div id="sb_container" style="float: left; position: relative; z-index: 10; height: 22px; width: 0px; background-color: #B6C1DA; margin-top: 60px;"><div style="display:none;" id="sb_c"></div></div>				
					<div id="sb_content" style="position: absolute; padding: 10px;"></div>
					<div id="sb_overlay" style="position: absolute; z-index: 5; width: 100%; height: 100%;"></div>
				</div>
			</div>
			
			<div class="end-marker" ></div>
					
			<div>
				<button style="float: right;margin-bottom: 10px;margin-right: 18px;" id="update-floating-block-options" type="button">Update</button>
				<button style="float: left;margin-bottom: 10px;margin-left: 10px;" id="reset-floating-block-options" type="button">Reset</button>
			</div>
		
		</div><!--accordion-->
		
		
		<h3 style="font-family: verdana;">Icon Size</h3>
		<div>
		
			<?php			
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
			
			<div style="float:left; position: relative; top: 10px;">
			<div class="floating_block_unit_option_2">
				<div class="floating_block_unit_option_title_2">Width</div>
				<div id="floating_block_width_slider" class="fb_slider_full"></div>
				<div class="floating_block_unit_option_value_2" id="f-b-w"><?php echo $width;?></div>	
				<input type="hidden" id="f-b-w-value" value="<?php echo $width;?>"/>
			</div>
			<div class="floating_block_unit_option_2">
				<div class="floating_block_unit_option_title_2">Height</div>			
				<div id="floating_block_height_slider" class="fb_slider_full"></div>
				<div class="floating_block_unit_option_value_2" id="f-b-h"><?php echo $height;?></div>
				<input type="hidden" id="f-b-h-value" value="<?php echo $height;?>"/>
			</div>
			<div class="floating_block_unit_option_2">
				<div class="floating_block_unit_option_title_2">Top Radius</div>
				<div id="floating_block_top_radius_slider" class="fb_slider_full"></div>
				<div class="floating_block_unit_option_value_2" id="f-b-t-r"><?php echo $top_radius;?></div>	
				<input type="hidden" id="f-b-t-r-value" value="<?php echo $top_radius;?>"/>
			</div>
			<div class="floating_block_unit_option_2">
				<div class="floating_block_unit_option_title_2">Bottom Radius</div>			
				<div id="floating_block_bottom_radius_slider" class="fb_slider_full"></div>
				<div class="floating_block_unit_option_value_2" id="f-b-b-r"><?php echo $bottom_radius;?></div>	
				<input type="hidden" id="f-b-b-r-value" value="<?php echo $bottom_radius;?>"/>
			</div>
			<div class="floating_block_unit_option_2">
				<div class="floating_block_unit_option_title_2">Vertical Margin</div>			
				<div id="floating_block_top_margin_slider" class="fb_slider_half"></div>
				<div class="floating_block_unit_option_value_2" id="f-b-t-m"><?php echo $top_margin;?></div>	
				<input type="hidden" id="f-b-t-m-value" value="<?php echo $top_margin;?>"/>
				
				<div id="floating_block_bottom_margin_slider" class="fb_slider_half"></div>
				<div class="floating_block_unit_option_value_2" id="f-b-b-m"><?php echo $bottom_margin;?></div>	
				<input type="hidden" id="f-b-b-m-value" value="<?php echo $bottom_margin;?>"/>
			</div>
			<div class="floating_block_unit_option_2">
				<div class="floating_block_unit_option_title_2">Horizontal Margin</div>			
				<div id="floating_block_left_margin_slider" class="fb_slider_half"></div>
				<div class="floating_block_unit_option_value_2" id="f-b-l-m"><?php echo $left_margin;?></div>	
				<input type="hidden" id="f-b-l-m-value" value="<?php echo $left_margin;?>"/>
				
				<div id="floating_block_right_margin_slider" class="fb_slider_half"></div>
				<div class="floating_block_unit_option_value_2" id="f-b-r-m"><?php echo $right_margin;?></div>	
				<input type="hidden" id="f-b-r-m-value" value="<?php echo $right_margin;?>"/>
			</div>
			</div>
					
			
			<div style="float:left;">						
				<div class="floating_block_unit_option_title">Preview</div>
				<div style="position: relative; z-index: 1;width: 277px; height: 200px; border: 1px solid #ccc;">
					<div id="sbi_block" style="-webkit-border-top-right-radius: <?php echo $top_radius;?>px; -moz-border-radius-topright: <?php echo $top_radius;?>px; border-top-right-radius: <?php echo $top_radius;?>px;  -webkit-border-bottom-right-radius: <?php echo $bottom_radius;?>px; -moz-border-radius-bottomright: <?php echo $bottom_radius;?>px; border-bottom-right-radius: <?php echo $bottom_radius;?>px; cursor: pointer; background:#B6C1DA; position:relative; z-index: 100; float:left; margin-top:60px; width:<?php echo ($width+$left_margin+$right_margin);?>px; height:<?php echo ($height+$top_margin+$bottom_margin);?>px;"><img id="sbi_icon" style="margin: <?php echo $top_margin;?>px <?php echo $right_margin;?>px <?php echo $bottom_margin;?>px <?php echo $left_margin;?>px;" src="<?php echo plugins_url('/css/images/logo/no-transparency-01.png',__FILE__);?>" width="<?php echo $width;?>" height="<?php echo $height;?>"/></div>
					<div id="sbi_container" style="float: left; position: relative; z-index: 10; height: 22px; width: 0px; background: #B6C1DA; margin-top: 60px;"></div>				
					<div id="sbi_content" style="position: absolute; padding: 10px;"></div>
					<div id="sbi_overlay" style="position: absolute; z-index: 5; width: 100%; height: 100%;"></div>
				</div>
			</div>
			
			
			<div class="end-marker" style="height:20px;"></div>
			
			<div>
				<button style="float: left;margin-bottom: 10px;" id="reset-floating-icon-preference" type="button">Reset</button>
				<button style="float: right;margin-bottom: 10px;" id="update-floating-icon-preference" type="button">Update</button>
			</div>
		
		</div><!--accordion-->
		
		<?php if(file_exists('extension.php')) include_once('extension.php');?>
		
	</div>
	
	<script type="text/javascript">
		function floating_block_icon_change()
		{
			$('#sbi_icon').attr('width',$('#f-b-w-value').val());
			$('#sbi_icon').attr('height',$('#f-b-h-value').val());
			$('#sbi_icon').css('margin-top',parseInt($('#f-b-t-m-value').val())+'px');
			$('#sbi_icon').css('margin-bottom',parseInt($('#f-b-b-m-value').val())+'px');
			$('#sbi_icon').css('margin-left',parseInt($('#f-b-l-m-value').val())+'px');
			$('#sbi_icon').css('margin-right',parseInt($('#f-b-r-m-value').val())+'px');
			$('#sbi_block').css('width',parseInt($('#f-b-w-value').val()) + parseInt($('#f-b-l-m-value').val()) + parseInt($('#f-b-r-m-value').val()) );
			$('#sbi_block').css('height',parseInt($('#f-b-h-value').val()) + parseInt($('#f-b-t-m-value').val()) + parseInt($('#f-b-b-m-value').val()));
			$('#sbi_block').css('border-top-right-radius',parseInt($('#f-b-t-r-value').val())+'px');
			$('#sbi_block').css('border-bottom-right-radius',parseInt($('#f-b-b-r-value').val())+'px');
			
		}
		$(document).ready(function(){
			$('#floating_block_width_slider').slider({
				orientation: 'vertical',
				range: 'max',
				min: 5,
				max: 100,
				value: <?php echo $width;?>,
				step: 1,
				slide: function( event, ui ) {
					$('#f-b-w').html(ui.value);
					$('#f-b-w-value').val(ui.value);
				},
				change:function(event,ui){
					floating_block_icon_change();
				}
			});
			$('#floating_block_height_slider').slider({
				orientation: 'vertical',
				range: 'max',
				min: 5,
				max: 100,
				value: <?php echo $height;?>,
				step: 1,
				slide: function( event, ui ) {
					$('#f-b-h').html(ui.value);
					$('#f-b-h-value').val(ui.value);
				},
				change:function(event,ui){
					floating_block_icon_change();
				}
			});
			$('#floating_block_top_radius_slider').slider({
				orientation: 'vertical',
				range: 'max',
				min: 0,
				max: 50,
				value: <?php echo $top_radius;?>,
				step: 1,
				slide: function( event, ui ) {
					$('#f-b-t-r').html(ui.value);
					$('#f-b-t-r-value').val(ui.value);
				},
				change:function(event,ui){
					floating_block_icon_change();
				}
			});
			$('#floating_block_bottom_radius_slider').slider({
				orientation: 'vertical',
				range: 'max',
				min: 0,
				max: 50,
				value: <?php echo $bottom_radius;?>,
				step: 1,
				slide: function( event, ui ) {
					$('#f-b-b-r').html(ui.value);
					$('#f-b-b-r-value').val(ui.value);
				},
				change:function(event,ui){
					floating_block_icon_change();
				}
			});
			$('#floating_block_top_margin_slider').slider({
				orientation: 'vertical',
				range: 'max',
				min: -20,
				max: 20,
				value: <?php echo $top_margin;?>,
				step: 1,
				slide: function( event, ui ) {
					$('#f-b-t-m').html(ui.value);
					$('#f-b-t-m-value').val(ui.value);
				},
				change:function(event,ui){
					floating_block_icon_change();
				}
			});
			$('#floating_block_bottom_margin_slider').slider({
				orientation: 'vertical',
				range: 'max',
				min: -20,
				max: 20,
				value: <?php echo $bottom_margin;?>,
				step: 1,
				slide: function( event, ui ) {
					$('#f-b-b-m').html(ui.value);
					$('#f-b-b-m-value').val(ui.value);
				},
				change:function(event,ui){
					floating_block_icon_change();
				}
			});
			$('#floating_block_left_margin_slider').slider({
				orientation: 'vertical',
				range: 'max',
				min: -20,
				max: 20,
				value: <?php echo $left_margin;?>,
				step: 1,
				slide: function( event, ui ) {
					$('#f-b-l-m').html(ui.value);
					$('#f-b-l-m-value').val(ui.value);
				},
				change:function(event,ui){
					floating_block_icon_change();
				}
			});
			$('#floating_block_right_margin_slider').slider({
				orientation: 'vertical',
				range: 'max',
				min: -20,
				max: 20,
				value: <?php echo $right_margin;?>,
				step: 1,
				slide: function( event, ui ) {
					$('#f-b-r-m').html(ui.value);
					$('#f-b-r-m-value').val(ui.value);
				},
				change:function(event,ui){
					floating_block_icon_change();
				}
			});
			
			$('#update-floating-icon-preference').button().click(function(){
				var data = {
					action			: 'floating_block_icon_options',
					width			: $('#f-b-w-value').val(),					
					height			: $('#f-b-h-value').val(),
					top_radius		: $('#f-b-t-r-value').val(),					
					bottom_radius	: $('#f-b-b-r-value').val(),					
					top_margin		: $('#f-b-t-m-value').val(),					
					bottom_margin	: $('#f-b-b-m-value').val(),					
					left_margin		: $('#f-b-l-m-value').val(),					
					right_margin	: $('#f-b-r-m-value').val(),					
					
					whatever		: 1234
				};
				
							
				// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
				$.post(ajaxurl, data, function(response) {
					alert('Got this from the server: ' + response);
				});
			});
			$('#reset-floating-icon-preference').button().click(function(){
				$('#f-b-w').html(32);
				$('#f-b-w-value').val(32);
				$('#floating_block_width_slider').slider({value:32});
				
				$('#f-b-h').html(32);
				$('#f-b-h-value').val(32);
				$('#floating_block_height_slider').slider({value:32});
				
				$('#f-b-t-r').html(0);
				$('#f-b-t-r-value').val(0);
				$('#floating_block_top_radius_slider').slider({value:0});
				
				$('#f-b-b-r').html(0);
				$('#f-b-b-r-value').val(0);
				$('#floating_block_bottom_radius_slider').slider({value:0});
				
				$('#f-b-t-m').html(0);
				$('#f-b-t-m-value').val(0);
				$('#floating_block_top_margin_slider').slider({value:0});
				
				$('#f-b-b-m').html(0);
				$('#f-b-b-m-value').val(0);
				$('#floating_block_bottom_margin_slider').slider({value:0});
				
				$('#f-b-l-m').html(0);
				$('#f-b-l-m-value').val(0);
				$('#floating_block_left_margin_slider').slider({value:0});
				
				$('#f-b-r-m').html(0);
				$('#f-b-r-m-value').val(0);
				$('#floating_block_right_margin_slider').slider({value:0});
			});
			//
		});
	</script>
	
	<script type="text/javascript">
	function invertColor(hexTripletColor) {
		var color = hexTripletColor;
		color = color.substring(1);           // remove #
		color = parseInt(color, 16);          // convert to integer
		color = 0xFFFFFF ^ color;             // invert three bytes
		color = color.toString(16);           // convert to hex
		color = ("000000" + color).slice(-6); // pad with leading zeros
		color = "#" + color;                  // prepend #
		return color;
	}
	function sb_toggle()
	{
		if(window.sb_transition==false)
		{				
			window.sb_transition=true;
			
			if(window.sb_open==false)
			{
				$('#sb_c').hide();
				$('#sb_overlay').show();
				$('#sb_overlay').css('background-color','#'+$('#floating_block_overlay_color').val());
				$('#sb_overlay').css('opacity',$('#f-b-o-o-value').val());
				
				$('#sb_container').animate(
					{'width':100},
					parseInt($('#f-b-a-s-value').val()),
					'',
					function(){
						$('#sb_container').animate(
						{height: 100, top: -35},
						parseInt($('#f-b-a-s-value').val()),
						'',
						function(){
							window.sb_open=true;
							window.sb_transition=false;
							$('#sb_c').fadeIn(600);
						});
					});
				//end
			}
			else
			{
				$('#sb_c').hide();
				$('#sb_container').animate(
					{'height':22,top: 0},
					parseInt($('#f-b-a-s-value').val()),
					'',
					function(){
						$('#sb_container').animate(
						{width: 0},
						parseInt($('#f-b-a-s-value').val()),
						'',
						function(){
							window.sb_open=false;
							window.sb_transition=false;
							$('#sb_overlay').hide();
						});
					});
				//end
				
			}
		}
	}
	
	$(document).ready(function(){
		window.sb_open=false;
		window.sb_transition=false;
		
		$('#sb_block').click(function(){			
			sb_toggle();			
		});
		$('#sb_overlay').click(function(){
			if($('#sb_overlay').is(':visible'))			
				sb_toggle();
		});
		
		
		$('#floating_block_overlay_color_picker').farbtastic(function(color){
			$('#floating_block_overlay_color').css('background-color',color);
			$('#floating_block_overlay_color').val(d2h(hexToRgb(color).r)+''+d2h(hexToRgb(color).g)+''+d2h(hexToRgb(color).b));			
			$('#floating_block_overlay_color').css('color',invertColor(color));
			
			if(window.sb_open==false)
				sb_toggle();
				
			$('#sb_overlay').css('background-color',color);
		});
		$('#floating_block_overlay_color').css('color',invertColor('<?php echo $overlay_color;?>'));
		$('#floating_block_overlay_color').keyup(function(){
		
			var picker=$.farbtastic('#floating_block_overlay_color_picker');
			picker.setColor('#'+$(this).val());
		});
		
		$('.floating-block-general-options').accordion({
			collapsible: true,
			active: 1,
			heightStyle: "content",				
			header: 'h3'
		});
		
		$('#floating_block_animation_speed_slider').slider({
			range: 'max',
			min: 50,
			max: 5000,
			value: <?php echo 5050-$animation_speed;?>,
			step: 1,
			slide: function( event, ui ) {
				var s='';
				if(ui.value<1000)
					s='very slow';
				if(ui.value>=1000 && ui.value<3000)
					s='slow';
				if(ui.value>=3000 && ui.value<4000)
					s='medium';
				if(ui.value>=4000 && ui.value<4800)
					s='fast';
				if(ui.value>=4800)
					s='very fast';
				$('#f-b-a-s').html(5050-ui.value+' ms ( '+s+' )');
				$('#f-b-a-s-value').val(5050-ui.value);
			},
			change:function(){
				sb_toggle();
			}
		});
		$('#floating_block_overlay_opacity_slider').slider({
			range: 'max',
			min: 0,
			max: 1,
			value: <?php echo $overlay_opacity;?>,
			step: 0.01,
			slide: function( event, ui ) {
				$('#f-b-o-o').html(ui.value);
				$('#f-b-o-o-value').val(ui.value);
			},
			change:function(event,ui){
				if(window.sb_open==false)
					sb_toggle();
					
				$('#sb_overlay').css('opacity',ui.value);	
			}
		});
		$('#reset-floating-block-options').button().click(function(){
		
			$('#f-b-a-s').html('400 ms');
			$('#f-b-a-s-value').val('400');
			$('#floating_block_animation_speed_slider').slider({value:4650});
		
			$('#f-b-o-o').html(0.5);
			$('#f-b-o-o-value').val(0.5);			
			$('#floating_block_overlay_opacity_slider').slider({value:0.5});
						
			$('#floating_block_overlay_color').val('000000');
			$('#floating_block_overlay_color').css('background-color','#000000');
			
			$('#sb_overlay').css('background-color','#000000');
			
			var pickerz=$.farbtastic('#floating_block_overlay_color_picker');
			pickerz.setColor('#000000');
		
		});
	
		$('#update-floating-block-options').button().click(function(){
			
			var data = {
				action			: 'floating_block_general_options',
				animation_speed	: $('#f-b-a-s-value').val(),					
				overlay_opacity	: $('#f-b-o-o-value').val(),
				overlay_color	: $('#floating_block_overlay_color').val(),					
				
				whatever		: 1234
			};
			
						
			// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
			$.post(ajaxurl, data, function(response) {
				alert('Got this from the server: ' + response);
			});
		
		
		});
		
		var p=$.farbtastic('#floating_block_overlay_color_picker');
		p.setColor('<?php echo $overlay_color;?>');
		
	});
	
	</script>
	
	
	<script type="text/javascript">
		$(document).ready(function(){
		
			
		
			window.send_to_editor = function(html) {				
				imgurl = $('img',html).attr('src');
				if(window.upload_texture==true && window.upload_icon==false)
				{					
					$('#new-texture-preview-'+window.floating_block_id).attr('src',imgurl);
					$('#new-texture-hidden-'+window.floating_block_id).val(imgurl);
					
					$('#no-texture-'+window.floating_block_id).prop('checked',false);					
					$('#new-texture-actual-'+window.floating_block_id).val(imgurl);
				}
				if(window.upload_texture==false && window.upload_icon==true)
				{
					$('#new-icon-preview-'+window.floating_block_id).attr('src',imgurl);
					$('#new-icon-hidden-'+window.floating_block_id).val(imgurl);
					$('#default-icon-'+window.floating_block_id).prop('checked',false);
					$('#no-icon-'+window.floating_block_id).prop('checked',false);					
					$('#new-icon-actual-'+window.floating_block_id).val(imgurl);					
					
				}
				tb_remove();
			}
		});
		function hexToRgb(hex) {
			var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
			return result ? {
				r: parseInt(result[1], 16),
				g: parseInt(result[2], 16),
				b: parseInt(result[3], 16)
			} : null;
		}
		function d2h(d) {
			var s = (+d).toString(16);
			if(s.length < 2) {
				s = '0' + s;
			}
			return s;
		}
	</script>
	
	
	<div id="floating-block-accordion" style="width:700px; margin: 40px 0px;clear:both;">
	
		<?php			
		require_once('default-options.php');
				
		$sequences=floating_block_get_sequences();		
		
		foreach($sequences as $current)
		{
			$result=$wpdb->get_row($wpdb->prepare("SELECT * FROM $wpdb->options WHERE OPTION_NAME = '%s'",'floating-block-'.$current));
			unset($data);
			$tmp=explode('-',$result->option_name);
			$tokens=explode(FLOATING_BLOCK_DELIMITER,$result->option_value);		
			foreach($tokens as $token){
				$temp=explode('::',$token);
				if(isset($temp[0]) && isset($temp[1]))
					$data[$temp[0]]=$temp[1];
			}			
			$data['id']=$tmp[2];
		?>
		<div class="s_panel" id="floating-block-<?php echo $data['id']; ?>" data-id="<?php echo $data['id']; ?>"  data-type="<?php echo $data['type'];?>">
			<h3 class="floating-h-<?php echo $data['type'];?>" id="floating-block-type-<?php echo $data['id']; ?>"><?php echo $titles[$data['type']];?></h3>
			<div>
				<button style="float:right;z-index:10;top:5px;right:5px;" id="remove-<?php echo $data['id']; ?>">X</button>
				<div id="tabs-<?php echo $data['id']; ?>">
					<ul>
						<li><a href="#tabs-1">Settings</a></li>
						<li><a href="#tabs-2">Content</a></li>
						<li><a href="#tabs-3">Appearance</a></li>
					</ul>
					<div id="tabs-1" style="height:250px;">
						<div class="floating-block-unit-option">
							<div class="juxtapose left-side">Title :</div>
							<div class="juxtapose right-side"><input type="text" value="<?php echo $data['title'];?>" id="new-title-<?php echo $data['id']; ?>"/></div>							
							<div class="end-marker"></div>
						</div>
						<div class="floating-block-unit-option">
							<div class="juxtapose left-side">Position :</div>
							<div class="juxtapose right-side"><select style="width:100%;" id="new-position-<?php echo $data['id']; ?>"><option value="1" <?php if($data['position']==1)echo 'selected';?>>Left</option><option value="2" <?php if($data['position']!=1)echo 'selected';?>>Right</option></select></div>
							<div class="end-marker"></div>
						</div>
						<div class="floating-block-unit-option">
							<div class="juxtapose left-side">Icon : </div>
							<div class="juxtapose right-side" >
								<div class="img-wrapper icon-wrapper" title="Click to change icon" id="new-icon-<?php echo $data['id']; ?>" style="float:left;margin-left:1px;"><img width="32" height="32" id="new-icon-preview-<?php echo $data['id']; ?>" src="<?php echo $data['icon'];?>"/><input type="hidden" id="new-icon-hidden-<?php echo $data['id'];?>" value=""/><input type="hidden" id="new-icon-actual-<?php echo $data['id'];?>" value="<?php echo $data['icon'];?>"/></div>
								<div style="margin:2px 10px 1px 10px;float:left;cursor:pointer;" title="Click to toggle between default icon &amp; custom icon" id="default-icon-wrapper-<?php echo $data['id'];?>"><input type="checkbox" id="default-icon-<?php echo $data['id'];?>"/><span style="margin-left: 5px;position: relative;top: -1px;">Default icon</span></div>
								<div style="margin:2px 10px 1px 10px;float:left;cursor:pointer;" id="no-icon-wrapper-<?php echo $data['id'];?>"><input type="checkbox" id="no-icon-<?php echo $data['id'];?>"/><span style="margin-left: 5px;position: relative;top: -1px;">No icon</span></div>
							</div>
							<div class="end-marker"></div>
						</div>
					</div>
					<div id="tabs-2" style="height:250px;">
						<?php if($data['type']=='facebook_like_box'):?>
							<div>
								<div class="juxtapose left-side">Facebook Page URL :</div>
								<div class="juxtapose right-side"><input type="text" class="select_all_text" style="width: 300px;" value="<?php echo urldecode($data['pageurl']);?>" id="facebook_like_box-pageurl-<?php echo $data['id']; ?>"/></div>
								<div class="end-marker"></div>
							</div>							
							<div>
								<div class="juxtapose left-side">Color Scheme :</div>
								<div style="margin:6px;" class="juxtapose right-side">
									<input type="radio" value="1" name="facebook_like_box-colorscheme-<?php echo $data['id']; ?>" <?php if($data['colorscheme']==1)echo 'checked="checked"';?>/>Light&nbsp;&nbsp;
									<input type="radio" value="0" name="facebook_like_box-colorscheme-<?php echo $data['id']; ?>" <?php if($data['colorscheme']!=1)echo 'checked="checked"';?>/>Dark
								</div>
								<div class="end-marker"></div>
							</div>
							<div>
								<div class="juxtapose left-side">Show Faces :</div>
								<div style="margin:6px;" class="juxtapose right-side">
									<input type="radio" value="1" name="facebook_like_box-showfaces-<?php echo $data['id']; ?>" <?php if($data['showfaces']==1)echo 'checked="checked"';?>/>Yes&nbsp;&nbsp;
									<input type="radio" value="0" name="facebook_like_box-showfaces-<?php echo $data['id']; ?>" <?php if($data['showfaces']!=1)echo 'checked="checked"';?>/>No
								</div>
								<div class="end-marker"></div>
							</div>
							<div>								
								<div class="juxtapose left-side">Stream :</div>
								<div style="margin:6px;" class="juxtapose right-side">
									<input type="radio" value="1" name="facebook_like_box-stream-<?php echo $data['id']; ?>" <?php if($data['stream']==1)echo 'checked="checked"';?>/>Yes&nbsp;&nbsp;
									<input type="radio" value="0" name="facebook_like_box-stream-<?php echo $data['id']; ?>" <?php if($data['stream']!=1)echo 'checked="checked"';?>/>No
								</div>							
								<div class="end-marker"></div>
							</div>							
							<div>
								<div class="juxtapose left-side">Header :</div>
								<div style="margin:6px;" class="juxtapose right-side">
									<input type="radio" value="1" name="facebook_like_box-header-<?php echo $data['id']; ?>" <?php if($data['header']==1)echo 'checked="checked"';?>/>Yes&nbsp;&nbsp;
									<input type="radio" value="0" name="facebook_like_box-header-<?php echo $data['id']; ?>" <?php if($data['header']!=1)echo 'checked="checked"';?>/>No
								</div>
								<div class="end-marker"></div>
							</div>							
						<?php endif;?>
						<?php if($data['type']=='twitter'):?>
							<div>
								<div class="juxtapose left-side">HTML :</div>
								<div class="juxtapose right-side"><textarea class="select_all_text" id="twitter-html-<?php echo $data['id']; ?>"><?php echo rawurldecode(stripcslashes($data['html']));?></textarea></div>
								<div class="end-marker"></div>
							</div>
						<?php endif;?>
						<?php if($data['type']=='youtube'):?>
							<div>
								<div class="juxtapose left-side">Video URL :</div>
								<div class="juxtapose right-side"><input type="text" class="select_all_text" style="width: 300px;" value="<?php echo $data['vid'];?>" id="youtube-id-<?php echo $data['id']; ?>"/></div>
								<div class="end-marker"></div>
							</div>
							<div>
								<div class="juxtapose left-side">Streaming :</div>
								<div class="juxtapose right-side">
									<select style="width:100%;" id="youtube-streaming-<?php echo $data['id']; ?>">
										<option value="small" <?php if($data['streaming']=='small')echo 'selected';?>>240p</option>
										<option value="medium" <?php if($data['streaming']=='medium')echo 'selected';?>>360p</option>
										<option value="large" <?php if($data['streaming']=='large')echo 'selected';?>>480p</option>
										<option value="hd720" <?php if($data['streaming']=='hd720')echo 'selected';?>>720p</option>
										<option value="hd1080" <?php if($data['streaming']=='hd1080')echo 'selected';?>>1080p</option>
									</select>
								</div>
								<div class="end-marker"></div>
							</div>
							<div>
								<div class="juxtapose left-side">Frameborder :</div>
								<div class="juxtapose right-side"><input type="text" value="<?php echo $data['frameborder'];?>" id="youtube-frameborder-<?php echo $data['id']; ?>"/></div>
								<div class="end-marker"></div>
							</div>
							<div>
								<div class="juxtapose left-side">Allow Fullscreen :</div>
								<div style="margin:6px;" class="juxtapose right-side"><input type="radio" value="1" name="youtube-allowfull-<?php echo $data['id']; ?>" <?php if($data['allowfull']==1)echo 'checked="checked"';?>/>&nbsp;Yes&nbsp;&nbsp;<input type="radio" value="0" name="youtube-allowfull-<?php echo $data['id']; ?>" <?php if($data['allowfull']!=1)echo 'checked="checked"';?>/>&nbsp;No</div>
								<div class="end-marker"></div>
							</div>
						<?php endif;?>
						<?php if($data['type']=='google_maps'):?>
							<div>
								<div class="juxtapose left-side">Map URL :</div>
								<div class="juxtapose right-side"><input type="text" class="select_all_text" style="width: 420px;" value="<?php echo $data['src'];?>" id="google_maps-id-<?php echo $data['id']; ?>"/></div>
								<div class="end-marker"></div>
							</div>							
						<?php endif;?>
						<?php if($data['type']=='vimeo'):?>
							<div>
								<div class="juxtapose left-side">Video URL :</div>
								<div class="juxtapose right-side"><input type="text" class="select_all_text" style="width: 300px;" value="<?php echo $data['vid'];?>" id="vimeo-id-<?php echo $data['id']; ?>"/></div>
								<div class="end-marker"></div>
							</div>
							<div>
								<div class="juxtapose left-side">Frameborder :</div>
								<div class="juxtapose right-side"><input type="text" value="<?php echo $data['frameborder'];?>" id="vimeo-frameborder-<?php echo $data['id']; ?>"/></div>
								<div class="end-marker"></div>
							</div>	
						<?php endif;?>
						<?php if($data['type']=='soundcloud'):?>
							<div>
								<div class="juxtapose left-side">SoundCloud User :</div>
								<div class="juxtapose right-side" style="width:300px;"><input style="width:166px;" type="text" value="<?php echo $data['user'];?>" id="soundcloud-user-<?php echo $data['id'];?>"/><button style="margin-top:-3px;"id="fb_soundcloud-connect-<?php echo $data['id'];?>" type="button">Connect</button></div>
								<div class="end-marker"></div>
							</div>
							<div>
								<div class="juxtapose left-side">Playlist :</div>
								<div class="juxtapose right-side">									
										<?php
											$output='false';
											$url='https://soundcloud.com/'.$data['user'];		
											$client_id='7edcd2046933258eca7783c62d8aff72';
											
											unset($args);	
											$args['url']=$url;
											$args['client_id']=$client_id;
											
											$url=esc_url_raw(add_query_arg($args,'http://api.soundcloud.com/resolve.json'));
											$html=wp_remote_get($url);
											$body=wp_remote_retrieve_body($html);
											
											$json=json_decode($body);											
											if(!isset($json->errors))
											{
												$user_id=$json->id;
												
												unset($args);
												unset($json);
												$args['client_id']=$client_id;
												$url=esc_url_raw(add_query_arg($args,'http://api.soundcloud.com/users/'.$user_id.'/playlists.json'));
												$html=wp_remote_get($url);
												$body=wp_remote_retrieve_body($html);
												
												$json=json_decode($body);
												if(!isset($json->errors))
												{
													$output='';														
													foreach($json as $current)
													{
														$title=$current->title;
														$count=$current->track_count;
														$permalink_url=$current->permalink_url;		
														
														$output.='<option value="'.$permalink_url.'">'.$title.' ('.$count.')</option>';
													}
												}
											}
										?>
										<?php if($output=='false'): ?>
											<select disabled="disable" id="soundcloud-playlists-<?php echo $data['id'];?>">
												<option value="-1">No playlist found</option>
											</select>
										<?php else: ?>
											<select id="soundcloud-playlists-<?php echo $data['id'];?>">
												<?php echo $output; ?>
											</select>
										<?php endif;?>									
								</div>
								<div class="end-marker"></div>
							</div>
						<?php endif;?>
						
						<?php if($data['type']=='linkedin'):?>
							<div>
								<div class="juxtapose left-side">Linkedin Profile URL :</div>
								<div class="juxtapose right-side"><input type="text" class="select_all_text" style="width: 300px;" value="<?php echo $data['profile_url'];?>" id="linkedin-id-<?php echo $data['id']; ?>"/></div>
								<div class="end-marker"></div>								
							</div>													
						<?php endif;?>
						
						<?php if($data['type']=='pinterest'):?>
							<div>
								<div class="juxtapose left-side">Pinterest URL :</div>
								<div class="juxtapose right-side">
									<div style="cursor:pointer; margin: 7px 0px;" id="pint-pin-section-<?php echo $data['id'];?>"> 
										<input type="radio" id="pint-type-pin-<?php echo $data['id'];?>" name="pint-type-<?php echo $data['id'];?>" value="pin" <?php if($data['pint_type']=='pin')echo 'checked="checked"';?>/>&nbsp;Pin URL : 
									</div>
										<input type="text" class="select_all_text <?php if($data['pint_type']!='pin')echo 'floating-block-textbox-disabled';?>" style="width: 300px;" value="<?php echo $data['pin'];?>" id="pint-pin-<?php echo $data['id']; ?>"/>
									
								</div>
								<div class="end-marker"></div>								
							</div>							
						<?php endif;?>
						
						<?php if($data['type']=='flickr'):?>
							<div>
								<div class="juxtapose left-side">Flickr Username :</div>
								<div class="juxtapose right-side"><input type="text" class="select_all_text" value="<?php echo $data['flickr_user'];?>" id="flickr_user-id-<?php echo $data['id']; ?>"/></div>
								<div class="end-marker"></div>
							</div>
							<div>
								<div class="juxtapose left-side">Recent Photos :</div>
								<div class="juxtapose right-side"><input type="text" value="<?php echo $data['recent_count'];?>" id="recent_count-<?php echo $data['id']; ?>"/></div>
								<div class="end-marker"></div>
							</div>
							<div>
								<div class="juxtapose left-side">Slider Width :</div>
								<div class="juxtapose right-side"><input type="text" value="<?php echo $data['slider_width'];?>" id="slider_width-<?php echo $data['id']; ?>"/></div>
								<div class="end-marker"></div>
							</div>
							<div>
								<div class="juxtapose left-side">Slider Height :</div>
								<div class="juxtapose right-side"><input type="text" value="<?php echo $data['slider_height'];?>" id="slider_height-<?php echo $data['id']; ?>"/></div>
								<div class="end-marker"></div>
							</div>
						<?php endif;?>
						<?php if($data['type']=='custom'):?>
							<div>
								<div class="juxtapose left-side">HTML :</div>
								<div class="juxtapose right-side"><textarea class="select_all_text" id="custom-html-<?php echo $data['id']; ?>"><?php echo rawurldecode(stripcslashes($data['html']));?></textarea></div>
								<div class="end-marker"></div>
							</div>
							<div>
								<div class="juxtapose left-side">Width :</div>
								<div class="juxtapose right-side"><input type="text" value="<?php echo $data['width'];?>" id="custom-width-<?php echo $data['id']; ?>"/></div>
								<div class="end-marker"></div>
							</div>
							<div>
								<div class="juxtapose left-side">Height :</div>
								<div class="juxtapose right-side"><input type="text" value="<?php echo $data['height'];?>" id="custom-height-<?php echo $data['id']; ?>"/></div>
								<div class="end-marker"></div>
							</div>
						<?php endif;?>
					</div>
					<div id="tabs-3" style="height:250px;">						
						<div class="juxtapose color-section">
							<span>Color : # </span><input type="text" class="select_all_text" style="width:60px;background-color:<?php echo $data['color'];?>;" value="<?php echo $data['color'];?>" id="color-<?php echo $data['id']; ?>"/><div id="picker-<?php echo $data['id']; ?>"></div>
						</div>
						<div class="juxtapose texture-section">
							<span>Texture : </span><br/>
							<div class="img-wrapper texture-wrapper" title="Click to change texture" id="new-texture-<?php echo $data['id']; ?>" >
								<div id="new-texture-color-preview-<?php echo $data['id'];?>" style="background-color: <?php echo $data['color'];?>;height:128px;width:128px;">
									<img width="128" height="128" style="filter:alpha(opacity=<?php echo $data['texture_opacity']*100;?>); opacity:<?php echo $data['texture_opacity'];?>" id="new-texture-preview-<?php echo $data['id']; ?>" src="<?php echo $data['texture'];?>"/>
								</div>
								<input type="hidden" id="new-texture-hidden-<?php echo $data['id'];?>" value=""/>
								<input type="hidden" id="new-texture-actual-<?php echo $data['id'];?>" value="<?php echo $data['texture'];?>"/>
								<input type="hidden" value="<?php echo $data['texture_opacity'];?>" id="new-texture-opacity-value-<?php echo $data['id'];?>"/>
							</div>
							<!--here -->
							<div style="width:100%;"id="new-texture-opacity-<?php echo $data['id'];?>"></div>							
							
							<div style="margin:10px 0px 10px 22px;float:left;cursor:pointer;" id="no-texture-wrapper-<?php echo $data['id'];?>">
								<input type="checkbox" id="no-texture-<?php echo $data['id'];?>"/><span style="margin-left: 5px;position: relative;top: -1px;">No texture</span>
							</div>
						</div>						
						<div class="end-marker"></div>
					</div>
				</div>
				<button style="float:right;" id="save-<?php echo $data['id']; ?>">Save</button>
			</div>
		</div>
		
		<script type="text/javascript">
		
		
		$(document).ready(function()
		{
			$(".select_all_text").click(function() {
				this.select();
			});			
			$('#fb_soundcloud-connect-<?php echo $data['id']?>').button().click(function(){
			
				//var code=e.which;
				var data={
					action		: 'floating_block_get_playlists',
					user		: $('#soundcloud-user-<?php echo $data['id'];?>').val()
				};							
				
				$('#soundcloud-playlists-<?php echo $data['id'];?>').html('<option value=-1>Loading...</option>');
				$('#soundcloud-playlists-<?php echo $data['id'];?>').attr('disabled','disable');
				
				$.post(ajaxurl, data, function(response) {								
					if(response=='false')								
						$('#soundcloud-playlists-<?php echo $data['id'];?>').html('<option value="-1">No playlist found</option>');								
					else
					{
						$('#soundcloud-playlists-<?php echo $data['id'];?>').html(response);
						$('#soundcloud-playlists-<?php echo $data['id'];?>').removeAttr('disabled');
					}
				});
			});
			
			
			$('#new-texture-opacity-<?php echo $data['id']; ?>').slider({
				range: 'max',
				min: 0,
				max: 1,
				value: <?php echo $data['texture_opacity'];?>,
				step: 0.01,
				slide: function( event, ui ) {
					$( "#new-texture-preview-<?php echo $data['id'];?>" ).css( 'opacity',ui.value );
					$('#new-texture-opacity-value-<?php echo $data['id'];?>').val(ui.value);
				},
				change:function(){
					
				}
			});
			$('#new-texture-<?php echo $data['id']; ?>').click(function(){
				window.upload_texture=true;
				window.upload_icon=false;
				window.floating_block_id=<?php echo $data['id'];?>;
				
				tb_show('Texture', 'media-upload.php?type=image&amp;TB_iframe=true');							
				return false;
			});
			$('#no-texture-<?php echo $data['id'];?>, #no-texture-wrapper-<?php echo $data['id'];?>').click(function(){
				if($('#no-texture-<?php echo $data['id'];?>').is(':checked'))
				{
					$('#no-texture-<?php echo $data['id'];?>').prop('checked',false);
					if($('#new-texture-hidden-<?php echo $data['id'];?>').val()=='')
					{
						$('#new-texture-preview-<?php echo $data['id'];?>').attr('src','<?php echo $data['texture'];?>');
						$('#new-texture-actual-<?php echo $data['id'];?>').val('<?php echo $data['texture'];?>');
					}
					else
					{
						$('#new-texture-preview-<?php echo $data['id'];?>').attr('src',$('#new-texture-hidden-<?php echo $data['id'];?>').val());
						$('#new-texture-actual-<?php echo $data['id'];?>').val($('#new-texture-hidden-<?php echo $data['id'];?>').val());
					}
				}
				else
				{
					$('#no-texture-<?php echo $data['id'];?>').prop('checked',true);					
					$('#new-texture-preview-<?php echo $data['id'];?>').attr('src','');
					$('#new-texture-actual-<?php echo $data['id'];?>').val('');
				}				
			});
			$('#new-icon-<?php echo $data['id']; ?>').click(function(){
				window.upload_icon=true;
				window.upload_texture=false;
				window.floating_block_id=<?php echo $data['id'];?>;
				tb_show('Icon', 'media-upload.php?type=image&amp;TB_iframe=true');							
				return false;
			});						
			$('#no-icon-<?php echo $data['id'];?>, #no-icon-wrapper-<?php echo $data['id'];?>').click(function(){
				if($('#no-icon-<?php echo $data['id'];?>').is(':checked'))
				{
					$('#no-icon-<?php echo $data['id'];?>').prop('checked',false);
					if($('#new-icon-hidden-<?php echo $data['id'];?>').val()=='')
					{
						$('#new-icon-preview-<?php echo $data['id'];?>').attr('src','<?php echo $data['icon'];?>');
						$('#new-icon-actual-<?php echo $data['id'];?>').val('<?php echo $data['icon'];?>');
					}
					else
					{
						$('#new-icon-preview-<?php echo $data['id'];?>').attr('src',$('#new-icon-hidden-<?php echo $data['id'];?>').val());
						$('#new-icon-actual-<?php echo $data['id'];?>').val($('#new-icon-hidden-<?php echo $data['id'];?>').val());
					}
				}
				else
				{
					$('#no-icon-<?php echo $data['id'];?>').prop('checked',true);					
					$('#new-icon-preview-<?php echo $data['id'];?>').attr('src','');
					$('#new-icon-actual-<?php echo $data['id'];?>').val('');
				}
				$('#default-icon-<?php echo $data['id'];?>').prop('checked',false);
			});
			$('#default-icon-<?php echo $data['id'];?>, #default-icon-wrapper-<?php echo $data['id'];?>').click(function(){
				if($('#default-icon-<?php echo $data['id'];?>').is(':checked'))
				{
					$('#default-icon-<?php echo $data['id'];?>').prop('checked',false);
					if($('#new-icon-hidden-<?php echo $data['id'];?>').val()=='')
					{
						$('#new-icon-preview-<?php echo $data['id'];?>').attr('src','<?php echo $data['icon'];?>');
						$('#new-icon-actual-<?php echo $data['id'];?>').val('<?php echo $data['icon'];?>');
					}
					else
					{
						$('#new-icon-preview-<?php echo $data['id'];?>').attr('src',$('#new-icon-hidden-<?php echo $data['id'];?>').val());
						$('#new-icon-actual-<?php echo $data['id'];?>').val($('#new-icon-hidden-<?php echo $data['id'];?>').val());
					}
				}
				else
				{
					$('#default-icon-<?php echo $data['id'];?>').prop('checked',true);
					$('#new-icon-preview-<?php echo $data['id'];?>').attr('src','<?php echo $icon[$data['type']];?>');
					$('#new-icon-actual-<?php echo $data['id'];?>').val('<?php echo $icon[$data['type']];?>');
				}
				$('#no-icon-<?php echo $data['id'];?>').prop('checked',false);
				$('#new-icon-preview-<?php echo $data['id'];?>').css('opacity','1');
			});
			
			$('#remove-<?php echo $data['id']; ?>').button().click(function(){
				$('#floating-block-remove-confirmation-dialog').dialog('open');
				window._current=<?php echo $data['id'];?>;
			});
			$('#save-<?php echo $data['id']; ?>').button().click(function(){
				//Save Action							
				
				var data = {
					action			: 'floating_block_partial_save_<?php echo $data['type'];?>',
					block_id		: <?php echo $data['id'];?>,
					block_type		: '<?php echo $data['type'];?>',
					block_title		: $('#new-title-<?php echo $data['id']; ?>').val(),
					block_color		: $('#color-<?php echo $data['id']; ?>').val(),					
					block_position	: $('#new-position-<?php echo $data['id']; ?>').val(),
					block_texture	: $('#new-texture-actual-<?php echo $data['id']; ?>').val(),
					texture_opacity	: $('#new-texture-opacity-value-<?php echo $data['id']; ?>').val(),
					block_icon		: $('#new-icon-actual-<?php echo $data['id']; ?>').val(),					
					
					<?php if($data['type']=='facebook_like_box'):?>
					pageurl					: encodeURI($('#facebook_like_box-pageurl-<?php echo $data['id']; ?>').val()),					
					colorscheme				: $('input[name="facebook_like_box-colorscheme-<?php echo $data['id']; ?>'+'"]:checked').val(),
					showfaces				: $('input[name="facebook_like_box-showfaces-<?php echo $data['id']; ?>'+'"]:checked').val(),
					stream					: $('input[name="facebook_like_box-stream-<?php echo $data['id']; ?>'+'"]:checked').val(),					
					header					: $('input[name="facebook_like_box-header-<?php echo $data['id']; ?>'+'"]:checked').val(),
					<?php endif;?>
					
					<?php if($data['type']=='twitter'):?>
					html					: encodeURI($('#twitter-html-<?php echo $data['id']; ?>').val()),
					<?php endif;?>
					
					<?php if($data['type']=='youtube'):?>
					video_id				: $('#youtube-id-<?php echo $data['id']; ?>').val(),
					streaming				: $('#youtube-streaming-<?php echo $data['id']; ?>').val(),
					video_frameborder		: $('#youtube-frameborder-<?php echo $data['id']; ?>').val(),
					video_allowfull			: $('input[name="youtube-allowfull-<?php echo $data['id']; ?>'+'"]:checked').val(),
					<?php endif;?>
					
					<?php if($data['type']=='google_maps'):?>
					map_src					: $('#google_maps-id-<?php echo $data['id']; ?>').val(),					
					<?php endif;?>
					
					<?php if($data['type']=='vimeo'):?>
					video_id				: $('#vimeo-id-<?php echo $data['id']; ?>').val(),
					video_frameborder		: $('#vimeo-frameborder-<?php echo $data['id']; ?>').val(),					
					<?php endif;?>
					
					<?php if($data['type']=='soundcloud'):?>
					user					: $('#soundcloud-user-<?php echo $data['id']; ?>').val(),					
					permalink				: $('#soundcloud-playlists-<?php echo $data['id']; ?>').val(),					
					<?php endif;?>
					
					<?php if($data['type']=='linkedin'):?>
					profile_url				: $('#linkedin-id-<?php echo $data['id']; ?>').val(),
					<?php endif;?>
					
					<?php if($data['type']=='pinterest'):?>
					pint_type				: $('input[name="pint-type-<?php echo $data['id']; ?>"]:checked').val(),
					pin						: $('#pint-pin-<?php echo $data['id']; ?>').val(),
					
					<?php endif;?>
					
					<?php if($data['type']=='flickr'):?>
					flickr_user				: $('#flickr_user-id-<?php echo $data['id']; ?>').val(),
					recent_count			: $('#recent_count-<?php echo $data['id']; ?>').val(),
					slider_width			: $('#slider_width-<?php echo $data['id']; ?>').val(),
					slider_height			: $('#slider_height-<?php echo $data['id']; ?>').val(),
					<?php endif;?>
					
					<?php if($data['type']=='custom'):?>
					html					: encodeURI($('#custom-html-<?php echo $data['id']; ?>').val()),
					width					: $('#custom-width-<?php echo $data['id']; ?>').val(),
					height					: $('#custom-height-<?php echo $data['id']; ?>').val(),
					<?php endif;?>
					
					whatever		: 1234
				};
				//console.log(data);
				// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
				$.post(ajaxurl, data, function(response) {
					alert('Got this from the server: ' +response);
				});
			});
			
			$('#picker-<?php echo $data['id']; ?>').farbtastic(function(color){
				$('#color-<?php echo $data['id']; ?>').css('background-color',color);
				$('#color-<?php echo $data['id']; ?>').val(d2h(hexToRgb(color).r)+''+d2h(hexToRgb(color).g)+''+d2h(hexToRgb(color).b));
				if(hexToRgb(color).r<100 || hexToRgb(color).g<100 || hexToRgb(color).b<100)
					$('#color-<?php echo $data['id']; ?>').css('color','#fff');
				else
					$('#color-<?php echo $data['id']; ?>').css('color','#000');
					
				$('#new-texture-color-preview-<?php echo $data['id'];?>').css('background-color',color);				
			});
			
			$('#color-<?php echo $data['id'];?>').keyup(function(){
				
				var picker=$.farbtastic('#picker-<?php echo $data['id'];?>');
				picker.setColor('#'+$(this).val());
			});
			
			var pickerz=$.farbtastic('#picker-<?php echo $data['id'];?>');
			pickerz.setColor('#<?php echo $data['color'];?>');
			
			$('#floating-block-type-<?php echo $data['id']?>').click(function(){
				$("html, body").animate({ scrollTop: $('#floating-block-type-<?php echo $data['id'];?>').offset().top - 30 }, 500);
			});
			
			$('#tabs-<?php echo $data['id']; ?>').tabs();
			
		});
		
		</script>
		<?php	}	?>
	</div>
	<div style="width: 700px;">
		<button class="floating-block-button add-new" id="floating-block-new" >Add new Block</button>	
		<button class="floating-block-button save-all" id="floating-block-save-all" >Save all Changes</button>
		<div class="end-marker"></div>
	</div>
	<div id="floating-block-dialog" title="Block Type">
		<p>Choose type of the block</p>
	</div>
	<div id="floating-block-remove-confirmation-dialog" title="Remove confirmation">
		Are you sure to remove this block ?
	</div>	
	
	
	
	<script type="text/javascript">
		$(window).ready(function(){
			$('.wrap').show();
		});
		function merge_options(obj1,obj2){
			var obj3 = {};
			for (var attrname in obj1) { obj3[attrname] = obj1[attrname]; }
			for (var attrname in obj2) { obj3[attrname] = obj2[attrname]; }
			return obj3;
		}
		$(document).ready(function() {
			
			var _upload_icon=false;
			var _upload_texture=false;
			var sequence;
			
			$('#floating-block-remove-confirmation-dialog').dialog({
				autoOpen: false,
				modal: true,				
				buttons :
				{
					Confirm : function()
					{
						var data = {
							action			: 'floating_block_remove',
							block_id		: window._current,
							whatever		: 1234
						};

						// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
						$.post(ajaxurl, data, function(response) {
							alert('Got this from the server: ' + response);
						});
						$('#floating-block-'+window._current).remove();						
						$(this).dialog('close');
					},
					Cancel : function()
					{
						$(this).dialog("close");
					}
				},
				open: function()
				{
					
				}
			});
			
			
			$('#floating-block-accordion').accordion({
				collapsible: true,
				active: false,
				heightStyle: "content",				
				header: 'h3'
			}).sortable({
				items: '.s_panel',
				placeholder: "ui-state-highlight",
				stop: function( event, ui ) {
                    // IE doesn't register the blur when sorting
                    // so trigger focusout handlers to remove .ui-state-focus 
					
                }
			});
			
			$('#floating-block-new').button().click(function(){
				$('#floating-block-dialog').dialog('open');
			});	
			$('#floating-block-save-all').button().click(function(){
				sequence='';
				$('#floating-block-accordion').children('.s_panel').each(function(){
					
					sequence+=$(this).attr('data-id')+';;;';
					
					var now=$(this).attr('data-id');
					var type=$(this).attr('data-type');
					
					var data = {
						action			: 'floating_block_partial_save_'+type,
						block_id		: now,
						block_type		: type,
						block_title		: $('#new-title-'+now).val(),
						block_color		: $('#color-'+now).val(),						
						block_position	: $('#new-position-'+now).val(),
						block_texture	: $('#new-texture-actual-'+now).val(),
						texture_opacity	: $('#new-texture-opacity-value-'+now).val(),
						block_icon		: $('#new-icon-actual-'+now).val()
					};
					var specific;
					if(type=='facebook_like_box')
					{
						specific = 
						{
							pageurl					: encodeURI($('#facebook_like_box-pageurl-'+now).val()),							
							colorscheme				: $('input[name="facebook_like_box-colorscheme-'+now+'"]:checked').val(),
							showfaces				: $('input[name="facebook_like_box-showfaces-'+now+'"]:checked').val(),
							stream					: $('input[name="facebook_like_box-stream-'+now+'"]:checked').val(),							
							header					: $('input[name="facebook_like_box-header-'+now+'"]:checked').val()
						}
					}
					if(type=='twitter')
					{
						specific = 
						{
							html					: encodeURI($('#twitter-html-'+now).val())
						}
						
					}
					if(type=='youtube')
					{
						specific = 
						{
							video_id				: $('#youtube-id-'+now).val(),
							streaming				: $('#youtube-streaming-'+now).val(),
							video_frameborder		: $('#youtube-frameborder-'+now).val(),
							video_allowfull			: $('input[name="youtube-allowfull-'+now+'"]:checked').val()
						}
					}
					if(type=='google_maps')
					{
						specific = 
						{
							map_src					: $('#google_maps-id-'+now).val()							
						}
					}
					if(type=='vimeo')
					{
						specific = 
						{
							video_id				: $('#vimeo-id-'+now).val(),
							video_frameborder		: $('#vimeo-frameborder-'+now).val()							
						}
					}
					if(type=='soundcloud')
					{
						specific = 
						{
							user					: $('#soundcloud-user-'+now).val(),
							permalink				: $('#soundcloud-playlists-'+now).val(),
						}
					}
					if(type=='linkedin')
					{
						specific = 
						{
							profile_url				: $('#linkedin-id-'+now).val()
							
						}
					}
					if(type=='pinterest')
					{
						specific = 
						{
							pint_type				: $('input[name="pint-type-'+now+'"]:checked').val(),
							pin						: $('#pint-pin-'+now).val()							
						}
					}
					if(type=='flickr')
					{
						specific = 
						{
							flickr_user				: $('#flickr_user-id-'+now).val(),
							recent_count			: $('#recent_count-'+now).val(),
							slider_width			: $('#slider_width-'+now).val(),
							slider_height			: $('#slider_height-'+now).val()
						}
					}
					if(type=='custom')
					{
						specific = 
						{
							html					: encodeURI($('#custom-html-'+now).val()),
							width					: $('#custom-width-'+now).val(),
							height					: $('#custom-height-'+now).val()
						}
						
					}
					
					data=merge_options(data,specific);
					//console.log(data);

					// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
					$.post(ajaxurl, data, function(response) {
						//alert('Got this from the server: ' + response);
					});
				});
				
				//Write the sequence to the database
							
				var data =
				{
					action			: 'floating_block_save_sequence',
					block_sequence	: sequence
				};				

				// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
				$.post(ajaxurl, data, function(response) {
					alert('Got this from the server: ' + response);
				});
			});	
			
			$( "#floating-block-dialog" ).dialog({
				autoOpen: false,
				height: 250,
				width: 850,
				modal: true,
				buttons:
				{
					<?php					
					
					$types=array(	'facebook_like_box',	'twitter',	'youtube',	'google_maps',		'vimeo',	'soundcloud',	'linkedin',	'pinterest'	,'flickr'	,	'custom');
					$titles=array(	'Facebook',				'Twitter',	'Youtube',	'Google Maps',		'Vimeo',	'SoundCloud',	'Linkedin',	'Pinterest'	,'Flickr'	,	'Custom');
					$colors=array(	'#3b5998',				'#0084b4',	'#c3181e',	'#9ed577',			'#1ab7ea',	'#ff7700',		'#0e76a8',	'#c8232c'	,'#ff0084'	,	'#ffffff');
					
					$index=0;
					foreach($types as $type){
					?>
					
					<?php echo ucfirst($type);?>: function(){
						var now=$.now();						
						$('#floating-block-accordion').append('<div class="s_panel" id="floating-block-'+now+'" data-id="'+now+'" data-type="<?php echo $type;?>">\
													<h3 class="floating-h-<?php echo $type;?>" id="floating-block-type-'+now+'"><?php echo $titles[$index];?></h3>\
													<div>\
														<button style="float:right;z-index:10;top:5px;right:5px;" id="remove-'+now+'">X</button>\
														<div id="tabs-'+now+'">\
															<ul>\
																<li><a href="#tabs-1">Settings</a></li>\
																<li><a href="#tabs-2">Content</a></li>\
																<li><a href="#tabs-3">Appearance</a></li>\
															</ul>\
															<div id="tabs-1" style="height:250px;">\
																<div class="floating-block-unit-option">\
																	<div class="juxtapose left-side">Title :</div>\
																	<div class="juxtapose right-side"><input type="text" value="<?php echo $titles[$index];?>" id="new-title-'+now+'"/></div>\
																	<div class="end-marker"></div>\
																</div>\
																<div class="floating-block-unit-option">\
																	<div class="juxtapose left-side">Position :</div>\
																	<div class="juxtapose right-side"><select style="width:100%;" id="new-position-'+now+'"><option value="1" selected >Left</option><option value="2" >Right</option></select></div>\
																	<div class="end-marker"></div>\
																</div>\
																<div class="floating-block-unit-option">\
																	<div class="juxtapose left-side">Icon : </div>\
																	<div class="juxtapose right-side" >\
																		<div class="img-wrapper icon-wrapper" title="Click to change icon" id="new-icon-'+now+'" style="float:left;margin-left:1px;"><img width="32" height="32" id="new-icon-preview-'+now+'" src="<?php echo $icon[$type];?>"/><input type="hidden" id="new-icon-hidden-'+now+'" value=""/><input type="hidden" id="new-icon-actual-'+now+'" value="<?php echo $icon[$type];?>"/></div>\
																		<div style="margin:2px 10px 1px 10px;float:left;cursor:pointer;" id="default-icon-wrapper-'+now+'" title="Click to toggle between default icon &amp; custom icon"><input type="checkbox" id="default-icon-'+now+'" checked/><span style="margin-left: 5px;position: relative;top: -1px;">Default icon</span></div>\
																		<div style="margin:2px 10px 1px 10px;float:left;cursor:pointer;" id="no-icon-wrapper-'+now+'"><input type="checkbox" id="no-icon-'+now+'"/><span style="margin-left: 5px;position: relative;top: -1px;">No icon</span></div>\
																	</div>\
																	<div class="end-marker"></div>\
																</div>\
															</div>\
															<div id="tabs-2" style="height:250px;">\
																<?php if($type=='facebook_like_box'):?>\
																<div>\
																	<div class="juxtapose left-side">Facebook Page URL :</div>\
																	<div class="juxtapose right-side"><input class="select_all_text" type="text" style="width: 300px;" value="" id="facebook_like_box-pageurl-'+now+'"/></div>\
																	<div class="end-marker"></div>\
																</div>\
																<div>\
																	<div class="juxtapose left-side">Color Scheme :</div>\
																	<div style="margin:6px;" class="juxtapose right-side">\
																		<input type="radio" value="1" name="facebook_like_box-colorscheme-'+now+'" />Light&nbsp;&nbsp;\
																		<input type="radio" value="0" name="facebook_like_box-colorscheme-'+now+'" checked="checked" />Dark\
																	</div>\
																	<div class="end-marker"></div>\
																</div>\
																<div>\
																	<div class="juxtapose left-side">Show Faces :</div>\
																	<div style="margin:6px;" class="juxtapose right-side">\
																		<input type="radio" value="1" name="facebook_like_box-showfaces-'+now+'" checked="checked"/>Yes&nbsp;&nbsp;\
																		<input type="radio" value="0" name="facebook_like_box-showfaces-'+now+'" />No\
																	</div>\
																	<div class="end-marker"></div>\
																</div>\
																<div>\
																	<div class="juxtapose left-side">Stream :</div>\
																	<div style="margin:6px;" class="juxtapose right-side">\
																		<input type="radio" value="1" name="facebook_like_box-stream-'+now+'" checked="checked"/>Yes&nbsp;&nbsp;\
																		<input type="radio" value="0" name="facebook_like_box-stream-'+now+'" />No\
																	</div>\
																	<div class="end-marker"></div>\
																</div>\
																<div>\
																	<div class="juxtapose left-side">Header :</div>\
																	<div style="margin:6px;" class="juxtapose right-side">\
																		<input type="radio" value="1" name="facebook_like_box-header-'+now+'" checked="checked"/>Yes&nbsp;&nbsp;\
																		<input type="radio" value="0" name="facebook_like_box-header-'+now+'" />No\
																	</div>\
																	<div class="end-marker"></div>\
																</div>\
																<?php endif;?>\
																<?php if($type=='twitter'):?>\
																<div>\
																	<div class="juxtapose left-side">HTML :</div>\
																	<div class="juxtapose right-side"><textarea class="select_all_text" id="twitter-html-'+now+'"></textarea></div>\
																	<div class="end-marker"></div>\
																</div>\
																<?php endif;?>\
																<?php if($type=='youtube'):?>\
																<div>\
																	<div class="juxtapose left-side">Video URL :</div>\
																	<div class="juxtapose right-side"><input type="text" style="width: 300px;" value="" id="youtube-id-'+now+'"/></div>\
																	<div class="end-marker"></div>\
																</div>\
																<div>\
																	<div class="juxtapose left-side">Streaming :</div>\
																	<div class="juxtapose right-side">\
																		<select style="width:100%;" id="youtube-streaming-'+now+'">\
																			<option value="small" >240p</option>\
																			<option value="medium" selected>360p</option>\
																			<option value="large" >480p</option>\
																			<option value="hd720" >720p</option>\
																			<option value="hd1080" >1080p</option>\
																		</select>\
																	</div>\
																	<div class="end-marker"></div>\
																</div>\
																<div>\
																	<div class="juxtapose left-side">Frameborder :</div>\
																	<div class="juxtapose right-side"><input type="text" value="0" id="youtube-frameborder-'+now+'"/></div>\
																	<div class="end-marker"></div>\
																</div>\
																<div>\
																	<div class="juxtapose left-side">Allow Fullscreen :</div>\
																	<div style="margin:6px;" class="juxtapose right-side"><input type="radio" value="1" name="youtube-allowfull-'+now+'" checked="checked"/>&nbsp;Yes&nbsp;&nbsp;<input type="radio" value="0" name="youtube-allowfull-'+now+'"/>&nbsp;No</div>\
																	<div class="end-marker"></div>\
																</div>\
																<?php endif;?>\
																<?php if($type=='google_maps'):?>\
																<div>\
																	<div class="juxtapose left-side">Map URL :</div>\
																	<div class="juxtapose right-side"><input style="width:420px;" class="select_all_text" type="text" value="" id="google_maps-id-'+now+'"/></div>\
																	<div class="end-marker"></div>\
																</div>\
																<?php endif;?>\
																<?php if($type=='vimeo'):?>\
																<div>\
																	<div class="juxtapose left-side">Video URL :</div>\
																	<div class="juxtapose right-side"><input style="width: 300px;" class="select_all_text" type="text" value="" id="vimeo-id-'+now+'"/></div>\
																	<div class="end-marker"></div>\
																</div>\
																<div>\
																	<div class="juxtapose left-side">Frameborder :</div>\
																	<div class="juxtapose right-side"><input type="text" value="0" id="vimeo-frameborder-'+now+'"/></div>\
																	<div class="end-marker"></div>\
																</div>\
																<?php endif;?>\
																<?php if($type=='soundcloud'):?>\
																<div>\
																	<div class="juxtapose left-side">SoundCloud User :</div>\
																	<div class="juxtapose right-side" style="width: 300px;" ><input style="width:166px;" type="text" value="" id="soundcloud-user-'+now+'"/><button style="margin-top:-3px;" id="fb_soundcloud-connect-'+now+'" type="button">Connect</button></div>\
																	<div class="end-marker"></div>\
																</div>\
																<div>\
																	<div class="juxtapose left-side">Playlist :</div>\
																	<div class="juxtapose right-side">\
																		<select id="soundcloud-playlists-'+now+'"><option value="-1">Enter Username First&nbsp;</option></select>\
																	</div>\
																	<div class="end-marker"></div>\
																</div>\
																<?php endif;?>\
																<?php if($type=='linkedin'):?>\
																<div>\
																	<div class="juxtapose left-side">Linkedin Profile URL :</div>\
																	<div class="juxtapose right-side"><input style="width:300px;" class="select_all_text" type="text" value="" id="linkedin-id-'+now+'"/></div>\
																	<div class="end-marker"></div>\
																</div>\
																<?php endif;?>\
																<?php if($type=='pinterest'):?>\
																<div>\
																	<div class="juxtapose left-side">Pinterest URL :</div>\
																	<div class="juxtapose right-side">\
																		<div style="cursor:pointer;  margin: 7px 0px;" id="pint-pin-section-'+now+'">\
																			<input type="radio" id="pint-type-pin-'+now+'" name="pint-type-'+now+'" value="pin" checked="checked" />&nbsp;Pin URL :\
																		</div>\
																			<input type="text" class="select_all_text" style="width: 300px;" value="" id="pint-pin-'+now+'"/>\
																	</div>\
																	<div class="end-marker"></div>\
																</div>\
																<?php endif;?>\
																<?php if($type=='flickr'):?>\
																	<div>\
																		<div class="juxtapose left-side">Flickr Username :</div>\
																		<div class="juxtapose right-side"><input type="text" class="select_all_text" value="" id="flickr_user-id-'+now+'"/></div>\
																		<div class="end-marker"></div>\
																	</div>\
																	<div>\
																		<div class="juxtapose left-side">Recent Photos :</div>\
																		<div class="juxtapose right-side"><input type="text" value="10" id="recent_count-'+now+'"/></div>\
																		<div class="end-marker"></div>\
																	</div>\
																	<div>\
																		<div class="juxtapose left-side">Slider Width :</div>\
																		<div class="juxtapose right-side"><input type="text" value="640" id="slider_width-'+now+'"/></div>\
																		<div class="end-marker"></div>\
																	</div>\
																	<div>\
																		<div class="juxtapose left-side">Slider Height :</div>\
																		<div class="juxtapose right-side"><input type="text" value="480" id="slider_height-'+now+'"/></div>\
																		<div class="end-marker"></div>\
																	</div>\
																<?php endif;?>\
																<?php if($type=='custom'):?>\
																<div>\
																	<div class="juxtapose left-side">HTML :</div>\
																	<div class="juxtapose right-side"><textarea class="select_all_text" id="custom-html-'+now+'"></textarea></div>\
																	<div class="end-marker"></div>\
																</div>\
																<div>\
																	<div class="juxtapose left-side">Width :</div>\
																	<div class="juxtapose right-side"><input type="text" value="640" id="custom-width-'+now+'"/></div>\
																	<div class="end-marker"></div>\
																</div>\
																<div>\
																	<div class="juxtapose left-side">Height :</div>\
																	<div class="juxtapose right-side"><input type="text" value="480" id="custom-height-'+now+'"/></div>\
																	<div class="end-marker"></div>\
																</div>\
																<?php endif;?>\
															</div>\
															<div id="tabs-3" style="height:250px;">\
																<div class="juxtapose color-section">\
																	<span>Color : # </span><input type="text" class="select_all_text" style="width:60px;background-color:<?php echo $colors[$index];?>;" value="<?php echo substr($colors[$index],1);?>" id="color-'+now+'"/><div id="picker-'+now+'"></div>\
																</div>\
																<div class="juxtapose texture-section">\
																	<span>Texture : </span><br/>\
																	<div class="img-wrapper texture-wrapper" title="Click to change texture" id="new-texture-'+now+'" ><div id="new-texture-color-preview-'+now+'" style="background-color: <?php echo $colors[$index];?>;height:128px;width:128px;"><img style="filter:alpha(opacity=75); opacity:0.75;" width="128" height="128" id="new-texture-preview-'+now+'" src="<?php echo $texture['default'];?>"/></div><input type="hidden" id="new-texture-hidden-'+now+'" value=""/><input type="hidden" id="new-texture-actual-'+now+'" value="<?php echo $texture['default'];?>"/></div>\
																	<div id="new-texture-opacity-'+now+'"><input type="hidden" value="0.75" id="new-texture-opacity-value-'+now+'"/></div>\
																	<div style="margin:10px 0px 10px 22px;float:left;cursor:pointer;" id="no-texture-wrapper-'+now+'"><input type="checkbox" id="no-texture-'+now+'"/><span style="margin-left: 5px;position: relative;top: -1px;">No texture</span></div>\
																</div>\
																<div class="end-marker"></div>\
															</div>\
														</div>\
														<button style="float:right;" id="save-'+now+'">Save</button>\
													</div>\
												</div>');												
						$(".select_all_text").click(function(){
							this.select();
						});
						$('#new-texture-opacity-'+now).slider({
							range: 'max',
							min: 0,
							max: 1,
							value: 0.75,
							step: 0.001,
							slide: function( event, ui ) {
								$( "#new-texture-preview-"+now ).css( 'opacity',ui.value );
								$('#new-texture-opacity-value-'+now).val(ui.value);
							}
						});						
						$('#fb_soundcloud-connect-'+now).button().click(function(){							
							//var code=e.which;
							var data={
								action		: 'floating_block_get_playlists',
								user		: $('#soundcloud-user-'+now).val()
							};								
							$('#soundcloud-playlists-'+now).html('<option value=-1>Loading...</option>');
							$('#soundcloud-playlists-'+now).attr('disabled','disable');								
							$.post(ajaxurl, data, function(response){
								if(response=='false')
									$('#soundcloud-playlists-'+now).html('<option value="-1">No playlist found</option>');
								else
								{
									$('#soundcloud-playlists-'+now).html(response);
									$('#soundcloud-playlists-'+now).removeAttr('disabled');
								}
							});							
						});						
						$('#new-texture-'+now).click(function(){
							window.upload_texture=true;
							window.upload_icon=false;
							window.floating_block_id=now;
							tb_show('Texture', 'media-upload.php?type=image&amp;TB_iframe=true');
							return false;
						});
						$('#no-texture-'+now+', #no-texture-wrapper-'+now).click(function(){
							if($('#no-texture-'+now).is(':checked'))
							{
								$('#no-texture-'+now).prop('checked',false);
								if($('#new-texture-hidden-'+now).val()=='')
								{
									$('#new-texture-preview-'+now).attr('src','<?php echo $texture['default'];?>');
									$('#new-texture-actual-'+now).val('<?php echo $texture['default'];?>');
								}
								else
								{
									$('#new-texture-preview-'+now).attr('src',$('#new-texture-hidden-'+now).val());
									$('#new-texture-actual-'+now).val($('#new-texture-hidden-'+now).val());
								}
							}
							else
							{
								$('#no-texture-'+now).prop('checked',true);
								$('#new-texture-preview-'+now).attr('src','');
								$('#new-texture-actual-'+now).val('');
							}
						});
						$('#new-icon-'+now).click(function(){
							window.upload_icon=true;
							window.upload_texture=false;
							window.floating_block_id=now;
							tb_show('Icon', 'media-upload.php?type=image&amp;TB_iframe=true');
							return false;
						});
						$('#no-icon-'+now+', #no-icon-wrapper-'+now).click(function(){
							if($('#no-icon-'+now).is(':checked'))
							{
								$('#no-icon-'+now).prop('checked',false);
								if($('#new-icon-hidden-'+now).val()=='')
								{
									$('#new-icon-preview-'+now).attr('src','');
									$('#new-icon-actual-'+now).val('');
								}
								else
								{
									$('#new-icon-preview-'+now).attr('src',$('#new-icon-hidden-'+now).val());
									$('#new-icon-actual-'+now).val($('#new-icon-hidden-'+now).val());
								}
							}
							else
							{
								$('#no-icon-'+now).prop('checked',true);
								$('#new-icon-preview-'+now).attr('src','');
								$('#new-icon-actual-'+now).val('');
							}
							$('#default-icon-'+now).prop('checked',false);
						});
						$('#default-icon-'+now+', #default-icon-wrapper-'+now).click(function(){
							if($('#default-icon-'+now).is(':checked'))
							{
								$('#default-icon-'+now).prop('checked',false);
								if($('#new-icon-hidden-'+now).val()=='')
								{
									$('#new-icon-preview-'+now).attr('src','');
									$('#new-icon-actual-'+now).val('');
								}
								else
								{
									$('#new-icon-preview-'+now).attr('src',$('#new-icon-hidden-'+now).val());
									$('#new-icon-actual-'+now).val($('#new-icon-hidden-'+now).val());
								}
							}
							else
							{
								$('#default-icon-'+now).prop('checked',true);
								$('#new-icon-preview-'+now).attr('src','<?php echo $icon[$type];?>');
								$('#new-icon-actual-'+now).val('<?php echo $icon[$type];?>');
							}
							$('#no-icon-'+now).prop('checked',false);
							$('#new-icon-preview-'+now).css('opacity','1');
						});						
						
						$('#remove-'+now).button().click(function(){
							$('#floating-block-remove-confirmation-dialog').dialog('open');
							window._current=now;
						});
						$('#save-'+now).button().click(function(){
							//Save Action							
							
							var data = {
								action			: 'floating_block_partial_save_<?php echo $type;?>',
								block_id		: now,
								block_type		: '<?php echo $type;?>',
								block_title		: $('#new-title-'+now).val(),
								block_color		: $('#color-'+now).val(),								
								block_position	: $('#new-position-'+now).val(),
								block_texture	: $('#new-texture-actual-'+now).val(),
								texture_opacity	: $('#new-texture-opacity-value-'+now).val(),
								block_icon		: $('#new-icon-actual-'+now).val(),
								
								<?php if($type=='facebook_like_box'):?>
								pageurl					: encodeURI($('#facebook_like_box-pageurl-'+now).val()),								
								colorscheme				: $('input[name="facebook_like_box-colorscheme-'+now+'"]:checked').val(),
								showfaces				: $('input[name="facebook_like_box-showfaces-'+now+'"]:checked').val(),
								stream					: $('input[name="facebook_like_box-stream-'+now+'"]:checked').val(),								
								header					: $('input[name="facebook_like_box-header-'+now+'"]:checked').val(),
								<?php endif;?>
								
								<?php if($type=='twitter'):?>								
								html					: encodeURI($('#twitter-html-'+now).val()),
								<?php endif;?>
								
								<?php if($type=='youtube'):?>								
								video_id				: $('#youtube-id-'+now).val(),
								streaming				: $('#youtube-streaming-'+now).val(),
								video_frameborder		: $('#youtube-frameborder-'+now).val(),
								video_allowfull			: $('input[name="youtube-allowfull-'+now+'"]:checked').val(),
								<?php endif;?>
								
								<?php if($type=='google_maps'):?>
								map_src					: $('#google_maps-id-'+now).val(),
								<?php endif;?>
								
								<?php if($type=='vimeo'):?>
								video_id				: $('#vimeo-id-'+now).val(),
								video_frameborder		: $('#vimeo-frameborder-'+now).val(),
								<?php endif;?>
								
								<?php if($type=='soundcloud'):?>
								user					: $('#soundcloud-user-'+now).val(),
								permalink				: $('#soundcloud-playlists-'+now).val(),
								<?php endif;?>
								
								<?php if($type=='linkedin'):?>
								profile_url				: $('#linkedin-id-'+now).val(),								
								<?php endif;?>
								
								<?php if($type=='pinterest'):?>
								pint_type				: $('input[name="pint-type-'+now+'"]:checked').val(),
								pin						: $('#pint-pin-'+now).val(),
								<?php endif;?>
								
								<?php if($type=='flickr'):?>
								flickr_user				: $('#flickr_user-id-'+now).val(),
								recent_count			: $('#recent_count-'+now).val(),								
								slider_width			: $('#slider_width-'+now).val(),								
								slider_height			: $('#slider_height-'+now).val(),								
								<?php endif;?>
								
								<?php if($type=='custom'):?>								
								html					: encodeURI($('#custom-html-'+now).val()),
								width					: $('#custom-width-'+now).val(),
								height					: $('#custom-height-'+now).val(),
								<?php endif;?>
								whatever		: 1234
							};
							//console.log(data);
							// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
							$.post(ajaxurl, data, function(response) {
								alert('Got this from the server: ' + response);
							});
						});
						
												
						$('#picker-'+now).farbtastic(function(color){
							$('#color-'+now).css('background-color',color);
							$('#color-'+now).val(d2h(hexToRgb(color).r)+''+d2h(hexToRgb(color).g)+''+d2h(hexToRgb(color).b));
							if(hexToRgb(color).r<100 || hexToRgb(color).g<100 || hexToRgb(color).b<100)
								$('#color-'+now).css('color','#fff');
							else
								$('#color-'+now).css('color','#000');
								
							$('#new-texture-color-preview-'+now).css('background-color',color);				
						});
						
						$('#color-'+now).keyup(function(){
							
							var picker=$.farbtastic('#picker-'+now);
							picker.setColor('#'+$(this).val());
						});
						
						var pickerz=$.farbtastic('#picker-'+now);
						pickerz.setColor('<?php echo $colors[$index];?>');
						
						$('#tabs-'+now).tabs();											//Tabs
						$('#floating-block-accordion').accordion('refresh');			//Refresh
						
						$('#floating-block-type-'+now).click(function(){
							$("html, body").animate({ scrollTop: $('#floating-block-type-'+now).offset().top - 30 }, 500);
						});
						
						var size=$('.s_panel').size();						
						$("#floating-block-accordion").accordion('option','active',(size-1));
						$("html, body").animate({ scrollTop: $(document).height() }, 1000);
						
						$(this).dialog('close');										//Close Dialog
					},
					
					<?php	$index++;}	?>
					
					Cancel:function(){
						$(this).dialog('close');
					}
				},
				open: function()
				{
					<?php
					reset($types);reset($colors);
					$index=0;
					foreach($types as $type){
					?>
					
					$('.ui-dialog-buttonpane').find('button:contains("<?php echo ucfirst($type);?>")').addClass('ultimate-floating-block-button-default').addClass('ultimate-floating-block-button-<?php echo $type;?>').empty();					
					<?php	$index++;}	?>
				}
			});
		});
		
	</script>
	
</div>

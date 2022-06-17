$(document).ready(function(){

	//Global Settings Panel
	window.fbs_transition=false;
	
	window.left_qty=0;
	window.right_qty=0;
	
	window.fbs_loade=false;
	window.fbs_factor=1;
	
	window.fbs_width=$('#floating_block-settings').attr('data-width');
	window.fbs_height=$('#floating_block-settings').attr('data-height');
	
	window.fbs_itop=$('#floating_block-settings').attr('data-itop');	
	window.fbs_ibottom=$('#floating_block-settings').attr('data-ibottom');	
	window.fbs_ileft=$('#floating_block-settings').attr('data-ileft');	
	window.fbs_iright=$('#floating_block-settings').attr('data-iright');	
	
	window.fbs_topradius=$('#floating_block-settings').attr('data-topradius');
	window.fbs_bottomradius=$('#floating_block-settings').attr('data-bottomradius');
	
	window.fbs_opacity=$('#floating_block-settings').attr('data-opacity');
	window.fbs_color=$('#floating_block-settings').attr('data-color');
	window.fbs_speed=$('#floating_block-settings').attr('data-speed');
	
	window.fbs_spacing=$('#floating_block-settings').attr('data-spacing');
	window.fbs_margin=$('#floating_block-settings').attr('data-margin');
	
	window.fbs_active=0;
	window.fbs_total=$('.floating_block').length;
	floating_block_init();	
	
	if (window.addEventListener)//W3C standard
	{
		window.addEventListener('load',floating_block_init_direct, false);
	}
	else if (window.attachEvent)// Microsoft
	{
		window.attachEvent('onload', floating_block_init_direct);
	}
});
function floating_block_init_direct()
{
	$('.floating_block').each(function()
	{
		if($(this).attr('data-rendering')=='direct')
		{
			$(this).children('.floating_block_icon').css('visibility','visible');
			$(this).find('.fw_loader').remove();			
		}
	});
	window.fbs_loaded=true;
	
	$('.fw_flickr_settings').each(function(){		
		var loader_id=$(this).attr('data-id');
		var total=0;
		var done=0;
		var loaded=0;
		var tobedone=$(this).attr('data-tobedone');
		var slider_height=$(this).attr('data-height');
		var ids=new Array();
		
		var flickr_url='http://api.flickr.com/services/rest/';
		var request={
			method			:'flickr.people.findByUsername',
			format			:'json',
			api_key			:'d348e6e1216a46f2a4c9e28f93d75a48',
			nojsoncallback	:1,
			username		:$(this).attr('data-username')
		};
		$.support.cors = true;
		$.getJSON(flickr_url,request).done(function(data){
			//if(data.stat=='fail')
			if(data.stat=='ok')
			{
				var user_id=data.user.id;
				var request={
					method			:'flickr.people.getPublicPhotos',
					format			:'json',
					api_key			:'d348e6e1216a46f2a4c9e28f93d75a48',
					nojsoncallback	:1,
					user_id			:data.user.id
				};
				$.getJSON(flickr_url,request).done(function(data){
					
					if(data.stat=='ok')
					{
						//console.log(data);
						total=parseInt(data.photos.total);						
						if(total<tobedone)
							tobedone=total;						
						for(var i=0;i<tobedone;i++)
						{							
							var request={
								method			:'flickr.photos.getInfo',
								format			:'json',
								api_key			:'d348e6e1216a46f2a4c9e28f93d75a48',
								nojsoncallback	:1,
								photo_id		:data.photos.photo[i].id
							};
							$.getJSON(flickr_url,request).done(function(data){
								
								var id=data.photo.id;
								var title=data.photo.title._content;
								var description=data.photo.description._content;
								var taken=data.photo.dates.taken;
								var views=data.photo.views;
								var farm=data.photo.farm;
								var server=data.photo.server;
								var secret=data.photo.originalsecret;
								var format=data.photo.originalformat;
								
								var url='http://www.flickr.com/photos/'+user_id+'/'+id+'/sizes/o/';
								var src='http://farm'+farm+'.staticflickr.com/'+server+'/'+id+'_'+secret+'_o.'+format;
								
								$('#fw_slideshow-'+loader_id).append(	'<div class="fw_flickr_slide" style="height:'+(parseInt(slider_height))+'px;" id="fw_flickr_slide-'+data.photo.id+'" >\
																			<a target="_blank" href="'+url+'"><img style="width:100%;" height="'+slider_height+'" src="'+src+'" /></a>\
																			<div class="fw_temp_box">\
																				<div class="fw_temp_box_title">'+data.photo.title._content+'</div>\
																				<div class="fw_temp_box_description">'+data.photo.description._content+'</div>\
																			</div>\
																		</div>\
																		');
								done++;
								
								if(done==tobedone)
								{
									$('#fw_slideshow-'+loader_id).find('img').each(function(){
										
									});
								}
							});
						}
					}
				});
				$('.fw_slideshow, .fw_temp_box, .fw_flickr_right, .fw_flickr_left').mouseover(function(){
					$('.fw_temp_box').css('opacity','0.6');
					$('.fw_flickr_right').css('opacity','0.5');
					$('.fw_flickr_left').css('opacity','0.5');
				});
				$('.fw_slideshow, .fw_temp_box, .fw_flickr_right, .fw_flickr_left').mouseout(function(){
					$('.fw_temp_box').css('opacity','0.1');
					$('.fw_flickr_right').css('opacity','0.1');
					$('.fw_flickr_left').css('opacity','0.1');
				});
				
				window.fw_flickr_transition=false;
				
				$('#fw_flickr_right-'+loader_id).click(function(){
				
					if(window.fw_flickr_transition==true)return;
					window.fw_flickr_transition=true
					var $active = $('#fw_slideshow-'+loader_id+' .fw_flickr_slide.active');

					if ( $active.length == 0 ) $active = $('#fw_slideshow-'+loader_id+' .fw_flickr_slide:last');

					var $next =  $active.next().length ? $active.next()
						: $('#fw_slideshow-'+loader_id+' .fw_flickr_slide:first');

					$active.addClass('last-active');
						
					$next.css({opacity: 0.0})
						.addClass('active')					
						.animate({opacity: 1.0}, 800, function() {
							$active.removeClass('active last-active');
							window.fw_flickr_transition=false;
					});
				});

				$('#fw_flickr_left-'+loader_id).click(function(){
					
					if(window.fw_flickr_transition==true)return;				
					window.fw_flickr_transition=true
					var $active = $('#fw_slideshow-'+loader_id+' .fw_flickr_slide.active');

					if ( $active.length == 0 ) $active = $('#fw_slideshow-'+loader_id+' .fw_flickr_slide:last');

					var $next =  $active.prev().length ? $active.prev()
						: $('#fw_slideshow-'+loader_id+' .fw_flickr_slide:last');

					$active.addClass('last-active');
						
					$next.css({opacity: 0.0})
						.addClass('active')
						.animate({opacity: 1.0}, 800, function() {
							$active.removeClass('active last-active');
							window.fw_flickr_transition=false;
						});
				});	
			}																
			//done
		}).error(function(jqXHR, textStatus, errorThrown) { alert(errorThrown); });
	});
	
}


function floating_block_init()
{
	$('.floating_block').each(function(){
	
		//Local Settings Panel
		var title=$(this).attr('data-title');
		var width=$(this).attr('data-width');
		var height=$(this).attr('data-height');
		var icon=$(this).attr('data-icon');
		var texture=$(this).attr('data-texture');
		var opacity=$(this).attr('data-opacity');
		var position=$(this).attr('data-position');	
		var id=$(this).attr('data-id');
		
		if(position=="left")
		{
			if(icon=='')
			{
				$(this).append('<div title="'+title+'" onclick="floating_block_toggle(this,'+width+','+height+')" class="floating_block_icon floating_block_icon_'+position+'" >\
									<div style="background-image:url('+texture+'); position:absolute; left:0px; top:0px; z-index:-1; filter:alpha(opacity='+(opacity*100)+'); opacity:'+opacity+';"></div>\
								</div>');
			}
			else
			{
				$(this).append('<div title="'+title+'" onclick="floating_block_toggle(this,'+width+','+height+')" class="floating_block_icon floating_block_icon_'+position+'" >\
									<img style="vertical-align: top !important;" id="floating_block_img-'+id+'" src="'+icon+'" />\
									<div style="background-image:url('+texture+'); position:absolute; left:0px; top:0px; z-index:-1; filter:alpha(opacity='+(opacity*100)+'); opacity:'+opacity+';"></div>\
								</div>');
			}
		}
		else
		{
			if(icon=='')
			{
				$(this).append('<div title="'+title+'" onclick="floating_block_toggle(this,'+width+','+height+')" class="floating_block_icon floating_block_icon_'+position+'" >\
									<div style="background-image:url('+texture+'); position:absolute; left:0px; top:0px; z-index:-1; filter:alpha(opacity='+(opacity*100)+'); opacity:'+opacity+';"></div>\
								</div>');
			}
			else
			{
				$(this).append('<div title="'+title+'" onclick="floating_block_toggle(this,'+width+','+height+')" class="floating_block_icon floating_block_icon_'+position+'" >\
									<img style="vertical-align: top !important;" id="floating_block_img-'+id+'" src="'+icon+'" />\
									<div style="background-image:url('+texture+'); position:absolute; left:0px; top:0px; z-index:-1; filter:alpha(opacity='+(opacity*100)+'); opacity:'+opacity+';"></div>\
								</div>');
			}
		}
		
		
		if(position=='left')
		{
			$(this).css('left','0px');
			$(this).addClass('floating_block-left');
			window.left_qty++;
		}
		else if(position=='right')
		{
			$(this).css('right','0px');
			$(this).addClass('floating_block-right');
			window.right_qty++;
		}
		
		if($(this).attr('data-rendering')=='direct' && $(this).attr('data-type')!='custom')
		{
			$(this).children('.floating_block_icon').css('visibility','hidden');
			$(this).append('<div id="fw_loader_'+$(this).attr('data-id')+'" title="Connecting... to '+$(this).attr('data-title')+'" style="width: 100%; height: 100%; position: absolute; z-index: 200; opacity: 0.7;" class="fw_loader"></div>');
			if($(this).attr('data-position')=="left")
			{
				$(this).children('.fw_loader').css('-webkit-border-top-right-radius',Math.ceil(window.fbs_topradius/window.fbs_factor));
				$(this).children('.fw_loader').css('-moz-border-radius-topright',Math.ceil(window.fbs_topradius/window.fbs_factor));
				$(this).children('.fw_loader').css('border-top-right-radius',Math.ceil(window.fbs_topradius/window.fbs_factor));		
				$(this).children('.fw_loader').css('-webkit-border-bottom-right-radius',Math.ceil(window.fbs_bottomradius/window.fbs_factor));
				$(this).children('.fw_loader').css('-moz-border-radius-bottomright',Math.ceil(window.fbs_bottomradius/window.fbs_factor));
				$(this).children('.fw_loader').css('border-bottom-right-radius',Math.ceil(window.fbs_bottomradius/window.fbs_factor));
			}
			else
			{
				$(this).children('.fw_loader').css('-webkit-border-top-left-radius',Math.ceil(window.fbs_topradius/window.fbs_factor));
				$(this).children('.fw_loader').css('-moz-border-radius-topleft',Math.ceil(window.fbs_topradius/window.fbs_factor));
				$(this).children('.fw_loader').css('border-top-left-radius',Math.ceil(window.fbs_topradius/window.fbs_factor));		
				$(this).children('.fw_loader').css('-webkit-border-bottom-left-radius',Math.ceil(window.fbs_bottomradius/window.fbs_factor));
				$(this).children('.fw_loader').css('-moz-border-radius-bottomleft',Math.ceil(window.fbs_bottomradius/window.fbs_factor));
				$(this).children('.fw_loader').css('border-bottom-left-radius',Math.ceil(window.fbs_bottomradius/window.fbs_factor));
			}
		}
		else	
			$(this).css('visibility','visible');
	});
	floating_block_adapt_icon();														//PRIORITY 1
	floating_block_adapt_position($('#floating_block-settings').attr('data-position'));	//PRIORITY 2
	
}
$(window).resize(function()
{
	floating_block_adapt_icon();														//PRIORITY 1
	floating_block_adapt_position($('#floating_block-settings').attr('data-position'));	//PRIORITY 2
	floating_block_adapt_active();
});
function floating_block_adapt_position(p)
{
	if(p=='middle')
	{
		var left_top=Math.ceil(($(window).height() - window.left_qty*(Math.ceil(window.fbs_height/window.fbs_factor) + Math.ceil(window.fbs_spacing/window.fbs_factor)))/2);
		if(left_top < 10)left_top=10;
		
		$('.floating_block-left').each(function(){			
			$(this).css('top',left_top);
			left_top += Math.ceil(window.fbs_height/window.fbs_factor) + Math.ceil(window.fbs_spacing/window.fbs_factor);
			$(this).fadeIn(600);			
		});
		
		var right_top=Math.ceil(($(window).height() - window.right_qty*(Math.ceil(window.fbs_height/window.fbs_factor) + Math.ceil(window.fbs_spacing/window.fbs_factor)))/2);
		if(right_top < 10)right_top=10;
		
		$('.floating_block-right').each(function(){
			$(this).css('top',right_top);
			right_top += Math.ceil(window.fbs_height/window.fbs_factor) + Math.ceil(window.fbs_spacing/window.fbs_factor);
			$(this).fadeIn(600);
		});
	}
}
function floating_block_adapt_icon()
{
	if($(window).width()<800)	
		window.fbs_factor=1.5;
	else if($(window).width()>=800 && $(window).width()<960)
		window.fbs_factor=1.2;
	else if($(window).width()>=960)
		window.fbs_factor=1;
		
	$('.floating_block_icon').each(function()
	{
		/* FINALIZED DIMENSIONS*/
		$(this).width(Math.ceil(window.fbs_width/window.fbs_factor));
		$(this).height(Math.ceil(window.fbs_height/window.fbs_factor));
		
		$(this).children('div').css('width','100%');
		$(this).children('div').css('height',Math.ceil(window.fbs_height/window.fbs_factor));
		
		$(this).children('img').attr('width',Math.ceil(window.fbs_width/window.fbs_factor)-Math.ceil(window.fbs_ileft/window.fbs_factor)-Math.ceil(window.fbs_iright/window.fbs_factor));
		$(this).children('img').attr('height',Math.ceil(window.fbs_height/window.fbs_factor)-Math.ceil(window.fbs_itop/window.fbs_factor)-Math.ceil(window.fbs_ibottom/window.fbs_factor));
		
		$(this).parent().css('width',Math.ceil(window.fbs_width/window.fbs_factor));
		$(this).parent().css('height',Math.ceil(window.fbs_height/window.fbs_factor));
		/* END */
	});
	
	$('.floating_block_icon_left').each(function()
	{	
		$(this).children('img').css('margin-top',Math.ceil(window.fbs_itop/window.fbs_factor));
		$(this).children('img').css('margin-right',Math.ceil(window.fbs_iright/window.fbs_factor));
		$(this).children('img').css('margin-bottom',Math.ceil(window.fbs_ibottom/window.fbs_factor));
		$(this).children('img').css('margin-left',Math.ceil(window.fbs_ileft/window.fbs_factor));
		
		$(this).children('div').css('-webkit-border-top-right-radius',Math.ceil(window.fbs_topradius/window.fbs_factor));
		$(this).children('div').css('-moz-border-radius-topright',Math.ceil(window.fbs_topradius/window.fbs_factor));
		$(this).children('div').css('border-top-right-radius',Math.ceil(window.fbs_topradius/window.fbs_factor));		
		$(this).children('div').css('-webkit-border-bottom-right-radius',Math.ceil(window.fbs_bottomradius/window.fbs_factor));
		$(this).children('div').css('-moz-border-radius-bottomright',Math.ceil(window.fbs_bottomradius/window.fbs_factor));
		$(this).children('div').css('border-bottom-right-radius',Math.ceil(window.fbs_bottomradius/window.fbs_factor));
		
		$(this).parent().css('-webkit-border-top-right-radius',Math.ceil(window.fbs_topradius/window.fbs_factor));
		$(this).parent().css('-moz-border-radius-topright',Math.ceil(window.fbs_topradius/window.fbs_factor));
		$(this).parent().css('border-top-right-radius',Math.ceil(window.fbs_topradius/window.fbs_factor));
		$(this).parent().css('-webkit-border-bottom-right-radius',Math.ceil(window.fbs_bottomradius/window.fbs_factor));
		$(this).parent().css('-moz-border-radius-bottomright',Math.ceil(window.fbs_bottomradius/window.fbs_factor));
		$(this).parent().css('border-bottom-right-radius',Math.ceil(window.fbs_bottomradius/window.fbs_factor));
	});
	$('.floating_block_icon_right').each(function()
	{
		$(this).children('img').css('margin-top',Math.ceil(window.fbs_itop/window.fbs_factor));
		$(this).children('img').css('margin-right',Math.ceil(window.fbs_ileft/window.fbs_factor));
		$(this).children('img').css('margin-bottom',Math.ceil(window.fbs_ibottom/window.fbs_factor));
		$(this).children('img').css('margin-left',Math.ceil(window.fbs_iright/window.fbs_factor));
		
		$(this).children('div').css('-webkit-border-top-left-radius',Math.ceil(window.fbs_topradius/window.fbs_factor));
		$(this).children('div').css('-moz-border-radius-topleft',Math.ceil(window.fbs_topradius/window.fbs_factor));
		$(this).children('div').css('border-top-left-radius',Math.ceil(window.fbs_topradius/window.fbs_factor));		
		$(this).children('div').css('-webkit-border-bottom-left-radius',Math.ceil(window.fbs_bottomradius/window.fbs_factor));
		$(this).children('div').css('-moz-border-radius-bottomleft',Math.ceil(window.fbs_bottomradius/window.fbs_factor));
		$(this).children('div').css('border-bottom-left-radius',Math.ceil(window.fbs_bottomradius/window.fbs_factor));
		
		$(this).parent().css('-webkit-border-top-left-radius',Math.ceil(window.fbs_topradius/window.fbs_factor));
		$(this).parent().css('-moz-border-radius-topleft',Math.ceil(window.fbs_topradius/window.fbs_factor));
		$(this).parent().css('border-top-left-radius',Math.ceil(window.fbs_topradius/window.fbs_factor));		
		$(this).parent().css('-webkit-border-bottom-left-radius',Math.ceil(window.fbs_bottomradius/window.fbs_factor));
		$(this).parent().css('-moz-border-radius-bottomleft',Math.ceil(window.fbs_bottomradius/window.fbs_factor));
		$(this).parent().css('border-bottom-left-radius',Math.ceil(window.fbs_bottomradius/window.fbs_factor));
	});	
}
function floating_block_adapt_active()
{
	if(window.fbs_active!=0)
	{	
		var container=$('#floating_block-container-'+window.fbs_active+'');
		var content=$('#floating_block-content-'+window.fbs_active+'');
		var obj=$('#floating_block-'+window.fbs_active+'');
	
		//////////////////////////////////////////TOP OFFSET////////////////////////////////////////////////////
		var top=$(obj).offset().top - $(window).scrollTop();
		var bottom=$(window).height() - ( ($(obj).offset().top-$(window).scrollTop()) + parseInt(window.fbs_height) );		
		var one_half=parseInt($(container).height()/2) - parseInt(window.fbs_height/2);				
		var top_offset=0;		
		if(top >= one_half && bottom >= one_half)
			top_offset = -one_half;			
		else if(top >=one_half && bottom <= one_half)
		{
			top_offset = -($(container).height() - (bottom + parseInt(window.fbs_height/2) - 10));
			if(Math.abs(top_offset) > top)
				top_offset = -top + 10;
		}
		else if(top <=one_half && bottom >= one_half)
			top_offset = -top + 10;				
		else if(top <=one_half && bottom <= one_half)
			top_offset = -top + 10;

		$(container).css('top',top_offset);
		//////////////////////////////////////////END////////////////////////////////////////////////////
		
		var threshold=$('#floating_block-'+window.fbs_active).attr('data-width');
		var ic=2*(Math.ceil(window.fbs_width/window.fbs_factor));
		var tolerance=20;
		
		if(($(window).width()-tolerance-ic)>threshold)
		{			
			$('#floating_block-'+window.fbs_active).width(Math.ceil(threshold)+Math.ceil(window.fbs_width/window.fbs_factor)+10);
			$(container).width(Math.ceil(threshold));
			$(content).width(Math.ceil(threshold)-2*window.fbs_margin);
			
			$(content).find('iframe').width(Math.ceil(threshold)-2*window.fbs_margin);
			$(content).find('iframe').css('min-width',Math.ceil(threshold)-2*window.fbs_margin);
			$('#floating_block-rendered-content-'+window.fbs_active).width(Math.ceil(threshold)-2*window.fbs_margin);			
		}
		else
		{
			var adapt=$(window).width()-tolerance-ic;
			
			$('#floating_block-'+window.fbs_active).width(adapt+Math.ceil(window.fbs_width/window.fbs_factor)+10);
			$(container).width(Math.ceil(adapt));
			$(content).width(Math.ceil(adapt)-2*window.fbs_margin);
			
			$(content).find('iframe').width(Math.ceil(adapt)-2*window.fbs_margin);
			$(content).find('iframe').css('min-width',Math.ceil(adapt)-2*window.fbs_margin);
			$('#floating_block-rendered-content-'+window.fbs_active).width(Math.ceil(adapt)-2*window.fbs_margin);
		}
	}
}

function floating_block_toggle(obj,width,height)
{	
	var master=$(obj).parent();
	
	if($(master).hasClass('floating_block-ontop'))	
		floating_block_close();	
	else
	
		floating_block_open(master,width,height);
}

function floating_block_open(obj,width,height)
{
	if(window.fbs_transition===true)return;	
	window.fbs_transition=true;
	
	//Add ontop class
	$(obj).addClass('floating_block-ontop');
	$('#floating_block_img-'+window.fbs_active).addClass('floating_block-mosttop');
	
	//Append main stuff holder
	window.fbs_active=$(obj).attr('data-id');	
	
	//Overlay
	$('body').append('<div id="floating_block-overlay" style="background:#'+window.fbs_color+'; opacity:'+window.fbs_opacity+';  filter:alpha(opacity='+(window.fbs_opacity*100)+');  " ></div>');
	$('#floating_block-overlay').click(function(){
		floating_block_close();
	});

	if($(obj).attr('data-rendering')=='indirect')
	{
		if(typeof $('#floating_block-container-'+window.fbs_active+'').attr('data-once')==='undefined' || $('#floating_block-container-'+window.fbs_active+'').attr('data-once')===false )
			$(obj).append('<div style="background-color:'+$(obj).css('background-color')+'" class="floating_block-container" data-once="false" id="floating_block-container-'+window.fbs_active+'"><div style="background: url('+$(obj).attr('data-texture')+'); position: absolute; width:100%; height: 100%; top:0px; left:0px;z-index:-1; filter: alpha(opacity='+($(obj).attr('data-opacity')*100)+');opacity: '+$(obj).attr('data-opacity')+'"></div><div class="floating_block-content" id="floating_block-content-'+window.fbs_active+'" ></div></div>');
	}
	else
	{
		$('#floating_block-content-'+window.fbs_active).css('left','-10000px');
		$('#floating_block-content-'+window.fbs_active).show();
	}
	
	//FINAL ADJUSTMENT OF WIDTH
	var ic=2*(Math.ceil(window.fbs_width/window.fbs_factor));
	var tolerance=20;
	
	if(($(window).width()-tolerance-ic)>width)	
		width=Math.ceil(width)+Math.ceil(window.fbs_width/window.fbs_factor)+10;		
	else
		width=$(window).width()-tolerance-ic + Math.ceil(window.fbs_width/window.fbs_factor)+10;	
	//END
	
	$(obj).animate(
		{'width': width},
		Math.ceil(window.fbs_speed),
		'',
		function(){
			var container=$('#floating_block-container-'+window.fbs_active+'');
			var content=$('#floating_block-content-'+window.fbs_active+'');
			var rendered=$('#floating_block-rendered-content-'+window.fbs_active);
			
			$(container).addClass('floating_block-ontop');
			$(container).css('width',width-Math.ceil(window.fbs_width/window.fbs_factor)-10);
			$(container).css('height',Math.ceil(window.fbs_height/window.fbs_factor));
			
			$(content).css('width',width-Math.ceil(window.fbs_width/window.fbs_factor)-10-(2*parseInt(window.fbs_margin)));			
			$(content).find('iframe').css('width',width-Math.ceil(window.fbs_width/window.fbs_factor)-10-(2*parseInt(window.fbs_margin)));
			$(content).find('iframe').css('min-width',width-Math.ceil(window.fbs_width/window.fbs_factor)-10-(2*parseInt(window.fbs_margin)));
			$(rendered).css('width',width-Math.ceil(window.fbs_width/window.fbs_factor)-10-(2*parseInt(window.fbs_margin)));
			
			
			$(content).css("visibility", "hidden");
			$(content).css("position", "absolute");
			
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			//height
			var h=$('#floating_block-actual-content-'+window.fbs_active+'').children().height() + 2*parseInt(window.fbs_margin);
			if($(obj).attr('data-rendering')=='direct')
			{
				$('#floating_block-content-'+window.fbs_active+'').show();
				h=$('#floating_block-rendered-content-'+window.fbs_active).children().height() + 2*parseInt(window.fbs_margin);
				if($(obj).attr('data-type')=='linkedin')
					h=$('#floating_block-rendered-content-'+window.fbs_active).find('.IN-widget').height() + 2*parseInt(window.fbs_margin);
				$(content).css('visibility','visible');
				$(content).hide();
			}
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////			
			
			var top=$(obj).offset().top - $(window).scrollTop();
			var bottom=$(window).height() - ( ($(obj).offset().top-$(window).scrollTop()) + parseInt(window.fbs_height) );
			var one_half=parseInt(h/2) - parseInt(window.fbs_height/2);			
			var top_offset=0;
			if(top >= one_half && bottom >= one_half)
				top_offset = -one_half;				
			else if(top >=one_half && bottom <= one_half)
			{
				top_offset = -(h - (bottom + parseInt(window.fbs_height/2) - 10));
				if(Math.abs(top_offset) > top)
					top_offset = -top + 10;
			}			
			else if(top <=one_half && bottom >= one_half)
				top_offset = -top + 10;					
			else if(top <=one_half && bottom <= one_half)
				top_offset = -top + 10;
			
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

			$(content).css('margin',parseInt(window.fbs_margin));
			
			if($(obj).attr('data-rendering')=='indirect')
			{			
				$('#floating_block-container-'+window.fbs_active+'').animate(
					{"height": h, "top": top_offset},
					parseInt(window.fbs_speed),
					"",
					function()
					{
						window.fbs_transition = false;
						var container=$('#floating_block-container-'+window.fbs_active+'');
						var content=$('#floating_block-content-'+window.fbs_active+'');
						
						if($(container).attr('data-once') === "false" )
						{
							$('#floating_block-actual-content-'+window.fbs_active+'').children().clone().appendTo($(content));
							$(container).attr('data-once',"true");
							
							$(content).css('left','0px');
							$(content).css("visibility", "visible");
							$(content).css('height',h - 2*parseInt(window.fbs_margin));
							$(content).fadeIn(600);
							
						}
						else
						{
							$(content).css('left','0px');
							$(content).css("visibility", "visible");
							$(content).css('height',h - 2*parseInt(window.fbs_margin));
							$(content).fadeIn(600);
						}
					}
				);
			}
			else
			{				
				$('#floating_block-content-'+window.fbs_active+'').children().css('left','0px');
				$('#floating_block-container-'+window.fbs_active+'').animate(
					{"height": h, "top": top_offset},
					parseInt(window.fbs_speed),
					"",
					function()
					{						
						window.fbs_transition = false;
						var container=$('#floating_block-container-'+window.fbs_active+'');
						var content=$('#floating_block-content-'+window.fbs_active+'');
						
						$(content).css('left','0px');
						$(content).fadeIn(600);	
						
					}
				);
			}
		}
	);
	var icon=$(obj).children('.floating_block_icon');
	$(icon).animate({'marginLeft':5,'marginRight':5},parseInt(window.fbs_speed));	
	
	
}

function floating_block_close()
{
	if(window.fbs_transition===true)return;	
	window.fbs_transition=true;
	
	var opened_exist=false;
	
	$('.floating_block').each(function(){
		if($(this).hasClass('floating_block-ontop'))
		{
			opened_exist=true;
			var obj=this;
			var container=$('#floating_block-container-'+window.fbs_active+'');
			var content=$('#floating_block-content-'+window.fbs_active+'');
			var icon = $(this).children(".floating_block_icon");
			
			$(content).css('left','-10000px');			
			$(content).fadeOut(100, function(){
			
				$(content).css("width", 0);
				$(content).css("height", 0);				
				$(container).animate(
					{"height": Math.ceil(window.fbs_height/window.fbs_factor), "top": 0},
					parseInt(window.fbs_speed),
					"",
					function(){						
						$('#floating_block_img-'+window.fbs_active).addClass('floating_block-mosttop');
						$(obj).animate({"width": parseInt(window.fbs_width/window.fbs_factor)}, parseInt(window.fbs_speed), "", 
						function(){
							$(container).removeClass("floating_block-ontop");	
							$(obj).removeClass('floating_block-ontop');
							$('#floating_block_img-'+window.fbs_active).removeClass('floating_block-mosttop');
							$(container).css('width',0);
							$(container).css("height", 0);
							$(container).css('z-index','-10000');
							window.fbs_transition = false;
							window.fbs_active=0;
							$("#floating_block-overlay").remove();
						});						
						$(icon).animate({"marginLeft": 0, "marginRight": 0}, parseInt(window.fbs_speed));
					});					
			});
			
		}
		
	});
	if(!opened_exist)window.fbs_transition=false;
	
}
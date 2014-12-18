var startInp = [];

//map box
	function open_map_box(){
		var map = $('#big-map'),
			scrollH = $(window).height();
		//map.animate({height : scrollH-$('.header').height() + 'px'},400);
		map.css("height", scrollH - $('.header').height() + 'px');
	}
	
	function on_page_start(){
		var scrollH = $(window).height()-$('.header').height(),
			settings_box = $('.s-settings-box').height(),
			s_items_wrap = $(window).height()-$('.header').height() - settings_box;
		$('.row-offcanvas').css('height', scrollH + 'px');

		$('.left-side').css('height', scrollH + 'px');
		$('.right-side').css('height', scrollH + 'px');
		$('.s-items-wrap').css('height', s_items_wrap + 'px');
		
		startInp.push($('#u_login').val());
		startInp.push($('#u_password').val());
		
		open_map_box();
	}
	function open_and_close_toggle_nav(elem){
			var id= $(this).data('id_openbox');
		
			if(!$(this).hasClass('toggle-item-open')){
				$('.open-nav-box').removeClass('toggle-item-open');
				$(this).addClass('toggle-item-open');
				$('.toggle_box').removeClass('item-active').css('opacity','0');
				$('#id_item_navBox_open-'+id).addClass('item-active').animate({opacity : '1'},300); 
			}else{
				$(this).removeClass('toggle-item-open');
				$('#id_item_navBox_open-'+id).removeClass('item-active').css('opacity','0');
			}
	}
	
	function open_and_close_toggle_nav_on_map(){
		$(this).hover(
            function(){
				$(this).children('div.m-txt-add')
												.addClass('item-active')
												.stop()
												.animate({width: '200px'}, 400); 
				$(this).children('div.m-ico-add')
												.removeClass('white-left-border')
												.addClass('left-border')
												.children('i.m-ico-bg')
												.css('opacity','1');
			},
            function(){
				$(this).children('div.m-ico-add')
												.removeClass('left-border')
												.addClass('white-left-border')
												.children('i.m-ico-bg')
												.css('opacity','0.5');
				$(this).children('div.m-txt-add')
												.stop()
												.animate({width: '0px'}, 400);
				setTimeout(function(){
					$(this).children('div.m-txt-add').removeClass('item-active');
				},400);
			}
		);
	}
	function ajax(type,params){
		
		if(type == 'login'){
			$.ajax({
				type: "POST",
				url: "../controll/ajax/login.php",
				data: {params:params,type:type},
				beforeSend: function() {},
				success: function(data) {
					setTimeout(function(){
					//	location.('/?g=1');
					//	window.location.redirect('/?g=1');
					//	$('body').html(data);
					alert(data);
					},500);
				}, 
			});
		}
	}
	
	
	
	function check_login_form(){
		var login = $('#u_login'),
			pass = $('#u_password'),
			array =	[];
			
		if(login.val() !== startInp[0] && $.trim(login.val())!=''){
			login.removeClass('bolder-r');
			array.push($.trim(login.val()));
			
			if(pass.val() !== startInp[1] && $.trim(pass.val())!=''){
				pass.removeClass('bolder-r');
				array.push($.trim(pass.val()));
				
				//ajax('login',array);
			}else{
				pass.addClass('bolder-r');
			}
		}else{
			login.addClass('bolder-r');
		}
	}

$(document).ready(function (){
	$('.login').click(check_login_form);
	//$('#showCart').click(open_map_box);
	$('.open-nav-box').click(open_and_close_toggle_nav);
	//$('.close-item-toggle').click(close_this_toggle_nav);
	//$('body').on( "click",".close-item-toggle", close_this_toggle_nav)
	
	$('.m-nav-map-item').each(open_and_close_toggle_nav_on_map);
});
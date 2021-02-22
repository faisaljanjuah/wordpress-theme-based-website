"use strict";$(window).load(function(){$(".loader").fadeOut("slow");});jQuery(document).ready(function(){jQuery('img').removeAttr('width').removeAttr('height');jQuery('p').each(function(){if(jQuery(this).html()==='&nbsp;'||jQuery(this).html()===''||jQuery(this).html()===' '){jQuery(this).remove();}});var navbars={sideNavBar:function(){$('.side-menu-button').on('click',function(){$('.sidenav').toggleClass("mySideBar");$(this).toggleClass("actives");$('.side-menu-button > i').toggleClass("fa-bars");$('.side-menu-button > i').toggleClass("fa-times");});$('.sidenav ul >li a').on('click',function(){$('.sidenav').removeClass("mySideBar");$('.side-menu-button').removeClass("actives");$('.side-menu-button > i').toggleClass("fa-bars");$('.side-menu-button > i').toggleClass("fa-times");});},navbarColor:function(){var url=$('.navbar .navbar-brand> img').data('url');$(window).on('scroll',function(){if($(this).scrollTop()>70){$('body').addClass("shrink");$('.navbar .navbar-brand> img').attr('src',url+'/images/logoBlack.png');}else{$('body').removeClass("shrink");$('.navbar .navbar-brand> img').attr('src',url+'/images/logoWhite.png');}});},};navbars.sideNavBar();navbars.navbarColor();var scroll={onClickScroll:function(){$(document).on('click','.scroll, .menu-scroll a',function(event){event.preventDefault();$('html,body').animate({scrollTop:$(this.hash).offset().top-44},1000);});},mouseWheelScroll:function(){if(window.addEventListener)window.addEventListener('DOMMouseScroll',wheel,false);window.onmousewheel=document.onmousewheel=wheel;function wheel(event){var delta=0;if(event.wheelDelta)delta=event.wheelDelta/120;else if(event.detail)delta=-event.detail/3;handle(delta);if(event.preventDefault)event.preventDefault();event.returnValue=false;}function handle(delta){var time=500;var distance=500;$('html, body').stop().animate({scrollTop:$(window).scrollTop()-(distance*delta)},time);}}};scroll.onClickScroll();var tabs="#responsiveTabsDemo";var responsiveTabs={callTabs:function(){$(tabs).responsiveTabs({animation:'slide'},{'activate':'0'});}};responsiveTabs.callTabs();if(!jQuery('.testimonial-slider').hasClass('slick-initialized')){jQuery('.testimonial-slider').slick({speed:750,dots:false,arrows:true,autoplay:true,infinite:true,slidesToShow:1,slidesToScroll:1,adaptiveHeight:true,nextArrow:'<span class="tsnxt"><i class="fa fa-angle-right"></i></span>',prevArrow:'<span class="tsprv"><i class="fa fa-angle-left"></i></span>',responsive:[{breakpoint:991,settings:{autoplay:false,}},]});}if(!jQuery('.videoSlider').hasClass('slick-initialized')){jQuery('.videoSlider').slick({dots:true,arrows:true,slidesToShow:1,slidesToScroll:1,appendDots:jQuery('.videoControls .videoDots'),appendArrows:jQuery('.videoControls .videoArrows'),nextArrow:'<span class="tsnxt"><i class="fa fa-angle-right"></i></span>',prevArrow:'<span class="tsprv"><i class="fa fa-angle-left"></i></span>',});}if(!jQuery('#content-slider').hasClass('slick-initialized')){jQuery('#content-slider').slick({dots:false,arrows:false,slidesToShow:1,slidesToScroll:1,adaptiveHeight:true,asNavFor:'.thumbnailSection',responsive:[{breakpoint:767,settings:{autoplay:false,}}]});}if(!jQuery('.thumbnailSection').hasClass('slick-initialized')){jQuery('.thumbnailSection').slick({dots:false,autoplay:true,centerMode:true,centerPadding:0,slidesToShow:2,slidesToScroll:1,focusOnSelect:true,autoplaySpeed:5000,asNavFor:'#content-slider',nextArrow:'<span class="tsnxt"><i class="fa fa-angle-right"></i></span>',prevArrow:'<span class="tsprv"><i class="fa fa-angle-left"></i></span>',responsive:[{breakpoint:767,settings:{autoplay:false,}}]});}var $portfolioTabs={getAll:function(){var $load=$('#load');$('#stats').removeClass('bottom').addClass('top');$load.unbind();$load.text('Load More....');var $filter=$('.filter');$filter.hide('3000');$filter.each(function(index){if(index===2){return false;}$(this).addClass('even').show('3000');});$load.on('click',function(){$filter.addClass('even');$filter.show("3000");$(this).text("No More Element..");});},getItems:function(){var $getAll=this.getAll;$(".filter-button").click(function(){var value=$(this).attr('data-filter');var $filter=$('.filter');if(value==="all"){$getAll();}else{var $load=$('#load');$load.unbind();$load.text('Load More....');$('#stats').removeClass('top').addClass('bottom');$filter.not('.'+value).hide('3000');$filter.removeClass('even');$filter.filter('.'+value).each(function(index){if(index===2){return false;}$(this).show("3000");});$load.on('click',function(){$filter.filter('.'+value).show("3000");$(this).text("No More Element..");});}})},activeClass:function(){$(".filter-button").on('click',function(){if($(".filter-button").hasClass('active')){$(".filter-button").removeClass('active');}$(this).toggleClass('active');})},fancybox:function(){$('.fancybox').fancybox();}};$portfolioTabs.getItems();$portfolioTabs.getAll();$portfolioTabs.activeClass();$portfolioTabs.fancybox();if($(window).width()>767){new WOW().init();$('.tabs-bg').css({"min-height":$("#responsiveTabsDemo").find('img').height()+"px"});$(window).on('resize',function(){$('.tabs-bg').css({"min-height":$("#responsiveTabsDemo").find('img').height()+"px"});});}if($(window).width()<768){$('.tabs-bg').css({"min-height":"350px"});$(window).on('resize',function(){$('.tabs-bg').css({"min-height":"350px"});});}if($('#map').length){var icon=$('#g-map').attr('data-image');var map;map=new GMaps({el:'#map',lat: 38.921260, lng: -77.560810, scrollwheel:false, zoom:16});map.drawOverlay({lat:map.getCenter().lat(),lng:map.getCenter().lng(),layer:'overlayLayer',content:'<div class="overlay_map"><img src="'+icon+'" alt="marker"></div>',verticalAlign:'top',horizontalAlign:'center'});}function formFields(){ $('#registerOnline .formfield').each(function(){
	      if($(this).find('input, textarea').val()) {
	        $(this).find('label').addClass('still');
	      }
		});$("#registerOnline .formfield").focusin(function(){$(this).find('label').addClass('focused still');$(this).focusout(function(){$(this).find('label').removeClass('focused');if(!$(this).find('select').length){if($(this).find('input, textarea').val().length===0){$(this).find('label').removeClass('still');}}});});}formFields();jQuery(document).on('click','#registerOnline .formfield label',function(){jQuery(this).next().find('input').focus();});jQuery(document).on('click','.wpcf7-radio .wpcf7-list-item-label',function(){jQuery(this).prev().trigger('click');});if(jQuery('.num_pagination .prevLink a').html()==='« Previous Page'){jQuery('.num_pagination .prevLink a').html('&#x276e;');}if(jQuery('.num_pagination .nextLink a').html()==='Next Page »'){jQuery('.num_pagination .nextLink a').html('&#x276f;');}});
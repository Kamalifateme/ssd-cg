$ = jQuery;
$.email = function(a,b,c, d){
	var email=a+'@'+b+'.'+c;
	var link='<a href="mailto:'+email+'" class="mailto">'+email+'</a>';
	if(d) document.querySelector(d).innerHTML = link; else document.write(link);
}
$(document).scroll(function(){
	scrollTop = $(window).scrollTop()
	$('#site-navigation li.selected').removeClass('selected')
	var index = Math.round(scrollTop / 500)
	$('section').each(function(i){
		var sectionPos = $(this).offset().top - scrollTop
		var menuPos = $('#site-navigation li').eq(i).offset().top - scrollTop

		if(sectionPos <= menuPos && sectionPos + $(this).outerHeight() >= menuPos + 75){
			$('#site-navigation li').eq(i).addClass('selected')
		}
	})
})

$(function(){
	$(document).trigger('scroll')

	$('body').click(function(e){ $('body').removeClass('open-menu') })
	$('#site-sidebar').click(function(e){ return false })

	$('a[href*=#]').click(function(e){
		$('body').removeClass('open-menu')
		var target = $(this).attr('href')
		var hash = target
		if(target == '#gorooh-1' || target == '#gorooh-2' || target == '#gorooh-3' || target == '#gorooh-4')
			target = '#goroohha'

		target = $(target.substr(target.indexOf('#')))

		if(target.length){
			var scrollToPosition = Math.floor(target.offset().top)

			if($(window).scrollTop() != scrollToPosition){
				e.preventDefault();
				$('html, body').animate({ 'scrollTop': scrollToPosition}, 600, function(){
					window.location.hash = hash
					$('html, body').animate({ 'scrollTop': scrollToPosition}, 0)
				})
			}
		}
	})
	$('.navigation-toggler').click(function(){
		$('body').toggleClass('open-menu')
		return false
	})
	
	
	if(window.location.hash){
		window.onhashchange()
	}

	$('.timeline .days a').click(function(){
		var target = $(this).attr('href').substr(1);
		$('.timeline').attr('class', 'timeline');
		$('.timeline').addClass(target);
	})	
	
})

window.onhashchange = function() {
	var target = window.location.hash;
	if(target == '#gorooh-1' || target == '#gorooh-2' || target == '#gorooh-3' || target == '#gorooh-4'){
		$('.timeline').attr('class', 'timeline');
		$('.timeline').addClass(target.substr(1));
		target = '#goroohha'
	}
	if($(target).length){
		var scrollToPosition = $(target).offset().top;
		$('html, body').scrollTop(scrollToPosition)
	}
}
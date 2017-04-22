/* FX.Slide */
/* toggle window for the login section */
/* Works with mootools-release-1.2 */
/* more info at http://demos.mootools.net/Fx.Slide */

var open = true;
window.addEvent('domready', function(){
	$('middle-pannel').setStyle('height','auto');
	var mySlide = new Fx.Slide('middle-pannel').hide();  //starts the panel in closed state
		
	$('middle-pannel-content').setStyle('height','auto');
	var mySlide2 = new Fx.Slide('middle-pannel-content').hide();  //starts the panel in closed state  

    $('toggleOpen').addEvent('click', function(e){
		e = new Event(e);
		mySlide.toggle();
		if(!open){
			mySlide2.hide();
			$('middle-pannel').setStyle('height','57px');
			open = true;
		}
		e.stop();
	});
	
	$('toggleMiddle').addEvent('click', function(e){
		e = new Event(e);
		//mySlide2.toggle();
		if(open){
	        	$('toggleMiddle').removeClass("closeMiddle");
	        	$('toggleMiddle').addClass("openMiddle");
				var height = $("middle-pannel-content-inner").getStyle("height").toInt();
				height = height + 78;
				$('middle-pannel').setStyle('height',height+'px');
				open = false;
				mySlide.slideIn();
				mySlide2.show();
			}else{
				$('toggleMiddle').removeClass("openMiddle");
	        	$('toggleMiddle').addClass("closeMiddle");
				$('middle-pannel').setStyle('height','57px');
				open = true;
				mySlide.slideIn();
				mySlide2.hide();
			}
		e.stop();
	});
	
});




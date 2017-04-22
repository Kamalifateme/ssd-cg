
var btboxes = [];
var btboxoverlay = null;
showBox = function (box,focusobj, caller, e) {
	//Add overlay
	if (!btboxoverlay) {
		btboxoverlay = new Element ('div', {id:"btbox-overlay"}).injectBefore ($(box));
		btboxoverlay.setStyle ('opacity', 0.01);
		btboxoverlay.addEvent ('click', function (e) {
			btboxes.each(function(box){
				if (box.status=='show') {
					box.status = 'hide';
					var fx = new Fx.Tween (box);
					fx.pause();
					fx.start ('opacity',box.getStyle('opacity'), 0);
					if (box._caller) box._caller.removeClass ('show');
				}
			},this);
			btboxoverlay.setStyle ('display', 'none');
		});
	}
	
	caller.blur();
	//new Event(e).stop ();
	box=$(box);
	if (!box) return;
	if ($(caller)) box._caller = $(caller);
	if (!btboxes.contains (box)) {
		btboxes.include (box);
		//box.addEvent ('click', function (e) {/*new Event(e).stop ();*/});
	}
	
	if (box.getStyle('display') == 'none') {
		box.setStyles({
			display: 'block',
			opacity: 0
		});
	}
	if (box.status == 'show') {
		//hide
		box.status = 'hide';
		var fx = new Fx.Tween (box);
		fx.pause();
		fx.start ('opacity',box.getStyle('opacity'), 0);
		if (box._caller) box._caller.removeClass ('show');
		btboxoverlay.setStyle ('display', 'none');
	} else {
		btboxes.each(function(box1){
			if (box1!=box && box1.status=='show') {
				box1.status = 'hide';
				var fx = new Fx.Tween (box1);
				fx.pause();
				fx.start ('opacity',box1.getStyle('opacity'), 0);
				if (box1._caller) box1._caller.removeClass ('show');
			}
		},this);
		box.status = 'show';
		var fx = new Fx.Tween (box,{onComplete:function(){if($(focusobj))$(focusobj).focus();}});
		fx.pause();
		fx.start ('opacity',box.getStyle('opacity'), 1);
		
		if (box._caller) box._caller.addClass ('show');
		btboxoverlay.setStyle ('display', 'block');
	}
}

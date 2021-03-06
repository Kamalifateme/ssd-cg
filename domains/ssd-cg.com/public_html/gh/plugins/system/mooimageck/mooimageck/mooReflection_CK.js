/*
	reflection.js for mootools v1.33
	(c) 2006-2009 Christophe Beyls <http://www.digitalia.be>
	MIT-style license.
*/
Element.extend({reflect:function(b){var a=this;if(a.getTag()=="img"){b=$extend({height:1/3,opacity:0.5},b||{});a.unreflect();function c(){var f=a.width,d=a.height,k,h,l,g,j;h=Math.floor((b.height>1)?Math.min(d,b.height):d*b.height);if(window.ie){k=new Element("img",{src:a.src,styles:{width:f,height:d,marginBottom:h-d,filter:"flipv progid:DXImageTransform.Microsoft.Alpha(opacity="+(b.opacity*100)+", style=1, finishOpacity=0, startx=0, starty=0, finishx=0, finishy="+(h/d*100)+")"}})}else{k=new Element("canvas");if(!k.getContext){return}try{g=k.setProperties({width:f,height:h}).getContext("2d");g.save();g.translate(0,d-1);g.scale(1,-1);g.drawImage(a,0,0,f,d);g.restore();g.globalCompositeOperation="destination-out";j=g.createLinearGradient(0,0,0,h);j.addColorStop(0,"rgba(255, 255, 255, "+(1-b.opacity)+")");j.addColorStop(1,"rgba(255, 255, 255, 1.0)");g.fillStyle=j;g.rect(0,0,f,h);g.fill()}catch(i){return}}k.setStyles({display:"block",border:0});l=new Element(($(a.parentNode).getTag()=="a")?"span":"div").injectAfter(a).adopt(a,k);l.className=a.className;l.style.cssText=a._reflected=a.style.cssText;l.setStyles({width:f,height:d+h,overflow:"hidden"});a.style.cssText="display: block; border: 0px";a.className="reflected"}if(a.complete){c()}else{a.onload=c}}return a},unreflect:function(){var a=this,b;a.onload=Class.empty;if(a._reflected!==undefined){b=a.parentNode;a.className=b.className;a.style.cssText=a._reflected;a._reflected=undefined;b.parentNode.replaceChild(a,b)}return a}});Elements.extend({reflect:function(a){return this.forEach(function(b){b.reflect(a)})},unreflect:function(){return this.forEach(function(a){a.unreflect()})}});

// AUTOLOAD CODE BLOCK (MAY BE CHANGED OR REMOVED)
window.addEvent("domready", function() {
	$$($$("img").filter(function(img) { return img.hasClass("reflect"); })).reflect({/* Put custom options here */});
});
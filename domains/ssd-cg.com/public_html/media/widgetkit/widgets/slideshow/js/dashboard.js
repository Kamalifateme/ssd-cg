/* Copyright (C) YOOtheme GmbH, YOOtheme Proprietary Use License (http://www.yootheme.com/license) */

jQuery(function(a){a("#slideshow").delegate("a.action.delete","click",function(c){c.preventDefault();if(confirm("مطمئنی ؟")){var d=a(this);a.post(widgetkitajax+"&task=delete_slideshow",{id:a(this).attr("data-id")},function(b){b&&b.id?d.parents("tr:first").fadeOut(function(){a(this).remove()}):alert("Delete action failed.")},"json")}})});

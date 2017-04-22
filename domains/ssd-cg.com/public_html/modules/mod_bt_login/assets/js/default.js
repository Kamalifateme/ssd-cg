jQuery.noConflict();
if(typeof(BTLJ)=='undefined') var BTLJ = jQuery;
if(typeof(btTimeOut)=='undefined') var btTimeOut;
if(typeof(requireRemove)=='undefined') var requireRemove = true;
BTLJ(document).ready(function() {

	BTLJ('.btl-panel span').click(function () {
		BTLJ('.btl-panel span').removeClass("active");
		BTLJ.modal.close();
		var el = this;
		var containerWidth = 0;
		var containerHeight = 0;
		if(el.id.indexOf("registration")!=-1){
			containerHeight = 520;
			containerWidth = 340;
		}else{
			containerHeight = 400;
			containerWidth = 340;
		}
		if(BTLJ(el).hasClass("btl-modal")){
			BTLJ(el).addClass("active");
			BTLJ("#btl-content > div").slideUp();
			BTLJ("#" + el.id.replace("panel","content")).modal({
				onOpen: function (dialog) {
					
					dialog.overlay.fadeIn();
					dialog.container.show();
					dialog.data.show();		
				},
				onClose: function (dialog) {
					dialog.overlay.fadeOut(function () {
						dialog.container.hide();
						dialog.data.hide();		
						BTLJ.modal.close()
					});
				},
				containerCss:{
					height:containerHeight,
					width:containerWidth
				}
			})
			}
			else
			{	
				var contentid = "#"+el.id.replace("panel","content");
				var leftContent = parseInt(BTLJ(el).offset().left) + parseInt(BTLJ(el).width())/2 - parseInt(BTLJ(contentid).width())/2
				var leftRelative = "";
				/*
				BTLJ(contentid).parents().each(function(){
					if(BTLJ(this).css("position")=="relative" && !leftRelative){
						leftRelative = parseInt(BTLJ(this).offset().left);						
					}
				})				
				BTLJ(contentid).css("left",leftContent-leftRelative);
				if(parseInt(BTLJ(contentid).offset().left) + parseInt(BTLJ(contentid).width()) > parseInt(BTLJ("body").offset().left)+parseInt(BTLJ("body").width())) 
				BTLJ(contentid).css("right",0);
				*/
				BTLJ("#btl-content > div").each(function(){
					if(this.id==el.id.replace("panel","content"))
					{
						if(BTLJ(this).is(":hidden")){
							BTLJ(el).addClass("active");
							BTLJ(this).slideDown();
							}
						else
							BTLJ(this).slideUp();								
					}
					else{
						if(BTLJ(this).is(":visible")){						
							BTLJ(this).slideUp();
						}
					}
					
				})
			}
			
		});	
		BTLJ(document).click(function(){
			if(requireRemove) btTimeOut = setTimeout('BTLJ("#btl-content > div").slideUp();BTLJ(".btl-panel span").removeClass("active");',10);
			requireRemove =true;
		})
		BTLJ(".btl-content-block").click(function(){requireRemove =false;});	
		BTLJ(".btl-panel span").click(function(){requireRemove =false;});	
		
		BTLJ(".btl-formregistration").submit(function(){
			if(BTLJ("#btl-input-name").val()==""){
				BTLJ("#btl-registration-error").html(btlOpt.REQUIRED_NAME);
				BTLJ("#btl-registration-error").show();
				return false;
			}
			if(BTLJ("#btl-input-username1").val()==""){
				BTLJ("#btl-registration-error").html(btlOpt.REQUIRED_USERNAME);
				BTLJ("#btl-registration-error").show();
				return false;
			}
			if(BTLJ("#btl-input-password1").val()==""){
				BTLJ("#btl-registration-error").html(btlOpt.REQUIRED_PASSWORD);
				BTLJ("#btl-registration-error").show();
				return false;
			}
			if(BTLJ("#btl-input-password2").val()==""){
				BTLJ("#btl-registration-error").html(btlOpt.REQUIRED_VERIFY_PASSWORD);
				BTLJ("#btl-registration-error").show();
				return false;
			}
			if(BTLJ("#btl-input-password2").val()!=BTLJ("#btl-input-password1").val()){
				BTLJ("#btl-registration-error").html(btlOpt.PASSWORD_NOT_MATCH);
				BTLJ("#btl-registration-error").show();
				return false;
			}
			if(BTLJ("#btl-input-email1").val()==""){
				BTLJ("#btl-registration-error").html(btlOpt.REQUIRED_EMAIL);
				BTLJ("#btl-registration-error").show();
				return false;
			}
			var emailRegExp = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.([a-z]){2,4})$/;
			if(!emailRegExp.test(BTLJ("#btl-input-email1").val())){		
				BTLJ("#btl-registration-error").html(btlOpt.EMAIL_INVALID);
				BTLJ("#btl-registration-error").show();
				return false;
			}
			if(BTLJ("#btl-input-email2").val()==""){
				BTLJ("#btl-registration-error").html(btlOpt.REQUIRED_VERIFY_EMAIL);
				BTLJ("#btl-registration-error").show();
				return false;
			}
			if(BTLJ("#btl-input-email1").val()!=BTLJ("#btl-input-email2").val()){
				BTLJ("#btl-registration-error").html(btlOpt.EMAIL_NOT_MATCH);
				BTLJ("#btl-registration-error").show();
				return false;
			}
		})
		
});

function loginAjax(){
	if(BTLJ("#btl-input-username").val()=="") {
		BTLJ("#btl-login-error").html(btlOpt.REQUIRED_USERNAME)
		BTLJ("#btl-login-error").show();
		return false;
	}
	if(BTLJ("#btl-input-password").val()==""){
		BTLJ("#btl-login-error").html(btlOpt.REQUIRED_PASSWORD);
		BTLJ("#btl-login-error").show();
		return false;
	}
	var datasubmit= "username="+BTLJ("#btl-input-username").val()+"&passwd=" + BTLJ("#btl-input-password").val()+ "&return="+ BTLJ("#btl-return");
	if(BTLJ(".btl-input-remember:checked").length){
		datasubmit += '&remember=yes';
	}
	BTLJ.ajax({
	   type: "POST",
	   async: true,
	   url: btlOpt.BT_AJAX,
	   data: datasubmit,
	   success: function(html){
		   if(html == "1" || html == 1){
			   window.location.href=btlOpt.BT_RETURN;
		   }else{
			   BTLJ("#btl-login-error").html(btlOpt.E_LOGIN_AUTHENTICATE);
			   BTLJ("#btl-login-error").show();
		   }
	   },
	   error: function (XMLHttpRequest, textStatus, errorThrown) {
			alert(textStatus);
	   }
	});
	return false;
}

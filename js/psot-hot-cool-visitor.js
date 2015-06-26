// JavaScript Document
//js
jQuery(document).ready(function(e) {
    jQuery(document).on("click","#hot_cool_cont",function(e){
		e.preventDefault();
	});
	
	
	jQuery(document).on("click","#c_comdal_close",function(e){
		jQuery("#c_comdal-simple-model").hide();
	});
	
	
	jQuery(document).on("click",".post_bt_cool",function(e){
		jQuery("#c_comdal-simple-model").show();
	});
	
	jQuery(document).on("click",".post_bt_hot",function(e){
		jQuery("#c_comdal-simple-model").show();
	});
	
	//c_comdal_contnr_outer
	//c_comdal-simple-model
	jQuery(document).on("click","#c_comdal-simple-model",function(e){
		var btc= e.target.className;
		if('c_comdal-simple-model'==btc)
		jQuery("#c_comdal-simple-model").hide();
		
	});


	
	jQuery(document).on("click","#c_comdal-formbt-login",function(e){
			//c_comdal-formbutton clickerd_conteiner_comda
			jQuery(".c_comdal-formdata").hide();
			jQuery("#c_comdal-formdata-login").show();
			
			jQuery(".c_comdal-formbutton").removeClass("clickerd_conteiner_comda");
			jQuery(this).addClass("clickerd_conteiner_comda");
			
		});
	jQuery(document).on("click","#c_comdal-formbt-register",function(e){
			jQuery(".c_comdal-formdata").hide();
			jQuery("#c_comdal-formdata-register").show();
			
			jQuery(".c_comdal-formbutton").removeClass("clickerd_conteiner_comda");
			jQuery(this).addClass("clickerd_conteiner_comda");
		});
	jQuery(document).on("click","#c_comdal-formbt-forgot",function(e){
			jQuery(".c_comdal-formdata").hide();
			jQuery("#c_comdal-formdata-forgot").show();
			
			jQuery(".c_comdal-formbutton").removeClass("clickerd_conteiner_comda");
			jQuery(this).addClass("clickerd_conteiner_comda");
		});
	
	
});
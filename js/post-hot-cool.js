//js
jQuery(document).ready(function($) {
    jQuery(document).on("click",".postbthotcool",function(e){
		e.preventDefault();
		e.stopPropagation();
		var that=jQuery(this);
	if(!that.hasClass("cls_voted"))
	{	
		that.parent().children(".postbthotcool").addClass("cls_voted");
		
		var datagetr = that.siblings("div.postdataconts").children(".thepostdata");
		
		var iconchngr =that.siblings(".baar_icon_img");
		var beforval = datagetr.attr("varval");
		var voteval  = datagetr.attr("votevalue");
		var votedd  = datagetr.attr("voted");
			
		var hotcolor =datagetr.attr("hotcolor");
		var coldcolor =datagetr.attr("coldcolor");
		var norcolor =datagetr.attr("norcolor");
		
		var postid=that.attr("id");;
		var clkbt='';
	var nowval=0;
	if(votedd==0)
	{	if(that.hasClass("post_bt_hot"))
		{	clkbt='hot';
				
				if(datagetr.attr("hotcold")=="none")
				{
					nowval=parseInt(beforval)+parseInt(voteval);
					that.siblings(".c_inbar_counter").css("color",hotcolor);
					that.siblings(".c_inbar_counter").text(nowval+'°');
					that.siblings(".c_hot_cool_bar").children(".c_inbar_process").css("width",nowval+"%");
					that.siblings(".c_hot_cool_bar").children(".c_inbar_process").css("background-color",hotcolor);
					iconchngr.removeClass("c_inbar_image_cold");
					iconchngr.addClass("c_inbar_image_hot");
				}
				
				if(datagetr.attr("hotcold")=="hot")
				{
					nowval=parseInt(beforval)+parseInt(voteval);
					that.siblings(".c_inbar_counter").text(nowval+'°');
					that.siblings(".c_hot_cool_bar").children(".c_inbar_process").css("width",nowval+"%");
				}
				if(datagetr.attr("hotcold")=="cold")
				{	
					nowval=parseInt(beforval)-parseInt(voteval);
					
					
					if(nowval<0)
					{
						
						nowval = Math.abs(nowval);
						
						that.siblings(".c_inbar_counter").css("color",hotcolor);
						that.siblings(".c_inbar_counter").text(nowval+'°');
						that.siblings(".c_hot_cool_bar").children(".c_inbar_process").css("width",nowval+"%");
						that.siblings(".c_hot_cool_bar").children(".c_inbar_process").css("background-color",hotcolor);
						iconchngr.removeClass("c_inbar_image_cold");
						iconchngr.addClass("c_inbar_image_hot");
						
					}
					else if(nowval>0)
					{
						
						that.siblings(".c_inbar_counter").css("color",coldcolor);
						that.siblings(".c_inbar_counter").text(nowval+'°');
						that.siblings(".c_hot_cool_bar").children(".c_inbar_process").css("width",nowval+"%");
						that.siblings(".c_hot_cool_bar").children(".c_inbar_process").css("background-color",coldcolor);
					}
					
					else if(nowval==0)
					{
						that.siblings(".c_inbar_counter").css("color",norcolor);
						that.siblings(".c_inbar_counter").text(nowval+'°');
						that.siblings(".c_hot_cool_bar").children(".c_inbar_process").css("width",nowval+"%");
						that.siblings(".c_hot_cool_bar").children(".c_inbar_process").css("background-color",norcolor);
						iconchngr.removeClass("c_inbar_image_cold");
					}
					
				}
				
				
		}
		if(that.hasClass("post_bt_cool"))
		{		clkbt='cold';
					
				if(datagetr.attr("hotcold")=="none")
				{
					nowval=parseInt(beforval)+parseInt(voteval);
				
					that.siblings(".c_inbar_counter").css("color",coldcolor);
					that.siblings(".c_inbar_counter").text('-'+nowval+'°');
					that.siblings(".c_hot_cool_bar").children(".c_inbar_process").css("width",nowval+"%");
					that.siblings(".c_hot_cool_bar").children(".c_inbar_process").css("background-color",coldcolor);
					iconchngr.removeClass("c_inbar_image_hot");
					iconchngr.addClass("c_inbar_image_cold");
					
					
				}	
				
				if(datagetr.attr("hotcold")=="cold")
				{	
					
					nowval=parseInt(beforval)+parseInt(voteval);
					
					that.siblings(".c_inbar_counter").text('-'+nowval+'°');
					that.siblings(".c_hot_cool_bar").children(".c_inbar_process").css("width",nowval+"%");
				}
				if(datagetr.attr("hotcold")=="hot")
				{
					nowval=parseInt(beforval)-parseInt(voteval);
					if(nowval<0)
					{
						//nowval=Math.abs(nowval);
						
						that.siblings(".c_inbar_counter").css("color",coldcolor);
						that.siblings(".c_inbar_counter").text(nowval+'°');
						that.siblings(".c_hot_cool_bar").children(".c_inbar_process").css("width",nowval+"%");
						that.siblings(".c_hot_cool_bar").children(".c_inbar_process").css("background-color",coldcolor);
						iconchngr.removeClass("c_inbar_image_hot");
						iconchngr.addClass("c_inbar_image_cold");
					}
					
					else if(nowval>0)
					{
						
						
						
						that.siblings(".c_inbar_counter").css("color",hotcolor);
						that.siblings(".c_inbar_counter").text(nowval+'°');
						that.siblings(".c_hot_cool_bar").children(".c_inbar_process").css("width",nowval+"%");
						that.siblings(".c_hot_cool_bar").children(".c_inbar_process").css("background-color",hotcolor);
					}
					else if(nowval==0)
					{
						that.siblings(".c_inbar_counter").css("color",norcolor);
						that.siblings(".c_inbar_counter").text(nowval+'°');
						that.siblings(".c_hot_cool_bar").children(".c_inbar_process").css("width",nowval+"%");
						that.siblings(".c_hot_cool_bar").children(".c_inbar_process").css("background-color",norcolor);
						iconchngr.removeClass("c_inbar_image_hot");
					}
					
				}
				
		}
		
		var data = {
				action: 'codeins_vote_action',
				post_id: postid,
				vote_typ:clkbt
			};
			
			
			//alert(data.action+" "+data.post_id+" "+data.vote_typ);
			
	//since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
		jQuery.post(ajax_object.ajax_url, data, function(response) {
			// alert('Got this from the server: ' + response);
		});
	}
	}
});
	
	
	/*
	$(document).click(function(e) {
        e.preventDefault();
		e.stopPropagation();
    });
	*/
});
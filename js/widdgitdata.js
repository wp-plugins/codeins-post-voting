jQuery(document).ready(function($) {
    
	jQuery(".showchng").click(function(e) {
        jQuery(this).parent().children(".showchng").removeClass("sdselcted");
		jQuery(this).addClass("sdselcted");
		jQuery(".aldttxccnt").hide();
		var that = jQuery(this);
		var toshow = jQuery(this).parent().parent().siblings(".alldtwdgts");
		if(that.attr("id")=='clk_all')
			toshow.children("#htcld_posts_all").show();
		else if(that.attr("id")=='clk_month')
				toshow.children("#htcld_posts_month").show();
		else if(that.attr("id")=='clk_week')
				toshow.children("#htcld_posts_week").show();
		else if(that.attr("id")=='clk_today')
				toshow.children("#htcld_posts_today").show();
		
		
    });
});
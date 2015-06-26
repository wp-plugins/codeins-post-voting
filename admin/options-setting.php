    <div class="wrap">
    	
    	<div class="cm_title" ><h2>Codeins Post Voting : Options settings</h2> </div>
        <?php 
		$update_ture=' <div class="updated" id="message"><p> <strong>'.__('Save change successful','codeins-post-voting').'</strong>.</p></div>';
		$update_false=' <div class="error" id="message"><p> <strong>'.__('Some Problem. try again ','codeins-post-voting').'</strong>.</p></div>';
		
		if(isset($_GET['settings-updated']) && $_GET['settings-updated']== true )echo $update_ture;
		else if(isset($_GET['settings-updated']) && $_GET['settings-updated']== false )echo $update_false;
		
		?> 
        <div>
        		<form name="urmngform" method="post" action="options.php" class="comdaltheform">
                    	<?php settings_fields( 'codeinsp-settings-group' ); ?>
    					<?php do_settings_sections( 'codeinsp-settings-group' ); ?>
        		<table width="100%">
                <tbody>
                	<tr>
                    	<td width="250" >Bar On/Off </td>
                        <td>	 
                        	<label> <input type="radio" name="comd_bar_on_off" <?php if(get_option('comd_bar_on_off')==1)echo 'checked="checked"'; ?> value="1" > On  </label>
                            <label> <input type="radio" name="comd_bar_on_off"  <?php if(get_option('comd_bar_on_off')==0)echo 'checked="checked"'; ?> value="0" > Off  </label>
                         </td>
                    </tr>
                    <tr>
                    	<td width="250" >Bar Width</td>
                        <td> 
                        	<label> Width: <input type="text" style="width:50px;" name="comd_bar_width" value="<?php echo get_option('comd_bar_width'); ?>"/> </label>
                        	<select name="comd_bar_width_type" style="vertical-align:top; height:26px;">
                            	<option value="%" <?php if(get_option('comd_bar_width_type')=="%")echo ' selected="selected"'; ?> >%</option>
                                <option value="px" <?php if(get_option('comd_bar_width_type')=="px")echo ' selected="selected"'; ?> >px</option>
                             </select>
                         </td>
                    </tr>
                    <tr>
                    	<td width="250" >Inner Bar Width</td>
                        <td> 
                        	<label> Width: <input type="text" style="width:50px;" name="comd_inside_bar_width" value="<?php echo get_option('comd_inside_bar_width'); ?>"/> </label>
                        	<select name="comd_inside_bar_width_type" style="vertical-align:top; height:26px;">
                            	<option value="%" <?php if(get_option('comd_inside_bar_width_type')=="%")echo ' selected="selected"'; ?> >%</option>
                                <option value="px" <?php if(get_option('comd_inside_bar_width_type')=="px")echo ' selected="selected"'; ?> >px</option>
                             </select>
                         </td>
                    </tr>
                   
                    <tr>
                    	<td width="250" >Bar Position </td>
                        <td> 
                        	
                        	
                            <label> Horizontal Align: <select name="comd_bar_horizontal_align" style="vertical-align:top; height:26px;">
                            	<option value="left" <?php if(get_option('comd_bar_horizontal_align')=="left")echo ' selected="selected"'; ?> >Left</option>
                                <option value="right"  <?php if(get_option('comd_bar_horizontal_align')=="right")echo ' selected="selected"'; ?> >Right</option>
                                <option value="center" <?php if(get_option('comd_bar_horizontal_align')=="center")echo ' selected="selected"'; ?> >Center</option>
                             </select>
                             </label>
                         </td>
                    </tr>
                    <tr>
                    	<td width="250" > Hot Color </td>
                        <td> 
                        	 <input name="comd_hot_color" type="text" id="comdal_section_hot_color" value="<?php echo get_option('comd_hot_color'); ?>" data-default-color="<?php echo get_option('comd_hot_color'); ?>">
                         </td>
                    </tr>
                    <tr>
                    	<td width="250" > Cold Color </td>
                        <td> 
                        	 <input name="comd_cold_color" type="text" id="comdal_section_cold_color" value="<?php echo get_option('comd_cold_color'); ?>" data-default-color="<?php echo get_option('comd_cold_color'); ?>">
                         </td>
                    </tr>
                    <tr>
                    	<td width="250" > Background Color </td>
                        <td> 
                        	 <input name="comd_backgroud_color" type="text" id="comdal_section_backgroud_color" value="<?php echo get_option('comd_backgroud_color'); ?>" data-default-color="<?php echo get_option('comd_backgroud_color'); ?>">
                         </td>
                    </tr>
                    <tr>
                    	<td width="250" > Border  </td>
                        <td> 
                        	 <label> Size: <input type="text" style="width:50px;" name="comd_bar_border_size" value="<?php echo get_option('comd_bar_border_size'); ?>"/> px</label>
                             <label> type: <select name="comd_bar_border_type" style="vertical-align:middle; height:26px;">
                            	<option value="solid" <?php if(get_option('comd_bar_border_type')=="solid")echo ' selected="selected"'; ?> >solid</option>
                                <option value="double" <?php if(get_option('comd_bar_border_type')=="double")echo ' selected="selected"'; ?> >double</option>
                                <option value="dotted" <?php if(get_option('comd_bar_border_type')=="dotted")echo ' selected="selected"'; ?> >dotted</option>
                                <option value="dashed" <?php if(get_option('comd_bar_border_type')=="dashed")echo ' selected="selected"'; ?> > dashed</option>
                                <option value="ridge" <?php if(get_option('comd_bar_border_type')=="ridge")echo ' selected="selected"'; ?> >ridge</option>
                                <option value="groove" <?php if(get_option('comd_bar_border_type')=="groove")echo ' selected="selected"'; ?> >groove </option>
                                <option value="inset" <?php if(get_option('comd_bar_border_type')=="inset")echo ' selected="selected"'; ?> > inset</option>
                                <option value="outset" <?php if(get_option('comd_bar_border_type')=="outset")echo ' selected="selected"'; ?> > outset</option>
                                <option value="inherit" <?php if(get_option('comd_bar_border_type')=="inherit")echo ' selected="selected"'; ?> > inherit </option>
                                <option value="none" <?php if(get_option('comd_bar_border_type')=="none")echo ' selected="selected"'; ?> >none</option>
                                <option value="hidden" <?php if(get_option('comd_bar_border_type')=="hidden")echo ' selected="selected"'; ?> > hidden </option>
                             </select> </label>
                             <style>.wp-picker-container{ vertical-align:middle;}</style>
                             <label> Color:  <input style="vertical-align:middle;" name="comdal_bar_border_color" type="text" id="comdal_section_bar_border_color" value="<?php echo get_option('comdal_bar_border_color'); ?>" data-default-color="<?php echo get_option('comdal_bar_border_color'); ?>"> </label>
                         </td>
                    </tr>
                    <tr>
                    	<td width="250" > Font </td>
                        <td> 
                        	 <label> Name: <select name="comd_bar_font_name" style="vertical-align:top; height:26px;">
                            	<option value="Arial, Helvetica, sans-serif"  <?php if(get_option('comd_bar_font_name')=="Arial, Helvetica, sans-serif")echo ' selected="selected"'; ?> > Arial </option>
                                <option value="Verdana, Geneva, sans-serif" <?php if(get_option('comd_bar_font_name')=="Verdana, Geneva, sans-serif")echo ' selected="selected"'; ?> > Verdana </option>
                                <option value="Georgia, 'Times New Roman', Times, serif" <?php if(get_option('comd_bar_font_name')=="Georgia, 'Times New Roman', Times, serif")echo ' selected="selected"'; ?> > Georgia </option>
                                <option value="'Courier New', Courier, monospace" <?php if(get_option('comd_bar_font_name')=="'Courier New', Courier, monospace")echo ' selected="selected"'; ?> > Courier New </option>
                                <option value="Tahoma, Geneva, sans-serif"  <?php if(get_option('comd_bar_font_name')=="Tahoma, Geneva, sans-serif")echo ' selected="selected"'; ?> > Tahoma </option>
                                <option value="'Trebuchet MS', Arial, Helvetica, sans-serif"  <?php if(get_option('comd_bar_font_name')=="'Trebuchet MS', Arial, Helvetica, sans-serif")echo ' selected="selected"'; ?> > Trebuchet MS </option>
                                <option value="'Arial Black', Gadget, sans-serif"  <?php if(get_option('comd_bar_font_name')=="'Arial Black', Gadget, sans-serif")echo ' selected="selected"'; ?> > Arial Black </option>
                                <option value="'Times New Roman', Times, serif"  <?php if(get_option('comd_bar_font_name')=="'Times New Roman', Times, serif")echo ' selected="selected"'; ?> > Times New Roman </option>
                                <option value="'Comic Sans MS', cursive"  <?php if(get_option('comd_bar_font_name')=="'Comic Sans MS', cursive")echo ' selected="selected"'; ?> > Comic Sans MS </option>
                                <option value="'MS Serif', 'New York', serif"  <?php if(get_option('comd_bar_font_name')=="'MS Serif', 'New York', serif")echo ' selected="selected"'; ?> > MS Serif</option>
                                <option value="'Lucida Console', Monaco, monospace"  <?php if(get_option('comd_bar_font_name')=="'Lucida Console', Monaco, monospace")echo ' selected="selected"'; ?> > Lucida Console </option>
                             </select> </label>
                             <label> Size:  <input type="text" style="width:50px;" name="comd_bar_font_size" value="<?php echo get_option('comd_bar_font_size'); ?>"/>px </label>
                         </td>
                    </tr>
                    <tr>
                    <td width="250" > Temperature Range </td>
                        <td> 
                        	 <label> Between:  -  <input type="text" style="width:50px;" name="comd_bar_cold_limit" value="<?php echo get_option('comd_bar_cold_limit'); ?>"/> °C </label>
                             <label> And: +  <input type="text" style="width:50px;" name="comd_bar_hot_limit" value="<?php echo get_option('comd_bar_hot_limit'); ?>"/> °C </label>
                         </td>
                    </tr>
                    <tr>
                    <td width="250" style="text-align:left; vertical-align:top;" > User default vote value </td>
                        <td> 
                        
                        	 <textarea style="height:250px; width:450px;" name="comd_user_vote_vlaue" ><?php echo get_option('comd_user_vote_vlaue'); ?></textarea>
                         </td>
                    </tr>
                    <tr>
                    <td width="250" style="text-align:left; vertical-align:top;"> Plugin auto insertion </td>
                        <td> 
                        	<label> <input type="checkbox" name="comd_auto_insert_to_post" <?php if(get_option('comd_auto_insert_to_post'))echo 'checked="checked"'; ?> /> Auto insert into post from these categories </label>
                            <input type="hidden" class="the_catidssss" name="comd_insert_post_catogracy_id" value="<?php echo get_option('comd_insert_post_catogracy_id')?>" />
                            <div style="clear:both"></div>
                            <div style="height: auto; width:100%; padding:10px 0;">
                            
								<?php
								
								$categories =   get_categories();
								$selected_cat_ids=''; 
								if(get_option('comd_insert_post_catogracy_id'))
									$selected_cat_ids = explode(',', get_option('comd_insert_post_catogracy_id'));
									
								$output = '';
								if($categories){
									foreach($categories as $category) {
										if($selected_cat_ids)
										{ $check =(in_array($category->cat_ID , $selected_cat_ids))?'checked="checked"':'';}
										$output .= '<div style="float:left; height:20px; border:1px solid #000; margin-bottom:10px; border-radius:10px; background-color:#FFF; padding: 3px 10px;margin-right: 10px;"><label><input type="checkbox" '.$check.' name="comd_insert_post_id" class="categories_check" id="'.$category->cat_ID.'" > '. $category->cat_name.' </label></div>';
									}
								echo trim($output);
								}
								else{echo 'No categories';}
								
							?>
                            
                            <script>
							jQuery(document).ready(function(e) {
                                jQuery('.categories_check').click(function(e) {
                                //  alert("howdy");
									var theids=[];
									jQuery(document).find("input.categories_check").each(function(){
											
											var ttthis = jQuery(this);
											if(ttthis.is(":checked")){
												//alert(ttthis.attr("id"));
												theids.push(ttthis.attr("id"));
												//alert(theids);
											}
									});
									jQuery(".the_catidssss").val(theids);
									//alert(jQuery(".the_catidssss").val());
                                });
								
								jQuery('.pagess_check').click(function(e) {
                                //  alert("howdy");
									var theidsc=[];
									jQuery(document).find("input.pagess_check").each(function(){
											
											var ttthis = jQuery(this);
											if(ttthis.is(":checked")){
												//alert(ttthis.attr("id"));
												theidsc.push(ttthis.attr("id"));
												//alert(theids);
											}
									});
									jQuery(".the_pagsidssss").val(theidsc);
									//alert(jQuery(".the_catidssss").val());
                                });
								
                            });
								
							</script>
                            </div>
                            
                         </td>
                    </tr>
                    
                    <tr>
                    <td width="250" style="text-align:left; vertical-align:top;" > Plugin pages activation </td>
                        <td> 
                        	<label> <input type="checkbox" name="comd_auto_insert_to_pages" <?php if(get_option('comd_auto_insert_to_pages'))echo 'checked="checked"'; ?> /> Activate the plugin on following pages </label>
                            <input type="hidden" class="the_pagsidssss" name="comd_auto_insert_to_pages_ids" value="<?php echo get_option('comd_auto_insert_to_pages_ids')?>" />
                            <div style="clear:both"></div>
                            <div style="height: auto; width:100%; padding:10px 0; "> 
                            			
                                  <?php
								//	echo 'sdfgs'.get_option('comd_auto_insert_to_pages_ids').'asd<br>';
									
								$allpagess =   get_pages(); 
								$selected_cat_ids='';
								if(get_option('comd_auto_insert_to_pages_ids'))
									$selected_cat_ids = explode(',', get_option('comd_auto_insert_to_pages_ids'));
									
								$output = '';
								if($allpagess){
									foreach($allpagess as $apage) {
										if($selected_cat_ids)
										{ $check =(in_array($apage->ID , $selected_cat_ids))?'checked="checked"':'';}
										$output .= '<div style="float:left; height:20px; border:1px solid #000; margin-bottom:10px; border-radius:10px; background-color:#FFF; padding: 3px 10px;margin-right: 10px;"><label><input type="checkbox" '.$check.'  class="pagess_check" id="'.$apage->ID.'" value="'.$apage->ID.'" > '. $apage->post_title.' </label></div>';
									}
								echo trim($output);
								}
								else{echo 'No categories';}
								
							?>     
                            </div>
                         </td>
                    </tr>
                    <td width="250" > Widget post </td>
                        <td> 
                        	<label> Display  <input type="text" style="width:50px;" name="comd_widget_post_limit" value="<?php echo get_option('comd_widget_post_limit'); ?>"/> post in widget</label>
                         </td>
                    </tr>
                    
                </tbody>
                </table>
                <div style="clear:both"></div>
                    <div style="width: 200px; margin: 30px auto 0px;" > <?php submit_button(); ?> </div>
                </form>
        </div>
        
    
	<script type="text/javascript">
    jQuery(document).ready(function($) {   
        $('#comdal_section_hot_color').wpColorPicker();
		$('#comdal_section_cold_color').wpColorPicker();
		$('#comdal_section_backgroud_color').wpColorPicker();
		$('#comdal_section_bar_border_color').wpColorPicker();
		
    }); 
    </script>
    </div>
    
    <?php

?>
	<?php
		
		global $wpdb;
		$prfx = $wpdb->prefix;
		$cod_table_name=$prfx.'codeins_post_voting';
		
		$update_ture=' <div class="updated" id="message"><p> <strong>'.__('Save change successful','codeins-post-voting').'</strong>.</p></div>';
		$update_false=' <div class="error" id="message"><p> <strong>'.__('Some Problem. try again ','codeins-post-voting').'</strong>.</p></div>';
		
		if(isset($_POST['comd_user_vote_vlaue']) && intval($_POST['userid'])>0 )
		{
			$userid = intval($_POST['userid']);
			$votevl = sanitize_text_field($_POST['comd_user_vote_vlaue']);
			
			
			$user_vote_value = get_user_meta($userid , 'comd_user_vote_vlaue' , true); 
			if($user_vote_value)
			{
				update_user_meta( $userid, 'comd_user_vote_vlaue', $votevl); 
			}
			else
			{
				add_user_meta( $userid, 'comd_user_vote_vlaue', $votevl); 
			}
			echo $update_ture;
		}
	?>
    
    
    <div class="wrap">
    <?php
	 
		
		
		if(isset($_GET['settings-updated']) && $_GET['settings-updated']== true )echo $update_ture;
		else if(isset($_GET['settings-updated']) && $_GET['settings-updated']== false )echo $update_false; 
	?> 
            
    <div class="cm_title" ><h2>Codeins Post Voting :  Manage user votes</h2> </div>
    <div>	
				
				<script>
				jQuery(document).ready(function(e) {
                	
					
					jQuery(document).on("click", ".teble_changer",function(){
								
								var that=jQuery(this);
								var tabid= that.attr("id");
								jQuery(".teble_changer").removeClass("selected");
								that.addClass("selected");
								
								jQuery(".thesingelform").hide();
								jQuery("#"+tabid+".thesingelform").show();
								
						});
						
					var table1 = jQuery('.com_table').dataTable( {
								"bPaginate": false,
								"bLengthChange": true,
								"bFilter": true,
								"bSort": true,
								"bInfo": false,
								"bAutoWidth": false
							} );    
                });
				
				
			</script>
    		<div class="datacon_area">
            		<div class="user_table_cc1">
                	<table class="com_table">
                    	<thead>
                        	<tr>  <th class="askjdfhaaat">user name</th>  <th>user login</th>  <th>Totel posts</th> <th>Totel votes</th> <th>Hot votes</th> <th>Cold votes</th></tr>
                        </thead>
                        <tbody>
                        <?php 
							$Allusers=get_users('orderby=ID');
							$userForms='';
							$formsdata='';
							$ssk1=0;
							foreach($Allusers as $aUser)
							{
									$qrrry= "SELECT COUNT( * )
									FROM `$cod_table_name`
									WHERE `rating_userid` =$aUser->ID ";
									$votecount = $wpdb->get_var($qrrry);
									
									$qrrry1= "SELECT COUNT( * )
									FROM `$cod_table_name`
									WHERE `rating_userid` =$aUser->ID AND rating_rating > 0 ";
									$hotvote = $wpdb->get_var($qrrry1);
									
									$qrrry2= "SELECT COUNT( * )
									FROM `$cod_table_name`
									WHERE `rating_userid` =$aUser->ID AND rating_rating < 0";
									$coldvote = $wpdb->get_var($qrrry2);
									
									
									$thetrd = ($ssk1==0)?' selected':'';
									
									
									$user_post_count = count_user_posts( $aUser->ID );
									echo'<tr id="'.$aUser->ID.'" class="teble_changer'.$thetrd.'" >
                            				<td> ' .$aUser->display_name. '  </td> <td>' .$aUser->user_login. '  </td> <td> '.$user_post_count.' </td> <td> '.$votecount.' </td> <td> '.$hotvote.' </td> <td> '.$coldvote.' </td>
                            			</tr>';
									
										
									$user_vote_value = get_user_meta($aUser->ID , 'comd_user_vote_vlaue' , true); 
									$user_vote_value = ($user_vote_value)? $user_vote_value : get_option('comd_user_vote_vlaue') ;
									 
									ob_start();
									submit_button();
									$submitbutton = ob_get_clean();
									$disply=($ssk1==0)?'style="display:block;"':'';
									$formsdata.= '<div class="thesingelform" id="'.$aUser->ID.'"  '.$disply.'>
												<form name="urmngform" method="post" class="comdaltheform">
												<input type="hidden" name="userid" value="'.$aUser->ID.'" />
												<div class="txtarecontnr" style=" width:450px; margin:0 auto;" align="center">
												<span>User vote value</span>
												 <textarea name="comd_user_vote_vlaue" >'.$user_vote_value.' </textarea>
												</div>
												<div style="clear:both"></div>
												<div style="width: 200px; margin: 30px auto 0px;" > '. $submitbutton .'</div>
												</form>
											</div>';
										
									$ssk1++;	
							}
							
						?>
                        	
                        </tbody>
                    </table>
                    </div>
                </div>
                <div style="clear:both"></div>
                	
                    <div class="boldline"></div>
                
                <div style="clear:both"></div>
                <div class="allforms">
                	<?php echo $formsdata;?>
                </div> 
           </div>
  </div>
    <?php
	
		/*	if(isset($_POST['uservotevalue']))
			{	$input = $_POST['uservotevalue'];
			 	 //unset($_POST['uservotevalue']);
			}
			else $input = "";
			
			//I dont check for empty() incase your app allows a 0 as ID.
			if (strlen($_POST['uservotevalue'])==0) {
			  echo 'no input';
			  exit;
			}
			echo get_user_vote_value($input, 20);
			<input type="submit" value="Save Change" class="button button-primary" />
		*/
			
?>
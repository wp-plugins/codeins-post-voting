<?php
	
	global $wpdb;
	$prfx = $wpdb->prefix;
	$cod_table_name = $prfx.'codeins_post_voting';
							
	
		
	?>
    
    <div class="wrap">
    	 
        <div class="cm_title" ><h2>Codeins Post Voting :  Post stats</h2> </div>
        <?php 
		$update_ture=' <div class="updated" id="message"><p> <strong>'.__('Save change successful','codeins-post-voting').'</strong>.</p></div>';
		$update_false=' <div class="error" id="message"><p> <strong>'.__('Some Problem. try again ','codeins-post-voting').'</strong>.</p></div>';
		$dele=0;
		if(isset($_GET['deletvote']))
		{
			$delid=intval($_GET['deletvote']);
			$DSS=$wpdb->get_var("SELECT COUNT(*) FROM $cod_table_name WHERE rating_id = $delid ");
			$DSS =  intval($DSS);
			if($delid>0 && $DSS>0)
			{
				$wpdb->query( $wpdb->prepare( "DELETE FROM $cod_table_name WHERE rating_id = %d ", $delid));
				echo '<div class="updated" id="message"><p> <strong>'.__('Vote deleted','codeins-post-voting').'</strong>.</p></div>';
				$dele=1;
			}
			
		}
		
		
		if(isset($_POST['deletesel']) && intval($_POST['deletesel']) == 1)
		{
			$retingids = $_POST['retingids'];
			if(is_array($retingids))
			{	foreach($retingids as $dlid)
				{
					$dlid = intval($dlid);
					$DSSs = $wpdb->get_var("SELECT COUNT(*) FROM $cod_table_name WHERE rating_id = $dlid ");
					$DSSs = intval($DSSs);
					if($dlid>0 && $DSSs>0)
					{
						$var =$wpdb->query( $wpdb->prepare( "DELETE FROM $cod_table_name WHERE rating_id = %d ", $dlid));
					}
					
				}
				if($var && $dele==0)
				echo '<div class="updated" id="message"><p> <strong>'.__('Vote deleted','codeins-post-voting').'</strong>.</p></div>';
			}
		}
		if(isset($_GET['settings-updated']) && $_GET['settings-updated']== true )echo $update_ture;
		else if(isset($_GET['settings-updated']) && $_GET['settings-updated']== false )echo $update_false; 
		?>    
    	<div>
        	<div class="filterbar">
            	<form method="get" action="admin.php" style="float:left;" >
            	<span style="float:left; font-weight:bold; line-height:2.2; margin-right:10px;">Filter result by :</span> 
                <input type="hidden" name="page" value="cm-post-stats" />
                <input type="hidden" name="filterdata" value="true" />
                <label style="margin-right:10px;"> Starting date <input type="text" name="startdate" class="ce_the_date textinput"  /></label>
                <label style="margin-right:10px;"> Ending date <input type="text" name="enddate" class=" ce_the_date textinput" /></label>
                <input type="submit" value="Filter" class="button button-secondary" style="margin-right:10px;" /> 
                <a role="button" class="button button-secondary" style="margin-right:10px;" href="admin.php?page=cm-post-stats" > Unfilter</a>
                </form>
                
            </div>
            <div class="datacon_area">
            	<div class="auserdata_con">
                	<div class="user_table_cc">
                	<table class="com_table">
                    	<thead>
                        	<tr>  <th>user name</th>  <th>user login</th>  <th>vote count</th> </tr>
                        </thead>
                        <tbody>
                        <?php 
							$Allusers=get_users('orderby=ID');
							
							$voteTables='';
							$ssk=0;
							$ssk1=0;
							foreach($Allusers as $aUser)
							{	
								$qraayy="";
								if(isset($_GET['startdate'])  && isset($_GET['enddate']) )
								{
									$startDate=date("Y-m-j", strtotime(sanitize_text_field($_GET['startdate'])));
									$endDate=date("Y-m-j", strtotime(sanitize_text_field($_GET['enddate'])));
									$qraayy="AND rating_timestamp >= '$startDate' AND rating_timestamp <= '$endDate'";
									
								}

								$qrrry= "SELECT COUNT( * ) FROM `$cod_table_name` WHERE `rating_userid` =$aUser->ID  $qraayy";
								
								$votecount = $wpdb->get_var($qrrry);
								
								if($ssk1==0 && $votecount>0)
								{
									$thetrd=' selected';
									$ssk1++;
								}
								else
								{
									$thetrd='';
								}
								
								echo'<tr id="'.$aUser->ID.'" class="teble_changer'.$thetrd.'" >
										<td> ' .$aUser->display_name. ' </td> <td> ' .$aUser->user_login. ' </td> <td> '.$votecount.' </td>
									</tr>';
									
								$qrrry1= "SELECT *
								FROM $cod_table_name
								WHERE rating_userid = $aUser->ID
								$qraayy 
								ORDER BY rating_postid DESC";
								
											//rating_id, rating_rating , rating_post_title, rating_timestamp, rating_ip
								$thevotes_posts = $wpdb->get_results($qrrry1);	
								if($thevotes_posts)
								{	
									$disply = ($ssk==0)?'style="display:block;"':'';
									$ssk++;
									$voteTables.='<div class="single_tbabl_contnt" id="'.$aUser->ID.'" '.$disply.' >
													<form method="post" class="subitdeletefrom" id="deleteselevet">
													<input type="hidden" name="deletesel" value="1" />
													<table class="com_post_table" id="theTable_'.$aUser->ID.'">
														<thead>
															<tr>  
																<th><input type="checkbox" class="checkall"  name="checkall" id="'.$aUser->ID.'" /></th>
																<th> Post title </th> 
																<th> Vote value</th> 
																<th> Date time </th>
																<th> User IP </th>  
																<th> Delete </th> 
															</tr>
														</thead>
														<tbody>';
									
									foreach($thevotes_posts as $aVote)
									{
											
											//$complete_url = wp_nonce_url( $bare_url, 'delete-vote_'.$aVote->rating_id );
											$voteTables.='<tr>
												<td><input type="checkbox" class="postcheck" id="'.$aUser->ID.'" name="retingids[]" value="'.$aVote->rating_id.'" />  </td>
												<td> '.get_the_title($aVote->rating_postid).'</td> 
												<td>'.$aVote->rating_rating.' </td>
												<td> '.date("F j, Y, g:i A", strtotime($aVote->rating_timestamp)).'</td>
												<td> '.$aVote->rating_ip .'</td>  
												<td> <a class="button button-secondary" id="deletesinglevote" href="admin.php?page=cm-post-stats&deletvote='.$aVote->rating_id.'" style="margin-right:10px;"> Delete </a> </td> 
											</tr>';	
									}
									
									$voteTables.=' </tbody>
												</table>
													<input type="submit" class="button button-secondary" id="deleteselevet" style="margin-right:10px; margin-top:10px; float:right;" value="Delete selected votes" /> 
												</form>
												</div>';
									
									
								}
								else
								{
									$voteTables.='<div class="single_tbabl_contnt" id="'.$aUser->ID.'">
													<table class="com_post_table1" id="theTable_'.$aUser->ID.'">
														 <tr><td> Table have no data</td></tr>
													</table>
												</div>
												';
								}
								
							}
						?>
                        	
                            
                        </tbody>
                    </table>
                    </div>
                </div>
       
       				<script>
					
					jQuery(document).ready( function () {
						
						
						
						
						jQuery('.ce_the_date').datepicker({
									dateFormat : 'dd MM yy'
								});
								jQuery(document).on("click", "#deletesinglevote", function(e){
								var con = confirm("Are you sure you want to delete this vote  ?");
								if(!con)
								{
									e.preventDefault();
									e.stopPropagation();
								}
								
							});
							jQuery(document).on("submit", "#deleteselevet", function(e){
								var con = confirm("Are you sure you want to delete selected vote  ?");
								if(!con)
								{
									e.preventDefault();
									e.stopPropagation();
								}
								
							});
							jQuery(document).on("change", ".checkall", function(e){
								var tid=jQuery(this).attr("id");
								if(this.checked)
								{
									jQuery("#"+tid+".postcheck").each(function(index, element) {
										this.checked = true;
									});
								}
								else
								{
									jQuery("#"+tid+".postcheck").each(function(index, element) {
										this.checked = false;
									});
								}								
							});
							jQuery(document).on("click", ".teble_changer",function(){
								
								var that=jQuery(this);
								var tabid= that.attr("id");
								jQuery(".teble_changer").removeClass("selected");
								that.addClass("selected");
								
								jQuery(".single_tbabl_contnt").hide();
								jQuery("#"+tabid+".single_tbabl_contnt").show();
								
							});
							
  							var table = jQuery('.com_post_table').dataTable( {
                                                        "bPaginate": false,
                                                        "bLengthChange": true,
                                                        "bFilter": true,
                                                        "bSort": true,
                                                        "bInfo": false,
                                                        "bAutoWidth": false
                                                    } );
													
							var table1 = jQuery('.com_table').dataTable( {
                                                        "bPaginate": false,
                                                        "bLengthChange": true,
                                                        "bFilter": true,
                                                        "bSort": true,
                                                        "bInfo": false,
                                                        "bAutoWidth": false
                                                    } );
								
							
							
					
					} );
					
					
					</script>
                  
               	<div  class="apostdata_con">
					<?php echo $voteTables ;?>
                </div>
                
            </div>
        
        </div>
        
   

    </div>
    
    <?php
?>
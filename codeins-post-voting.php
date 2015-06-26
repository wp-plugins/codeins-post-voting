<?php
/**
 * Plugin Name: Codeins Post Voting
 * Plugin URI: http://www.codeins.org/
 * Description: Codeins Post Voting bar can be used to show how hot or cool your post is. Every post is shown with the hot cool bar and registered user can vote for hot or cool. if user is not registered it will open a popup if a user want to login or register.
 * Version: 1.0
 * Author: Codeins
 * Author URI: http://www.codeins.org/
 * Text Domain: codeins-post-voting
 */



add_action( 'admin_menu', 'register_codeins_menu_page' );

function register_codeins_menu_page(){

    $page1 = add_menu_page( 'Codeins Post Rating', 'Post Rating', 'manage_options', 'codeinspostrating', 'codeins_voting_manage_option');
    $page4 = add_submenu_page( 'codeinspostrating', 'Generl Settings', 'Generl Settings', 'manage_options', 'codeinspostrating', 'codeins_voting_manage_option' );
	$page2 = add_submenu_page( 'codeinspostrating', 'codeins post & user stats ', 'Post stats', 'manage_options', 'cm-post-stats', 'codeins_urser_post_stats' );
	$page3 = add_submenu_page( 'codeinspostrating', 'codeins user management ', 'User Management', 'manage_options', 'cm-user-management', 'codeins_urser_management' );
	
	wp_register_style( 'comod-custom-admin-style', plugins_url( '/css/post-hot-cool-admin.css' , __FILE__ ), array(), '1.0', 'all');
	
	add_action( 'admin_print_styles-' . $page1, 'codeins_page_1_style_scripts' );
	add_action( 'admin_print_styles-' . $page2, 'codeins_page_2_style_scripts' );
	add_action( 'admin_print_styles-' . $page3, 'codeins_page_3_style_scripts' );
	
}
add_action( 'admin_init', 'codeins_register_mysettings' );
function codeins_page_1_style_scripts(){
	wp_enqueue_style( 'comod-custom-admin-style' );
	wp_enqueue_script('wp-color-picker');
    wp_enqueue_style( 'wp-color-picker' );
}

function codeins_page_2_style_scripts(){
	wp_enqueue_style( 'comod-custom-admin-style' );
	wp_enqueue_script('comd1_admin_script', plugins_url( '/js/jquery.dataTables.min.js' , __FILE__ ), array('jquery'));
	wp_enqueue_script('jquery-ui-datepicker');
	wp_enqueue_style('jquery-ui-theme', plugins_url('/css/jquery-ui-theme.css', __FILE__));
}

function codeins_page_3_style_scripts(){
	wp_enqueue_style( 'comod-custom-admin-style' );
	wp_enqueue_script('comd1_admin_script', plugins_url( '/js/jquery.dataTables.min.js' , __FILE__ ), array('jquery'));
	
}

function codeins__install()
{
	global $wpdb;
	$prfx = $wpdb->prefix;
	$cod_table_name=$prfx.'codeins_post_voting';
	
	$charset_collate = '';
	if( $wpdb->has_cap( 'collation' ) ) {
		if(!empty($wpdb->charset)) {
			$charset_collate = "DEFAULT CHARACTER SET $wpdb->charset";
		}
		if(!empty($wpdb->collate)) {
			$charset_collate .= " COLLATE $wpdb->collate";
		}
	}
	
	$create_ratinglogs_sql = "CREATE TABLE $cod_table_name (".
			"`rating_id` int(11) NOT NULL AUTO_INCREMENT,
  			`rating_postid` int(11) NOT NULL,
  		    `rating_rating` int(11) NOT NULL ,
			`rating_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
		    `rating_ip` varchar(40) NOT NULL,
		    `rating_username` varchar(50) NOT NULL,
			`rating_userlogin` varchar(50) NOT NULL,
			`rating_userid` int(10) NOT NULL DEFAULT '0',".
			"PRIMARY KEY (rating_id)) $charset_collate;";
	
	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
  	dbDelta( $create_ratinglogs_sql );
 
 	$vote_value='#comment start with # 
#####################################
#   vote value based on previous value         #
#####################################

< 50 votes = 1
50 - 99 votes = 2
100 - 199 votes = 3
200 - 299 votes = 5
300 - 399 votes = 6
400 - 499 votes = 7
500 - 599 votes = 8
600 - 699 votes = 9
700 - 799 votes = 10
800 - 899 votes = 11
900 - 999 votes = 12
1000 - 1099 votes = 13
>1100 votes = 14 ';

}

register_activation_hook(__FILE__,'codeins__install');

// WordPress function to register a function in this plugin that should be called when it is deactivated

register_deactivation_hook(__FILE__, 'codeins__deactivate');

function codeins__deactivate()
{
/*
delete_option('comd_bar_on_off');
delete_option('comd_bar_width');
delete_option('comd_bar_width_type');
delete_option('comd_bar_vertical_align');
delete_option('comd_bar_horizontal_align');
delete_option('comd_hot_color');
delete_option('comd_cold_color');
delete_option('comd_backgroud_color');
delete_option('comd_bar_border_size');
delete_option('comd_bar_border_type');
delete_option('comdal_bar_border_color');
delete_option('comd_bar_font_name');
delete_option('comd_bar_font_size');
delete_option('comd_bar_cold_limit');
delete_option('comd_bar_hot_limit');
delete_option('comd_user_vote_vlaue');

delete_option('comd_auto_insert_to_post');
$catogry_ids=array(1,2,3,4,5);
$catagorydata=serialize($catogry_ids);
delete_option('comd_insert_post_catogracy_id');

delete_option('comd_auto_insert_to_pages');
$pages_ids=array(1,2,3,4,5);
$pagesopdata=serialize($pages_ids);
delete_option('comd_auto_insert_to_pages_ids');

delete_option('comd_widget_post_limit'); 

*/
}

function codeins_register_mysettings(){
	$vote_value='#comment start with # 
#####################################
#   vote value based on previous value         #
#####################################

< 50 votes = 1
50 - 99 votes = 2
100 - 199 votes = 3
200 - 299 votes = 5
300 - 399 votes = 6
400 - 499 votes = 7
500 - 599 votes = 8
600 - 699 votes = 9
700 - 799 votes = 10
800 - 899 votes = 11
900 - 999 votes = 12
1000 - 1099 votes = 13
>1100 votes = 14 ';
$font="Arial, Helvetica, sans-serif";
add_option('comd_bar_on_off','1');
add_option('comd_bar_width','100');
add_option('comd_bar_width_type','%');
add_option('comd_inside_bar_width','80');
add_option('comd_inside_bar_width_type','%');
add_option('comd_bar_vertical_align','top');
add_option('comd_bar_horizontal_align','center');
add_option('comd_hot_color','#ff0000');
add_option('comd_cold_color','#8585ff');
add_option('comd_backgroud_color','#ffffff');
add_option('comd_bar_border_size','1');
add_option('comd_bar_border_type','solid');
add_option('comdal_bar_border_color','#444444');
add_option('comd_bar_font_name',$font);
add_option('comd_bar_font_size','14');
add_option('comd_bar_cold_limit','100');
add_option('comd_bar_hot_limit','100');
add_option('comd_user_vote_vlaue',$vote_value);

add_option('comd_auto_insert_to_post','0');
$catogry_ids=array();
$catagorydata=serialize($catogry_ids);
add_option('comd_insert_post_catogracy_id',$catagorydata);

add_option('comd_auto_insert_to_pages','0');
$pages_ids=array();
$pagesopdata=serialize($pages_ids);
add_option('comd_auto_insert_to_pages_ids',$pagesopdata);

add_option('comd_widget_post_limit','5');

	register_setting( 'codeinsp-settings-group', 'comd_bar_on_off' );
	register_setting( 'codeinsp-settings-group', 'comd_bar_width' );
	register_setting( 'codeinsp-settings-group', 'comd_bar_width_type' );
	register_setting( 'codeinsp-settings-group', 'comd_inside_bar_width' );
	register_setting( 'codeinsp-settings-group', 'comd_inside_bar_width_type' );
	register_setting( 'codeinsp-settings-group', 'comd_bar_vertical_align' );
	register_setting( 'codeinsp-settings-group', 'comd_bar_horizontal_align' );
	register_setting( 'codeinsp-settings-group', 'comd_hot_color' );
	register_setting( 'codeinsp-settings-group', 'comd_cold_color' );
	register_setting( 'codeinsp-settings-group', 'comd_backgroud_color' );
	register_setting( 'codeinsp-settings-group', 'comd_bar_border_size' );
	register_setting( 'codeinsp-settings-group', 'comd_bar_border_type' );
	register_setting( 'codeinsp-settings-group', 'comdal_bar_border_color' );
	register_setting( 'codeinsp-settings-group', 'comd_bar_font_name' );
	register_setting( 'codeinsp-settings-group', 'comd_bar_font_size' );
	register_setting( 'codeinsp-settings-group', 'comd_bar_cold_limit' );
	register_setting( 'codeinsp-settings-group', 'comd_bar_hot_limit' );
	register_setting( 'codeinsp-settings-group', 'comd_user_vote_vlaue' );
	register_setting( 'codeinsp-settings-group', 'comd_auto_insert_to_post' );
	register_setting( 'codeinsp-settings-group', 'comd_insert_post_catogracy_id' );
	register_setting( 'codeinsp-settings-group', 'comd_auto_insert_to_pages' );
	register_setting( 'codeinsp-settings-group', 'comd_auto_insert_to_pages_ids' );
	register_setting( 'codeinsp-settings-group', 'comd_widget_post_limit' );
		
}


function codeins_urser_post_stats()
{
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.','codeins-post-voting' ) );
	}
	require_once( WP_PLUGIN_DIR . '/codeins-post-voting/admin/post-stats.php' );
	
}

function codeins_urser_management(){
	
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.','codeins-post-voting' ) );
	}
	require_once( WP_PLUGIN_DIR . '/codeins-post-voting/admin/user-manage.php' );}

function codeins_voting_manage_option(){
    
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' , 'codeins-post-voting') );
	}
	require_once( WP_PLUGIN_DIR . '/codeins-post-voting/admin/options-setting.php' );
	
}


function codeins_init()
{
	require_once( WP_PLUGIN_DIR . '/codeins-post-voting/include/hot-cold-widget.php' );

	$name = dirname(plugin_basename(__FILE__));
		//Language Setup
	load_plugin_textdomain('codeins-post-voting', false, "$name/I18n/");
			
	$is_login = is_user_logged_in();
	
}
add_action('init','codeins_init');

add_action('wp_footer','codeins_login_footer_form');

function codeins_login_footer_form() {
		if(! is_user_logged_in())
		{
		$loginForm    = codeins_login_form();
		$registerForm = codeins_registration_form();
		$lostPassword = codeins_reset_form();
		//<!--<div role="button" id="c_comdal_close">X</div>
		echo '<div id="c_comdal-simple-model" class="c_comdal-simple-model" style="display:none;"><div class="c_comdal_contnr_outer">
		
		
			<div class="c_comdal-form-container">
				<div class="c_comdal-form-buttcon">
					<div id="c_comdal-formbt-login" class="c_comdal-formbutton clickerd_conteiner_comda">Login</div>
					<div id="c_comdal-formbt-register" class="c_comdal-formbutton">Register</div>
					<div id="c_comdal-formbt-forgot" class="c_comdal-formbutton">Forgot ?</div>
				</div>
				<div class="c_comdal-form-datacon">
					<div id="c_comdal-formdata-login" class="c_comdal-formdata" style="display:block;" >'. $loginForm .'</div>
					<div id="c_comdal-formdata-register" class="c_comdal-formdata" style="display:none;">'.$registerForm.'</div>
					<div id="c_comdal-formdata-forgot" class="c_comdal-formdata" style="display:none;">'.$lostPassword.'</div>
				</div>
			</div>
		</div></div>';
		
		}
}

function codeins_add_styles()  
{ 
  // Register the style like this for a theme:  
  // (First the unique name for the style (custom-style) then the src, 
  // then dependencies and ver no. and media type)
  	wp_register_style('codeins-custom-style', plugins_url( '/css/post-hot-cool.css' , __FILE__ ) );
	

  // enqueing:
  	wp_enqueue_style( 'codeins-custom-style' );
	
	
  	wp_enqueue_script('codeins_1_visitor_script', plugins_url( '/js/widdgitdata.js' , __FILE__ ), array('jquery'));
	
	if(!is_user_logged_in()){
		
		wp_enqueue_script('codeins_2_visitor_script2', plugins_url( '/js/psot-hot-cool-visitor.js' , __FILE__ ), array('jquery'));
	}
	else{
	wp_enqueue_script('codeins_1_admin_script', plugins_url( '/js/post-hot-cool.js' , __FILE__ ), array('jquery'));
      
	wp_localize_script( 'codeins_1_admin_script', 'ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' )));
		
	
	}
	
	
}


add_action('wp_enqueue_scripts', 'codeins_add_styles');


function codeins_get_client_ip() {
    $ipaddress = '';
    if ($_SERVER['HTTP_CLIENT_IP'])
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if($_SERVER['HTTP_X_FORWARDED_FOR'])
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if($_SERVER['HTTP_X_FORWARDED'])
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if($_SERVER['HTTP_FORWARDED_FOR'])
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if($_SERVER['HTTP_FORWARDED'])
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if($_SERVER['REMOTE_ADDR'])
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

add_action('wp_ajax_codeins_vote_action', 'codeins_vote_action_callback' );
function codeins_vote_action_callback() {
		
	
	global $wpdb;
	$prfx = $wpdb->prefix;
	$cod_table_name=$prfx.'codeins_post_voting';
	
	$user_id = get_current_user_id();
	$current_user = wp_get_current_user();
	$crr_username = $current_user->display_name;
	$crr_userlogin = $current_user->user_login;
	$nowusvtsql = "SELECT rating_id FROM $cod_table_name WHERE rating_postid = $the_id AND rating_userid = $user_id";
	$corent_user_vote_onpost_id = $wpdb->get_var($nowusvtsql);
	$voted_t_f=($corent_user_vote_onpost_id && $corent_user_vote_onpost_id>0)?1:0;
	
	$user_vote_vaue = codeins_get_user_vote_value();
	
	$the_postiiisd    =  intval( $_POST['post_id'] );
	$the_button_type  =  sanitize_text_field($_POST['vote_typ']);
	$the_post_titelss =  get_the_title($the_postiiisd);
	$the_user_ip      =  codeins_get_client_ip();
	
	if($voted_t_f==0 && $the_postiiisd>0 && $user_id > 0)
	{
		if($the_button_type=='cold')
		$user_vote_vaue =-$user_vote_vaue;
		
		$wpdb->insert( 
						$cod_table_name, 
						array( 
							'rating_postid' => $the_postiiisd, 
							'rating_rating' => $user_vote_vaue, 
							'rating_ip' => $the_user_ip,
							'rating_username' => $crr_username,
							'rating_userlogin' => $crr_userlogin,
							'rating_userid' => $user_id
							
						), 
							array( '%d', '%s', '%d', '%s', '%s', '%s', '%d'
						) 
					);
		
		echo $wpdb->insert_id;
	}
	else
	{
		echo false;
	}
	/*
	$votevalstr=get_option('comd_user_vote_vlaue');
	$nowusvtsql1 = "SELECT COUNT(*) FROM $cod_table_name WHERE AND rating_userid = $user_id";
	$corent_user_vote_onallpost = $wpdb->get_var($nowusvtsql1);
	*/
	
	die();
}






function codeins_add_vote_content($data='')
{


//get_option('comd_bar_vertical_align');
//get_option('comd_bar_horizontal_align');

//get_option('comd_auto_insert_to_post');
//get_option('comd_insert_post_catogracy_id');

//get_option('comd_auto_insert_to_pages');
//get_option('comd_auto_insert_to_pages_ids');

/*
	$nowusvtsql1 = "SELECT sum(rating_rating) FROM $cod_table_name WHERE AND rating_userid = $user_id";
	$corent_user_vote_onallpost = $wpdb->get_var($nowusvtsql1);
	
	$corent_user_vote_onpost=abs($corent_user_vote_onpost);
*/


if(get_option('comd_bar_on_off') )
{	
	ob_start();
		the_ID();
	$the_id=ob_get_clean();
	
	
	global $wpdb;
	$prfx = $wpdb->prefix;
	$cod_table_name=$prfx.'codeins_post_voting';
	
	//$qrrry= "SELECT * FROM $cod_table_name rating_postid DESC"; 
	//$thevotes = $wpdb->get_results($qrrry);
				 
	$sqlgetsum="SELECT sum(rating_rating) FROM $cod_table_name WHERE rating_postid = $the_id";
	$vatevalue= $wpdb->get_var($sqlgetsum);
	
	$user_id = get_current_user_id();
	$nowusvtsql = "SELECT rating_id FROM $cod_table_name WHERE rating_postid = $the_id AND rating_userid = $user_id";
	$corent_user_vote_onpost_id = $wpdb->get_var($nowusvtsql);
	
	$voted_t_f=($corent_user_vote_onpost_id && $corent_user_vote_onpost_id>0)?1:0;
	$voted_class=($voted_t_f)?'cls_voted':'';
	$user_totel_vote = codeins_get_user_votes();
	
	$user_vote_vaue = codeins_get_user_vote_value();
	
	$absvoteval=abs($vatevalue);
	$hot_coolclass=($vatevalue<0)?'c_inbar_process_cool':'c_inbar_process_hot';
	
	if(is_page() && get_option('comd_auto_insert_to_pages_ids'))
	{
		$thectagrids = explode(',',get_option('comd_auto_insert_to_pages_ids'));
		$catgris = get_the_category($the_id);
		$thectagrids1=array();
		$uudh='';
		$flage= false;
		
		if(in_array($the_id, $thectagrids))
		{
				$flage = true;
		}
		
		if(!$flage)
		return '';
			
	}

	if(get_option('comd_auto_insert_to_post') && !is_page())
	{
		$thectagrids = explode(',',get_option('comd_insert_post_catogracy_id'));
		$catgris = get_the_category($the_id);
		$flage= false;
		foreach($catgris as $caty)
		{
			if(in_array($caty->cat_ID, $thectagrids))
			{
				$flage = true;
				break;
			}
		}
		if(!$flage)
		return '';
		
	}
	
	if($vatevalue<0)
	{	
		if($absvoteval>get_option('comd_bar_cold_limit'))
		$absvoteval=get_option('comd_bar_cold_limit');
		
		$right_hot_cool_icon='<div class="baar_icon_img c_inbar_image_cold"></div>';
		$valcon_show='<div class="c_inbar_counter" style="font:bold '.get_option('comd_bar_font_size').'px '.get_option('comd_bar_font_name').'; color:'.get_option('comd_cold_color').'" >-'.$absvoteval.'°</div>';
		$hot_cold_processs_bar = '<div role="progressbar" class="c_inbar_process c_inbar_process_cool" style="background-color:'.get_option('comd_cold_color').';  width:'.$absvoteval.'%"  ></div>' ;
		
		if($voted_t_f)
			$bt_cold_backg='cls_voted';
		else
			$bt_cold_backg='';
			$hclv='cold';

	}
	else if($vatevalue>0)
	{	
		if($absvoteval>get_option('comd_bar_hot_limit'))
		$absvoteval=get_option('comd_bar_hot_limit');
		
		$right_hot_cool_icon='<div class="baar_icon_img c_inbar_image_hot"></div>';
		$valcon_show ='<div class="c_inbar_counter" style="font:bold '.get_option('comd_bar_font_size').'px '.get_option('comd_bar_font_name').'; color:'.get_option('comd_hot_color').';" >'.$absvoteval.'°</div>';
		$hot_cold_processs_bar = '<div role="progressbar" class="c_inbar_process c_inbar_process_hot" style="background-color:'.get_option('comd_hot_color').';  width:'.$absvoteval.'%"  ></div>' ;
		
		
		if($voted_t_f)
		$bt_hot_backg = 'cls_voted';
		else
		$bt_hot_backg = '';
		$hclv='hot';
	}
	else
	{
		$right_hot_cool_icon='<div class="baar_icon_img"></div>';
		$hot_cold_bgcolor='';
		$hot_cold_processs_bar='<div role="progressbar" class="c_inbar_process c_inbar_process_normal" style="background-color:#444; width:0%"  ></div>';
		$valcon_show='<div class="c_inbar_counter" style="font:bold '.get_option('comd_bar_font_size').'px '.get_option('comd_bar_font_name').';" >'.$absvoteval.'°</div>';
		$hclv='none';
	}
	
	$sortwidth = (!is_single())?'; max-width:305px;':'';
	$sortwidthinb = (!is_single())?'; max-width:173px;':'';
	if(is_page()){ $sortwidth=''; $sortwidthinb=''; }
	
	
	$hotcool_image_path = plugins_url('/css/fixed-icons.png', __FILE__);
	
	$content = '<div style="clear:both;"></div>
		<div style="width:100%;" align="'.get_option('comd_bar_horizontal_align').'">
	<div id="hot_cool_cont" class="c_hot_cool_cont" style="border:'.get_option('comd_bar_border_size').'px '. get_option('comd_bar_border_type').' '.get_option('comdal_bar_border_color').'; background-color:'.get_option('comd_backgroud_color').'; width:'.get_option('comd_bar_width').get_option('comd_bar_width_type').$sortwidth.'"> 
		

		<div id="'.$the_id.'" role="button" id="comdal_psvt_bt_cool" class="postbthotcool post_bt_cool  '.$voted_class.'" style=" background-image:url('.$hotcool_image_path .');background-color:'.get_option('comd_cold_color').'" ></div>
		<div id="'.$the_id.'" role="button" id="comdal_psvt_bt_hot" class="postbthotcool post_bt_hot  '.$voted_class.'" style="background-image:url('.$hotcool_image_path .');background-color:'.get_option('comd_hot_color').'" ></div>
		<div class="postdataconts"><input type="hidden" class="thepostdata" varval="'.$absvoteval.'" votevalue="'.$user_vote_vaue.'" hotcold="'.$hclv.'" voted="'.$voted_t_f.'" votedid="'.$corent_user_vote_onpost_id.'" totalvote="'.$user_totel_vote.'" hotcolor="'.get_option('comd_hot_color').'" coldcolor="'.get_option('comd_cold_color').'" norcolor="#8F8F8F" /></div>
		<div class="c_hot_cool_bar" style="'.$sortwidthinb.' width:'.get_option('comd_inside_bar_width').get_option('comd_inside_bar_width_type').'">
			'.$hot_cold_processs_bar.'
			<div class="c_inbar_spacl_look" style="background-image:url('.$hotcool_image_path .')"></div>
		</div>
		'.$valcon_show.'
		'.$right_hot_cool_icon.'
		
	</div>
	</div>
	<div style="clear:both;"></div>';
	
	return $content.$data;
}
	return $data;
}
add_filter( 'the_content', 'codeins_add_vote_content');



function codeins_wp_trim_excerpt($text) {
$raw_excerpt = $text;
if ( '' == $text ) {
    //Retrieve the post content. 
    $text = get_the_content('');
 
    //Delete all shortcode tags from the content. 
    $text = strip_shortcodes( $text );
 
    $text = apply_filters('the_content', $text);
    $text = str_replace(']]>', ']]&gt;', $text);
    $text = preg_replace('@<script[^>]*?>.*?</script>@si', '', $text);

    $allowed_tags = ''; /*** MODIFY THIS. Add the allowed HTML tags separated by a comma.***/
    $text = strip_tags($text, $allowed_tags);
     
    $excerpt_word_count = 55; /*** MODIFY THIS. change the excerpt word count to any integer you like.***/
    $excerpt_length = apply_filters('excerpt_length', $excerpt_word_count); 
     
    $excerpt_end = '... '; /*** MODIFY THIS. change the excerpt endind to something else.***/
    $excerpt_more = apply_filters('excerpt_more', ' ' . $excerpt_end);
     
    $words = preg_split("/[\n\r\t ]+/", $text, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY);
    if ( count($words) > $excerpt_length ) {
        array_pop($words);
        $text = implode(' ', $words);
        $text = $text . $excerpt_more;
    } else {
        $text = implode(' ', $words);
    }
}
$excerpt = apply_filters('wp_trim_excerpt', $text, $raw_excerpt);
$newexcerpt1= preg_split("/[°]+/",$excerpt);
return codeins_add_vote_content().$newexcerpt1[1];
}

remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'codeins_wp_trim_excerpt');






function codeins_get_user_votes()
{
			global $wpdb;
			$prfx = $wpdb->prefix;
			$cod_table_name=$prfx.'codeins_post_voting';
			
			$user_id = get_current_user_id();
			
			$nowusvtsql1 = "SELECT COUNT(*) FROM $cod_table_name WHERE rating_userid = $user_id";
			$corent_user_vote_onallpost = (int) $wpdb->get_var($nowusvtsql1);
			return $corent_user_vote_onallpost;
}

function codeins_get_user_vote_value(){
	
			$uservtstr2_0 = get_user_meta(get_current_user_id(), 'comd_user_vote_vlaue' , true); 
			$input = ($uservtstr2_0)? $uservtstr2_0 : get_option('comd_user_vote_vlaue') ;
			 
			$uservotes = codeins_get_user_votes();
			 
			//I dont check for empty() incase your app allows a 0 as ID.
			if (strlen($input)==0) {
			  return 0;
			}
			$search = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','#');
			$input =  str_replace($search , "", $input);
			
			$ids = explode("\n", str_replace("\r", "", $input));
			
			foreach($ids as $key => $data )
			{
					$data1 = explode("=", $data);
					
				
					if(substr($data, 0 , 1)=='<')
					{
						
						$lovest_velue = (int) preg_replace("/[^0-9]/","",$data1[0]);
						if($uservotes < $lovest_velue )
						{	return $data1[1];
						}
					}
					else if (strpos($data1[0], '-') !== false)
					{
						$data12=explode("-", $data1[0]);
						if($uservotes >= $data12[0] && $uservotes <= $data12[1])
						return $data1[1];
					}
					else if(substr($data, 0 , 1)=='>'){
						$getetest = preg_replace("/[^0-9]/","",$data1[0]);
						if($getetest <= $uservotes)
							return $data1[1];
					}
					
			}

	if(is_user_logged_in())
	return 1;
	else
	return 0;
}




/**
		 * @desc loginout filter that adds the simplemodal-login class to the "Log In" link
		 * @return string
		 */
		function codeins_login_loginout($link) {
			if (!is_user_logged_in()) {
				$link = str_replace('href=', 'class="simplemodal-login" href=', $link);
			}
			return $link;
		}
		
		function codeins_login_redirect($redirect_to, $req_redirect_to, $user) {
			if (!is_user_logged_in()) {
				return $redirect_to;
			}
			if (function_exists('redirect_to_front_page')) {
				$redirect_to = redirect_to_front_page($redirect_to, $req_redirect_to, $user);
			}
			echo "<div id='simplemodal-login-redirect'>$redirect_to</div>";
			exit();
		}
		
		function codeins_register($link) {
				if (!is_user_logged_in()) {
					$link = str_replace('href=', 'class="simplemodal-register" href=', $link);
				}
			return $link;
		}
/**
		 * @desc Builds the login form HTML.
		 * If using the simplemodal_login_form filter, copy and modify this code
		 * into your function.
		 * @return string
		 */
function codeins_get_current_logout( $logout_url ){
  if ( !is_admin() ) {
    $logout_url = add_query_arg('redirect_to', urlencode(( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']), $logout_url);
  }
 
  return $logout_url;
}
 
add_filter('logout_url', 'codeins_get_current_logout');

function codeins_page_now_voting($url)
{
	if ( !is_admin() ) {
 	$url= site_url();
	}
	return $url;
}

//add_filter('login_redirect', 'codeins_page_now_voting');
function codeins_login_form() {
	
			$output = sprintf('
	<form name="loginform" id="loginform" action="%s" method="post">
		<table class="form-table-codeins">
		<div class="simplemodal-login-fields">
		<tr>
			<td>
			<label class="inplbl">%s</label></td>
			<td><input type="text" name="log" class="user_login input" value="" size="20" tabindex="10" /></td>
		</tr>
		<tr>
			<td><label class="inplbl">%s</label></td>
			<td><input type="password" name="pwd" class="user_pass spcsl" value="" size="20" tabindex="20" /></td>
		</tr>',
				site_url('wp-login.php', 'login_post'),
				__('Username:', 'codeins-post-voting'),
				__('Password:', 'codeins-post-voting')
			);

			ob_start();
			do_action('login_form');
			$output .= ob_get_clean();

			$output .= sprintf('
		<tr><td colspan="2" style="text-align: left;"><div class="forgetmenot"><label><input name="rememberme" type="checkbox" id="rememberme" class="rememberme" value="forever" tabindex="90" /> %s</label></div></td></tr>
		<tr><td colspan="2"><div class="submit" align="center">
			<input type="submit" name="wp-submit" value="%s" class="the_comdal_button" tabindex="100" />
			<input type="hidden" name="testcookie" value="1" />
		</div>
		</tr></td>
		<tr><td colspan="2">
		<div class="nav">',
				__('Remember Me', 'codeins-post-voting'),
				__('Log In', 'codeins-post-voting')
				
			);

			
			$output .= '
			</div>
			</tr></td>
			</div>
			<div class="simplemodal-login-activity" style="display:none;"></div>
			</table>
		</form>';

			return $output;
		}

	/**
		 * @desc Builds the registration form HTML.
		 * If using the simplemodal_registration_form filter, copy and modify this code
		 * into your function.
		 * @return string
		 */
		function codeins_registration_form() {
			$output = sprintf('
<form name="registerform" id="registerform" action="%s" method="post">
	<div class="simplemodal-login-fields">
	<table class="form-table-codeins">
	<tr>
		<td><label class="inplbl">%s</label></td>
		<td><input type="text" name="user_login" class="user_login input" value="" size="20" tabindex="10" /></td>
	</tr>
	<tr>
		<td><label class="inplbl">%s</label></td>
		<td><input type="text" name="user_email" class="user_email input" value="" size="25" tabindex="20" /></td>
	</tr>
	',
				site_url('wp-login.php?action=register', 'login_post'),
				__('Username:', 'codeins-post-voting'),
				__('E-mail:', 'codeins-post-voting')
			);

			ob_start();
			do_action('register_form');
			$output .= ob_get_clean();

			$output .= sprintf('
	<tr>
			<td colspan="2" style="text-align:left;"><div class="reg_passmail">%s</div></td></tr>
	<tr>
			<td colspan="2">
	<div class="submit"  align="center">
		<input type="submit" name="wp-submit" value="%s" class="the_comdal_button" tabindex="100" />
	</div>
	</td></tr>
	<tr>
			<td colspan="2">
	<div class="nav">',
				__('A password will be e-mailed to you.', 'codeins-post-voting'),
				__('Register', 'codeins-post-voting')
				
			);

			

			$output .= '
	</div>
	</td></tr>
	</table>
	</div>
	<div class="simplemodal-login-activity" style="display:none;"></div>
	
</form>';

			return $output;
		}

		/**
		 * @desc Builds the reset password form HTML.
		 * If using the simplemodal_reset_form filter, copy and modify this code
		 * into your function.
		 * @return string
		 */
		function codeins_reset_form() {
			$output = sprintf('
	<form name="lostpasswordform" id="lostpasswordform" action="%s" method="post">
		<div class="title">%s</div>
		<div class="simplemodal-login-fields">
		<table class="form-table-codeins">
		<tr>
			<td><label>%s</label></td>
			<td> <input type="text" name="user_login" class="user_login input" value=""  style="width: 215px; margin-left: 10px;" size="20" tabindex="10" /></td>
		</tr>',
				site_url('wp-login.php?action=lostpassword', 'login_post'),
				__('Reset your Password', 'codeins-post-voting'),
				__('Username or<br> E-mail:', 'codeins-post-voting')
			);

			ob_start();
			do_action('lostpassword_form');
			$output .= ob_get_clean();

			$output .= sprintf('
		<tr><td colspan="2"><div class="submit" align="center">
			<input type="submit" name="wp-submit" value="%s" class="the_comdal_button" tabindex="100" />
		</div><td><tr>
		<tr><td colspan="2">
		<div class="nav">',
				__('Get New Password', 'codeins-post-voting')
				
			);
			$output .= '
		</div>
		</td>
		</tr>
		</table>
		</div>
		<div class="simplemodal-login-activity" style="display:none;"></div>
	</form>';

			return $output;
		}

?>
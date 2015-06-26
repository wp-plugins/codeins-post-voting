<?php
// Creating the widget 
class codeins_wpb_widget extends WP_Widget {

function __construct() {
parent::__construct(
// Base ID of your widget
'codeins_wpb_widget', 

// Widget name will appear in UI
__('Codeins Top Hot Cool Widget', 'codeins-post-voting'),

// Widget description
array( 'description' => __( 'Show Top Hot Cool Posts in Sidebar', 'codeins-post-voting' ), ) 
);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );
// before and after widget arguments are defined by themes


	global $wpdb;
	$prfx = $wpdb->prefix;
	$cod_table_name=$prfx.'codeins_post_voting';
	
	$postcount = ($instance['default_or_widget']==2)?$instance['hot_post_count']:get_option('comd_widget_post_limit');
	$sqlgetsum1="SELECT sum(rating_rating) as hotval, rating_postid FROM $cod_table_name  GROUP BY rating_postid HAVING  hotval  > 0 ORDER BY sum(rating_rating) DESC  LIMIT $postcount ";
	$the_widget_postsAll = $wpdb->get_results($sqlgetsum1);
	
	$sqlgetsum2="SELECT sum(rating_rating) as hotval, rating_postid FROM $cod_table_name WHERE rating_timestamp >= DATE_SUB(CURDATE(),INTERVAL 30 DAY)  GROUP BY rating_postid HAVING  hotval  > 0 ORDER BY sum(rating_rating) DESC  LIMIT $postcount ";
	$the_widget_postsMonth = $wpdb->get_results($sqlgetsum2);
	
	$sqlgetsum3="SELECT sum(rating_rating) as hotval, rating_postid FROM $cod_table_name WHERE rating_timestamp >= DATE_SUB(CURDATE(),INTERVAL 7 DAY)  GROUP BY rating_postid HAVING  hotval  > 0 ORDER BY sum(rating_rating) DESC  LIMIT $postcount ";
	$the_widget_postsWeek = $wpdb->get_results($sqlgetsum3);
	
	
	
	



echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] ?> <div style="background-color: rgb(216, 86, 0); width: 100%; text-align: center; color: rgb(255, 255, 255); height: 35px; line-height: 36px;"> <?php echo $title; ?> </div> 
		<div class="chngholdd">
        	<div id="clk_today" class="showchng sdselcted" > Today </div><span style="float:left;">|</span>
            <div id="clk_week" class="showchng" > Week </div><span style="float:left;">|</span>
    	    <div id="clk_month" class="showchng"> Month </div><span style="float:left;">|</span>
            <div id="clk_all" class="showchng "> All </div>
        </div>
        <div style="clear:both"></div>
		<?php echo $args['after_title'];
	
// This is where you run the code and display the output
?>
<div class="alldtwdgts">
    <div class="aldttxccnt" id="htcld_posts_all" >
        <?php 
            foreach($the_widget_postsAll as $aPost)
            {	
                $permalink = get_permalink( $aPost->rating_postid ); 
                echo '<div class="bartextdtdd">
                            <span class="thedigrricnt">'.$aPost->hotval.'°</span>
                            <a href="'.$permalink.'"> - '.get_the_title($aPost->rating_postid).' </a>
                        </div>';
            }
        ?>
     </div>
     <div class="aldttxccnt" id="htcld_posts_month">
        <?php 
            foreach($the_widget_postsMonth as $aPost)
            {	
                $permalink = get_permalink( $aPost->rating_postid ); 
                echo '<div class="bartextdtdd">
                            <span class="thedigrricnt">'.$aPost->hotval.'°</span>
                            <a href="'.$permalink.'"> - '.get_the_title($aPost->rating_postid).' </a>
                        </div>';
            }
        ?>
        
        
     </div>
     <div class="aldttxccnt" id="htcld_posts_week">
        <?php 
            foreach($the_widget_postsWeek as $aPost)
            {	
                $permalink = get_permalink( $aPost->rating_postid ); 
                echo '<div class="bartextdtdd">
                            <span class="thedigrricnt">'.$aPost->hotval.'°</span>
                            <a href="'.$permalink.'"> - '.get_the_title($aPost->rating_postid).' </a>
                        </div>';
            }
        ?>
    </div>
    <div class="aldttxccnt" id="htcld_posts_today" style="display:block;">
        <?php 
			$sqlgetsum4="SELECT sum(rating_rating) as hotval, rating_postid FROM $cod_table_name WHERE rating_timestamp >= DATE_SUB(CURDATE(),INTERVAL 1 DAY)  GROUP BY rating_postid HAVING  hotval  > 0 ORDER BY sum(rating_rating) DESC  LIMIT $postcount ";
	$the_widget_postsToday = $wpdb->get_results($sqlgetsum4);
	
            foreach($the_widget_postsToday as $TaPost)
            {	
                $permalink = get_permalink( $TaPost->rating_postid ); 
                echo '<div class="bartextdtdd">
                            <span class="thedigrricnt">'.$TaPost->hotval.'°</span>
                            <a href="'.$permalink.'"> - '.get_the_title($TaPost->rating_postid).' </a>
                        </div>';
            }
        ?>
     </div>
     		
 </div>
<?php
//echo __( 'Hello, World!', 'codeins-post-voting' );
echo $args['after_widget'];
}
		
// Widget Backend 
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
	$title = $instance[ 'title' ];
	
}
else {
$title = __( 'Top Hot Cool Posts', 'codeins-post-voting' );
}
if ( isset( $instance[ 'hot_post_count' ] ) ) {
	$hot_post_count = $instance[ 'hot_post_count' ];
	
}
else {
$hot_post_count = __( '5', 'codeins-post-voting' );
}
if ( isset( $instance[ 'default_or_widget' ] ) ) {
	$default_or_widget = $instance[ 'default_or_widget' ];
	
}
else {
$default_or_widget = __( '1', 'codeins-post-voting' );
}

// Widget admin form
?>
        <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
		
        <p>
		<label for="<?php echo $this->get_field_id( 'default_or_widget' ); ?>"><?php _e( 'Dispaly number of post from:' ); ?></label> 
        <div style="clear:both"></div>
		<input class="widefat" style="width:50px;" id="<?php echo $this->get_field_id( 'default_or_widget' ); ?>" name="<?php echo $this->get_field_name( 'default_or_widget' ); ?>" type="radio" value="1" <?php echo checked( '1', $default_or_widget ); ?>> <?php _e( 'Option page' ); ?>
        <input class="widefat" style="width:50px;" id="<?php echo $this->get_field_id( 'default_or_widget' ); ?>" name="<?php echo $this->get_field_name( 'default_or_widget' ); ?>" type="radio" value="2" <?php echo checked( '2', $default_or_widget ); ?>> <?php _e( 'This widget' ); ?>

		</p>
        
		<p>
		<label for="<?php echo $this->get_field_id( 'hot_post_count' ); ?>"><?php _e( 'Dispaly :' ); ?></label> 
		<input class="widefat" style="width:50px;" id="<?php echo $this->get_field_id( 'hot_post_count' ); ?>" name="<?php echo $this->get_field_name( 'hot_post_count' ); ?>" type="text" value="<?php echo esc_attr( $hot_post_count); ?>"><?php _e( 'post in widget' ); ?>
		</p>
        
		
<?php 
}
	
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
$instance['default_or_widget'] = ( ! empty( $new_instance['default_or_widget'] ) ) ? strip_tags( $new_instance['default_or_widget'] ) : 1;
$instance['hot_post_count'] = ( ! empty( $new_instance['hot_post_count'] ) ) ? strip_tags( $new_instance['hot_post_count'] ) : 0;

return $instance;
}
} // Class codeins_wpb_widget ends here

// Register and load the widget
function wpb_load_widget() {
	register_widget( 'codeins_wpb_widget' );
}
add_action( 'widgets_init', 'wpb_load_widget' );
?>
<?php add_filter( 'show_admin_bar', '__return_false' ); ?>
<?php
class CSS_Menu_Maker_Walker extends Walker {

  var $db_fields = array( 'parent' => 'menu_item_parent', 'id' => 'db_id' );
  
  function start_lvl( &$output, $depth = 0, $args = array() ) {
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<ul>\n";
  }
  
  function end_lvl( &$output, $depth = 0, $args = array() ) {
    $indent = str_repeat("\t", $depth);
    $output .= "$indent</ul>\n";
  }
  
  function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
  
    global $wp_query;
    $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
    $class_names = $value = ''; 
    $classes = empty( $item->classes ) ? array() : (array) $item->classes;
    
    /* Add active class */
    if(in_array('current-menu-item', $classes)) {
      $classes[] = 'active';
      unset($classes['current-menu-item']);
    }
    
    /* Check for children */
    $children = get_posts(array('post_type' => 'nav_menu_item', 'nopaging' => true, 'numberposts' => 1, 'meta_key' => '_menu_item_menu_item_parent', 'meta_value' => $item->ID));
    if (!empty($children)) {
      $classes[] = 'has-sub';
    }
    
    $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
    $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
    
    $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
    $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
    
    $output .= $indent . '<li' . $id . $value . $class_names .'>';
    
    $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
    $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
    $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
    $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
    
    $item_output = $args->before;
    $item_output .= '<a'. $attributes .'>';
    $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
    $item_output .= '</a>';
    $item_output .= $args->after;
    
    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
  }
  
  function end_el( &$output, $item, $depth = 0, $args = array() ) {
    $output .= "</li>\n";
  }
}
?>
<?php
//Load Custom Post Type Members
include_once('functions/custom-post-type-members.php');
?>
<?php
//New thumbnail size for member search
if ( function_exists( 'add_image_size' ) ) { 
	add_image_size( 'member-thumb', 150, 9999 ); //150 pixels wide (and unlimited height)
}
?>
<?php
//Register Menus
function register_my_menus() {
  register_nav_menus(
    array(
    'footer-menu' => __( 'Footer Navigation Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );
?>
<?php
	//Home Sidebar - Ad Widget
     if(function_exists('register_sidebar'))
          register_sidebar(array(
          'name' => 'Home Sidebar - 1 Ad w/o Title', // The sidebar name to register
          'before_widget' => '<div class="widget ad-single-home">',
          'after_widget' => '</div>',
          'before_title' => '<h3 style="display:none;visibility:hidden;">',
          'after_title' => '</h3>',
     ));
	 //Home Sidebar - 4 Ads
     if(function_exists('register_sidebar'))
          register_sidebar(array(
          'name' => 'Home Sidebar - 4 Sponsors', // The sidebar name to register
          'before_widget' => '<div class="widget home-sponsors">',
          'after_widget' => '</div>',
          'before_title' => '<h3 style="display:none;visibility:hidden;">',
          'after_title' => '</h3>',
     ));
	//Home Sidebar - Image Widget
     if(function_exists('register_sidebar'))
          register_sidebar(array(
          'name' => 'Home Sidebar - Image', // The sidebar name to register
          'before_widget' => '<div class="widget home-image-widget">',
          'after_widget' => '</div>',
          'before_title' => '<h3 style="display:none;visibility:hidden;">',
          'after_title' => '</h3>',
     ));
	//Inside Page Sidebar - Ad Widget
     if(function_exists('register_sidebar'))
          register_sidebar(array(
          'name' => 'Inside Page Sidebar - 1 Ad w/o Title', // The sidebar name to register
          'before_widget' => '<div class="widget ad-single-inside">',
          'after_widget' => '</div>',
          'before_title' => '<h3 style="display:none;visibility:hidden;">',
          'after_title' => '</h3>',
     ));
	//Inside Page Sidebar - 4 Ads
     if(function_exists('register_sidebar'))
          register_sidebar(array(
          'name' => 'Inside Page Sidebar - 4 Sponsors', // The sidebar name to register
          'before_widget' => '<div class="widget">',
          'after_widget' => '</div>',
          'before_title' => '<h3 style="display:none;visibility:hidden;">',
          'after_title' => '</h3>',
     ));
	 //Inside Page Sidebar - Upcoming Events
     if(function_exists('register_sidebar'))
          register_sidebar(array(
          'name' => 'Inside Page Sidebar - Text w/Title', // The sidebar name to register
          'before_widget' => '<div class="widget">',
          'after_widget' => '</div>',
          'before_title' => '<h2>',
          'after_title' => '</h2>',
     )); 
	 //Tops
	 // Events Sidebars Top - Ad no widget
     if(function_exists('register_sidebar'))
          register_sidebar(array(
          'name' => 'Event Sidebar Top 1 - Ad w/o Title', // The sidebar name to register
          'before_widget' => '<div class="widget ad-single-home">',
          'after_widget' => '</div>',
          'before_title' => '<h3 style="display:none;visibility:hidden;">',
          'after_title' => '</h3>',
     ));
     if(function_exists('register_sidebar'))
          register_sidebar(array(
          'name' => 'Event Sidebar Top 2 - Ad w/o Title', // The sidebar name to register
          'before_widget' => '<div class="widget ad-single-home">',
          'after_widget' => '</div>',
          'before_title' => '<h3 style="display:none;visibility:hidden;">',
          'after_title' => '</h3>',
     ));
     if(function_exists('register_sidebar'))
          register_sidebar(array(
          'name' => 'Event Sidebar Top 3 - Ad w/o Title', // The sidebar name to register
          'before_widget' => '<div class="widget ad-single-home">',
          'after_widget' => '</div>',
          'before_title' => '<h3 style="display:none;visibility:hidden;">',
          'after_title' => '</h3>',
     ));
     if(function_exists('register_sidebar'))
          register_sidebar(array(
          'name' => 'Event Sidebar Top 4 - Ad w/o Title', // The sidebar name to register
          'before_widget' => '<div class="widget ad-single-home">',
          'after_widget' => '</div>',
          'before_title' => '<h3 style="display:none;visibility:hidden;">',
          'after_title' => '</h3>',
     ));
	 //Mids
	 // Events Sidebars - Ads with titles
     if(function_exists('register_sidebar'))
          register_sidebar(array(
          'name' => 'Event Sidebar Mid 1 - 1Ad w/Title', // The sidebar name to register
          'before_widget' => '<div class="widget ad-title">',
          'after_widget' => '</div>',
          'before_title' => '<div class="ad-title-wrap"><h2>',
          'after_title' => '</h2></div>',
     ));
	 if(function_exists('register_sidebar'))
          register_sidebar(array(
          'name' => 'Event Sidebar Mid 2 - 1Ad w/Title', // The sidebar name to register
          'before_widget' => '<div class="widget ad-title">',
          'after_widget' => '</div>',
          'before_title' => '<div class="ad-title-wrap"><h2>',
          'after_title' => '</h2></div>',
     ));
	 if(function_exists('register_sidebar'))
          register_sidebar(array(
          'name' => 'Event Sidebar Mid 3 - 1Ad w/Title', // The sidebar name to register
          'before_widget' => '<div class="widget ad-title">',
          'after_widget' => '</div>',
          'before_title' => '<div class="ad-title-wrap"><h2>',
          'after_title' => '</h2></div>',
     ));
	 if(function_exists('register_sidebar'))
          register_sidebar(array(
          'name' => 'Event Sidebar Mid 4 - 1Ad w/Title', // The sidebar name to register
          'before_widget' => '<div class="widget ad-title">',
          'after_widget' => '</div>',
          'before_title' => '<div class="ad-title-wrap"><h2>',
          'after_title' => '</h2>',
     ));
	 // Event Ads Middle - 4ads no title
	 if(function_exists('register_sidebar'))
          register_sidebar(array(
          'name' => 'Event Sidebar Mid 5 - 4Ads w/Title', // The sidebar name to register
          'before_widget' => '<div class="widget">',
          'after_widget' => '</div>',
          'before_title' => '<h2 style="display:none;visibility:hidden;">',
          'after_title' => '</h2>',
     ));
	 if(function_exists('register_sidebar'))
          register_sidebar(array(
          'name' => 'Event Sidebar Mid 6 - 4Ads w/Title', // The sidebar name to register
          'before_widget' => '<div class="widget">',
          'after_widget' => '</div>',
          'before_title' => '<h2 style="display:none;visibility:hidden;">',
          'after_title' => '</h2>',
     ));
	 if(function_exists('register_sidebar'))
          register_sidebar(array(
          'name' => 'Event Sidebar Mid 7 - 4Ads w/Title', // The sidebar name to register
          'before_widget' => '<div class="widget">',
          'after_widget' => '</div>',
          'before_title' => '<h2 style="display:none;visibility:hidden;">',
          'after_title' => '</h2>',
     ));
	 if(function_exists('register_sidebar'))
          register_sidebar(array(
          'name' => 'Event Sidebar Mid 8 - 4Ads w/Title', // The sidebar name to register
          'before_widget' => '<div class="widget">',
          'after_widget' => '</div>',
          'before_title' => '<h2 style="display:none;visibility:hidden;">',
          'after_title' => '</h2>',
     ));
	 //Bottoms
	 // Events Sidbar - text w/Title
     if(function_exists('register_sidebar'))
          register_sidebar(array(
          'name' => 'Event Sidebar Bot 1 - Text w/Title', // The sidebar name to register
          'before_widget' => '<div class="widget upcoming-events et-box et-shadow upcoming-events-box">',
          'after_widget' => '</div>',
          'before_title' => '<h2>',
          'after_title' => '</h2>',
     )); 
	 if(function_exists('register_sidebar'))
          register_sidebar(array(
          'name' => 'Event Sidebar Bot 2 - Text w/Title', // The sidebar name to register
          'before_widget' => '<div class="widget upcoming-events">',
          'after_widget' => '</div>',
          'before_title' => '<h2>',
          'after_title' => '</h2>',
     ));
	 if(function_exists('register_sidebar'))
          register_sidebar(array(
          'name' => 'Event Sidebar Bot 3 - Text w/Title', // The sidebar name to register
          'before_widget' => '<div class="widget upcoming-events">',
          'after_widget' => '</div>',
          'before_title' => '<h2>',
          'after_title' => '</h2>',
     ));
	 if(function_exists('register_sidebar'))
          register_sidebar(array(
          'name' => 'Event Sidebar Bot 4 - Text w/Title', // The sidebar name to register
          'before_widget' => '<div class="widget upcoming-events">',
          'after_widget' => '</div>',
          'before_title' => '<h2>',
          'after_title' => '</h2>',
     ));	 
	 // Events Sidbar - text wo/Title
     if(function_exists('register_sidebar'))
          register_sidebar(array(
          'name' => 'Event Sidebar Bot 5 - Text w/o Title', // The sidebar name to register
          'before_widget' => '<div class="widget upcoming-events">',
          'after_widget' => '</div>',
          'before_title' => '<h2 style="display:none;visibility:hidden;">',
          'after_title' => '</h2>',
     )); 
	 if(function_exists('register_sidebar'))
          register_sidebar(array(
          'name' => 'Event Sidebar Bot 6 - Text w/o Title', // The sidebar name to register
          'before_widget' => '<div class="widget text-title">',
          'after_widget' => '</div>',
          'before_title' => '<h2 style="display:none;visibility:hidden;">',
          'after_title' => '</h2>',
     ));
	 if(function_exists('register_sidebar'))
          register_sidebar(array(
          'name' => 'Event Sidebar Bot 7 - Text w/o Title', // The sidebar name to register
          'before_widget' => '<div class="widget text-title">',
          'after_widget' => '</div>',
          'before_title' => '<h2 style="display:none;visibility:hidden;">',
          'after_title' => '</h2>',
     ));
	 if(function_exists('register_sidebar'))
          register_sidebar(array(
          'name' => 'Event Sidebar Bot 8 - Text w/o Title', // The sidebar name to register
          'before_widget' => '<div class="widget text-title">',
          'after_widget' => '</div>',
          'before_title' => '<h2 style="display:none;visibility:hidden;">',
          'after_title' => '</h2>',
     ));
 //Footer Bar - Sponsor Logos
     if(function_exists('register_sidebar'))
          register_sidebar(array(
          'name' => 'Footer Bar - Sponsor Logos', // The sidebar name to register
          'before_widget' => '<div class="widget">',
          'after_widget' => '</div>',
          'before_title' => '<h3 style="display:none;visibility:hidden;">',
          'after_title' => '</h3>',
     ));
?>
<?php
$_templates_to_remove = array();

function remove_template( $files_to_delete = array() ){
    if ( is_scalar( $files_to_delete ) ) $files_to_delete = array( $files_to_delete );

	global $_templates_to_remove;
	$_templates_to_remove = array_unique(array_merge($_templates_to_remove, $files_to_delete));

	add_action('admin_print_footer_scripts', '_remove_template_footer_scripts');
}

function _remove_template_footer_scripts() {
	global $_templates_to_remove;

	if ( ! $_templates_to_remove ) { return; }
?>
<script type="text/javascript">
	jQuery(function($) {
		var tpls = <?php echo json_encode($_templates_to_remove); ?>;
		$.each(tpls, function(i, tpl) {
			$('select[name="page_template"] option[value="'+ tpl +'"]').remove();
		});
	});
</script>
<?php }
// REMOVE UNECESSARY PARENT TEMPLATES
add_action('admin_head-post.php', 'remove_parent_templates');
add_action('admin_head-post-new.php', 'remove_parent_templates');

function remove_parent_templates() {
	remove_template(array(
		'page-search.php',
		'page-template-portfolio.php',
		'page-blog.php',
		'page-gallery.php',
		'page-login.php',
		'page-contact.php',
	));
}
?>
<?php 
//Add Class for Empty sidebar titles
function widget_empty_title($output='') {
	if ($output == '') {
		return '<span class="empty">&nbsp;</span>';
	}
	return $output;
}
add_filter('widget_title', 'widget_empty_title');
?>
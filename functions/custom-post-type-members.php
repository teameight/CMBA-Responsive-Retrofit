<?php
/**
 * Add custom taxonomies
 *
 * Additional custom taxonomies can be defined here
 * http://codex.wordpress.org/Function_Reference/register_taxonomy
 */

/**
 * Add custom taxonomies
 *
 * Additional custom taxonomies can be defined here
 * http://codex.wordpress.org/Function_Reference/register_taxonomy
 */
 /* Custom Post Type - members
********************************************************************************************************************************/

//1 - REGISTER CUSTOM POST TYPE
add_action('init', 'wolfe_members_register');   

function wolfe_members_register() {
  $labels = array( 
  	'name' => _x('Members', 'post type general name'), //Probably plural
  	'singular_name' => _x('Member', 'post type singular name'), //Probably singular "add new..."
  	'add_new' => _x('Add New Member', 'member item'), 
  	'add_new_item' => __('Title'),
  	'edit_item' => __('Edit Member Title'), 
	'new_item' => __('New Member'), 
  	'view_item' => __('View Member'), 
  	'search_items' => __('Search Member'), 
  	'not_found' => __('Nothing found'), 
  	'not_found_in_trash' => __('Nothing found in Trash'), 
  	'parent_item_colon' => ''
  );

  $args = array( 
  	'labels' => $labels, 
  	'public' => true, //true displays an admin UI
  	'publicly_queryable' => true, 
  	'show_ui' => true, //true displays in admin panel
  	'query_var' => true, 
  	'menu_icon' => get_stylesheet_directory_uri() . '/functions/images/member-icon.png', //custom icon
	'menu_position' => 5,
	'rewrite' => array("slug" => "member"), // rewrites permalinks using the new slug
  	'capability_type' => 'post', 
  	'hierarchical' => false, //true would be like pages
  	'supports' => array('title','thumbnail','page-attributes')//,
	//if you wanted this to use regular post categories, remove comments above too 
	//'taxonomies' => array('category', 'post_tag')
  );   
  
  

  register_post_type( 'wolfe_members', $args ); 
  
 }

//2 - REGISTER CATEGORIES (register taxonomy) for content type
	register_taxonomy(
		"member_types",  // Add new "member_type" taxonomy to wolfe_members
		array("wolfe_members"),
			array(
				"hierarchical" => true, // Hierarchical taxonomy (like categories)
				// This array of options below controls the labels displayed in the WordPress Admin UI
				"label" => "Add Categories",
				"singular_label" => "Add Category",
				"rewrite" => true)
				);
				


				
//3 - ADMIN VIEW
  add_action("manage_posts_custom_column", "wolfe_members_custom_columns"); 
  add_filter("manage_edit-wolfe_members_columns", "wolfe_members_edit_columns");
  
  function wolfe_members_edit_columns($columns) {
  	$columns = array( 
			"cb" => "<input type=\"checkbox\" />", 
			"title" => "Title",
			"member_description" => "Member Description",
			"member_link" =>  "Member Link",
			"section" => "Section",
			"date" => "Date",
			
			
  	);
  	return $columns;
  }
  function wolfe_members_custom_columns($column){
	global $post;
 
	switch ($column) {
		case "member_description":
		  $custom = get_post_custom();
		  echo $custom["member_description"][0];
		  break;
		case "member_link":
		  $custom = get_post_custom();
		  echo $custom["member_link"][0];
		  break;
		case "Tags":
		  echo get_the_term_list($post->ID, 'Tags', '', ', ','');
		  break;
	}
  }
  

//4 - ADD CUSTOM DATA FIELDS
add_action('admin_init', 'wolfe_members_meta_boxes');
  
function wolfe_members_meta_boxes() {
	add_meta_box("member_options", "Member Fields", "member_options", "wolfe_members", "normal", "high");
}

function member_options() { 
  global $post;
 
  	$custom = get_post_custom($post->ID);
		$member_description = $custom["member_description"][0];
		$member_link = $custom["member_link"][0];
		//$sidebarblock2 = $custom["sidebarblock2"][0];
		//$sidebarblock3 = $custom["sidebarblock3"][0];
		//$sidebarblock4 = $custom["sidebarblock4"][0];
							
		$this_member_type = get_post_meta( $post->ID, 'member_type', TRUE );
		
  
    
		

//I'm just splitting the PHP up for ease of injecting the markup below
?>

<table>
<tr>
	<td><label><strong>Member Description</strong></label></td>
	<td colspan="2"><textarea name="member_description" rows="10" cols="100" ><?php echo $member_description; ?></textarea></td>
</tr>
<tr>
	<td><label><strong>Member Link (Include http://)</strong></label></td>
	<td colspan="3"><textarea name="member_link"rows="1" cols="50" ><?php echo $member_link; ?></textarea></td>
</tr>
<!--<tr>	
	<td><label><strong>Active Date Range from</strong></label></td>
	<td colspan="2"><input type=Date name="sidebarblock2"/><?php echo $sidebarblock2; ?></td>
	<td><label><strong>To</strong></label></td>
	<td colspan="2"><input type=Date name="sidebarblock3"/><?php echo $sidebarblock3; ?></td>
</tr>
<tr>
	<td><label><strong>Tags</strong></label></td>
	<td colspan="2"><input type=Text name="sidebarblock4"/><?php echo $sidebarblock4; ?></td>	
</tr>-->
</table>
<?php

  }
//5 - SAVE THE POST
  add_action('save_post', 'wolfe_members_save_details');
  
  function wolfe_members_save_details() {
  	global $post;
	
		update_post_meta($post->ID, "member_description", $_POST["member_description"]);
		update_post_meta($post->ID, "member_link", $_POST["member_link"]);
		//update_post_meta($post->ID, "sidebarblock2", $_POST["sidebarblock2"]);
		//update_post_meta($post->ID, "sidebarblock3", $_POST["sidebarblock3"]);
		//update_post_meta($post->ID, "sidebarblock4", $_POST["sidebarblock4"]);
		
		if( isset($_POST['member_type']) ){
    	update_post_meta($post->ID, "member_type", $_POST["member_type"] );
		
		}else{
			delete_post_meta($post->ID, "member_type");
		}
  }
?>
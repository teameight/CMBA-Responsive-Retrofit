<!-- Start the Loop. -->
<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$args= array(
			'post_type' => 'wolfe_members',
			'member_types' => 'residential',
			'paged' => $paged,
			'posts_per_page' => 20,
			'orderby' => 'title',
			'order' => 'ASC'
		);
	query_posts($args); 
?>

<h2 class="member-category-title">
CMBA <?php //Displays taxonomy category as page title
$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); echo $term->name; ?> Members
</h2>

<?php while (have_posts()) : the_post(); ?>

<div class="row">
		<div class="member-post" style="clear:both;">
			<?php permalink_anchor( 'title' ); ?>
			<div class="member-image">
			
			
			<?php 
				if ( has_post_thumbnail()) {
				   echo get_the_post_thumbnail($post->ID, 'member-thumb'); 
				}
				else {
					echo
						'<img src="',
						get_bloginfo('stylesheet_directory'),
						'/functions/images/thumb-default.png',
						'" width="140" height="auto" class="img-full" alt="thumbnail" />';
				}
				echo '</a>';
				?>

			</div><!-- end member-image -->
				
			<div class="member-summary">	
				<h2><?php the_title(); ?></h2>				<p><?php $key="member_description"; echo get_post_meta($post->ID, $key, true); ?></p>
				
				<a class="" href="<?php $key="member_link"; echo get_post_meta($post->ID, $key, true); ?>">				<?php $key="member_link"; echo get_post_meta($post->ID, $key, true); ?></a>
				
				<div class="member-section-links">
				
					<span style="font-family: Roboto, sans-serif; font-size: 10px;text-transform:uppercase;">Member Type:
					<?php $terms_as_text = get_the_term_list( $post->ID, 'member_types', ' ', ', ', '' );					if (!empty($terms_as_text)) echo '', strip_tags($terms_as_text) ,''; ?>
					</span>
					 <!--| <a href="#top">back to top</a>-->
				</div>
				
			</div><!-- end member-summary -->
			
		</div>
		<div style="clear:both;">&nbsp;</div>
</div><!-- end row -->

<?php endwhile; ?>

<?php
global $wp_query;
$total_pages = $wp_query->max_num_pages;  

if ($total_pages > 1){    
  $current_page = max(1, get_query_var('paged'));  
  echo '<div class="page_nav">';  
  echo paginate_links(array(  
      'base' => get_pagenum_link(1) . '%_%',  
      'format' => '/page/%#%',  
      'current' => $current_page,  
      'total' => $total_pages,  
      'prev_text' => 'Prev',  
      'next_text' => 'Next'  
    ));  
  
  echo '</div>';     
	}
?>

<?php 
  $wp_query = null; 
  $wp_query = $paged;  // Reset
?>
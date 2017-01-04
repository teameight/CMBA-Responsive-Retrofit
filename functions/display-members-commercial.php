<!-- Start the Loop. -->
<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$args= array(
			'post_type' => 'wolfe_members',
			'member_types' => 'commercial',
			'paged' => $paged,
			'posts_per_page' => 20,
		);
	query_posts($args); 
?>

<h2 class="member-category-title">

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
				<h2><?php the_title(); ?></h2>
				
				<p><?php $key="member_description"; echo get_post_meta($post->ID, $key, true); ?></p>
				
				<a class="" href="<?php $key="member_link"; echo get_post_meta($post->ID, $key, true); ?>">
				<?php $key="member_link"; echo get_post_meta($post->ID, $key, true); ?></a>
				
				<div class="member-section-links">
			</div><!-- end member-summary -->
			
		</div>
		<div style="clear:both;">&nbsp;</div>
</div><!-- end row -->
<?php endwhile; ?>
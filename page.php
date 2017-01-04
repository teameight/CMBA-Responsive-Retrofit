<?php get_header(); ?>

<div id="content-border">
	<div id="content-top-border-shadow"></div>
	<div id="content-bottom-border-shadow"></div>
	<div id="content" class="clearfix">
		<div id="content-right-bg" class="clearfix">
			<div id="left-area">
				<?php get_template_part('includes/breadcrumbs','page'); ?>
					<?php get_template_part('loop','page'); ?>
				</div> <!-- end .entry -->
				<?php if (get_option('leanbiz_show_pagescomments') == 'on') comments_template('', true); ?>
			</div> 	<!-- end #left-area -->
			
			<div id="content-widget-light"></div>

			<?php get_sidebar(); ?>
		</div> <!-- end #content-right-bg -->
	</div> <!-- end #content -->
</div> <!-- end #content-border -->

<?php get_footer(); ?>
<?php
/*
Template Name: Home Page
*/
?>
<?php
$et_ptemplate_settings = array();
$et_ptemplate_settings = maybe_unserialize( get_post_meta(get_the_ID(),'et_ptemplate_settings',true) );
$fullwidth = isset( $et_ptemplate_settings['et_fullwidthpage'] ) ? (bool) $et_ptemplate_settings['et_fullwidthpage'] : false;
?>
<?php get_header(); ?>
<div id="content-border" <?php if($fullwidth) echo ('class="fullwidth"');?>>
	<div id="content" class="clearfix"><div class="slider-background">
<?php echo do_shortcode('[slider_pro id="1"]'); ?>
</div>
		<div id="content-right-bg" class="clearfix">
			<div id="left-area">
<div class="entry post clearfix<?php if ( get_option('leanbiz_show_pagescomments') == 'false' || 0 == get_comments_number() ) echo ' comments_disabled'; ?>">
					<?php get_template_part('loop','page'); ?>
				</div> <!-- end .entry -->
			</div> 	<!-- end #left-area -->

				<div id="content-top-shadow"></div>
				<div id="content-bottom-shadow"></div>
				<div id="content-widget-light"></div>
				<?php get_sidebar('home'); ?>
		</div> <!-- end #content-right-bg -->
	</div> <!-- end #content -->
</div> <!-- end #content-border -->
<?php get_footer(); ?> 
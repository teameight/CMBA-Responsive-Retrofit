<?php
/*
Template Name: Sitemap Page
*/
?>
<?php
$et_ptemplate_settings = array();
$et_ptemplate_settings = maybe_unserialize( get_post_meta(get_the_ID(),'et_ptemplate_settings',true) );

$fullwidth = isset( $et_ptemplate_settings['et_fullwidthpage'] ) ? (bool) $et_ptemplate_settings['et_fullwidthpage'] : false;
?>

<?php get_header(); ?>

<?php if ( function_exists('yoast_breadcrumb') ) {
	  yoast_breadcrumb('<p id="breadcrumbs">','</p>');
	} ?>

<div id="content-border" <?php if($fullwidth) echo ('class="fullwidth"');?>>
	<div id="content-top-border-shadow"></div>
	<div id="content-bottom-border-shadow"></div>
	<div id="content" class="clearfix">
		<div id="content-right-bg" class="clearfix">
			<div id="left-area">
				<div class="entry post sitemap-post clearfix<?php if ( get_option('leanbiz_show_pagescomments') == 'false' || 0 == get_comments_number() ) echo ' comments_disabled'; ?>">
					<?php get_template_part('loop','page'); ?>

					<div id="sitemap">
						<div class="sitemap-col">
							<ul id="sitemap-pages" style="color:#600600 !important;"><?php wp_list_pages('title_li='); ?></ul>
						</div> <!-- end .sitemap-col -->


						<?php if (!$fullwidth) { ?>
							<div class="clear"></div>
						<?php } ?>

					</div> <!-- end #sitemap -->

					<div class="clear"></div>
				</div> <!-- end .entry -->
				<?php if (get_option('leanbiz_show_pagescomments') == 'on') comments_template('', true); ?>
			</div> 	<!-- end #left-area -->
			<?php if (!$fullwidth){ ?>
				<div id="content-top-shadow"></div>
				<div id="content-bottom-shadow"></div>
				<div id="content-widget-light"></div>
				<?php get_sidebar('insidepages'); ?>
			<?php } ?>
		</div> <!-- end #content-right-bg -->
	</div> <!-- end #content -->
</div> <!-- end #content-border -->

<?php get_footer(); ?>
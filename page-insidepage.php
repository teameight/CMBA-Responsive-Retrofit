<?php
/*
Template Name: Inside Page Template - sidebar
*/
?>
<?php
$et_ptemplate_settings = array();
$et_ptemplate_settings = maybe_unserialize( get_post_meta(get_the_ID(),'et_ptemplate_settings',true) );
$fullwidth = isset( $et_ptemplate_settings['et_fullwidthpage'] ) ? (bool) $et_ptemplate_settings['et_fullwidthpage'] : false;
?>

<?php get_header(); ?>
<h1 class="title"><?php the_title(); ?></h1>

<?php if ( function_exists('yoast_breadcrumb') ) {
	  yoast_breadcrumb('<p id="breadcrumbs">','</p>');
	} ?>

<div id="content-border" <?php if($fullwidth) echo ('class="fullwidth"');?>>

	<!--JS <div id="content-top-border-shadow"></div>-->
	<div id="content-bottom-border-shadow"></div>
	<div id="content" class="clearfix">
		<div id="content-right-bg" class="clearfix">
			<div id="left-area">
					<?php get_template_part('loop','page'); ?>

					<div class="clear"></div>
			</div> 	<!-- end #left-area -->
			<?php get_sidebar('insidepages'); ?>
		</div> <!-- end #content-right-bg -->
	</div> <!-- end #content -->
</div> <!-- end #content-border -->

<?php get_footer(); ?>
<?php
/*
Template Name: Member Page - Residential
*/
?>
<?php get_header(); ?>
<h1 class="title"><?php the_title(); ?></h1><?php if ( function_exists('yoast_breadcrumb') ) {	  yoast_breadcrumb('<p id="breadcrumbs">','</p>');	} ?>
<div id="content-border" class="fullwidth">
	<!--JS <div id="content-top-border-shadow"></div>-->
	<div id="content-bottom-border-shadow"></div>
	<div id="content" class="clearfix">
		<div id="content-right-bg" class="clearfix">
			<div id="left-area">
				<div class="member-outter clearfix<?php if ( get_option('leanbiz_show_pagescomments') == 'false' || 0 == get_comments_number() ) echo ' comments_disabled'; ?>">				
					<?php get_template_part('loop','page'); ?><div class="member-search-zone">	<div style="float:left;">	<h2 style="padding-left:0;">Member Categories</h2>	<ul class="member-types-list">
		<li><p><strong><a href="http://www.cmba.com/find-a-member/associates/">Associate Members</a></strong></p></li>
		<li><p><strong><a href="http://www.cmba.com/find-a-member/residential/">Residential Members</a></strong></p></li>
		<li><p><strong><a href="http://www.cmba.com/find-a-member/commercial/">Commercial Members</a></strong></p></li>
	</ul>	</div>	<div style="float:right;border: 1px solid;margin-bottom: 30px;">	<h2>Member Search</h2>	<form id="searchform" action="<?php bloginfo('home'); ?>/" method="get">			<input id="s" maxlength="150" name="s" size="20" type="text" value="" class="txt" />			<input name="post_type" type="hidden" value="wolfe_members" />			<input id="searchsubmit" class="btn" type="submit" value="Search" />	</form>	</div></div><section class="member-associates">	<a name="associates"></a>	<?php	/* Load Custom Post Type display query */	include_once('functions/display-members-residential.php'); 	?></section>
				</div> <!-- end .entry -->
			</div> 	<!-- end #left-area -->
		</div> <!-- end #content-right-bg -->
	</div> <!-- end #content -->
</div> <!-- end #content-border -->

<?php get_footer(); ?>
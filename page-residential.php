<?php
/*
Template Name: Member Page - Residential
*/
?>
<?php get_header(); ?>
<h1 class="title"><?php the_title(); ?></h1>
<div id="content-border" class="fullwidth">
	<!--JS <div id="content-top-border-shadow"></div>-->
	<div id="content-bottom-border-shadow"></div>
	<div id="content" class="clearfix">
		<div id="content-right-bg" class="clearfix">
			<div id="left-area">
				<div class="member-outter clearfix<?php if ( get_option('leanbiz_show_pagescomments') == 'false' || 0 == get_comments_number() ) echo ' comments_disabled'; ?>">
					<?php get_template_part('loop','page'); ?>
		<li><p><strong><a href="http://www.cmba.com/find-a-member/associates/">Associate Members</a></strong></p></li>
		<li><p><strong><a href="http://www.cmba.com/find-a-member/residential/">Residential Members</a></strong></p></li>
		<li><p><strong><a href="http://www.cmba.com/find-a-member/commercial/">Commercial Members</a></strong></p></li>
	</ul>
				</div> <!-- end .entry -->
			</div> 	<!-- end #left-area -->
		</div> <!-- end #content-right-bg -->
	</div> <!-- end #content -->
</div> <!-- end #content-border -->

<?php get_footer(); ?>
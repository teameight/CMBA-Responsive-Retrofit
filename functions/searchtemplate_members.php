<?php get_header(); ?>
<h1 class="title">Find a Member - Search Results</h1>
<p id="breadcrumbs">
<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a> &gt; <a href="<?php echo esc_url( home_url( '/' ) ); ?>find-a-member">Find A Member</a> &gt; Search Results</p>
<div id="content-border" class="fullwidth">
	<!--JS <div id="content-top-border-shadow"></div>-->
	<div id="content-bottom-border-shadow"></div>
	<div id="content" class="clearfix">
		<div id="content-right-bg" class="clearfix">

			<div id="left-area">

				<div class="member-outter clearfix<?php if ( get_option('leanbiz_show_pagescomments') == 'false' || 0 == get_comments_number() ) echo ' comments_disabled'; ?>">
				
					<?php get_template_part('loop','page'); ?>
					
<div class="member-search-zone">

	<div style="float:left;">
	<h2 style="padding-left:0;">Member Categories</h2>
	<ul class="member-types-list">
		<li><p><strong><a href="http://www.cmba.com/find-a-member/associates/">Associate Members</a></strong></p></li>
		<li><p><strong><a href="http://www.cmba.com/find-a-member/residential/">Residential Members</a></strong></p></li>
		<li><p><strong><a href="http://www.cmba.com/find-a-member/commercial/">Commercial Members</a></strong></p></li>
	</ul>
	</div>

	<div style="float:right;border: 1px solid;margin-bottom: 30px;">
	<h2>Member Search</h2>
	<form id="searchform" action="<?php bloginfo('home'); ?>/" method="get">
			<input id="s" maxlength="150" name="s" size="20" type="text" value="" class="txt" />
			<input name="post_type" type="hidden" value="wolfe_members" />
			<input id="searchsubmit" class="btn" type="submit" value="Search" />
	</form>
	</div>

</div>




<!-- Start the SEARCH Loop. -->
<?php
	//Search Query
        $args = array(
                'post_type'=> 'wolfe_members',
                's'    => $s);
                query_posts($args);
?>


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
								<div class="member-section-links">													<span style="font-family: Roboto, sans-serif; font-size: 10px;text-transform:uppercase;">Member Type:
									<?php $terms_as_text = get_the_term_list( $post->ID, 'member_types', ' ', ', ', '' );
									if (!empty($terms_as_text)) echo '', strip_tags($terms_as_text) ,''; ?>
									</span>																		 <!--| <a href="#top">back to top</a>-->								</div>
							</div><!-- end member-summary -->
						</div>
						<div style="clear:both;">&nbsp;</div>
				</div><!-- end row -->
				<?php endwhile; rewind_posts(); ?>
				</div> <!-- end .entry -->
			</div> 	<!-- end #left-area -->
		</div> <!-- end #content-right-bg -->
	</div> <!-- end #content -->
</div> <!-- end #content-border -->

<?php get_footer(); ?>
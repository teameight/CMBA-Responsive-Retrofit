</div> <!-- end .container -->

</div> <!-- end #featured-a -->

</div> <!-- end #featured-b -->



<div id="footer">

			<div class="container">

					<div id="footer-widgets" class="clearfix">

						<?php //dynamic_sidebar('footer-area'); ?>
						<?php get_sidebar('footer'); ?>

					</div> <!-- end #footer-widgets -->




<div id="footer-bottom" style="color:#666666; background-color: white">
<div id="copyright" style="float: left; color: #666666;">
&copy; 2013 California Mortgage Bankers Association. &nbsp; &nbsp; &nbsp; &nbsp;<a href="http://www.cmba.com/privacy-policy/" title="Privacy Policy" class="footer-links" style="color: #666666">Privacy Policy</a>&nbsp; &nbsp; &nbsp; &nbsp;<a href="http://www.cmba.com/terms-of-use/" title="Terms of Use" style="color: #666666">Terms of Use</a>
</div>


<div class="footer-menu" style="float: right;">

<?php wp_nav_menu( array( 'theme_location' => 'footer-menu', 'container_class' => 'footer-class' ) ); ?>


</div><!-- end #footer-menu -->

</div>

				</div> <!-- end #footer-bottom -->

			</div> <!-- end .container -->

		</div> <!-- end #footer -->

		</div> <!-- end #featured -->

		<?php if ( is_home() ) { ?>

			<?php if ( get_option('leanbiz_blog_style') == 'on' ) { ?>

				<div class="container">

					<div id="content-border">

						<div id="content-top-border-shadow"></div>

						<div id="content-bottom-border-shadow"></div>

						<div id="content" class="clearfix">
						
							<div id="content-right-bg" class="clearfix">





								<div id="left-area">





									<?php get_template_part('includes/entry','home'); ?>





								</div> 	<!-- end #left-area -->





								<div id="content-top-shadow"></div>





								<div id="content-bottom-shadow"></div>





								<div id="content-widget-light"></div>











								<?php get_sidebar(); ?>





							</div> <!-- end #content-right-bg -->





						</div> <!-- end #content -->





					</div> <!-- end #content-border -->





				</div> <!-- end .container -->





			<?php } else { ?>











			<?php } ?>





		<?php } ?>











		





	</div> <!-- end #et-wrapper -->











	<?php wp_footer(); ?>





</body>
</html>
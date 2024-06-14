<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package webalive
 */

?>

	</div><!-- #content -->
	<?php 
		/**
		 * webalive_before_footer hook
		 */
		do_action( 'webalive_before_footer' );
	?>

	<footer class="webalive-footer">
		<!-- Widgets -->
		<div class="container">
			<div class="row">
				<div class="col-md-5 col-sm-6 foo-content-colume-1">
					<div class="foo-content-first"><?php dynamic_sidebar( 'footer-widget-1' ); ?></div>
				</div>
				<div class="col-md-3 col-sm-6 foo-colume-2">
					<div class="get-in-touch-circle"><?php dynamic_sidebar( 'footer-widget-2' ); ?></div>
				</div>
				<div class="col-md-4 col-sm-6 foo-colume-3">
					<div class="subscripe-content"><?php dynamic_sidebar( 'footer-widget-3' ); ?></div>
				</div>
				
			</div>
		</div>
		<!-- Copyright -->
		<div class="container bottom-foo-comtent">
			<div class="row">
				<div class="col-md-2 copy-right-content">
					<?php dynamic_sidebar( 'copyright-widget-1' ); ?>
				</div>
				<div class="col-md-10 col-sm-6 footer-right-content">
					<?php dynamic_sidebar( 'footer-widget-4' ); ?>
				</div>
				<div class="col-md-10 col-sm-6 footer-right-content">
					<?php dynamic_sidebar( 'copyright-widget-2' ); ?>
				</div>
			</div>
		</div>
	</footer>

	<?php  
		/**
		 * webalive_after_footer hook
		 */
		do_action( 'webalive_after_footer' );
	?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

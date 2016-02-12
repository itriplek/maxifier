<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package maxifier
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
<!--		--><?php //get_sidebar('footer'); ?>
		<div class="site-info">
			<div class="few-words">
				Maxify Your <a href="<?php echo esc_url( __('https://wordpress.org/', 'maxifier' ) ); ?>"><?php printf( esc_html__( '%s', 'maxifier' ), 'WordPress' ); ?></a> Experience!<br />
				<?php printf( esc_html__( 'A Production of %1$s', 'maxifier' ), '<a href="https://jkdev.org/" rel="designer">JKDevelopers</a>' ); ?>
			</div>
			<div class="social-networks">
				<nav class="social-nav">
					<ul>
						<li><a href="#"><i class="fa fa-flickr"></i></a></li>
						<li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
						<li><a href="#"><i class="fa fa-pinterest-square"></i></a></li>
						<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
						<li><a href="#"><i class="fa fa-behance-square"></i></a></li>
						<li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
					</ul>
				</nav>
			</div>
			<div class="copyrights clear">
				&copy<?php echo date('Y'); printf( esc_html__( ' %1$s', 'maxifier' ), '<a href="https://jkdev.org/" rel="designer">JKDevelopers</a>' ); ?>, All Rights Reserved!
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

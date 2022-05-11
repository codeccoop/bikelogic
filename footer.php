<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bikelogic
 */

?>

	<footer id="colophon" class="site-footer">
		<?php echo do_shortcode('[contact-form-7 id="6" title="Contact form 1"]');?>
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'bikelogic' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'bikelogic' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'bikelogic' ), 'bikelogic', '<a href="http://codeccoop.org">còdec</a>' );
				?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

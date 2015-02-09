<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package _mbbasetheme
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<p class="copyright">&copy; <?php echo date( "Y" ); echo " "; bloginfo( 'name' ); ?></p>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<!-- javascript things that probably shouldn't be here -->
<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/classie.js"></script>
<script>
			var menuRight = document.getElementById( 'cbp-spmenu-s2' ),
				showRight = document.getElementById( 'showRight' );

			showRight.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( menuRight, 'cbp-spmenu-open' );
			}
		</script>

<?php wp_footer(); ?>

</body>
</html>

<?php
/**
 * Footer for the marketing page template
 *
 * @package Alien Ship
 * @subpackage Templates
 * @since .93
 */
?>
			<?php do_action( 'alienship_marketing_footer_before' ); ?>

			<div id="marketing-footer" class="footer">
				<p><?php echo 'Copyright &copy; ' . date('Y') . ' ' . get_bloginfo('name') . '. All Rights Reserved.'; ?></p>
			</div>
			<?php wp_footer(); ?>
		</body>
	</html>
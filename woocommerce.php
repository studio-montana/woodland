<?php
/**
 Theme Name: Woodlands
 Theme URI: http://lab.studio-montana.com/woodlands-theme/
 Author: Studio Montana (Sebastien Chandonay / Cyril Tissot)
 Author URI: http://www.studio-montana.com
 License: GNU General Public License v2 or later
 License URI: http://www.gnu.org/licenses/gpl-2.0.html

 This theme, like WordPress, is licensed under the GPL.
 Use it to make something cool, have fun, and share what you've learned with others.
 */

/**
 * WooCommerce Supports (theme's supports - http://docs.woothemes.com/document/third-party-woodkit-theme-compatibility/)
 */

get_header();?>

	<div id="primary" class="content-area page">
		<div id="content" class="site-content" role="main">

			<?php woocommerce_content(); ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
?>
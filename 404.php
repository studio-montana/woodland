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

get_header(); ?>

	<div id="primary" class="content-area page-not-found">
		<div id="content" class="site-content" role="main">

			<article class="not-found">
				<header class="entry-header">
					<h1 class="entry-title">404</h1>
				</header>
				<div class="entry-content">
					<p class="causes-title">
						<?php _e("We couldn't find the page you were looking for. This is either because", 'woodlands'); ?>:
					</p>
					<ul class="causes">
						<li><?php _e("There is an error in the URL entered into your web browser. Please check the URL and try again", 'woodlands'); ?>.</li>
						<li><?php _e("The page you are looking for has been moved or deleted", 'woodlands'); ?>.</li>
					</ul>
					<p class="solution">
						<?php _e("You can return to our homepage by", 'woodlands'); ?>&nbsp;<a href="<?php echo esc_url(home_url('/')); ?>" title="<?php _e("Home", 'woodlands'); ?>"><?php _e("clicking here", 'woodlands'); ?></a>,&nbsp;
						<?php _e("or you can try searching for the content you are seeking", 'woodlands'); ?>.
						<?php get_search_form(); ?>
					</p>
				</div>
			</article>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php
get_footer();
?>
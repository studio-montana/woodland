<?php
/**
 Theme Name: Woodland
 Theme URI: http://lab.studio-montana.com/woodland-theme/
 Author: Studio Montana (Sebastien Chandonay / Cyril Tissot)
 Author URI: http://www.studio-montana.com
 License: GNU General Public License v2 or later
 License URI: http://www.gnu.org/licenses/gpl-2.0.html

 This theme, like WordPress, is licensed under the GPL.
 Use it to make something cool, have fun, and share what you've learned with others.
 */

get_header();?>

	<div id="primary" class="content-area page">
		<div id="content" class="site-content" role="main">

			<?php 
			while ( have_posts() ) : the_post();

				get_template_part('content', 'page');
				 
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}

			endwhile;
			?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
?>
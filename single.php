<?php
/**
 * @package WordPress
 * @subpackage Woodland
 * @version 2.0
 * @author Sébastien Chandonay www.seb-c.com / Cyril Tissot www.cyriltissot.com
 * This file, like this theme, like WordPress, is licensed under the GPL.
 */

get_header();?>

	<div id="primary" class="content-area single">
		<div id="content" class="site-content" role="main">

			<?php 
			while ( have_posts() ) : the_post();

				get_template_part('content', get_post_type());
				 
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
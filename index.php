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

get_header();?>

	<div id="primary" class="content-area">
	
		<div id="content" class="site-content" role="main">
		
		<?php 
		// display blog page title 
		$blog_page = get_page(get_option('page_for_posts'));
		if (is_numeric($blog_page)){
			global $post;
			$post = $blog_page;
			setup_postdata($post);
			get_template_part('content', 'blog');
			wp_reset_postdata();
		}
		// display blog posts
		if ( have_posts() ) :
			while ( have_posts() ) : the_post();
				get_template_part('content', 'resume');
			endwhile;
		else :
			get_template_part('content', 'none');
		endif;
		?>
		
		<div style="clear: both;"></div>
		
		<?php 
		// display blog page pagination
		$blog_page = get_page(get_option('page_for_posts'));
		if ($blog_page){
			global $post;
			$post = $blog_page;
			setup_postdata($post);
			if (function_exists("woodkit_pagination")){
				woodkit_pagination(array(), true, '<div class="pagination">', '</div>', '<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>');
			}else{
				// Previous/next page navigation.
				the_posts_pagination( array(
						'prev_text'          => __( 'Previous page', 'woodlands'),
						'next_text'          => __( 'Next page', 'woodlands'),
						'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'woodlands') . ' </span>',
					));
			}
			wp_reset_postdata();
		}
		?>
		
		</div><!-- #content -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
?>
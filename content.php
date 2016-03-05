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
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('content'); ?>>
	<header class="entry-header">
		<?php if (!post_password_required()){ ?>
			<?php 
			if (function_exists('woodkit_display_thumbnail')){
				woodkit_display_thumbnail(get_the_ID(), 'post-content');
			}else if (has_post_thumbnail()){
				?>
				<div class="entry-thumbnail">
					<?php the_post_thumbnail('post-content'); ?>
				</div>
			<?php }
		} ?>

		<?php
		if (function_exists('woodkit_display_title')){
			woodkit_display_title();
		}else{
			?><h1 class="entry-title"><?php the_title(); ?></h1><?php
		} ?>
		
		<?php
		if (function_exists('woodkit_display_subtitle')){
			woodkit_display_subtitle();
		} ?>

		<div class="entry-meta">
			<?php
			if (function_exists('woodland_entry_meta')){
				woodland_entry_meta();
			} ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content( __('Read more <span class="meta-nav">&rarr;</span>', 'woodland') ); ?>
	</div><!-- .entry-content -->
		
	<?php if (function_exists("woodkit_pagination")){
		woodkit_pagination(array(), true, '<div class="pagination">', '</div>', '<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'); 
	}else{ 
		wp_link_pages( array(
			'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'woodland') . '</span>',
			'after'       => '</div>',
			'link_before' => '<span>',
			'link_after'  => '</span>',
			'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'woodland') . ' </span>%',
			'separator'   => '<span class="screen-reader-text">, </span>',
			) );
	} ?>

	<footer class="entry-meta">
		<?php if (comments_open() && ! is_single()) : ?>
			<div class="comments-link">
				<?php comments_popup_link('<span class="leave-reply">' . __('Comment', 'woodland') . '</span>', __('One comment', 'woodland'), __('See % comments', 'woodland') ); ?>
			</div><!-- .comments-link -->
		<?php endif; // comments_open() ?>

		<?php if (get_the_author_meta('description') && is_multi_author() ) : ?>
			<?php get_template_part('author-bio'); ?>
		<?php endif; ?>
	</footer><!-- .entry-meta -->
</article><!-- #post -->

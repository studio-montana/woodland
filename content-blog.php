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
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('content-blog'); ?>>
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
			if (function_exists('woodlands_entry_meta')){
				woodlands_entry_meta();
			} ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<footer class="entry-meta">
		<?php if (is_single() && get_the_author_meta('description') && is_multi_author()) : ?>
			<?php get_template_part('author-bio'); ?>
		<?php endif; ?>
	</footer><!-- .entry-meta -->
</article><!-- #post -->

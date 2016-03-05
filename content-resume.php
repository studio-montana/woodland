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

<article id="post-<?php the_ID(); ?>" <?php post_class('content-resume'); ?>>
	<header class="entry-header">

		<?php
		if (function_exists('woodkit_display_title')){
			woodkit_display_title(get_the_ID(), true, true, '<h1 class="entry-title"><a href="'.get_the_permalink().'" title="'.esc_attr(get_the_title()).'">', '</a></h1>');
		}else{
			?><h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr(get_the_title()); ?>"><?php the_title(); ?></a></h1><?php
		} ?>
		
		<?php
		if (function_exists('woodkit_display_subtitle')){
			woodkit_display_subtitle();
		} ?>
	
		<?php if (!post_password_required()){ ?>
			<?php 
			if (function_exists('woodkit_display_thumbnail')){
				woodkit_display_thumbnail(get_the_ID(), 'post-thumbnail', '' , true, false, true, '<div class="entry-thumbnail"><a href="'.get_the_permalink().'" title="'.esc_attr(get_the_title()).'">', '</a></div>');
			}else if (has_post_thumbnail()){
				?>
				<div class="entry-thumbnail">
					<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr(get_the_title()); ?>">
						<?php the_post_thumbnail(); ?>
					</a>
				</div>
			<?php }
		} ?>

		<div class="entry-meta">
			<?php
			if (function_exists('woodlands_entry_meta')){
				woodlands_entry_meta();
			} ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	
	<footer class="entry-meta">
		<?php if (comments_open() && ! is_single()) : ?>
			<div class="comments-link">
				<?php comments_popup_link('<span class="leave-reply">' . __('Comment', 'woodlands') . '</span>', __('One comment', 'woodlands'), __('See % comments', 'woodlands') ); ?>
			</div><!-- .comments-link -->
		<?php endif; // comments_open() ?>
	</footer><!-- .entry-meta -->
</article><!-- #post -->

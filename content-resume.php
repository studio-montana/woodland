<?php
/**
 * @package WordPress
 * @subpackage Woodland
 * @version 2.0
 * @author Sébastien Chandonay www.seb-c.com / Cyril Tissot www.cyriltissot.com
 * This file, like this theme, like WordPress, is licensed under the GPL.
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('content-resume'); ?>>
	<header class="entry-header">
	
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

		<div class="entry-meta">
			<?php
			if (function_exists('woodkit_entry_meta')){
				woodkit_entry_meta();
			} ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	
	<footer class="entry-meta">
		<?php if (comments_open() && ! is_single()) : ?>
			<div class="comments-link">
				<?php comments_popup_link('<span class="leave-reply">' . __('Comment', WOODLAND_TEXT_DOMAIN) . '</span>', __('One comment', WOODLAND_TEXT_DOMAIN), __('See % comments', WOODLAND_TEXT_DOMAIN) ); ?>
			</div><!-- .comments-link -->
		<?php endif; // comments_open() ?>
	</footer><!-- .entry-meta -->
</article><!-- #post -->

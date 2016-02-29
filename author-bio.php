<?php
/**
 * @package WordPress
 * @subpackage Woodland
 * @version 2.0
 * @author Sébastien Chandonay www.seb-c.com / Cyril Tissot www.cyriltissot.com
 * This file, like this theme, like WordPress, is licensed under the GPL.
 */
?>

<div class="author-info">
	<div class="author-avatar">
		<?php
		/**
		 * Filter the author bio avatar size.
		 *
		 * @since Woodland 1.0
		 *
		 * @param int $size The avatar height and width size in pixels.
		 */
		$author_bio_avatar_size = apply_filters('woodland_author_bio_avatar_size', 74 );
		echo get_avatar( get_the_author_meta('user_email'), $author_bio_avatar_size );
		?>
	</div><!-- .author-avatar -->
	<div class="author-description">
		<h2 class="author-title"><?php printf( __('About %s', WOODLAND_TEXT_DOMAIN), get_the_author() ); ?></h2>
		<p class="author-bio">
			<?php the_author_meta('description'); ?>
			<a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta('ID') ) ); ?>" rel="author">
				<?php printf( __('View all posts by %s <span class="meta-nav">&rarr;</span>', WOODLAND_TEXT_DOMAIN), get_the_author() ); ?>
			</a>
		</p>
	</div><!-- .author-description -->
</div><!-- .author-info -->
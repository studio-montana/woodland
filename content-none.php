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
<article class="content-none">
	<header class="page-header">
		<h1 class="page-title">
			<?php if (is_search()){ ?>
				<i class="icon-search"></i>
				<?php _e('No result', 'woodland'); ?>
			<?php }else{ ?>
				<?php _e('No content', 'woodland'); ?>
			<?php } ?>
		</h1>
	</header>
	
	<div class="page-content">
	</div><!-- .page-content -->
</article>
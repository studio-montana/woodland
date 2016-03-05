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

if (is_active_sidebar('sidebar')) : ?>
	<div id="sidebar" class="sidebar-container" role="complementary">
		<div class="widget-area">
			<?php dynamic_sidebar('sidebar'); ?>
		</div><!-- .widget-area -->
		<div class="clear"></div>
	</div><!-- #sidebar -->
<?php endif; ?>
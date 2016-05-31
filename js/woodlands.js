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

(function($) {

	/**
	 * Body min-height (always full screen)
	 */
	function woodlands_body_minheight(){
		$("body").css("min-height", $(window).outerHeight(true)+"px");
	}
	$(document).ready(function(){
		woodlands_body_minheight();
		var woodlands_body_minheight_timer = null;
		$(window).resize(function() {
			if (woodlands_body_minheight_timer != null)
				clearTimeout(woodlands_body_minheight_timer);
			woodlands_body_minheight_timer = setTimeout(woodlands_body_minheight, 500);
		});
	});

})(jQuery);
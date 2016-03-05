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
	 * Menu toggle
	 */
	$('.menu-toggle').on('click', function(e) {
		if ($("body").hasClass("menu-toggled")) {
			$("body").removeClass("menu-toggled");
		} else {
			$("body").addClass("menu-toggled");
		}
	});

	/**
	 * Menu highlight
	 */
	var tool_menu_current_url = Woodlands.current_url;
	var tool_menu_home_url = Woodlands.home_url;
	var tool_menu_home_multisite_url = Woodlands.home_multisite_url;
	var tool_menu_blog_url = Woodlands.blog_url;
	var tool_menu_is_post = Woodlands.is_post;
	$(".nav a").each(
			function(i) {
				if ($(this).attr("href") != undefined) {
					if (tool_menu_current_url.indexOf($(this).attr("href")) >= 0 && $(this).attr("href") != tool_menu_home_url && $(this).attr("href") != tool_menu_home_url + "/"
							&& $(this).attr("href") != tool_menu_home_multisite_url + "/") {
						activate_menu_item($(this).parent());
					} else if (tool_menu_is_post == "1" && $(this).attr("href") == tool_menu_blog_url) {
						activate_menu_item($(this).parent());
					}
				}
			});
	function activate_menu_item($menu_item) {
		if ($menu_item.prop("tagName") == "LI") {
			$menu_item.addClass("current_menu_ancestor");
		}
		if (!$menu_item.hasClass("nav")) {
			activate_menu_item($menu_item.parent()); // recursive
		}
	}

	/**
	 * Menu scrollover
	 */
	// initial main menu position
	var main_menu = $('.site-navigation');
	var main_menu_initial_position = 0;
	if (main_menu.length > 0) {
		main_menu_initial_position = main_menu.offset().top;

		// listen scroll page
		$(window).on('scroll', function(e) {
			tool_menu_fixed_on_scroll();
		});

		// init
		tool_menu_fixed_on_scroll();
	}

	function tool_menu_fixed_on_scroll() {
		if ($(window).scrollTop() >= main_menu_initial_position) {
			// fixed
			$('.site-navigation').addClass("scrollover");
		} else {
			// relative
			$('.site-navigation').removeClass("scrollover");
		}
	}

})(jQuery);
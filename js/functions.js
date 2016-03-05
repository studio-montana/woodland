/**
 * @package WordPress
 * @version 1.0
 * @author Sébastien Chandonay www.seb-c.com / Cyril Tissot www.cyriltissot.com This file, like this theme, like WordPress, is licensed under the GPL.
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
	var tool_menu_current_url = Woodland.current_url;
	var tool_menu_home_url = Woodland.home_url;
	var tool_menu_home_multisite_url = Woodland.home_multisite_url;
	var tool_menu_blog_url = Woodland.blog_url;
	var tool_menu_is_post = Woodland.is_post;
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
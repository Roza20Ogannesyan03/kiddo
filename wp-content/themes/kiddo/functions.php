<?php


remove_action('wp_head',             'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles',     'print_emoji_styles');
remove_action('admin_print_styles',  'print_emoji_styles');

remove_action('wp_head', 'wp_resource_hints', 2); //remove dns-prefetch
remove_action('wp_head', 'wp_generator'); //remove meta name="generator"
remove_action('wp_head', 'wlwmanifest_link'); //remove wlwmanifest
remove_action('wp_head', 'rsd_link'); // remove EditURI
remove_action('wp_head', 'rest_output_link_wp_head'); // remove 'https://api.w.org/
remove_action('wp_head', 'rel_canonical'); //remove canonical
remove_action('wp_head', 'wp_shortlink_wp_head', 10); //remove shortlink
remove_action('wp_head', 'wp_oembed_add_discovery_links'); //remove alternate

// add_filter('show_admin_bar', '__return_false');
add_theme_support('post-thumbnails');
add_filter('use_block_editor_for_post', '__return_false', 10);
add_theme_support('title-tag');


add_action('wp_enqueue_scripts', 'add_scripts_and_styles');
add_action('after_setup_theme', 'add_menu');

function add_scripts_and_styles()
{

	wp_enqueue_script('script', get_template_directory_uri() . '/assets/js/script.js', array(), null, 'footer');
	wp_enqueue_script('bootstrap_js', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array(), null, 'footer');
	wp_enqueue_script('jquery', get_template_directory_uri() . '/assets/js/jquery-1.11.0.min.js', array(), null, 'footer');
	wp_enqueue_script('plugins', get_template_directory_uri() . '/assets/js/plugins.js', array(), null, 'footer');
	wp_enqueue_script('modernizr', get_template_directory_uri() . '/assets/js/modernizr.js', array(), null, 'footer');
	wp_enqueue_script('swiper_js', get_template_directory_uri() . '/assets/js/swiper-bundle.min.js', array(), null, 'footer');


	wp_enqueue_style('swiper_css', get_template_directory_uri() . '/assets/css/cdn.jsdelivr.net_npm_swiper@10.2.0_swiper.min.css');
	wp_enqueue_style('bootstrap_css', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
	wp_enqueue_style('vendor', get_template_directory_uri() . '/assets/css/vendor.css');
	wp_enqueue_style('style',  get_stylesheet_uri());
}

function add_menu()
{
	register_nav_menu('top', 'Меню в шапке сайта');
	register_nav_menu('bottom', 'Меню в подвале сайта');
}

if (function_exists('acf_add_options_page')) {
	acf_add_options_page(array(
		'page_title'   => 'Сайт',
		'menu_title'  => 'Сайт',
		'menu_slug'   => 'site-options',
		'capability'  => 'edit_posts',
		'redirect'    => false,
		'icon_url' => 'dashicons-code-standards',
	));
}



add_filter('wp_pagenavi', 'abeta_pagination', 10, 2);
function abeta_pagination($html)
{
	$out = '';
	$out = str_replace('<div', '', $html);

	$out = str_replace('class=\'wp-pagenavi\' role=\'navigation\'>', '', $out);
	$out = str_replace('<a', '<a class="pagination__page-item"', $out);
	$out = str_replace('</a>', '</a>', $out);
	$out = str_replace('<span aria-current=\'page\' class=\'current\'>', '<span class="pagination__page-item active">', $out);
	$out = str_replace('</div>', '', $out);
	$out = str_replace('?paged=', '', $out);
	return '<div class="pagination__page">' . $out . '</div>';
}


add_action('pre_get_posts', 'teleproject_check_current_projects');
function teleproject_check_current_projects($query)
{
	if (!is_admin() && $query->is_main_query()) {
		if (is_post_type_archive('products') || is_tax('toys')) {
			$query->set('posts_per_page', 1);
		}
	}
}


add_filter('post_type_archive_title', 'filter_post_type_videogallery', 10, 2);
function filter_post_type_videogallery($object_labels_name, $object_name)
{
	if ($object_name == "products" && pll_current_language() == "en") {
		$object_labels_name = "Products";
	}
	return $object_labels_name;
};


add_filter('bcn_breadcrumb_template', 'filter_bcn_breadcrumb_template', 10, 3);
function filter_bcn_breadcrumb_template($template, $this_type, $this_id)
{
	if ($this_type[0] == "home" && pll_current_language() == "en") {
		$template = "<li><a href='/en/главная-english/'>Main /</a></li>";
	}
	return $template;
};

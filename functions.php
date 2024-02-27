<?php

use eftec\bladeone\BladeOne;
use StockBrokersTheme\Blocks\ComparisonTable as ComparisonTableBlock;
use GeoIp2\Database\Reader;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/vendor/autoload.php';

/**
 * Register actions
 */
add_action('init', function () {
  register_nav_menus([
    'primary' => 'Primary',
    'footer' => 'Footer'
  ]);
});

add_action('after_setup_theme', function () {
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support(
    'html5',
    [
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
      'script',
      'style',
    ]
  );
  add_image_size('sb-partner-logo', 300, 150);
});

add_action('wp_enqueue_scripts', function () {
  // Styles
  wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&display=swap', [], '1.0.0');
  wp_enqueue_style('sb-styles', get_template_directory_uri() . '/dist/main.css', [], '1.0.10');

  // Scripts
  wp_enqueue_script('sb-js', get_template_directory_uri() . '/dist/main.js', [], '1.0.0', true);
  wp_script_add_data('sb-js', 'async', true);
});

add_action('enqueue_block_editor_assets', function () {
  wp_enqueue_style('sb-styles', get_template_directory_uri() . '/dist/main.css', [], '1.0.1');
}, 1, 1);

add_action('acf/init', function () {
  (new ComparisonTableBlock)->register()->registerFields();
});

/**
 * Filters
 */
add_filter('nav_menu_css_class', function ($classes, $item, $args) {
  if ($args->theme_location == 'footer') {
    $classes[] = 'mr-2';
  }
  if ($args->theme_location == 'primary') {
    $classes[] = 'text-center px-1';
  }
  return $classes;
}, 1, 3);

add_filter('block_categories', function ($categories, $post) {
  // Remove some of the built in blocks
  $removeCategories = ['layout', 'widgets', 'yoast-structured-data-blocks'];
  $categories = array_filter($categories, function ($category) use ($removeCategories) {
    return !in_array($category['slug'], $removeCategories);
  });

  $categories = array_merge(
    [
      [
        'slug' => 'sb-blocks',
        'title' => 'SB - Blocks'
      ]
    ],
    $categories
  );

  return $categories;
}, 10, 2);

/**
 * Disable Emojis
 */
add_action('init', function () {
  remove_action('wp_head', 'print_emoji_detection_script', 7);
  remove_action('admin_print_scripts', 'print_emoji_detection_script');
  remove_action('wp_print_styles', 'print_emoji_styles');
  remove_action('admin_print_styles', 'print_emoji_styles');
  remove_filter('the_content_feed', 'wp_staticize_emoji');
  remove_filter('comment_text_rss', 'wp_staticize_emoji');
  remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
  add_filter('tiny_mce_plugins', function ($plugins) {
    if (is_array($plugins)) {
      return array_diff($plugins, ['wpemoji']);
    } else {
      return [];
    }
  });
  add_filter('wp_resource_hints', function ($urls, $relation_type) {
    if ('dns-prefetch' == $relation_type) {
      /** This filter is documented in wp-includes/formatting.php */
      $emoji_svg_url = apply_filters('emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/');

      $urls = array_diff($urls, [$emoji_svg_url]);
    }

    return $urls;
  }, 10, 2);
});

/**
 * Blade
 */
$views = __DIR__ . '/src/blade/views';
$cache = __DIR__ . '/src/blade/cache';
$GLOBALS['blade'] = new BladeOne($views, $cache, BladeOne::MODE_AUTO);


function themename_custom_logo_setup()
{
  $defaults = array(
    'height'      => 100,
    'width'       => 400,
    'flex-height' => true,
    'flex-width'  => true,
    'header-text' => array('site-title', 'site-description'),
    'unlink-homepage-logo' => true,
  );
  add_theme_support('custom-logo', $defaults);
}
add_action('after_setup_theme', 'themename_custom_logo_setup');

add_theme_support('custom-logo');

function getCurrencySymbol()
{
  $countryCode = '';
  if (!isset($_COOKIE['countrycode'])) {
    if ($_SERVER['REMOTE_ADDR'] !== '172.25.0.1') {
      try {
        $reader = new Reader(__DIR__ . '/GeoLite2-Country.mmdb');
        $countryCode = $reader->country($_SERVER['REMOTE_ADDR'])->country->isoCode;
        setcookie('countrycode', $countryCode);
      } catch(Exception $e) {
  
      }
    }
  } else {
    $countryCode = $_COOKIE['countrycode'];
  }

  $currencySymbol = '$';
  
  switch ($countryCode) {
    case 'AT':
    case 'BE':
    case 'CY':
    case 'EE':
    case 'FI':

    case 'FR':
    case 'DE':
    case 'EL':
    case 'IE':
    case 'IT':

    case 'LV':
    case 'LT':
    case 'LU':
    case 'MT':
    case 'NL':

    case 'PT':
    case 'SK':
    case 'SI':
    case 'ES':
      $currencySymbol = '€';
      break;
    case 'GB':
      $currencySymbol = '£';
      break;
    default:
      $currencySymbol = '$';
      break;
  }
  return $currencySymbol;
}

add_shortcode('year', function() {
  return date('Y');
});

add_shortcode('month', function() {
  return date('F');
});

// Callback function to handle the request
function handle_add_repeater_data_request($request)
{
  // Replace 'partnersMapping' with the actual key of your repeater field
  $repeater_key = 'partnersMapping';

  // Get JSON data from the request body
  $json_data = $request->get_json_params();

  // Check if the repeater field exists
  if (have_rows($repeater_key, 'option')) {
    // Iterate through the data and add rows to the repeater field
    foreach ($json_data as $row) {
      add_row($repeater_key, $row, 'option');
    }

    // Get the existing options
    $existing_options = get_option('options');

    // Save the data
    $existing_options[$repeater_key] = get_field($repeater_key, 'option');

    // Update the options
    update_option('options', $existing_options);

    // Return a success response
    return rest_ensure_response(array('success' => true, 'message' => 'Repeater data added successfully.'));
  } else {
    // Return an error response if the repeater field does not exist
    return rest_ensure_response(array('success' => false, 'message' => 'Repeater field not found.'));
  }
}

function handlePartnerImport($request)
{
  return [];
}

// Add a custom REST API endpoint for adding repeater data
function add_repeater_data_endpoint()
{
  register_rest_route('custom/v1', '/add-repeater-data/', array(
    'methods' => 'POST',
    'callback' => 'handle_add_repeater_data_request',
  ));
}

add_action('rest_api_init', 'add_repeater_data_endpoint');

add_shortcode('gclid', function() {
  return $_GET['gclid'] ?? '';
});
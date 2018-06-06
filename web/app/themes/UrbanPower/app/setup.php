<?php

namespace App;

use Roots\Sage\Container;
use Roots\Sage\Assets\JsonManifest;
use Roots\Sage\Template\Blade;
use Roots\Sage\Template\BladeProvider;

/**
 * Theme assets
 */
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('sage/main.css', asset_path('styles/main.css'), false, null);
    wp_enqueue_script('sage/main.js', asset_path('scripts/main.js'), ['jquery'], null, true);
}, 100);

/**
 * Theme setup
 */
add_action('after_setup_theme', function () {
    /**
     * Enable features from Soil when plugin is activated
     * @link https://roots.io/plugins/soil/
     */
    add_theme_support('soil-clean-up');
    add_theme_support('soil-jquery-cdn');
    add_theme_support('soil-nav-walker');
    add_theme_support('soil-nice-search');
    add_theme_support('soil-relative-urls');

    /**
     * Enable plugins to manage the document title
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Register navigation menus
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'sage')
    ]);

    /**
     * Enable post thumbnails
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Enable HTML5 markup support
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

    /**
     * Enable selective refresh for widgets in customizer
     * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/#theme-support-in-sidebars
     */
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Use main stylesheet for visual editor
     * @see resources/assets/styles/layouts/_tinymce.scss
     */
    add_editor_style(asset_path('styles/main.css'));
}, 20);

/**
 * Register sidebars
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ];


    $form_config = [
        'before_widget' => '<div id="%1$s" class="urbanpower-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<label class="urbanpower-widget-title"><span class="urbanpower-widget-title-inner"><em class="input-required">* </em>',
        'after_title'   => '</span></label>'
    ];

    register_sidebar([
        'name'          => __('Primary', 'sage'),
        'id'            => 'sidebar-primary'
    ] + $config);

    register_sidebar([
        'name'          => __('Footer', 'sage'),
        'id'            => 'sidebar-footer'
    ] + $config);
    register_sidebar([
        'name'          => __('Form - 1 (1/3)', 'urbanpower'),
        'id'            => 'form-1',
        'description'   => __('Widget area (left side) 1/3 on contact Us form', 'urbanpower')
    ] + $form_config);

    register_sidebar([
        'name'          => __('Form - 2 (2/3)', 'urbanpower'),
        'id'            => 'form-2',
        'description'   => __('Widget area (top right side) 2/3 on contact Us form', 'urbanpower')
    ] + $form_config);

    register_sidebar([
        'name'          => __('Form - 3 (1/3)', 'urbanpower'),
        'id'            => 'form-3',
        'description'   => __('Widget area (right) 1/3 on contact Us form', 'urbanpower')
    ] + $form_config);


    register_sidebar([
        'name'          => __('Form - 4 (1/3)', 'urbanpower'),
        'id'            => 'form-4',
        'description'   => __('Widget area (right) 1/3 on contact Us form', 'urbanpower')
    ] + $form_config);

    register_sidebar([
        'name'          => __('Form - 5 (2/3)', 'urbanpower'),
        'id'            => 'form-5',
        'description'   => __('Widget area (lower right side) 2/3 on contact Us form', 'urbanpower')
    ] + $form_config);

    register_sidebar([
        'name'          => __('Form - 6 (1/3)', 'urbanpower'),
        'id'            => 'form-6',
        'description'   => __('Widget area (right) 1/3 on contact Us form', 'urbanpower')
    ] + $form_config);

    register_sidebar([
        'name'          => __('Form - 7 (1/3)', 'urbanpower'),
        'id'            => 'form-7',
        'description'   => __('Widget area (right) 1/3 on contact Us form', 'urbanpower')
    ] + $form_config);
});

/**
 * Updates the `$post` variable on each iteration of the loop.
 * Note: updated value is only available for subsequently loaded views, such as partials
 */
add_action('the_post', function ($post) {
    sage('blade')->share('post', $post);
});

/**
 * Setup Sage options
 */
add_action('after_setup_theme', function () {
    /**
     * Add JsonManifest to Sage container
     */
    sage()->singleton('sage.assets', function () {
        return new JsonManifest(config('assets.manifest'), config('assets.uri'));
    });

    /**
     * Add Blade to Sage container
     */
    sage()->singleton('sage.blade', function (Container $app) {
        $cachePath = config('view.compiled');
        if (!file_exists($cachePath)) {
            wp_mkdir_p($cachePath);
        }
        (new BladeProvider($app))->register();
        return new Blade($app['view']);
    });

    /**
     * Create @asset() Blade directive
     */
    sage('blade')->compiler()->directive('asset', function ($asset) {
        return "<?= " . __NAMESPACE__ . "\\asset_path({$asset}); ?>";
    });
});

/**
 * All Functions that uses the add_theme_support of WordPress
 */
add_action('after_setup_theme', function () {
    add_theme_support( 'custom-logo', [
        'height'      => 84,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
        'priority'  => 200,
    ] );
});

/**
 * Register sidebar for Footer
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<div class="footer-child widget %1$s %2$s col-md-12 col-lg-2 mx-md-1">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-title">',
        'after_title'   => '</h4>'
    ];
    register_sidebar([
        'name'          => __('Footer 1', 'sage'),
        'id'            => 'urban-footer-1'
    ] + $config);
    register_sidebar([
        'name'          => __('Footer 2', 'sage'),
        'id'            => 'urban-footer-2'
    ] + $config);
    register_sidebar([
        'name'          => __('Footer 3', 'sage'),
        'id'            => 'urban-footer-3'
    ] + $config);
    register_sidebar([
        'name'          => __('Footer 4', 'sage'),
        'id'            => 'urban-footer-4'
    ] + $config);
    register_sidebar([
        'name'          => __('Footer 5', 'sage'),
        'id'            => 'urban-footer-5'
    ] + $config);
});


/**
 * UrbanPower Widgets
 */
require_once(dirname(__DIR__) . '/app/classes/urbanpower-widgets.php');



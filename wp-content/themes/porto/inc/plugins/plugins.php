<?php

/**********************/
/* Wordpress Importer */
/**********************/
$plugin = porto_plugins .'/importer/importer.php';
include $plugin;

/******************************/
/* Include Sidebars Generator */
/******************************/
$plugin = porto_plugins .'/sidebar-generator/sidebar_generator.php';
include $plugin;

/*************************/
/* TGM Plugin Activation */
/*************************/
$plugin = porto_plugins.'/tgm-plugin-activation/class-tgm-plugin-activation.php';
if ( ! class_exists( 'TGM_Plugin_Activation' ) ) { require_once $plugin; }
if ( ! get_option('porto_unregistered') ){
    add_action( 'tgmpa_register', 'porto_register_required_plugins' );
}
function porto_get_required_plugins_list() {
    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
        array(
            'name'                     => 'WPBakery Visual Composer',
            'slug'                     => 'js_composer',
            'source'                   => porto_plugins . '/js_composer.zip',
            'required'                 => true,
            'version'                  => '5.4.7',
            'url'                      => 'js_composer/js_composer.php',
            'image_url'                => porto_plugins_uri . '/images/visual_composer.png'
        ),
        array(
            'name'                     => 'Porto Functionality',
            'slug'                     => 'porto-functionality',
            'source'                   => porto_plugins . '/porto-functionality.zip',
            'required'                 => true,
            'version'                  => '1.0.6',
            'url'                      => 'porto-functionality/porto-functionality.php',
            'image_url'                => porto_plugins_uri . '/images/porto_functionality.png'
        ),
        array(
            'name'                     => 'Revolution Slider',
            'slug'                     => 'revslider',
            'source'                   => porto_plugins . '/revslider.zip',
            'required'                 => false,
            'version'                  => '5.4.7.1',
            'url'                      => 'revslider/revslider.php',
            'image_url'                => porto_plugins_uri . '/images/revolution_slider.png'
        ),
        array(
            'name'                     => 'Contact Form 7',
            'slug'                     => 'contact-form-7',
            'required'                 => false,
            'url'                      => 'contact-form-7/wp-contact-form-7.php',
            'image_url'                => porto_plugins_uri . '/images/contact_form_7.png'
        ),
        array(
            'name'                     => 'Woocommerce',
            'slug'                     => 'woocommerce',
            'required'                 => false,
            'url'                      => 'woocommerce/woocommerce.php',
            'image_url'                => porto_plugins_uri . '/images/woocommerce.png'
        ),
        array(
            'name'                     => 'Dynamic Featured Image',
            'slug'                     => 'dynamic-featured-image',
            'required'                 => false,
            'url'                      => 'dynamic-featured-image/dynamic-featured-image.php',
            'image_url'                => porto_plugins_uri . '/images/dynamic_featured_image.png'
        ),
        array(
            'name'                     => 'MailPoet Newsletters',
            'slug'                     => 'wysija-newsletters',
            'required'                 => false,
            'url'                      => 'wysija-newsletters/index.php',
            'image_url'                => porto_plugins_uri . '/images/mailpoet_newsletter.png'
        ),
        array(
            'name'                     => 'Instagram Slider Widget',
            'slug'                     => 'instagram-slider-widget',
            'required'                 => false,
            'url'                      => 'instagram-slider-widget/instaram_slider.php',
            'image_url'                => porto_plugins_uri . '/images/instagram_slider_widget.png'
        ),

        array(
            'name'                     => 'Regenerate Thumbnails',
            'slug'                     => 'regenerate-thumbnails',
            'required'                 => false,
            'url'                      => 'regenerate-thumbnails/regenerate-thumbnails.php',
            'image_url'                => porto_plugins_uri . '/images/regenerate_thumbnails.png',
            'visibility'               => 'hidden'
        ),
        array(
            'name'                     => 'Yith Woocommerce Wishlist',
            'slug'                     => 'yith-woocommerce-wishlist',
            'required'                 => false,
            'url'                      => 'yith-woocommerce-wishlist/init.php',
            'image_url'                => porto_plugins_uri . '/images/yith_wishlist.png',
            'visibility'               => 'hidden'
        ),
        array(
            'name'                     => 'Yith Woocommerce Ajax Product Filter',
            'slug'                     => 'yith-woocommerce-ajax-navigation',
            'required'                 => false,
            'url'                      => 'yith-woocommerce-ajax-navigation/init.php',
            'image_url'                => porto_plugins_uri . '/images/yith_ajax_filter.png',
            'visibility'               => 'hidden'
        ),
        array(
            'name'                     => 'Yith Woocommerce Ajax Search',
            'slug'                     => 'yith-woocommerce-ajax-search',
            'required'                 => false,
            'url'                      => 'yith-woocommerce-ajax-search/init.php',
            'image_url'                => porto_plugins_uri . '/images/yith_ajax_search.png',
            'visibility'               => 'hidden'
        ),
        array(
            'name'                     => 'WP Sitemap Page',
            'slug'                     => 'wp-sitemap-page',
            'required'                 => false,
            'url'                      => 'wp-sitemap-page/wp-sitemap-page.php',
            'image_url'                => porto_plugins_uri . '/images/wp_sitemap_page.png',
            'visibility'               => 'hidden'
        ),
        array(
            'name'                     => 'Envato Toolkit',
            'slug'                     => 'envato-wordpress-toolkit',
            'source'                   => porto_plugins . '/envato-wordpress-toolkit.zip',
            'required'                 => false,
            'version'                  => '1.7.3',
            'url'                      => 'envato-wordpress-toolkit/index.php',
            'image_url'                => porto_plugins_uri . '/images/envato_wordpress_toolkit.png',
            'visibility'               => 'hidden'
        ),
    );

    if (defined('GEODIRECTORY_VERSION')) {
        $plugins = array_merge($plugins,
            array(
                array(
                    'name'                     => 'GeoDirectory Porto Theme Compatibility Pack',
                    'slug'                     => 'geodirectory-porto-theme-compatibility-pack',
                    'source'                   => porto_plugins_uri . '/geodirectory-porto-theme-compatibility-pack.zip',
                    'required'                 => true,
                    'version'                  => '1.0.0',
                    'image_url'                => porto_plugins_uri . '/images/geodirectory_porto_pack.png'
                )
            )
        );
    }
    return $plugins;
}
function porto_register_required_plugins() {

    // disable visual composer automatic update
    global $vc_manager;
    if ( $vc_manager ) {
        $vc_updater = $vc_manager->updater();
        if ($vc_updater) {
            remove_filter('upgrader_pre_download', array(&$vc_updater, 'upgradeFilterFromEnvato'));
            remove_filter('upgrader_pre_download', array(&$vc_updater, 'preUpgradeFilter'));
            remove_action('wp_ajax_nopriv_vc_check_license_key', array(&$vc_updater, 'checkLicenseKeyFromRemote'));
        }
    }

    $plugins = porto_get_required_plugins_list();

    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'domain'               => 'porto',          // Text domain - likely want to be the same as your theme.
        'default_path'         => '',                          // Default absolute path to pre-packaged plugins
        'menu'                 => 'install-required-plugins',  // Menu slug
        'has_notices'          => true,                        // Show admin notices or not
        'is_automatic'         => true,                       // Automatically activate plugins after installation or not
        'message'              => '',                          // Message to output right before the plugins table
        'strings'              => array(
            'page_title'                               => __( 'Install Required Plugins', 'porto' ),
            'menu_title'                               => __( 'Install Plugins', 'porto' ),
            'installing'                               => __( 'Installing Plugin: %s', 'porto' ), // %1$s = plugin name
            'oops'                                     => __( 'Something went wrong with the plugin API.', 'porto' ),
            'notice_can_install_required'              => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'porto' ), // %1$s = plugin name(s)
            'notice_can_install_recommended'           => '',
            'notice_cannot_install'                    => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'porto' ), // %1$s = plugin name(s)
            'notice_can_activate_required'             => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'porto' ), // %1$s = plugin name(s)
            'notice_can_activate_recommended'          => '',
            'notice_cannot_activate'                   => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'porto' ), // %1$s = plugin name(s)
            'notice_ask_to_update'                     => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'porto' ),
            'notice_cannot_update'                     => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'porto' ), // %1$s = plugin name(s)
            'install_link'                             => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'porto' ),
            'activate_link'                            => _n_noop( 'Activate installed plugin', 'Activate installed plugins', 'porto' ),
            'return'                                   => __( 'Return to Required Plugins Installer', 'porto' ),
            'plugin_activated'                         => __( 'Plugin activated successfully.', 'porto' ),
            'complete'                                 => __( 'All plugins installed and activated successfully. %s', 'porto' ), // %1$s = dashboard link
            'nag_type'                                 => 'updated' // Determines admin notice type - can only be 'updated' or 'error'
        )
    );

    tgmpa( $plugins, $config );
}

// disable master slider auto update
add_filter( 'masterslider_disable_auto_update', '__return_true' );

// disable ultimate addons update check
define('BSF_CHECK_PRODUCT_UPDATES', false);
add_filter('pre_update_option_ultimate_smooth_scroll', 'porto_update_smooth_scroll_option', 10, 3);
function porto_update_smooth_scroll_option($value, $old_value, $option) {
    if ($value == 'enable') {
        update_option('ultimate_smooth_scroll_compatible', 'enable');
    } else {
        update_option('ultimate_smooth_scroll_compatible', 'disable');
    }
    return $value;
}
add_filter('option_ultimate_smooth_scroll', 'porto_get_smooth_scroll_option', 10, 2);
function porto_get_smooth_scroll_option($value) {
    if ($value == 'enable') {
        update_option('ultimate_smooth_scroll_compatible', 'enable');
    } else {
        update_option('ultimate_smooth_scroll_compatible', 'disable');
    }
    return $value;
}

/**
 * Force Visual Composer to initialize as "built into the theme". This will hide certain tabs under the Settings->Visual Composer page
 */
add_action( 'vc_before_init', 'porto_vc_set_as_theme' );
function porto_vc_set_as_theme() {
    if (function_exists('vc_set_as_theme'))
        vc_set_as_theme();
}

if (!function_exists('is_plugin_activate'))
    require_once(ABSPATH . 'wp-admin/includes/plugin.php');
if ( class_exists( 'WooCommerce' ) ) :
    add_action( 'admin_init', 'porto_include_woo_templates' );

    function porto_include_woo_templates() {
        include_once( WC()->plugin_path() . '/includes/wc-template-functions.php' );
    }
endif;

if(!get_option('ultimate_js') || get_option('ultimate_js') == '')
    update_option('ultimate_js', 'enable');
if(!get_option('ultimate_css') || get_option('ultimate_css') == '')
    update_option('ultimate_css', 'enable');

?>
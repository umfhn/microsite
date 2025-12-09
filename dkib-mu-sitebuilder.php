<?php
/**
 * Plugin Name: dKIB µSiteBuilder v1.4.2
 * Description: Sauberer Microsite-Rahmen für dKip Box - Container-basierte Microsites mit GEO/SEO und KI-Unterstützung
 * Version: 1.4.2
 * Author: dKip Team
 * License: GPL-2.0+
 * Text Domain: dkib-mu-sitebuilder
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Define plugin constants
define('DKIB_MU_VERSION', '1.4.2');
define('DKIB_MU_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('DKIB_MU_PLUGIN_URL', plugin_dir_url(__FILE__));
define('DKIB_MU_PLUGIN_FILE', __FILE__);

// Include required files
require_once DKIB_MU_PLUGIN_DIR . 'includes/class-settings.php';
require_once DKIB_MU_PLUGIN_DIR . 'includes/class-block-registration.php';
require_once DKIB_MU_PLUGIN_DIR . 'includes/class-frontend-renderer.php';

// Initialize the plugin
function dkib_mu_init() {
    // Load text domain for translations
    load_plugin_textdomain('dkib-mu-sitebuilder', false, dirname(plugin_basename(__FILE__)) . '/languages');

    // Initialize settings
    $settings = DKIB_MU_Settings::get_instance();
    $settings->init();

    // Initialize block registration
    $block_registration = new DKIB_MU_Block_Registration();
    $block_registration->init();

    // Initialize frontend renderer
    $frontend_renderer = new DKIB_MU_Frontend_Renderer();
    $frontend_renderer->init();
}
add_action('plugins_loaded', 'dkib_mu_init');

// Add filter for WordPress standard pagination
function dkib_mu_filter_wp_link_pages($output, $args) {
    // Get plugin settings
    $settings = DKIB_MU_Settings::get_instance();
    $plugin_settings = $settings->get_settings();

    // Check if pagination should be hidden
    if (isset($plugin_settings['show_pagination_pages']) && !$plugin_settings['show_pagination_pages']) {
        // Check if current post has microsite container block
        global $post;
        if ($post && has_block('dkib/microsite-container', $post)) {
            // Return empty string to hide pagination
            return '';
        }
    }

    // Return original output if pagination should be shown
    return $output;
}
add_filter('wp_link_pages', 'dkib_mu_filter_wp_link_pages', 10, 2);

// Enqueue frontend assets if microsite container block is used
function dkib_mu_enqueue_frontend_assets() {
    // Only enqueue on frontend (not admin)
    if (is_admin()) {
        return;
    }

    // Check if current post has microsite container block
    global $post;
    if (!$post || !has_block('dkib/microsite-container', $post)) {
        return;
    }

    // Enqueue accordion CSS
    wp_enqueue_style(
        'dkib-mu-accordion',
        DKIB_MU_PLUGIN_URL . 'assets/css/accordion.css',
        array(),
        DKIB_MU_VERSION
    );

    // Enqueue content block accordion CSS (für Inhaltsblöcke)
    wp_enqueue_style(
        'dkib-mu-content-accordion',
        DKIB_MU_PLUGIN_URL . 'assets/css/content-accordion.css',
        array(),
        DKIB_MU_VERSION
    );

    // Enqueue accordion JavaScript
    wp_enqueue_script(
        'dkib-mu-accordion-frontend',
        DKIB_MU_PLUGIN_URL . 'assets/js/frontend-accordion.js',
        array(),
        DKIB_MU_VERSION,
        true
    );

    // Enqueue content block accordion JavaScript (barrierefreier Accordion mit ARIA)
    wp_enqueue_script(
        'dkib-mu-content-accordion',
        DKIB_MU_PLUGIN_URL . 'assets/js/content-accordion.js',
        array(),
        DKIB_MU_VERSION,
        true
    );

    // Enqueue frontend styles
    wp_enqueue_style(
        'dkib-mu-blocks',
        DKIB_MU_PLUGIN_URL . 'assets/css/frontend.css',
        array(),
        DKIB_MU_VERSION
    );

    // Enqueue AppLayout assets if needed
    wp_enqueue_style(
        'dkib-mu-applayout',
        DKIB_MU_PLUGIN_URL . 'assets/css/applayout.css',
        array(),
        DKIB_MU_VERSION
    );

    wp_enqueue_script(
        'dkib-mu-applayout-frontend',
        DKIB_MU_PLUGIN_URL . 'assets/js/frontend-applayout.js',
        array(),
        DKIB_MU_VERSION,
        true
    );
}
add_action('wp_enqueue_scripts', 'dkib_mu_enqueue_frontend_assets');


<?php

class FlexiView_MP_Settings_Page {
    public function __construct() {
        add_action( 'admin_menu', array( $this, 'add_plugin_menu' ) );
        add_action( 'admin_init', array( $this, 'register_settings' ) );
        add_action( 'admin_enqueue_scripts', function ($hook) {
            if ( $hook === 'toplevel_page_flexiview-settings' ) {
                wp_enqueue_media();
            }
        });
    }

    /**
     * @return void
     */
    public function add_plugin_menu(): void {
        add_menu_page(
            'FlexiView Settings',       // Page title
            'FlexiView',               // Menu title
            'manage_options',               // Capability
            'flexiview-settings',      // Menu slug
            array( $this, 'settings_page_html' ),    // Callback function
            'dashicons-admin-generic',       // Icon
            60                               // Position
        );
    }

    public function register_settings(): void {}

    public function settings_page_html(): void {}
}

new FlexiView_MP_Settings_Page();
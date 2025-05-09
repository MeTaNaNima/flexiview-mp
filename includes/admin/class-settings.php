<?php

class FlexiView_MP_Settings_Page
{
    public function __construct()
    {
        add_action('admin_menu', array($this, 'add_plugin_menu'));
        add_action('admin_init', array($this, 'register_settings'));
        add_action('admin_enqueue_scripts', function ($hook) {
            if ($hook === 'toplevel_page_flexiview-settings') {
                wp_enqueue_media();
            }
        });
    }

    /**
     * @return void
     */
    public function add_plugin_menu(): void
    {
        add_menu_page(
            'FlexiView Settings',       // Page title
            'FlexiView',               // Menu title
            'manage_options',               // Capability
            'flexiview-settings',      // Menu slug
            array($this, 'settings_page_html'),    // Callback function
            'dashicons-admin-generic',       // Icon
            60                               // Position
        );
    }

    public function register_settings(): void
    {
        register_setting('flexiview_settings_group', 'flexiview_show_button');

        add_settings_section(
            'flexiview_main_section',
            'Main Settings',
            null,
            'flexiview-settings'
        );

        add_settings_field(
            'flexiview_show_button',
            'Show Accessibility Button',
            function () {
                $value = get_option('flexiview_show_button', false);
                echo '<input type="checkbox" name="flexiview_show_button" value="1"' . checked(1, $value, false) . '> Enable the button on frontend';
            },
            'flexiview-settings',
            'flexiview_main_section'
        );
    }

    public function settings_page_html(): void
    {
        if (! current_user_can('manage_options')) return;
?>
        <div class="wrap">
            <h1>FlexiView Settings</h1>
            <form method="post" action="options.php">
                <?php
                settings_fields('flexiview_settings_group');
                do_settings_sections('flexiview-settings');
                submit_button();
                ?>
            </form>
        </div>
<?php
    }
}

<?php

class Flexiview_MP_Enqueues
{
    /**
     * @return void
     */
    public static function init(): void
    {
        add_action('wp_enqueue_scripts', [__CLASS__, 'enqueue_styles']);
        add_action('wp_enqueue_scripts', [__CLASS__, 'enqueue_scripts']);
        // add_action('admin_enqueue_scripts', [__CLASS__, 'enqueue_admin_styles']);
    }

    public static function enqueue_styles(): void
    {
        if (! is_admin()) {
            // jQuery UI CSS (external or WordPress version)
            wp_enqueue_style(
                'jquery-ui-css',
                'https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css',
                [],
                '1.12.1'
            );

            wp_enqueue_style(
                'flexiview-mp',
                FLEXIVIEW_MP_URL . 'assets/css/flexiview-front.css',
                [],
                '1.0',
                'all'
            );

            wp_enqueue_style(
                'flexiview-grid',
                FLEXIVIEW_MP_URL . 'assets/css/flexiview-grid.css',
                [],
                '1.0',
                'all'
            );

            wp_enqueue_style(
                'flexiview-accessibility',
                FLEXIVIEW_MP_URL . 'assets/css/flexiview-accessibility.css',
                [],
                '1.0',
                'all'
            );
        }
    }

    public static function enqueue_scripts(): void
    {
        // jQuery UI for slider functionality
        wp_enqueue_script('jquery-ui-slider');

        wp_enqueue_script(
            'flexiview-mp',
            FLEXIVIEW_MP_URL . 'assets/js/flexiview-front.js',
            ['jquery'],
            null,
            true
        );
    }
}

Flexiview_MP_Enqueues::init();

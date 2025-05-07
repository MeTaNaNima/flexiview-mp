<?php

class Flexiview_MP_Enqueues {
    /**
     * @return void
     */
    public static function init(): void
    {
        add_action('wp_enqueue_scripts', [__CLASS__, 'enqueue_styles']);
        add_action('wp_enqueue_scripts', [__CLASS__, 'enqueue_scripts']);
        add_action('admin_enqueue_scripts', [__CLASS__, 'enqueue_admin_styles']);
    }

    public static function enqueue_styles(): void {}

    public static function enqueue_scripts(): void {}
}

Flexiview_MP_Enqueues::init();
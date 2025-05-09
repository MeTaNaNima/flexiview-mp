<?php

/**
 * @link                https://marketingplanet.agency/
 * @since               1.0.0
 * @package             FlexiView_MP
 *
 * @wordpress-plugin
 * Plugin Name:         FlexiView Mp
 * Plugin URI:          https://marketingplanet.agency/flexiview/
 * Description:         Easy way to fix accessibility on you WordPress website.
 * Version:             1.0
 * Author:              Marketing Planet xMP
 * Author URI:          http://www.gnu.org/licenses/gpl-2.0.txt
 * License:             GPL-2.0+
 * Text Domain:         flexiview-mp
 * Domain Path:         /languages
 */

if (! defined('WPINC')) {
    die;
}

// TODO: Based on https://kcisfoundation.org/
// TODO: Settings/Configs shall be saved based on session/cookie
// TODO: get/attach all original values to the tags and attributes

// TODO: Step 1: Create Modal and append Classes to body and tags maybe!


// --------------------
// Constants
// --------------------
define('FLEXIVIEW_MP_URL', plugin_dir_url(__FILE__));


// --------------------
// Requirements
// --------------------
require_once plugin_dir_path(__FILE__) . 'includes/classes/class-flexiview-mp-activation.php';
require_once plugin_dir_path(__FILE__) . 'includes/classes/class-enqueues.php';
require_once plugin_dir_path(__FILE__) . 'includes/admin/class-settings.php';


// --------------------
// Activation Hook
// --------------------
// register_activation_hook(__FILE__, array('Flexiview_MP_Activation', 'activate'));


// --------------------
// Plugin Init
// --------------------
function flexiview_mp_init()
{
    new FlexiView_MP_Settings_Page(); // Admin settings page
    new Flexiview_MP_Enqueues();      // Enqueue frontend/backend styles/scripts
}
add_action('plugins_loaded', 'flexiview_mp_init');


// --------------------
// Append Button in Footer (if enabled)
// --------------------
add_action('wp_footer', function () {
    if (get_option('flexiview_show_button')) {
        $flexiview_button_icon = FLEXIVIEW_MP_URL . 'assets/images/flexiview-icon.png';

        echo '<div id="flexiview-access-btn" class="flexiview-access-btn flexiview-cursor-pointer">';
        echo '<img src="' . $flexiview_button_icon . '" alt="" style="width: 2rem; height: auto;">';
        echo '</div>';

        // echo '<button id="flexiview-access-btn" class="flexiview-access-btn" style="position: fixed; bottom: 20px; right: 20px; z-index: 9999;">Accessibility Options</button>';
        // Load the modal template
        $modal_path = plugin_dir_path(__FILE__) . 'templates/front-modal.php';
        if (file_exists($modal_path)) {
            include $modal_path;
        }
    }
});

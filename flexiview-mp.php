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


// requires



// Activation hook
register_activation_hook(__FILE__, array('Flexiview_MP_Activation', 'activate'));

// Inits
function flexiview_mp_init() {}

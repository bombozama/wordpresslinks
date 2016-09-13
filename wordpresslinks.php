<?php

/**
 * Plugin Name:       Widgetkit: WP Bookmarks CP
 * Plugin URI:        https://github.com/bombozama/wordpresslinks
 * Description:       Allows to use the old Wordpress Link Manager (bookmarks) as a content provider for Widgetkit.
 * Version:           1.0.0
 * Author:            Gonzalo Henríquez <gonzalo.henriquez@fao.org>
 * Author URI:        http://github.com/bombozama
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

use YOOtheme\Widgetkit\Application;

add_action( 'plugins_loaded', function() {

    if ( ! class_exists( 'YOOtheme\Widgetkit\Application' ) ) {
        return;
    }

    $app = Application::getInstance();

    # Register plugin path for wordpresslinks content provider
    $app['plugins']->addPath( __DIR__ . '/plugins/content/wordpresslinks/plugin.php' );
    $app['locator']->addPath( 'plugins/content/wordpresslinks', __DIR__ . '/plugin' );

    # Register plugin path for presentationlist widget
    $app['plugins']->addPath( __DIR__ . '/plugins/widgets/presentationlist/plugin.php' );
    $app['locator']->addPath( 'plugins/widgets/presentationlist', __DIR__ . '/plugin' );
});

// Enable the Link Manager if necessary
if( get_bloginfo( 'version' ) >= 3.5 ) {
    add_filter( 'pre_option_link_manager_enabled', '__return_true' );
}
<?php
/**
 * The file responsible for starting the Easy Timeout Session plugin
 *
 * The Easy Timeout Session is a plugin that allows you to change the
 * session timeout for a wordpress user. This particular file is
 * responsible for including the dependencies and starting the plugin.
 *
 * @package ETS
 *
 * Plugin Name: Easy Timeout Session
 * Plugin URI: http://wordpress.org/plugins/easy-timeout-session/
 * Description: Changes Timeout Session length
 * Version: 1.0
 * Author: Joaquin Ruiz
 * Author URI: http://jokiruiz.com
 */

// If this file is called directly, then abort execution.
if ( ! defined( 'WPINC' ) ) {
    die;
}

/**
 * Include the core class responsible for loading all necessary components of the plugin.
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/class-easy-timeout-session.php';

/**
 * Instantiates the Easy Timeout Session class and then
 * calls its run method officially starting up the plugin.
 */
function run_easy_timeout_session() {

    $ets = new Easy_Timeout_Session();
    $ets->run();

}

run_easy_timeout_session();


/** THE END **/

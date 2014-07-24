<?php

/**
 * The Easy Timeout Session is a plugin that allows you to change the
 * session timeout for a wordpress user. This particular file is
 * responsible for including the dependencies and starting the plugin.
 *
 * @package ETS
 */

class Easy_Timeout_Session {

    /**
     * A reference to the loader class that coordinates the hooks and callbacks
     * throughout the plugin.
     *
     * @access protected
     * @var    Easy_Timeout_Session_Loader   $loader    Manages hooks between the WordPress hooks and the callback functions.
     */
    protected $loader;

    /**
     * Represents the slug of hte plugin that can be used throughout the plugin
     * for internationalization and other purposes.
     *
     * @access protected
     * @var    string   $plugin_slug    The single, hyphenated string used to identify this plugin.
     */
    protected $plugin_slug;

    /**
     * Maintains the current version of the plugin so that we can use it throughout
     * the plugin.
     *
     * @access protected
     * @var    string   $version    The current version of the plugin.
     */
    protected $version;

    /**
     * Instantiates the plugin by setting up the core properties and loading
     * all necessary dependencies and defining the hooks.
     *
     * The constructor will define both the plugin slug and the verison
     * attributes, but will also use internal functions to import all the
     * plugin dependencies, and will leverage the Single_Post_Meta_Loader for
     * registering the hooks and the callback functions used throughout the
     * plugin.
     */
    public function __construct() {

        $this->plugin_slug = 'easy-timeout-session-slug';
        $this->version = '1.0';

        $this->load_dependencies();
        $this->define_admin_hooks();

    }

    /**
     * Imports the Easy Timeout Session administration classes, and the Easy Timeout Session Loader.
     *
     * The Easy Timeout Session administration class defines all unique functionality for
     * introducing custom functionality into the WordPress dashboard.
     *
     * The Easy Timeout Session Loader is the class that will coordinate the hooks and callbacks
     * from WordPress and the plugin. This function instantiates and sets the reference to the
     * $loader class property.
     *
     * @access    private
     */
    private function load_dependencies() {

        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-easy-timeout-session-admin.php';

        require_once plugin_dir_path( __FILE__ ) . 'class-easy-timeout-session-loader.php';
        $this->loader = new Easy_Timeout_Session_Loader();

    }

    /**
     * Defines the hooks and callback functions that are used for setting up the plugin stylesheets
     * and the plugin's meta box.
     *
     * This function relies on the Single Post Meta Manager Admin class and the Single Post Meta Manager
     * Loader class property.
     *
     * @access    private
     */
    private function define_admin_hooks() {

        $admin = new Easy_Timeout_Session_Admin( $this->get_version() );

        $this->loader->add_action( 'admin_enqueue_scripts', $admin, 'enqueue_styles' );

        $this->loader->add_action( 'admin_menu', $admin, 'create_theme_cts_page' );
        $this->loader->add_action( 'admin_init', $admin, 'register_cts_mysettings' );

        $this->loader->add_filter('auth_cookie_expiration', $admin, 'cts_filter');

    }

    /**
     * Sets this class into motion.
     *
     * Executes the plugin by calling the run method of the loader class which will
     * register all of the hooks and callback functions used throughout the plugin
     * with WordPress.
     */
    public function run() {
        $this->loader->run();
    }

    /**
     * Returns the current version of the plugin to the caller.
     *
     * @return    string    $this->version    The current version of the plugin.
     */
    public function get_version() {
        return $this->version;
    }

}
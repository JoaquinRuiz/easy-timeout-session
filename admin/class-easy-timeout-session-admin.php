<?php

/**
 * The Easy Timeout Session is a plugin that allows you to change the
 * session timeout for a wordpress user. This particular file is
 * responsible for including the dependencies and starting the plugin.
 *
 * @package ETS
 */


class Easy_Timeout_Session_Admin {

    /**
     * A reference to the version of the plugin that is passed to this class from the caller.
     *
     * @access private
     * @var    string    $version    The current version of the plugin.
     */
    private $version;

    /**
     * Initializes this class and stores the current version of this plugin.
     *
     * @param    string    $version    The current version of this plugin.
     */
    public function __construct( $version ) {
        $this->version = $version;
    }

    /**
     * Enqueues the style sheet responsible for styling the contents of this
     * meta box.
     */
    public function enqueue_styles() {
        wp_enqueue_style(
            'easy-timeout-session-admin',
            plugin_dir_url( __FILE__ ) . 'css/easy-timeout-session-admin.css',
            array(),
            $this->version,
            FALSE
        );
    }

    /**
     * Registers the options page that will be used to set the timeout length.
     */
    public function create_theme_cts_page() {
        add_menu_page('Timeout Session', 'Timeout Session', 'manage_options', 'options_cts_page',
            'Easy_Timeout_Session_Admin::build_cts_options_page','dashicons-clock');
    }
    /**
     * Requires the file that is used to display the user interface of the post meta box.
     */
    public function build_cts_options_page() {
        require_once plugin_dir_path( __FILE__ ) . 'partials/easy-timeout-session.php';
    }

    /**
     * Registers the settings of the options page previously defined.
     */
    public function register_cts_mysettings() {
        //register our settings
        register_setting( 'cts', 'cts');
    }

    /**
     * Registers the filter for the cookie expiration timing (authentication).
     */
    public function cts_filter($seconds, $user_id, $remember) {

        error_log(print_r( wp_get_current_user(),1));

        $cts = get_option('cts');

        $expires = intval($cts['num']);
        switch ($cts['val']){
            case "minutes": $expires = $expires * 60; // 60 secs = 1 min
                break;
            case "hours": $expires = $expires * 3600; // 3600 secs = 1 hour
                break;
            case "days": $expires = $expires * 86400; // 86400 secs = 1 day
                break;
        }

        if ( $expires <= 300 ) { $expires = 300; }
        return $expires;
    }

    /**
     * Registers the filter for adding the settings page link to the plugin list
     */
    public function ets_settings_link($links) {
        $settings_link = '<a href="admin.php?page=options_easy_page_plugin">Settings</a>';
        array_push($links, $settings_link);
        return $links;
    }

}

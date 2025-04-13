<?php
/**
 * Plugin Name: Multi-Environment Config Manager
 * Description: A plugin to switch settings between dev/staging/production environments easily.
 * Version: 1.0.0
 * Author: Hassan Hafeez
 * Author URI: https://iamhassanhafeez.github.io/portfolio/
 * License: GPL2+
 * Text Domain: multi-env-config
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

//====================
// Core class
class Multi_Env_Config_Manager {

    private $env_option = 'multi_env_current_env';
    private $environments = ['development', 'staging', 'production'];

    public function __construct() {
        add_action( 'admin_menu', [ $this, 'add_settings_page' ] );
        add_action( 'admin_init', [ $this, 'register_settings' ] );
        add_action( 'admin_notices', [ $this, 'display_current_environment_notice' ] );
        add_filter( 'multi_env_config_current_env', [ $this, 'get_current_environment' ] );
    }

    public function add_settings_page() {
        add_options_page(
            'Environment Config Manager',
            'Env Config Manager',
            'manage_options',
            'multi-env-config',
            [ $this, 'settings_page_html' ]
        );
    }

    public function register_settings() {
        register_setting( 'multi_env_config_group', $this->env_option );
    }

    public function settings_page_html() {
        ?> <div class="wrap">
    <h1>Multi-Environment Config Manager</h1>
    <form method="post" action="options.php"> <?php settings_fields( 'multi_env_config_group' ); ?> <table
            class="form-table">
            <tr valign="top">
                <th scope="row">Select Environment</th>
                <td>
                    <select name="<?php echo esc_attr( $this->env_option ); ?>">
                        <?php foreach ( $this->environments as $env ) : ?> <option
                            value="<?php echo esc_attr( $env ); ?>"
                            <?php selected( get_option( $this->env_option ), $env ); ?>> <?php echo ucfirst( $env ); ?>
                        </option> <?php endforeach; ?> </select>
                </td>
            </tr>
        </table> <?php submit_button(); ?> </form>
</div> <?php
    }

    public function get_current_environment() {
        return get_option( $this->env_option, 'production' );
    }

    public function display_current_environment_notice() {
        $env = $this->get_current_environment();
        $color = $this->get_env_color($env);
        echo "<div class='notice notice-info is-dismissible'><p style='color: {$color};'><strong>Current Environment:</strong> " . esc_html( ucfirst($env) ) . "</p></div>";
    }

    private function get_env_color($env) {
        switch ($env) {
            case 'development': return 'green';
            case 'staging': return 'orange';
            case 'production': return 'red';
            default: return 'black';
        }
    }
}

//====================
// Helper function to get current environment globally
function mec_get_current_env() {
    return apply_filters( 'multi_env_config_current_env', 'production' );
}

//====================
// Boot the plugin
new Multi_Env_Config_Manager();


?>
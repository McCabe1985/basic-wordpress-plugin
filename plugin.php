<?php
/*
Plugin Name: OCS BOT Plugin
Description: Quickly and easily integrate the OCS chatbot
Version: 1.0
Author: OCS
*/


/*-----------------------------------------------------------------
| This check prevents direct access to the plugin or theme file 
| via a URL. Ensuring ABSPATH is defined confirms the file is 
| being loaded within the WordPress context, protecting it from 
| direct access.
*/
if (!defined('ABSPATH')) {
    exit;
}


/*-----------------------------------------------------------------
| ocs_bot_plugin.
|------------------------------------------------------------------
| the ocs_bot_plugin class contains the mecahnics of the plugin.
*/


if (!class_exists('ocs_bot_plugin')) {
    class ocs_bot_plugin
    {
        /*-----------------------------------------------------------------
        | connect the code to WordPress.
        |------------------------------------------------------------------
        | The below code allows the plugin to intergrate with WordPress.
        */

        public function __construct()
        {

            add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts_and_styles'));
            add_action('wp_footer', array($this, 'inject_inline_javascript'));
        }

        /*-----------------------------------------------------------------
        | enqueue_scripts_and_styles.
        |------------------------------------------------------------------
        | The below code enqueues the necessary JavaScript and CSS to
        | to make the BotPress plugin work.
        */

        public function enqueue_scripts_and_styles()
        {
            /*-----------------------------------------------------------------
            | Enqueue CSS file.
            |------------------------------------------------------------------
            | Replace the placeholder css file with the custom css file
            | The custom css is necessary if the elements injected 
            | by the JavaScript are styled incorrectly or
            | inconsistently.
            */
            wp_enqueue_style('css-file.css', plugin_dir_url(__FILE__) . 'css/css-file.css');

            /*-----------------------------------------------------------------
            | Enqueue JavaScript files. 
            |------------------------------------------------------------------
            | Replace the placeholder JavaScript files with the relevant
            | BotPress files. Take note of and reproduce the order 
            | that they are called in the HTML file.
            */
            wp_enqueue_script('javascriptFile1.js', plugin_dir_url(__FILE__) . 'js/javascriptFile1.js', array(), '1.0', true);
            wp_enqueue_script('javascriptFile2.js', plugin_dir_url(__FILE__) . 'js/javascriptFile2.js', array(), '1.0', true);
        }

        /*-----------------------------------------------------------------
        | inject_inline_javascript. 
        |------------------------------------------------------------------
        | The below function injects the necessary script tag to make
        | botpress work. Replace with our code from the webchat.html
        | file.
        */

        public function inject_inline_javascript()
        {
?>
            <script type="text/javascript">
                alert("script tag works");
            </script>
<?php
        }
    }

    /*-----------------------------------------------------------------
    | The below code instantiates the plugin.
    */
    $ocs_bot_plugin = new ocs_bot_plugin();
}
?>
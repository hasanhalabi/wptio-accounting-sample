<?php

/*
  Plugin Name: wptio biz app (accounting)
  Plugin URI: https://github.com/hasanhalabi/wptio-accounting-sample
  Description: The backend code and operations for the accounting application
  Version: 1.0.0
  Author: wptools.io
  Author URI: http://wptools.io
  License: GPLv2 or later
  Text Domain: wptio
 */


if (!function_exists('wptio_include_directory')) {

    function wptio_include_directory($path) {
        $files = glob(sprintf('%s/*.php', $path));
        foreach ($files as $filename) {
            include_once $filename;
        }
    }

}

// Include all the files and classes int the directory
wptio_include_directory(__DIR__ . "/classes");

add_action('wp_head', 'myplugin_ajaxurl');

function myplugin_ajaxurl() {

   echo '<script type="text/javascript">
           var ajaxurl = "' . admin_url('admin-ajax.php') . '";
         </script>';
}

add_action('init', 'wptio_enqueue_scripts');

function wptio_enqueue_scripts() {

    wp_register_script('ng-wptio', plugins_url('wptio-biz-app-accounting/js/ng.app.js'), array('jquery'), '1.0', 'all');
    wp_enqueue_script('ng-wptio'); // Enqueue it!
    // in JavaScript, object properties are accessed as ajax_object.ajax_url, ajax_object.we_value
  //  wp_localize_script('ajax-script', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php'), 'we_value' => 1234));
}

add_action('wp_ajax_nopriv_wptio_api', 'prefix_ajax_wptio_api');

add_action('wp_ajax_wptio_api', 'prefix_ajax_wptio_api');

function prefix_ajax_wptio_api() {
    $json = $_POST['data'];
    $requestData = json_decode(stripslashes($_POST['data']));
    wptio\engine::validate_request($requestData);
    wptio\engine::process_request($requestData);
}

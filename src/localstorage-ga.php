<?php
/*
Plugin Name: LocalStorage Google Analytics
Plugin URI:  http://URI_Of_Page_Describing_Plugin_and_Updates
Description: Insert the official Google Analytics script and configures it for not using cookies but localStorage. Forget about cookie-consent alert.
Version:     0.1
Author:      Jorge Blom-Dahl
Author URI:  http://jorgeblom.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

// No direct access
defined( 'ABSPATH' ) or die( 'No direct access to this file' );

function inject_local_storage-ga() {
        $UA_CODE = "UA-XXXXX-Y";
        echo '<script>
                window.ga=window.ga||function(){(ga.q=ga.q||[]).push(arguments)};ga.l=+new Date;
                var GA_LOCAL_STORAGE_KEY = "ga:clientId";
                if (window.localStorage) {
                    ga("create", "'. $UA_CODE .'", "auto", {
                        "storage": "none",
                        "clientId": localStorage.getItem(GA_LOCAL_STORAGE_KEY)
                    });
                    ga(function(tracker) {
                        localStorage.setItem(GA_LOCAL_STORAGE_KEY, tracker.get("clientId"));
                    });
                } else {
                    ga("create", "'. $UA_CODE .'", "auto");
                }
                ga("send", "pageview");
            </script>';
}

wp_enqueue_script('local-storage-ga');

add_action('wp_head', 'inject_local_storage-ga');


?>
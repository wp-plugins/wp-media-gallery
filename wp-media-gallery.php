<?php
/*
Plugin Name: WP Media Gallery
Description: A simple gallery plugin for Wordpress.
Author: Ninos Ego
Version: 1.0.3
Author URI: http://ninosego.de/
*/

load_plugin_textdomain('wp-media-gallery', false, basename( dirname( __FILE__ ) ) . '/languages' );

include_once('lib/init.php');
include_once('lib/gallery.php');
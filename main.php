<?php
/*
Plugin Name: Weather Example
Description: Quick&Dirty Wetter Plugin mit ACF
Version: 1.0
Author: Pierre Voss
Author URI: https://numx.de
*/

# Load the plugin
require_once plugin_dir_path(__FILE__) . 'inc/class-plugin.php';
$plugin = new WeatherExample();
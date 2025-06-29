<?php 
/**
 * Plugin Name: Assets Demo
 * Description: A demo plugin to showcase how to enqueue scripts and styles in WordPress.
 * Version: 1.0.0
 * Author: IC WP Plugin Development Team
 * Author URI: https://google.com 
 * */

  class AD_Assets_Demo {
    const VERSION = '1.0.0';
    public function __construct() {
        add_action('wp_enqueue_scripts', [$this, 'load_assets']);
        add_action('admin_enqueue_scripts', [$this, 'load_admin_assets']);
    }
    public function load_admin_assets($screen) {
        //die($screen);
        $admin_main_css = plugin_dir_url(__FILE__) . 'admin/assets/css/admin-main.css';
        $admin_main_js = plugin_dir_url(__FILE__) . 'admin/assets/js/admin-main.js';
        $admin_plugins_js = plugin_dir_url(__FILE__) . 'admin/assets/js/plugins.js';

        wp_enqueue_style('ad_admin_css', $admin_main_css, [], self::VERSION);
        wp_enqueue_script('ad_admin_js', $admin_main_js, [], self::VERSION, true);
      
        wp_enqueue_script('ad_admin_plugins_js', $admin_plugins_js, [], self::VERSION, true);
        
    }

    public function load_assets() {  
     $main_css = plugin_dir_url(__FILE__) . 'assets/css/main.css';
     $main_js = plugin_dir_url(__FILE__) . 'assets/js/main.js';

     wp_enqueue_style('ad_main_css', $main_css, [] , self::VERSION); 

     wp_enqueue_script('ad_main', $main_js, ['ad_jquery'], self::VERSION, ['in_footer' => true]);
     wp_enqueue_script('ad_jquery', '//cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js', [], '3.7.1', true);
     
      } 
    }

    new AD_Assets_Demo();
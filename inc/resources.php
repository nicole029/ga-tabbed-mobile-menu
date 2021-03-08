<?php
class GAResources{
  private $plugin_name;
  function __construct(){
    $this->plugin_name = 'ga-tabbed-mobile-menu';
    add_action( 'wp_enqueue_scripts', [$this, 'enqueue_scripts'] );
  }
  function enqueue_scripts(){
    $handler_id = 'ga-tabbed-mobile-menu';
    $dir = trailingslashit( plugins_url( $this->plugin_name , '' ) );
    wp_enqueue_style( $handler_id, $dir . 'css/ga-mobile-menu.css', [], null, false );
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( $handler_id, $dir . 'js/ga-mobile-menu.js', [ 'jquery' ],null,true );
  }
}
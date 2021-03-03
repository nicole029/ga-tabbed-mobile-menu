<?php
include 'resources.php';
include 'views.php';
class GAMobileMenu{
  private $resources;
  function __construct(){
      $this->resources = new GAResources;
      add_shortcode( 'ga-mobile-menu', [$this, 'shortcode'] );
  }
  function shortcode(){
      $tabs = [
        'ga-shop-tab' => [
          'text' => __( 'Shop','divi' ),
          'open' => true,
          'menu' => 'Mobile Shop'
        ],
        'ga-about-tab' => [
          'text' => __( 'About','divi' ),
          'open' => false,
          'menu' => 'Mobile About'
        ],
        'ga-more-tab' => [
          'text' => __( 'More','divi' ),
          'open' => false,
          'menu' => 'Mobile More'
        ]
      ];
      ob_start();
      
      ?>
        <div id ="ga-mobile-menu">
          <?php GAViews::mobile_toggle(); ?>
          <div id="ga-tab-container">
            <?php
                foreach( $tabs as $tab_key => $tab ){
                  GAViews::mobile_tab_content( $tab['menu'], $tab_key, $tab['open'] );
                }
            ?>
            <ul class="ga-tab-toggles" id="ga-tab-toggles">
              <?php 
                  foreach( $tabs as $tab_key => $tab ){
                  ?>
                      <?php GAViews::mobile_tab( $tab_key, $tab['text'], $tab['open'] ); ?>
                  <?php
                  }
              ?>
            </ul>
          </div><!-- eo #ga-tab-container -->
        </div>
      <?php
      return ob_get_clean();
  }

}
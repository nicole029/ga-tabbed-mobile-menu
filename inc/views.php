<?php

class GAViews{
  static function mobile_toggle( $text = null ){
    ?>
      <a href="#ga-mobile-menu" class="ga-mobile-menu-toggle" id="ga-mobile-menu-toggle">
        <span class="toggle-line"></span>
        <span class="toggle-line"></span>
        <span class="toggle-line"></span>
        <?php if( !is_null( $text ) ): ?>
          <span class="toggle-text"><?php echo $text; ?></span>
        <?php endif; ?>
      </a>
    <?php
  }

  static function mobile_tab( $el, $text, $open = false, $tag = 'li' ){
      $css_classes = [
        'ga-tab-toggle'
      ];
      if( $open ){
        $css_classes[] = 'active';
      }

      $css_class = implode( ' ', $css_classes );
    ?>
      <<?php echo $tag; ?> class="<?php echo $css_class; ?>">
        <a href="#<?php echo $el; ?>" class="ga-tab-link">
          <?php do_action( 'ga_before_tab_text' ); ?>
          <span><?php echo $text; ?></span>
          <?php do_action( 'ga_after_tab_text' ); ?>
        </a>        
      </<?php echo $tag; ?>>      
    <?php
  }

  static function mobile_tab_content( $menu_name, $el, $open = false ){
    $css_classes = [
      'ga-nav-container',
      'ga-tab-content'
    ];
    if( $open ){
      $css_classes[] = 'active';
    }

    $css_class = implode( ' ', $css_classes );
    wp_nav_menu( [
      'menu' => $menu_name,
      'container_class' => $css_class,
      'container_id' => $el,
      'container' => 'nav',
      'menu_class' => 'ga-menu'
    ] );
  }
}
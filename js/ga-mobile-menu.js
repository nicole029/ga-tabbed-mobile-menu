jQuery(document).ready(function($){
  var $activeCSSClass = 'active';
  
  $('.ga-tab-link').on('click',function(e){
    e.preventDefault();
    let $this = $(this),
        $thisTarget = $this.attr('href');
    $('.ga-tab-link').removeClass($activeCSSClass);
    $('.ga-tab-content').removeClass($activeCSSClass);
    $this.addClass($activeCSSClass);

    $($thisTarget).addClass($activeCSSClass);
  });
  $('.backlinker').on('click',function(e){
    $('.sub-menu.ga-mobile-menu-sub').removeClass($activeCSSClass);
  })
  $('.menu-item-has-children > a').on('click',function(e){
    e.preventDefault();
    let $submenu = $(this).siblings( '.sub-menu' ),
        $allSubmenu = $('.sub-menu.ga-mobile-menu-sub');
        $allSubmenu.removeClass( $activeCSSClass );
    $submenu.addClass( $activeCSSClass );
  })
  $('.ga-mobile-menu-toggle').on('click',function( e ){
    e.preventDefault();
    let $menuToggle = $( this ),
        $menuContainer = $('#ga-tab-container');
    if( $menuToggle.hasClass( $activeCSSClass ) ){
      $menuToggle.removeClass( $activeCSSClass );
      $menuContainer.removeClass( $activeCSSClass ).slideUp();
    }else{
      $menuToggle.addClass( $activeCSSClass );
      $menuContainer.addClass( $activeCSSClass ).slideDown();
    }
  });
});

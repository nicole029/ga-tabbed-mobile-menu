jQuery(document).ready(function($){
  $('.ga-tab-link').on('click',function(e){
    e.preventDefault();
    let $this = $(this),
        $thisTarget = $this.attr('href'),
        $cssClass = 'active';
    $('.ga-tab-link').removeClass($cssClass);
    $('.ga-tab-content').removeClass($cssClass);
    $this.addClass( $cssClass );

    $($thisTarget).addClass($cssClass);
  });
});
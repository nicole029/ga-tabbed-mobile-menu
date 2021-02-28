jQuery(document).ready(function($){
    $('#ga-tmm-nav a').on(
        'click',
        function(e){
            e.preventDefault();
            let $this = $(this);
            let $target = $this.attr( 'href' );

            $('.ga-tmm-tab,.tmm-control').removeClass( 'open' );
            $( $target ).addClass( 'open' );

            
            $this.parent().addClass( 'open' )
        }
    );
    $( ".tmm-menu a[href^=#]" ).on(
        'click',
        function(e){
            e.preventDefault();
            let $this = $(this);
            let $target = $this.siblings('.sub-menu');
            
            $('.tmm-menu .sub-menu').removeClass( 'open' );
            $target.addClass( 'open' );
        }
    );
    $( '.tmm-uponelevel' ).on(
        'click',
        function(e){
            let $parentSubMenu = $(this).closest( '.sub-menu' );

            $parentSubMenu.removeClass( 'open' );
        }
    );
});
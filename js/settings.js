jQuery(document).ready( function() {
    jQuery('#left-menu').sidr({
        side: 'left',
        source: '#kSidr'
    });

    jQuery('#left-menu').on( 'click', function() {
        jQuery(this).find('i').toggleClass('fa-angle-double-left fa-angle-double-right');
    });

    // Wait for window load
    jQuery(window).load(function() {
        // Animate loader off screen
        jQuery(".se-pre-con").fadeOut("slow");;
    });

    // dynamically set the height of the fixed-bg index-page header to the height of the window open...
    jQuery('.fixed-bg').css('height', '' + window.innerHeight);
});
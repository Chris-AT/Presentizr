jQuery(document).ready(function() {
    var topHeight = jQuery('.topMenuContainer').outerHeight() + jQuery('#wpadminbar').outerHeight();
        var footerHeight = jQuery('.creditsContainer').outerHeight();
        var neededHeight = jQuery(window).innerHeight() - topHeight - footerHeight;
    jQuery('.wrappercell').css('height', neededHeight + 'px');
});



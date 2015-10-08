// adjust the footer so its always on the bottom, even if the content height is not that big
jQuery(document).ready(function() {

    var windowWidth = window.innerWidth;
    if(windowWidth > 993) {
        var windowHeight = jQuery(window).innerHeight();
        var topHeight = jQuery('.topMenuContainer').outerHeight() + jQuery('#wpadminbar').outerHeight();
        var footerHeight = jQuery('.creditsContainer').outerHeight();
        var neededHeight = windowHeight - topHeight - footerHeight;
        if(neededHeight > 0) {
            jQuery('.middleContainer').css('min-height', neededHeight + 'px');
        }
    }
   
    jQuery('#mobile-bars').click(function() {
        jQuery('#mobile-div').slideToggle();
    });
    
    //THE SECONDARY MENU
    //Vertically center the secondary menu, not possible pixel-sharp due to transform
    var secondaryWidth = jQuery('.secondary-menu').width();

    jQuery('.secondary-menu li a').css('width', secondaryWidth + 'px');
    
    var deviceWidth = jQuery(window).width();

    jQuery('.secondary-menu').css('width', '0px');
    jQuery('.secondary-menu').css('max-width', deviceWidth - jQuery('.bottomMobileMenuButtonRightMenu').outerWidth() + 'px');
    if(secondaryWidth > parseFloat(jQuery('.secondary-menu').css('max-width'))) {
        secondaryWidth = parseFloat(jQuery('.secondary-menu').css('max-width'));
    }
    var topSecondary = window.innerHeight/2 - jQuery('.secondary-menu-button').height() - jQuery('.secondary-menu-button').width();
    jQuery('.secondary-menu-button').css('top', topSecondary + 'px');
    var secondaryMenuOpenFlag = false;
    jQuery('.secondary-menu-button').click(function() {
        if(!secondaryMenuOpenFlag) {
            jQuery('.secondary-menu').animate({'width': secondaryWidth + 'px'}, {duration: 500, queue: false, complete: function() {
                    jQuery(this).css('white-space', 'normal');
            }});
            jQuery('.secondary-menu-button').animate({right: secondaryWidth + 'px'}, {duration: 500, queue: false});
            secondaryMenuOpenFlag = true;
        }
        else {
            jQuery('.secondary-menu').animate({'width': '0px'}, {duration: 500, queue: false, start: function () {
                jQuery(this).css('white-space', 'nowrap');    
            }});
            jQuery('.secondary-menu-button').animate({right: '0px'}, {duration: 500, queue: false});
            secondaryMenuOpenFlag = false;
        }
        jQuery('.secondary-menu-button').toggleClass('arrowsup');
        jQuery('.secondary-menu-button').toggleClass('arrowsdown');
    });
    var secondaryMenuHeight = jQuery('.secondary-menu').height();
    var countLi = jQuery('.secondary-menu-class li').length;
    var heightOfEachLi = secondaryMenuHeight/countLi;
    if(heightOfEachLi > 25) {
        jQuery('.secondary-menu-class li a').each(function(){
            jQuery(this).height(heightOfEachLi);
        });
    }
    
    
    
    //Scroll to top button
    jQuery('#scrolltotop').click(function() {
        jQuery('html').animate({ scrollTop: 0 }, "slow");
    });
    
    //Left menu
    var topLeftMenu = jQuery(window).innerHeight()/2 - jQuery('#leftMenu').height()/2;
    jQuery('#leftMenu').css('top', topLeftMenu + 'px');
    
    //Searchicon
    jQuery('.searchIcon').click(function() {
       jQuery('.searchrow').slideToggle(); 
    });
    jQuery('.searchIconMobile').click(function() {
       jQuery('.searchrow').slideToggle(); 
    });
    
    //Bottom Menu Mobile
    var bottomMobileMenuHeight = jQuery('.bottomMobileMenu').height();
    var bottomMobileMenuOpenFlag = false;
    jQuery('.bottomMobileMenu').hide();
    jQuery('.bottomMobileMenuButton').click(function() {
       jQuery('.bottomMobileMenu').slideToggle();
       jQuery('.bottomMobileMenuButton').toggleClass('arrowsup');
       jQuery('.bottomMobileMenuButton').toggleClass('arrowsdown');
       if(!bottomMobileMenuOpenFlag) {
            jQuery(this).animate({'bottom' : bottomMobileMenuHeight + 'px'});
            jQuery(this).css('bottom', bottomMobileMenuHeight + 'px');
            if(jQuery('.bottomMobileMenuButtonRightMenu').length) {
                jQuery('.bottomMobileMenuButtonRightMenu').animate({'bottom' : bottomMobileMenuHeight + 'px'});
                jQuery('.bottomMobileMenuButtonRightMenu').css('bottom', bottomMobileMenuHeight + 'px');
            }
            bottomMobileMenuOpenFlag = true;
       }
       else {
           jQuery(this).animate({'bottom' : '0px'});
           if(jQuery('.bottomMobileMenuButtonRightMenu').length) {
               jQuery('.bottomMobileMenuButtonRightMenu').animate({'bottom' : '0px'});
           }
           bottomMobileMenuOpenFlag = false;
       }
       
    });
    //set mobile menu bottom to max height
    var maxHeightBottomMobileMenu = jQuery(window).height() - jQuery('.bottomMobileMenuButton').outerHeight();
    if(bottomMobileMenuHeight > maxHeightBottomMobileMenu) {
        bottomMobileMenuHeight = maxHeightBottomMobileMenu;
    }
    jQuery('.bottomMobileMenu').css('max-height', maxHeightBottomMobileMenu + 'px');
    
    //Animation for Page-Title
    jQuery(".page-title").hover(function() {
    jQuery(this).parent().find('.hr-page-title').animate({
            "width": "70%"
        }, 200);
    }, function() {
        jQuery(this).parent().find('.hr-page-title').stop().animate({
            "width": "0px"
        }, 200);
    });
    //assign all .textlink's the widest width
    var widestWidth = 0;
    jQuery('.left-menu-class li .textlink').each(function() {
        jQuery(this).css('display', 'inline');
        if(jQuery(this).width() > widestWidth) {
            widestWidth = jQuery(this).outerWidth();
        }
        jQuery(this).css('display', '');
    });
    jQuery('.left-menu-class li .textlink').each(function() {
        jQuery(this).width(widestWidth + 'px');
    });
    
    //Mobile Menu Button for right menu
    jQuery('.bottomMobileMenuButtonRightMenu').click(function() {
        if(!secondaryMenuOpenFlag) {
            jQuery('.secondary-menu').animate({'width': secondaryWidth + 'px'}, {duration: 500, queue: false, complete: function() {
                    jQuery(this).css('white-space', 'normal');
            }});
            jQuery('.bottomMobileMenuButtonRightMenu').animate({right: secondaryWidth + 'px'}, {duration: 500, queue: false});
            jQuery('.bottomMobileMenuButtonRightMenu').html('&gt;');
            secondaryMenuOpenFlag = true;
        }
        else {
            jQuery('.secondary-menu').animate({'width': '0px'}, {duration: 500, queue: false, start: function () {
                jQuery(this).css('white-space', 'nowrap');    
            }});
            jQuery('.bottomMobileMenuButtonRightMenu').animate({right: '0px'}, {duration: 500, queue: false});
            jQuery('.bottomMobileMenuButtonRightMenu').html('&lt;');
            secondaryMenuOpenFlag = false;
        }
    });
    
    //make bottomMenuMobileButton width according to whether a secondary menu exists or not 
    var bottomMobileMenuButtonWidth = jQuery(window).width() - jQuery('.bottomMobileMenuButtonRightMenu').outerWidth();
    jQuery('.bottomMobileMenuButton').outerWidth(bottomMobileMenuButtonWidth + 'px');
    
    //add share buttons
    if(jQuery('.share-buttons').length) {
        try {
            jQuery('.share-buttons').share({
                networks: ['facebook','pinterest','googleplus','twitter','linkedin','tumblr','in1','email','stumbleupon','digg'],
                theme: 'square'
            });
        } 
        catch (error) {
            
        }
    }
});
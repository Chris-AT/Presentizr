</div> <!-- #wrapper -->
<?php if(is_active_sidebar('sidebar-footer') && !is_home()) : ?>
<div class="row footer">
    <div class="col-xs-12" id="footerliselector">
    <?php get_sidebar(); ?>
    </div>
</div> <!-- .row .footer -->
<?php endif; ?>
</div> <!-- .container -->
<div class="creditsContainer">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 credits">
                proudly designed by Chris-AT <a href="#" id="scrolltotop"><?php _e('Scroll to top', 'standout'); ?></a>
            </div> <!-- .col-cs-12 .credits -->
        </div> <!-- .row -->
    </div> <!-- .container -->
</div> <!-- .creditsContainer -->

<!-- adjust the footer so its always on the bottom, even if the content height is not that big -->
<script type="text/javascript">
$(document).ready(function() {

    var windowWidth = window.innerWidth;
    if(windowWidth > 993) {
        var windowHeight = $(window).height();
        var topHeight = $('.heightClass').height() + $('#wpadminbar').height();
        var footerHeight = $('.footer').outerHeight() + $('.credits').height();
        var neededHeight = windowHeight - topHeight - footerHeight;
        if(neededHeight > 0) {
            $('#wrapper').css('min-height', neededHeight + 'px');
        }
    }
   
    $('#mobile-bars').click(function() {
        $('#mobile-div').slideToggle();
    });
    
    //THE SECONDARY MENU
    //Vertically center the secondary menu, not possible pixel-sharp due to transform
    var secondaryWidth = $('.secondary-menu').width();

    $('.secondary-menu li a').css('width', secondaryWidth + 'px');
    
    var deviceWidth = $(window).width();

    $('.secondary-menu').css('width', '0px');
    $('.secondary-menu').css('max-width', deviceWidth - $('.bottomMobileMenuButtonRightMenu').outerWidth() + 'px');
    if(secondaryWidth > parseFloat($('.secondary-menu').css('max-width'))) {
        secondaryWidth = parseFloat($('.secondary-menu').css('max-width'));
    }
    var topSecondary = window.innerHeight/2 - $('.secondary-menu-button').height() - $('.secondary-menu-button').width();
    $('.secondary-menu-button').css('top', topSecondary + 'px');
    var secondaryMenuOpenFlag = false;
    $('.secondary-menu-button').click(function() {
        if(!secondaryMenuOpenFlag) {
            $('.secondary-menu').animate({'width': secondaryWidth + 'px'}, {duration: 500, queue: false, complete: function() {
                    $(this).css('white-space', 'normal');
            }});
            $('.secondary-menu-button').animate({right: secondaryWidth + 'px'}, {duration: 500, queue: false});
            secondaryMenuOpenFlag = true;
        }
        else {
            $('.secondary-menu').animate({'width': '0px'}, {duration: 500, queue: false, start: function () {
                $(this).css('white-space', 'nowrap');    
            }});
            $('.secondary-menu-button').animate({right: '0px'}, {duration: 500, queue: false});
            secondaryMenuOpenFlag = false;
        }
        $('.secondary-menu-button').toggleClass('arrowsup');
        $('.secondary-menu-button').toggleClass('arrowsdown');
    });
    var secondaryMenuHeight = $('.secondary-menu').height();
    var countLi = $('.secondary-menu-class li').length;
    var heightOfEachLi = secondaryMenuHeight/countLi;
    if(heightOfEachLi > 25) {
        $('.secondary-menu-class li a').each(function(){
            $(this).height(heightOfEachLi);
        });
    }
    
    
    
    //Scroll to top button
    $('#scrolltotop').click(function() {
        $('html').animate({ scrollTop: 0 }, "slow");
    });
    
    //Left menu
    var topLeftMenu = $(window).innerHeight()/2 - $('#leftMenu').height()/2;
    $('#leftMenu').css('top', topLeftMenu + 'px');
    
    //Searchicon
    $('.searchIcon').click(function() {
       $('.searchrow').slideToggle(); 
    });
    $('.searchIconMobile').click(function() {
       $('.searchrow').slideToggle(); 
    });
    
    //Bottom Menu Mobile
    var bottomMobileMenuHeight = $('.bottomMobileMenu').height();
    var bottomMobileMenuOpenFlag = false;
    $('.bottomMobileMenu').hide();
    $('.bottomMobileMenuButton').click(function() {
       $('.bottomMobileMenu').slideToggle();
       $('.bottomMobileMenuButton').toggleClass('arrowsup');
       $('.bottomMobileMenuButton').toggleClass('arrowsdown');
       if(!bottomMobileMenuOpenFlag) {
            $(this).animate({'bottom' : bottomMobileMenuHeight + 'px'});
            $(this).css('bottom', bottomMobileMenuHeight + 'px');
            if($('.bottomMobileMenuButtonRightMenu').length) {
                $('.bottomMobileMenuButtonRightMenu').animate({'bottom' : bottomMobileMenuHeight + 'px'});
                $('.bottomMobileMenuButtonRightMenu').css('bottom', bottomMobileMenuHeight + 'px');
            }
            bottomMobileMenuOpenFlag = true;
       }
       else {
           $(this).animate({'bottom' : '0px'});
           if($('.bottomMobileMenuButtonRightMenu').length) {
               $('.bottomMobileMenuButtonRightMenu').animate({'bottom' : '0px'});
           }
           bottomMobileMenuOpenFlag = false;
       }
       
    });
    //set mobile menu bottom to max height
    var maxHeightBottomMobileMenu = $(window).height() - $('.bottomMobileMenuButton').outerHeight();
    if(bottomMobileMenuHeight > maxHeightBottomMobileMenu) {
        bottomMobileMenuHeight = maxHeightBottomMobileMenu;
    }
    $('.bottomMobileMenu').css('max-height', maxHeightBottomMobileMenu + 'px');
    
    //Animation for Page-Title
    $(".page-title").hover(function() {
    $(this).parent().find('.hr-page-title').animate({
            "width": "70%"
        }, 200);
    }, function() {
        $(this).parent().find('.hr-page-title').stop().animate({
            "width": "0px"
        }, 200);
    });
    //assign all .textlink's the widest width
    var widestWidth = 0;
    $('.left-menu-class li .textlink').each(function() {
        $(this).css('display', 'inline');
        if($(this).width() > widestWidth) {
            widestWidth = $(this).outerWidth();
        }
        $(this).css('display', '');
    });
    $('.left-menu-class li .textlink').each(function() {
        $(this).width(widestWidth + 'px');
    });
    
    //Mobile Menu Button for right menu
    $('.bottomMobileMenuButtonRightMenu').click(function() {
        if(!secondaryMenuOpenFlag) {
            $('.secondary-menu').animate({'width': secondaryWidth + 'px'}, {duration: 500, queue: false, complete: function() {
                    $(this).css('white-space', 'normal');
            }});
            $('.bottomMobileMenuButtonRightMenu').animate({right: secondaryWidth + 'px'}, {duration: 500, queue: false});
            $('.bottomMobileMenuButtonRightMenu').html('&gt;');
            secondaryMenuOpenFlag = true;
        }
        else {
            $('.secondary-menu').animate({'width': '0px'}, {duration: 500, queue: false, start: function () {
                $(this).css('white-space', 'nowrap');    
            }});
            $('.bottomMobileMenuButtonRightMenu').animate({right: '0px'}, {duration: 500, queue: false});
            $('.bottomMobileMenuButtonRightMenu').html('&lt;');
            secondaryMenuOpenFlag = false;
        }
    });
    
    //make bottomMenuMobileButton width according to whether a secondary menu exists or not 
    var bottomMobileMenuButtonWidth = $(window).width() - $('.bottomMobileMenuButtonRightMenu').outerWidth();
    $('.bottomMobileMenuButton').outerWidth(bottomMobileMenuButtonWidth + 'px');
    
    //add share buttons
    if($('.share-buttons').length) {
        try {
            $('.share-buttons').share({
                networks: ['facebook','pinterest','googleplus','twitter','linkedin','tumblr','in1','email','stumbleupon','digg'],
                theme: 'square'
            });
        } 
        catch (error) {
            
        }
    }
});
</script>

<?php wp_footer(); ?>
<?php echo get_option('footer-include'); ?>

</body>
</html>


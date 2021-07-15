/*Menu Dropdown Onhover Js*/
jQuery(document).ready(function() {

        /* ---------------------------------------------- /*
         * Initialization General Scripts for all pages
         /* ---------------------------------------------- */

        var navbar      = jQuery('.navbar-default'),
            navHeight   = navbar.height(),
           // worksgrid   = jQuery('#works-grid'),
            width       = Math.max(jQuery(window).width(), window.innerWidth),
            mobileTest  = false;

        if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            mobileTest = true;
        }
        appointment_navbarSubmenu(width);
        appointment_hoverDropdown(width, mobileTest);

        jQuery(window).resize(function() {
            var width = Math.max(jQuery(window).width(), window.innerWidth);
            appointment_hoverDropdown(width, mobileTest);
        });

        /* ---------------------------------------------- /*
         * Navbar submenu
         /* ---------------------------------------------- */

        function appointment_navbarSubmenu(width) {
            if (width > 1100) {
                jQuery('.navbar-default .navbar-nav > li.dropdown').hover(function() {
                    var MenuLeftOffset  = jQuery(this).offset().left;
                    var Menu1LevelWidth = jQuery('.dropdown-menu', jQuery(this)).width();
                    if (width - MenuLeftOffset < Menu1LevelWidth * 2) {
                        jQuery(this).children('.dropdown-menu').addClass('leftauto');
                    } else {
                        jQuery(this).children('.dropdown-menu').removeClass('leftauto');
                    }
                    if (jQuery('.dropdown', jQuery(this)).length > 0) {
                        var Menu2LevelWidth = jQuery('.dropdown-menu', jQuery(this)).width();
                        if (width - MenuLeftOffset - Menu1LevelWidth < Menu2LevelWidth) {
                            jQuery(this).children('.dropdown-menu').addClass('left-side');
                        } else {
                            jQuery(this).children('.dropdown-menu').removeClass('left-side');
                        }
                    }
                });

                 jQuery('.navbar-default .navbar-nav > li.dropdown a').focus(function() {
                    var MenuLeftOffsets  = jQuery(this).parent().offset().left;
                    var Menu1LevelWidth = jQuery('.dropdown-menu', jQuery(this).parent()).width();
                    if (width - MenuLeftOffsets < Menu1LevelWidth * 2) {
                        jQuery(this).parent().children('.dropdown-menu').addClass('leftauto');
                    } else {
                        jQuery(this).parent().children('.dropdown-menu').removeClass('leftauto');
                    }
                    if (jQuery('.dropdown', jQuery(this).parent()).length > 0) {
                        var Menu2LevelWidth = jQuery('.dropdown-menu', jQuery(this).parent()).width();
                        if (width - MenuLeftOffsets - Menu1LevelWidth < Menu2LevelWidth) {
                            jQuery(this).parent().children('.dropdown-menu').addClass('left-side');
                        } else {
                            jQuery(this).parent().children('.dropdown-menu').removeClass('left-side');
                        }
                    }
                });
            }
        }

        /* ---------------------------------------------- /*
         * Navbar hover dropdown on desctop
         /* ---------------------------------------------- */

        function appointment_hoverDropdown(width, mobileTest) {
            if ((width > 1100) && (mobileTest !== true)) {
                jQuery('.dropdown-menu').removeAttr("style");
                var delay = 0;
                var setTimeoutConst;
                jQuery('.navbar-default .navbar-nav > li.dropdown, .navbar-default li.dropdown > .dropdown-menu li.dropdown-submenu').hover(function() {
                        var jQuerythis = jQuery(this);
                        setTimeoutConst = setTimeout(function() {
                            jQuerythis.addClass('open');
                            jQuerythis.find('.dropdown-toggle').addClass('disabled');
                        }, delay);
                    },
                    function() {
                        clearTimeout(setTimeoutConst);
                        jQuery(this).removeClass('open');
                        jQuery(this).find('.dropdown-toggle').removeClass('disabled');
                    });
            } else {
                jQuery('.navbar-default .navbar-nav > li.dropdown, .navbar-default li.dropdown > .dropdown-menu li.dropdown-submenu').unbind('mouseenter mouseleave');
                jQuery('.navbar-default [data-toggle=dropdown]').not('.binded').addClass('binded').on('click', function(event) {
                    event.preventDefault();
                    event.stopPropagation();
                    jQuery(this).parent().siblings().removeClass('open');
                    jQuery(this).parent().siblings().find('[data-toggle=dropdown]').parent().removeClass('open');
                    jQuery(this).parent().toggleClass();
                });
            }
        }

          /* ---------------------------------------------- /*
         * Navbar focus dropdown on desktop
         /* ---------------------------------------------- */

     const topLevelLinks = Array.prototype.slice.call(document.querySelectorAll(".navbar-default .navbar-nav > li.dropdown a"), 0);
          topLevelLinks.forEach(function(link){
             return link.addEventListener('focus', function(e) {
                this.parentElement.classList.add('open')
                e.preventDefault();
                var div_list = e.target.parentElement.querySelectorAll( ".open" );
                var div_array = Array.prototype.slice.call(div_list);
                  div_array.forEach(function(e){
                   return e.classList.remove( "open" )
                });
              })             

            })

            jQuery('li a').focus(function() { 

             jQuery(this).parent().siblings().removeClass('open');

            });

           jQuery('a,input').bind('focus', function() {
             if(!jQuery(this).closest(".menu-item").length ) {
                topLevelLinks.forEach(function(link){
                return link.parentElement.classList.remove('open')
            })
            }
        })
        
        jQuery('li.dropdown').find('.caret').each(function(){
            jQuery(this).on('click', function(){
                if( jQuery(window).width() <= 1100) {
                  jQuery('li.dropdown,li.dropdown-submenu').removeClass('open');
                  jQuery(this).parent().next().slideToggle();
                }
             return false;
            });
        });
        jQuery('a,input').bind('focus', function() {
             if(!jQuery(this).closest(".menu-item").length && !jQuery(this).closest(".head-contact-social").length  && ( jQuery(window).width() <= 1100) ) {
                jQuery('.navbar-collapse').removeClass('in');
             }})
});
jQuery(document).ready(function() {

/* Tabs in welcome page */
    function appointee_welcome_page_tabs(event) {
        jQuery(event).parent().addClass("active");
       jQuery(event).parent().siblings().removeClass("active");
       var tab = jQuery(event).attr("href");
       jQuery(".appointee-tab-pane").not(tab).css("display", "none");
       jQuery(tab).fadeIn();
    }
    
    jQuery(".appointee-nav-tabs li").slice(0,1).addClass("active");

   jQuery(".appointee-nav-tabs a").click(function(event) {
       event.preventDefault();
        appointee_welcome_page_tabs(this);
   });

        /* Tab Content height matches admin menu height for scrolling purpouses */
     $tab = jQuery('.appointee-tab-content > div');
     $admin_menu_height = jQuery('#adminmenu').height();
     if( (typeof $tab !== 'undefined') && (typeof $admin_menu_height !== 'undefined') )
     {
         $newheight = $admin_menu_height - 180;
         $tab.css('min-height',$newheight);
     }

     jQuery(".appointee-custom-class").click(function(event){
       event.preventDefault();
       jQuery('.appointee-nav-tabs li a[href="#recommended_actions"]').click();
    });

     jQuery(".appointee-changelog-class").click(function(event){
       event.preventDefault();
       jQuery('.appointee-nav-tabs li a[href="#changelog"]').click();
    });

});

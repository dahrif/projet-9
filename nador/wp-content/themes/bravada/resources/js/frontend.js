/*
 * Frontend JS
 *
 * @package Bravada
 */

jQuery( document ).ready( function() {
	cryoutLpBoxesRatios();
	cryoutMobileMenuInit();
	cryoutFixedMobileMenu();
	cryoutInitNav( '#mobile-menu' );
	cryoutMenuAnimate();
	cryoutBackToTop();
	cryoutSearchFormAnimation();
	cryoutSocialTitles();
	cryoutBodyClasses();
	cryoutTabsWidget();
	cryoutPortfolioFilter();
	cryoutHeaderParallax();
	cryoutLPArrowLink();
	cryoutRemoveFocus();
	cryoutSliderTitleBreakUp( '.lp-staticslider .staticslider-caption', '.staticslider-caption-title > span' );
	cryoutSliderTitleBreakUp( '#header-page-title', '#header-page-title .entry-title' );
	cryoutAnimateLazyImages();
	/* cryoutBurgerMenu(); */

	if ( typeof cryout_theme_settings !== 'undefined' ) {

		if ( ( ( cryout_theme_settings.fitvids == 2 ) && ( cryout_theme_settings.is_mobile == 1 ) ) ||
			( cryout_theme_settings.fitvids == 1 )
		) {
			jQuery( '.entry-content' ).fitVids();
		}

		if ( cryout_theme_settings.autoscroll == 1 ) {
			cryoutAutoScroll();
		}

		/* Animate articles */
		if ( cryout_theme_settings.articleanimation ) {
			animateScroll( '#content-masonry > article', 'animated-onscroll' );

			/* Animate landing page elements */
			animateScroll( '.lp-block, .lp-box, .lp-text, .lp-port, .lp-tt, ' +
				'.lp-section-title, .lp-section-desc', 'animated-onscroll-lp' );
		}
	} /* typeof cryout_theme_settings check */

	jQuery( window ).on( 'scroll', function() {
		if ( jQuery( this ).scrollTop() > 30 ) {
			jQuery( '#nav-fixed' ).addClass( 'nav-fixed-show' );
		} else {
			jQuery( '#nav-fixed' ).removeClass( 'nav-fixed-show' );
		}
	} );
} ); /* document.ready */


jQuery( window ).on( 'load', function() {
	cryoutPreloader();
	jQuery( window ).trigger( 'scroll' );
	cryoutMasonry();
	cryoutPortfolioMasonry();
} ); /* window.load */


/*
 * Functions
**/

/* Animate images with the [loading="lazy"] attribute */
function cryoutAnimateLazyImages() {
	jQuery( 'body:not(.bravada-lazy-noanimation) #content img[loading="lazy"]' ).on( 'load', function() {
		jQuery( this ).addClass( 'animate-lazy' );
	}).each( function() {
		if ( this.complete ) {
			jQuery( this ).trigger( 'load' );
		}
	} );
} /* cryoutAnimateLazyImages() */

/* Site preloader */
function cryoutPreloader() {
	if ( ! jQuery( '.cryout-preloader' ).length ) return;

    /* Remove preloader backup animation */
    if ( jQuery( '.cryout-preloader' ).length ) jQuery( '.cryout-preloader' ).css( 'animation', 'none' );

	jQuery( '.cryout-preloader' ).fadeOut( 700, function() {
		jQuery( this ).remove();
	} );
} /* cryoutPreloader() */

function cryoutLPArrowLink() {
	if ( ! jQuery( 'body' ).hasClass( 'bravada-landing-page' ) ) return;

	var newLink = jQuery( '.main section.lp-slider + section' ).attr( 'id' );
	if ( undefined !== newLink && newLink.length ) {
		jQuery( '.meta-arrow' ).attr( 'href', '#' + newLink );
	}
} /* cryoutLPArrowLink() */

/* Burger menu */
function cryoutBurgerMenu() {
	if ( ! jQuery( '.hamburger' ).length ) return;
	var $activeElements = jQuery( '.hamburger, #site-wrapper, .site-header-bottom-fixed, #mobile-menu' );
	var fixedHeader = false; /* check to see if header menu was fixed so we know to put it back later */

	jQuery( '.hamburger' ).on( 'click', function( e ) {
		$activeElements.toggleClass( 'is-active' );
		jQuery( '.site-header-top' ).prepareTransition().toggleClass( 'is-active' );
		if ( jQuery( '.site-header-bottom' ).hasClass( 'header-fixed' ) ) {
			jQuery( '.site-header-bottom' ).removeClass( 'header-fixed' );
			fixedHeader = true;
		}
		e.stopPropagation();
	} );
} /* cryoutBurgerMenu() */

/* Force LP boxes images ratios */
function cryoutLpBoxesRatios() {
	for ( var index = 1; index <= cryout_theme_settings.lpboxratios.length; ++index ) {
		jQuery( '.lp-boxes-' + index + ' .lp-box-image' ).keepRatio( cryout_theme_settings.lpboxratios[index-1] );
	}
} /* cryoutLpBoxesRatios() */

/* Menu animation */
function cryoutMenuAnimate() {
	jQuery( '#access > .menu ul li > a:not(:only-child)' ).attr( 'aria-haspopup', 'true' );/* IE10 mobile Fix */

	jQuery( '#access li' ).on( 'mouseenter', function() {
		jQuery( this ).addClass( 'menu-hover' );
	} ).on( 'mouseleave', function() {
		jQuery( this ).removeClass( 'menu-hover' );
	} );

	jQuery( '#access ul' ).find( 'a' ).on( 'focus', function() {
		jQuery( this ).parents( '.menu-item, .page_item' ).addClass( 'menu-hover' );
	} );

	jQuery( '#access ul' ).find( 'a' ).on( 'blur', function() {
		jQuery( this ).parents( '.menu-item, .page_item' ).removeClass( 'menu-hover' );
	} );
} /* cryoutMenuAnimate() */

/* Static Slider Title Letter break */
function cryoutSliderTitleBreakUp( titleContainer, animatedTitle ) {

	titleContainer = 'body.bravada-animated-title ' + titleContainer;
	animatedTitle = 'body.bravada-animated-title ' + animatedTitle;

    /* If title not present on page - exit */
    if( ! jQuery( animatedTitle ).length ) return;

	/* Add class to all containers so the same CSS gets applied */
	jQuery( titleContainer ).addClass( 'animated-title' );

	/* And for improved performance, if static slider not in view - no animation */
	jQuery( window ).on( 'scroll', function() {
			var el = jQuery( titleContainer );
			if ( ! isInViewport( el ) ) {
				el.removeClass( 'animated-title' );
			} else {
				el.addClass( 'animated-title' );
			}
	} );

	var $location = jQuery( animatedTitle ),
		oldStr = $location.html(), /* new string for processing, complete with HTML tags */
		clearStr = $location.text().split( ' ' ).join(''), /* text only string for keys */
		newStr = '<em class="caption-title-word">',
		firsRunDelay = 1000, /*ms*/
		letterDelay = 0, /*ms*/
		animatedLetters = [], /* array for the random letters that are going to be animated */
		nrOfAnimatedLetters = ( Math.floor( clearStr.length / 4 ) > 2) ?
			Math.floor( clearStr.length / 4) :
			2;
		nrOfAnimatedLetters = ( nrOfAnimatedLetters > 7 ) ? 7 : nrOfAnimatedLetters;
	var	interval = 3500 + nrOfAnimatedLetters * letterDelay; /* 200 = CSS animation time */

	for ( var i = 0; i < oldStr.length; i++ ) {

		/* If tag starts skip everything until tag ends */
		if ( oldStr[i] == '<') {
			var substring = oldStr.substring( i );
			substring = substring.match( /(.*?)(<([^>]+)>)/ig );
			substring = substring[0];
			newStr += substring;
			i+= substring.length - 1;

		/* If entity starts skip everything until entity ends */
		} else if ( oldStr[i] == '&' ) {
			var substring = oldStr.substring( i );
			substring = substring.match( /(.*?);/ig );
			substring = substring[0];
			newStr += '<span><span class="cry-single">' + substring +
				'</span><span class="cry-double">' +  substring + '</span></span>';
			i+= substring.length - 1;

		/* Any plain old single character */
		} else if ( oldStr[i] != ' ' ) {
			newStr += '<span><span class="cry-single">' + oldStr[i] +
				'</span><span class="cry-double">' +  oldStr[i] + '</span></span>';

		/* Spaces must be inside words for proper flow on new lines */
		} else {
			newStr += '<span>&nbsp;</span></em><em class="caption-title-word">';
		}
	}
	newStr += '</em>';

	/* Out with the old, in with the new... string */
	$location.html( newStr );

	function titleAnimation() {
		jQuery( animatedTitle + ' .cry-single, ' + animatedTitle + ' .cry-double' )
			.removeClass( 'animated-letter' )
			.css( 'animation-delay', '0s' );
		for ( var i = 0; i < nrOfAnimatedLetters; i++ ) {

			/* Get a random key from the new array of letters*/
			animatedLetters[i] = Math.floor( Math.random() * clearStr.length );
			jQuery( animatedTitle + ' .cry-single' )
				.eq( animatedLetters[i] )
				.addClass( 'animated-letter' )
				.css( 'animation-delay', i * letterDelay + 'ms' );
			jQuery( animatedTitle + ' .cry-double' )
				.eq( animatedLetters[i] )
				.addClass( 'animated-letter' )
				.css( 'animation-delay', i * letterDelay + 'ms' );
		}
	}

	/* Run once after delay */
	setTimeout( titleAnimation, firsRunDelay );

	 /* Run forever with set interval */
	window.setInterval( titleAnimation, interval);
} /* cryoutSliderTitleBreakUp() */

/* Back to top button animation */
function cryoutBackToTop() {
	jQuery( window ).on( 'scroll', function() {
		if ( jQuery( this ).scrollTop() > 500 ) {
			jQuery( '#toTop' ).addClass( 'toTop-show' );
		} else {
			jQuery( '#toTop' ).removeClass( 'toTop-show' );
		}

		if ( jQuery( this ).scrollTop() > 100 &&
			( ! jQuery( '.site-header-top' ).hasClass( 'is-active' ) )
		) {
			jQuery( '.bravada-fixed-menu .site-header-bottom' ).addClass( 'header-fixed' );
		} else {
			jQuery( '.bravada-fixed-menu .site-header-bottom' ).removeClass( 'header-fixed' );
		}
	} );

	jQuery( '#toTop' ).on( 'click', function( event ) {
		event.preventDefault();
		jQuery( 'html, body' ).animate( { scrollTop: 0 }, 500 );
		return false;
	} );

} /* cryoutBackToTop() */

/* Search form animation */
function cryoutSearchFormAnimation() {
	var searchIcon = jQuery( '#access .menu-search-animated > a' ),
        searchForm = jQuery( '.menu-search-animated .searchform, .menu-main-search .icon-cancel' ),
        searchInput = jQuery( '#access .menu-search-animated .s' );

	searchIcon.on( 'click', function( event ) { /* never on focus! */
		event.preventDefault();
		searchForm.fadeIn( 200, function() {
			searchInput.trigger( 'focus' );
			searchInput.css( 'outline', 'none' );
		} );
		searchInput.addClass( 'is-active' );
		event.stopPropagation();
	} );

	searchForm.on( 'click', function( event ) {
		event.stopPropagation();
	} );

	searchInput.on( 'blur', function() {
		searchInput.removeClass( 'is-active' );
		searchForm.fadeOut( 200 );
	} );
} /* cryoutSearchFormAnimation() */

/* Mobile Menu */
function cryoutMobileMenuInit() {

	/* Remove animated class from mobile menu */
	jQuery( '#mobile-menu .menu-main-search' ).removeClass( 'menu-search-animated' );

	/* First and last elements in the loop */
	var firstTab = jQuery( 'nav#mobile-menu #mobile-nav > li:first-child a' ),
		lastTab  = jQuery( '.hamburger' );

	/* Toggle menu */
	jQuery( '.hamburger' ).on( 'click', function( e ) {
		e.stopPropagation();
		jQuery( 'body' ).toggleClass( 'burgermenu-active noscroll' );
		jQuery( 'nav#mobile-menu' )
			.prepareTransition()
			.toggleClass( 'burgermenu-active' );
		if ( jQuery( 'body' ).hasClass( 'burgermenu-active' ) ) {
			firstTab.trigger( 'focus' ).trigger( 'blur' );
		} else {
			lastTab.trigger( 'focus' ).trigger( 'blur' );
		}

	} );

	/* Animate menu elements on show */
	jQuery( 'nav#mobile-menu #mobile-nav > li, .side-section-element.widget_cryout_socials a' )
		.each( function( index ) {
			var value = 0.03 * index + 's';
			jQuery( this ).css( '-webkit-transition-delay', value );
			jQuery( this ).css( 'transition-delay', value );
	} );

	/* Redirect last tab to first input */
	lastTab.on( 'keydown', function ( e ) {
		if ( jQuery( 'body' ).hasClass( 'burgermenu-active' ) )
		if ( ( e.which === 9 && ( ! e.shiftKey ) ) ) {
			e.preventDefault();
			firstTab.trigger( 'focus' );
		}
	} );

	/* Redirect first shift+tab to last input*/
	firstTab.on( 'keydown', function ( e ) {
		if ( jQuery( 'body' ).hasClass( 'burgermenu-active' ) )
		if ( ( e.which === 9 && e.shiftKey ) ) {
			e.preventDefault();
			lastTab.trigger( 'focus' );
		}
	} );

	/* Allow escape key to close menu */
	jQuery( 'nav#mobile-menu' ).on( 'keyup', function( e ) {
		if ( jQuery( 'body' ).hasClass( 'burgermenu-active' ) )
		if ( e.keyCode === 27 ) {
			jQuery( 'body' ).removeClass( 'burgermenu-active noscroll' );
			jQuery( 'nav#mobile-menu' ).prepareTransition().toggleClass( 'burgermenu-active' );
			lastTab.trigger( 'focus' );
		}
	} );

	/* Hide main menu overlay when link with anchor is clicked */
	jQuery( 'nav#mobile-menu li a' ).on( 'click', function( e ) {
		var $hash = jQuery( this ).prop( 'hash' );

		if ( $hash && jQuery( $hash ).length ) {
			jQuery( 'body' ).removeClass( 'burgermenu-active noscroll' );
			jQuery( 'nav#mobile-menu' ).prepareTransition().toggleClass( 'burgermenu-active' );
		}
	} );

} /* cryoutMobileMenuInit() */


/* Add fixed mobile menu functionality */
function cryoutFixedMobileMenu() {

	/* Only run if fixed menu is enabled */
	if ( cryout_theme_settings.menustyle != 1 ) return;

	var c, currentScrollTop = 0, currentScrollBottom,
	navbar = jQuery( '.site-header-bottom' ),
	body = jQuery( 'body' );

	jQuery( window ).on( 'scroll', function () {
		var a = jQuery( window ).scrollTop();
		var b = jQuery( document ).height();
		var viewport = jQuery( window ).height();
		var navbarHeight = navbar.height();

		currentScrollTop = a;
		currentScrollBottom = b;

		if ( c < currentScrollTop && a > navbarHeight + navbarHeight ) {
			/* Scrolling down */
			body.removeClass( 'mobile-fixed' );
		} else if ( ( currentScrollTop > viewport ) &&
			( currentScrollTop < currentScrollBottom - viewport * 2 ) &&
			( c > currentScrollTop ) && ( ! ( a <= navbarHeight ) )
		) {

			/* Scrolling up */
			body.addClass( 'mobile-fixed' );
		}

		c = currentScrollTop;

		/* Always clear fixed class when returning to the top */
		if ( currentScrollTop <= navbarHeight ) {
			body.removeClass( 'mobile-fixed' );
		}
	} );
} /* cryoutFixedMobileMenu() */

/* Add submenus toggles to the primary navigation */
function cryoutInitNav( selector ) {
	var container = jQuery( selector );

	/* Add dropdown toggle that display child menu items. */
	container.find( '.menu-item-has-children > a' )
		.after( '<button class="dropdown-toggle" aria-expanded="false"></button>' );
	container.find( '.page_item_has_children > a' )
		.after( '<button class="dropdown-toggle" aria-expanded="false"></button>' );

	/* Toggle buttons and submenu items with active children menu items. */
	container.find( '.current-menu-ancestor > button, .current-page-ancestor > button' )
		.addClass( 'toggle-on' );
	container.find( '.current-menu-ancestor > .sub-menu, .current-page-ancestor > .sub-menu,' +
		' .current-menu-ancestor .children, .current-page-ancestor .children' )
		.show( 0 ).addClass( 'toggled-on' );

	container.find( '.dropdown-toggle' ).on( 'click', function( e ) {
		var _this = jQuery( this );
		e.preventDefault();
		_this.toggleClass( 'toggle-on' );
		if ( _this.hasClass( 'toggle-on') ) {
			_this.next( '.children, .sub-menu' ).show( 0 ).addClass( 'toggled-on' );
			_this.prev( 'a' ).addClass( 'toggled-on' );
		}
		else {
			_this.next( '.children, .sub-menu' ).removeClass( 'toggled-on' );
			_this.next( '.children, .sub-menu' ).find( '.children, .sub-menu' ).removeClass( 'toggled-on' );
			_this.next( '.children, .sub-menu' ).find( 'a' ).removeClass( 'toggled-on' );
			_this.next( '.children, .sub-menu' ).find( '.dropdown-toggle' ).removeClass( 'toggled-on' );
			_this.prev( 'a' ).removeClass( 'toggled-on' );

			setTimeout( function() {
				_this.next( '.children, .sub-menu' ).hide( 0 );
				_this.next( '.children, .sub-menu' ).find( '.children, .sub-menu' ).hide( 0 );
			}, 600 );
		}

		/* _this.parent().find( 'a' ).toggleClass( 'toggled-on' ); */
		_this.attr( 'aria-expanded', _this.attr( 'aria-expanded' ) === 'false' ? 'true' : 'false' );
	} );

	/* Close mobile menu on click/tap */
	jQuery( 'body' ).on( 'click', '#mobile-nav a', function() {
		jQuery( '#nav-cancel i' ).trigger( 'click' );
	} );

} /* cryoutInitNav() */

/* LP Boxes Keep aspect ratio*/
jQuery.fn.keepRatio = function( ratio ) {

	var $this = jQuery( this );
	var nh = $this.width() / ratio;
	$this.css( 'height', nh + 'px' );

	jQuery( window ).on( 'resize', function() {
		var nh = $this.width() / ratio;
		$this.css( 'height', nh + 'px' );
	} );

}; /* keepRatio() */

/* LP Box Mouse direction overlay animation */
jQuery.fn.mousedir = function( el ) {
	if ( ! jQuery( 'body' ).hasClass( 'bravada-landing-page' ) ) return;

	var $this = jQuery( this ),
		$el = jQuery( el ),
		last_position = {},
		$output = 'direction-down';

	jQuery( document ).on( 'mousemove', function ( event ) {
		if ( typeof( last_position.x ) !== 'undefined' ) {
			var deltaX = last_position.x - event.offsetX,
			deltaY = last_position.y - event.offsetY;
			if ( ( Math.abs( deltaX ) > Math.abs( deltaY ) ) && ( deltaX > 0 ) ) {
				$output = 'direction-left';
			} else if ( ( Math.abs( deltaX ) > Math.abs( deltaY ) ) && ( deltaX < 0 ) ) {
				$output = 'direction-right';
			} else if ( ( Math.abs( deltaY ) > Math.abs( deltaX ) ) && ( deltaY > 0 ) ) {
				$output = 'direction-up';
			} else if ( ( Math.abs( deltaY ) > Math.abs( deltaX ) ) && ( deltaY < 0 ) ) {
				$output = 'direction-down';
			} else {
				$output = 'direction-down';
			}
		}
		last_position = {
        	x : event.offsetX,
        	y : event.offsetY
		};
	} );

	$el.on( 'mouseenter', function() {
		$this.removeClass( 'in-direction-left in-direction-right in-direction-up in-direction-down' +
			' out-direction-left out-direction-right out-direction-up out-direction-down' );
		$this.addClass( 'in-' + $output );
		return;
	} );

	$el.on( 'mouseleave', function() {
		$this.removeClass( 'in-direction-left in-direction-right in-direction-up in-direction-down ' +
			' out-direction-left out-direction-right out-direction-up out-direction-down' );
		$this.addClass( 'out-' + $output );
		return;
	} );

}; /* mouseDir() */

/* Check if element is visible in browser window */
function isInViewport( el ) {
	if ( ! jQuery( el ).length ) return;

	var adminHeight = ( jQuery( '#wpadminbar' ).length ) ? jQuery( '#wpadminbar' ).height() : 0;

	var elementTop = jQuery( el ).offset().top;
	var elementBottom = elementTop + jQuery( el ).outerHeight();

	var viewportTop = jQuery( window ).scrollTop();
	var viewportBottom = viewportTop + jQuery( window ).height() - adminHeight;

	return ( elementBottom > viewportTop ) && ( elementTop < viewportBottom );
} /* isInViewport() */

/* Animate on scroll */
function animateScroll( $articles, $class ) {
	var $articles = jQuery( $articles );

	$articles.each( function( i, el ) {
		jQuery( el ).addClass( $class );
	} );

	jQuery( window ).on( 'scroll', function() {
		$articles.each( function( i, el ) {
			if ( isInViewport( el ) ) {
				jQuery( el ).removeClass( $class );
			}
		} );
	} );

	jQuery( window ).trigger( 'scroll' );
} /* animateScroll() */

/* Header image paralax effect and opacity, animate header titles */
function cryoutHeaderParallax() {
	var cur_op = parseFloat( jQuery( '#header-overlay' ).css( 'opacity' ) );

	/* Parallax on scroll */
	jQuery( window ).on( 'scroll', function() {
		var scrolled = jQuery( window ).scrollTop();

		jQuery( '#masthead .header-image' ).each( function( index, element ) {

			/* Skip animations if element is not currently visible */
			if ( jQuery( element ).css( 'display' ) === 'none' ) return true;

		    var initY = jQuery( element ).offset().top,
            height = jQuery( element ).height(),
            visible = isInViewport( jQuery( element ) );

		    if ( visible ) {
				var diff = scrolled - initY;
				var ratio = Math.round( ( diff / height ) * 100 );
				jQuery( element ).css( 'opacity', 1);
				jQuery( element ).css( 'background-position', 'center ' + (50 + parseInt( ratio )) + '%' );
				if ( ( parseInt( ratio ) > 0 ) ) {
					jQuery( '#header-overlay' )
						.css( 'opacity', cur_op + 1.5 * ( parseInt( ratio ) / (100 / ( (1 - cur_op ) * 100 ) ) / 100 ) );
					jQuery( '#header-page-title' )
						.css( 'opacity', ( 1 - ( parseInt( ratio ) * 1 / 100 ) ) );
				} else {
					jQuery( '#header-overlay' ).css( 'opacity', cur_op );
					jQuery( '#header-page-title' ).css( 'opacity', 1 );
				}
			}
		} );
	} );
} /* cryoutHeaderParallax() */

/* Add Social Icons titles */
function cryoutSocialTitles() {
	jQuery( '.socials a' ).each( function() {
		jQuery( this ).attr( 'title', jQuery( this ).children().html() );
		jQuery( this ).html( '' );
	} );
} /* cryoutSocialTitles() */

/* Add body classes */
function cryoutBodyClasses() {

	/* Detect and apply custom class for Safari */
	if ( ( navigator.userAgent.indexOf( 'Safari' ) !== -1 ) &&
		( navigator.userAgent.indexOf( 'Chrome' ) === -1 )
	) {
		jQuery( 'body' ).addClass( 'safari' );
	}

	/* Add body class if masonry is used on page */
	if ( jQuery( '#content-masonry' ).length > 0 ) {
		jQuery( 'body' ).addClass( 'bravada-with-masonry' );
	}
} /* cryoutBodyClasses() */

/* Remove all off-canvas states */
function cryoutRemoveFocus() {
	jQuery( 'input, textarea, select, button, a' ).on( 'focus', function() {
		if (jQuery( this ).data( 'mousedown' ) || jQuery( this ).data( 'mouseup' ) ) {
			jQuery( this ).css( 'outline', 'none' );
		}
	} );
} /* cryoutRemoveFocus() */

/*  Tabs widget */
function cryoutTabsWidget() {
		var tabsNav = jQuery( '.cryout-wtabs-nav' ),
			tabsNavLis = tabsNav.children( 'li' );

		tabsNav.each( function() {
			var localthis = jQuery( this );
			localthis.next().children( '.cryout-wtab' ).stop( true, true )
				.children( 'li' ).hide()
				.parent().siblings( localthis.find( 'a' ).attr( 'href' ) )
				.children( 'li' ).show();
			localthis.children( 'li' ).first()
				.addClass( 'active' ).stop( true, true ).show();
		} );

		tabsNavLis.on( 'click', function( e ) {
			var localthis = jQuery( this ),
				tabs_duration = 200;

			localthis.siblings().removeClass( 'active' ).end().addClass( 'active' );
			localthis.parent().next().children( '.cryout-wtab' ).stop( true, true )
				.children( 'li' ).hide()
				.parent().siblings( localthis.find( 'a' ).attr( 'href' ) )
				.children( 'li' ).each( function( index ) {
					jQuery( this ).fadeIn( tabs_duration * ( index + 1 ) );
			} );
			e.preventDefault();
		} ).children( window.location.hash ? 'a[href="' + window.location.hash + '"]' : 'a:first' )
			.trigger( 'click' );

} /* cryoutTabsWidget() */

/* Blog Masonry */
function cryoutMasonry() {
	if ( ( cryout_theme_settings.masonry == 1 ) &&
		( cryout_theme_settings.magazine != 1 ) &&
		( typeof jQuery.fn.masonry !== 'undefined' )
	) {
		jQuery( '#content-masonry' ).masonry( {
			itemSelector: 'article',
			columnWidth: 'article',
			percentPosition: true,
			isRTL: cryout_theme_settings.rtl,
		} );
	}
} /* cryoutMasonry() */

/* Jetpack Portfolio Masonry */
function cryoutPortfolioMasonry() {
	if ( ( cryout_theme_settings.masonry == 1 ) && ( typeof jQuery.fn.masonry !== 'undefined' ) ) {
		jQuery( '#lp-portfolio .jetpack-portfolio-shortcode' ).masonry( {
			itemSelector: '.portfolio-entry',
			columnWidth: '.portfolio-entry:not(.hidey)',
			percentPosition: true,
			isRTL: cryout_theme_settings.rtl,
		} );
	}
} /* cryoutPortfolioMasonry() */

/* Portfolio filtering */
function cryoutPortfolioFilter() {
	jQuery( 'body' ).on( 'click', '#portfolio-filter > a', function( e ) {
		e.preventDefault();
		jQuery( '#portfolio-filter > a' ).removeClass( 'active' );
		jQuery( this ).addClass( 'active' );
		var filter = jQuery( this ).attr( 'data-slug' );
		jQuery( '#portfolio-masonry .portfolio-entry' ).each( function( i, elm ) {
			if ( filter == 'all' ) {
				jQuery( elm ).removeClass( 'hidey' ).fadeIn( 'fast' );
			} else {
				if ( ! jQuery( elm ).hasClass( 'type-' + filter ) ) {
					jQuery( elm ).addClass( 'hidey' ).fadeOut( 'fast' );
				} else {
					jQuery( elm ).removeClass( 'hidey' ).fadeIn( 'fast' );
				}
			}
		} ).promise().done( function() {
				cryoutPortfolioMasonry();
				/*jQuery('.jetpack-portfolio-shortcode').masonry();*/
		} );
		return false;
	} );
} /* cryoutPortfolioFilter() */

/**
 *  prepareTransition jQuery Plugin
 */
;( function( $ ){
	$.fn.prepareTransition = function() {
	    return this.each( function() {
	        var el = $( this );

	        /* Remove the transition class upon completion */
	        el.one( 'TransitionEnd webkitTransitionEnd transitionend oTransitionEnd', function() {
	            el.removeClass( 'is-transitioning' );
	        } );

	        /* Check the various CSS properties to see if a duration has been set */
	        var cl = ["transition-duration", "-moz-transition-duration",
				"-webkit-transition-duration", "-o-transition-duration"];
	        var duration = 0;
	        $.each( cl, function( idx, itm ) {
	            duration || ( duration = parseFloat( el.css( itm ) ) );
	        } );

	        /* if I have a duration then add the class */
	        if ( duration != 0 ) {
	            el.addClass( 'is-transitioning' );
	            el[0].offsetWidth; /* check offsetWidth to force the style rendering */
	        }
	    } );
	};
}( jQuery ) );

/**
 * Scroll to anchors
 */
function cryoutAutoScroll(document, history, location) {
	document = window.document;
	history = window.history;
	location = window.location;
	var HISTORY_SUPPORT = !! ( history && history.pushState );
	var anchorScrolls = {
		ANCHOR_REGEX: /^#[^ ]+$/,
		OFFSET_HEIGHT_PX: jQuery( '.bravada-fixed-menu #site-header-main' ).height(),

		/* Establish events, and fix initial scroll position if a hash is provided. */
		init: function() {
			this.scrollToCurrent();
			jQuery( window ).on(
				'hashchange',
				jQuery.proxy( this, 'scrollToCurrent' )
			);
			jQuery( 'body' ).on(
				'click',
				'.main a, nav ul li a, .meta-arrow',
				jQuery.proxy( this, 'delegateAnchors' )
			);
		},

		/*  Return the offset amount to deduct from the normal scroll position.
			Modify as appropriate to allow for dynamic calculations. */
		getFixedOffset: function() {
			return ( this.OFFSET_HEIGHT_PX ) ? this.OFFSET_HEIGHT_PX : 0;
		},

		/* If the provided href is an anchor which resolves to an element on the page, scroll to it. */
		scrollIfAnchor: function( href, pushToHistory ) {
			var match, anchorOffset;

			if ( ! this.ANCHOR_REGEX.test( href ) ) {
				return false;
			}

			match = document.getElementById(href.slice(1));

			if ( match && ( ! isInViewport( match ) ) && jQuery( match ).offset().top ) {
				anchorOffset = jQuery( match ).offset().top - this.getFixedOffset();
				jQuery( 'html, body' ).animate( { scrollTop: anchorOffset} );

				/* Add the state to history as-per normal anchor links */
				if ( HISTORY_SUPPORT && pushToHistory ) {
					history.pushState( {}, document.title, location.pathname + href );
				}
			}

			return !!match;
		},

		/* Attempt to scroll to the current location's hash */
		scrollToCurrent: function(e) {
			if (this.scrollIfAnchor(window.location.hash) && e) {
				e.preventDefault();
			}
		},

		/* If the click event's target was an anchor, fix the scroll position */
		delegateAnchors: function( e ) {
			var elem = e.target.closest( 'a' );

			if ( this.scrollIfAnchor( elem.getAttribute( 'href' ), true ) ) {
				e.preventDefault();
			}
		}
	};

	jQuery( document ).ready( jQuery.proxy( anchorScrolls, 'init' ) );
}

/* FitVids 1.1*/
;(function( $ ){

  'use strict';

  $.fn.fitVids = function( options ) {
    var settings = {
      customSelector: null,
      ignore: null
    };

    if(!document.getElementById('fit-vids-style')) {
      /* appendStyles: https://github.com/toddmotto/fluidvids/blob/master/dist/fluidvids.js */
      var head = document.head || document.getElementsByTagName('head')[0];
      var css = '.fluid-width-video-wrapper{width:100%;position:relative;padding:0;}.fluid-width-video-wrapper iframe,.fluid-width-video-wrapper object,.fluid-width-video-wrapper embed {position:absolute;top:0;left:0;width:100%;height:100%;}';
      var div = document.createElement("div");
      div.innerHTML = '<p>x</p><style id="fit-vids-style">' + css + '</style>';
      head.appendChild(div.childNodes[1]);
    }

    if ( options ) {
      $.extend( settings, options );
    }

    return this.each(function(){
      var selectors = [
        'iframe[src*="player.vimeo.com"]',
        'iframe[src*="youtube.com"]',
        'iframe[src*="youtube-nocookie.com"]',
        'iframe[src*="kickstarter.com"][src*="video.html"]',
        'object',
        'embed'
      ];

      if (settings.customSelector) {
        selectors.push(settings.customSelector);
      }

      var ignoreList = '.fitvidsignore, .wp-block-embed__wrapper';

      if(settings.ignore) {
        ignoreList = ignoreList + ', ' + settings.ignore;
      }

      var $allVideos = $(this).find(selectors.join(','));
      $allVideos = $allVideos.not('object object'); /* SwfObj conflict patch */
      $allVideos = $allVideos.not(ignoreList); /* Disable FitVids on this video. */

      $allVideos.each(function(){
        var $this = $(this);
        if($this.parents(ignoreList).length > 0) {
          return; /* Disable FitVids on this video. */
        }
        if (this.tagName.toLowerCase() === 'embed' && $this.parent('object').length || $this.parent('.fluid-width-video-wrapper').length) { return; }
        if ((!$this.css('height') && !$this.css('width')) && (isNaN($this.attr('height')) || isNaN($this.attr('width'))))
        {
          $this.attr('height', 9);
          $this.attr('width', 16);
        }
        var height = ( this.tagName.toLowerCase() === 'object' || ($this.attr('height') && !isNaN(parseInt($this.attr('height'), 10))) ) ? parseInt($this.attr('height'), 10) : $this.height(),
            width = !isNaN(parseInt($this.attr('width'), 10)) ? parseInt($this.attr('width'), 10) : $this.width(),
            aspectRatio = height / width;
        if(!$this.attr('name')){
          var videoName = 'fitvid' + $.fn.fitVids._count;
          $this.attr('name', videoName);
          $.fn.fitVids._count++;
        }
        $this.wrap('<div class="fluid-width-video-wrapper"></div>').parent('.fluid-width-video-wrapper').css('padding-top', (aspectRatio * 100)+'%');
        $this.removeAttr('height').removeAttr('width');
      } );
    } );
  };

  /* Internal counter for unique video names. */
  $.fn.fitVids._count = 0;

/* Works with either jQuery or Zepto */
})( window.jQuery || window.Zepto );

/* IE .closest() fix */
if ( window.Element && ( ! Element.prototype.closest ) ) {
    Element.prototype.closest = function( s ) {
        var matches = ( this.document || this.ownerDocument ).querySelectorAll( s ),
            i,
            el = this;
        do {
            i = matches.length;
            while (--i >= 0 && matches.item( i ) !== el) {}
        } while ( (i < 0) && ( el = el.parentElement ) );
        return el;
    };
}

/* FIN */

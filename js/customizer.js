/**
 * Theme Customizer enhancements to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );
	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'color': to,
					'position': 'relative'
				} );
			}
		} );
	} );

	// Top Menu navigation bar
	wp.customize( 'optionsframework_alienship[alienship_show_top_navbar]', function( value ) {
		value.bind( function( to ) {
			if ( false === to ) {
				$( '.navbar' ).css( {
					'display': 'none'
				} );
				$( '#page' ).css( {
					'margin-top': '40px'
				} );
			} else {
				$( '.navbar' ).css( {
					'display': 'block'
				} );
				$( '#page' ).css( {
					'margin-top': '20px'
				} );
			}
		} );
	} );

	// Top Menu search bar
	wp.customize( 'optionsframework_alienship[alienship_search_bar]', function( value ) {
		value.bind( function( to ) {
			if ( false === to ) {
				$( '.navbar-form' ).css( {
					'display': 'none'
				} );
			} else {
				$( '.navbar-form' ).css( {
					'display': 'block'
				} );
			}
		} );
	} );

	// Published date
	wp.customize( 'optionsframework_alienship[alienship_published_date]', function( value ) {
		value.bind( function( to ) {
			if ( false === to ) {
				$( '.published-date' ).css( {
					'display': 'none'
				} );
			} else {
				$( '.published-date' ).css( {
					'display': 'inline'
				} );
			}
		} );
	} );

	// Post author
	wp.customize( 'optionsframework_alienship[alienship_post_author]', function( value ) {
		value.bind( function( to ) {
			if ( false === to ) {
				$( '.byline' ).css( {
					'display': 'none'
				} );
			} else {
				$( '.byline' ).css( {
					'display': 'inline'
				} );
			}
		} );
	} );

	// Post categories
	wp.customize( 'optionsframework_alienship[alienship_post_categories]', function( value ) {
		value.bind( function( to ) {
			if ( false === to ) {
				$( '.cat-links' ).css( {
					'display': 'none'
				} );
			} else {
				$( '.cat-links' ).css( {
					'display': 'inline'
				} );
			}
		} );
	} );

	// Post tags
	wp.customize( 'optionsframework_alienship[alienship_post_tags]', function( value ) {
		value.bind( function( to ) {
			if ( false === to ) {
				$( '.tags-links' ).css( {
					'display': 'none'
				} );
			} else {
				$( '.tags-links' ).css( {
					'display': 'inline'
				} );
			}
		} );
	} );

	// Post comments link
	wp.customize( 'optionsframework_alienship[alienship_post_comments_link]', function( value ) {
		value.bind( function( to ) {
			if ( false === to ) {
				$( '.comments-link' ).css( {
					'display': 'none'
				} );
			} else {
				$( '.comments-link' ).css( {
					'display': 'inline'
				} );
			}
		} );
	} );


} )( jQuery );

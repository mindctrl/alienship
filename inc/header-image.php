<?php

  /* Custom Header Support
   *
   * @since Alien Ship .53
   *
   * Credit to WordPress team and Twenty Eleven theme for concept and borrowed code
   */

  /*  The default header text color */
  define( 'HEADER_TEXTCOLOR', '000' );

  /* By leaving empty, we allow for random image rotation. */
  define( 'HEADER_IMAGE', '' );

  /* The height and width of your custom header.
   * Add a filter to alienship_header_image_width and alienship_header_image_height to change these values. */
  define( 'HEADER_IMAGE_WIDTH', apply_filters( 'alienship_header_image_width', 940 ) );
  define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'alienship_header_image_height', 288 ) );

  /* We'll be using post thumbnails for custom header images on posts and pages.
   * We want them to be the size of the header image that we just defined
   * Larger images will be auto-cropped to fit, smaller ones will be ignored. See header.php. */
  set_post_thumbnail_size( HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true );

  /* Add Alien Ship's custom image sizes */
  add_image_size( 'large-feature', HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true ); // Used for large feature (header) images
  add_image_size( 'small-feature', 500, 300 ); // Used for featured posts if a large-feature doesn't exist

  /* Turn on random header image rotation by default. */
  add_theme_support( 'custom-header', array( 'random-default' => true ) );

  /* Add a way for the custom header to be styled in the admin panel that controls
   * custom headers. See alienship_admin_header_style(), below. */
  add_custom_image_header( 'alienship_header_style', 'alienship_admin_header_style', 'alienship_admin_header_image' );

  // ... and thus ends the changeable header business.

  /* Default custom headers packaged with the theme. %s is a placeholder for the theme template directory URI. */
  register_default_headers( array(
    'shore' => array(
      'url' => '%s/img/headers/shore.jpg',
      'thumbnail_url' => '%s/img/headers/shore-thumbnail.jpg',
      /* translators: header image description */
      'description' => __( 'Shore', 'alienship' )
    ),
    'trolley' => array(
      'url' => '%s/img/headers/trolley.jpg',
      'thumbnail_url' => '%s/img/headers/trolley-thumbnail.jpg',
      /* translators: header image description */
      'description' => __( 'Trolley', 'alienship' )
    ),
    'chessboard' => array(
      'url' => '%s/img/headers/chessboard.jpg',
      'thumbnail_url' => '%s/img/headers/chessboard-thumbnail.jpg',
      /* translators: header image description */
      'description' => __( 'Chessboard', 'alienship' )
    ),
    'lanterns' => array(
      'url' => '%s/img/headers/lanterns.jpg',
      'thumbnail_url' => '%s/img/headers/lanterns-thumbnail.jpg',
      /* translators: header image description */
      'description' => __( 'Lanterns', 'alienship' )
    )
  ) );


if ( ! function_exists( 'alienship_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @since Alien Ship .53
 */
function alienship_header_style() {

  // If no custom options for text are set, let's bail
  // get_header_textcolor() options: HEADER_TEXTCOLOR is default, hide text (returns 'blank') or any hex value
  if ( HEADER_TEXTCOLOR == get_header_textcolor() )
    return;
  // If we get this far, we have custom styles. Let's do this.
  ?>
  <style type="text/css">
  <?php
    // Has the text been hidden?
    if ( 'blank' == get_header_textcolor() ) :
  ?>
    #site-title,
    #site-description {
      position: absolute !important;
      clip: rect(1px 1px 1px 1px); /* IE6, IE7 */
      clip: rect(1px, 1px, 1px, 1px);
    }
  <?php
    // If the user has set a custom color for the text use that
    else :
  ?>
    #site-title a,
    #site-description {
      color: #<?php echo get_header_textcolor(); ?> !important;
    }
  <?php endif; ?>
  </style>
  <?php
}
endif; // alienship_header_style

if ( ! function_exists( 'alienship_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * Referenced via add_custom_image_header() in alienship_setup().
 *
 * @since Alien Ship .53
 */
function alienship_admin_header_style() {
?>
  <style type="text/css">
  .appearance_page_custom-header #headimg {
    border: none;
  }
  #headimg h1,
  #desc {
    font-family: "Helvetica Neue", Arial, Helvetica, "Nimbus Sans L", sans-serif;
  }
  #headimg h1 {
    margin: 0;
  }
  #headimg h1 a {
    font-size: 32px;
    line-height: 36px;
    text-decoration: none;
  }
  #desc {
    font-size: 14px;
    line-height: 23px;
    padding: 0 0 3em;
  }
  <?php
    // If the user has set a custom color for the text use that
    if ( get_header_textcolor() != HEADER_TEXTCOLOR ) :
  ?>
    #site-title a,
    #site-description {
      color: #<?php echo get_header_textcolor(); ?>;
    }
  <?php endif; ?>
  #headimg img {
    max-width: 1000px;
    height: auto;
    width: 100%;
  }
  </style>
<?php
}
endif; // alienship_admin_header_style

if ( ! function_exists( 'alienship_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * Referenced via add_custom_image_header() in alienship_setup().
 *
 * @since Alien Ship .53
 */
function alienship_admin_header_image() { ?>
  <div id="headimg">
    <?php
    if ( 'blank' == get_theme_mod( 'header_textcolor', HEADER_TEXTCOLOR ) || '' == get_theme_mod( 'header_textcolor', HEADER_TEXTCOLOR ) )
      $style = ' style="display:none;"';
    else
      $style = ' style="color:#' . get_theme_mod( 'header_textcolor', HEADER_TEXTCOLOR ) . ';"';
    ?>
    <h1><a id="name"<?php echo $style; ?> onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
    <div id="desc"<?php echo $style; ?>><?php bloginfo( 'description' ); ?></div>
    <?php $header_image = get_header_image();
    if ( ! empty( $header_image ) ) : ?>
      <img src="<?php echo esc_url( $header_image ); ?>" alt="" />
    <?php endif; ?>
  </div>
<?php }
endif; // alienship_admin_header_image
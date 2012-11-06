<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 *
 */

function optionsframework_option_name() {
  // This gets the theme name from the stylesheet
  $themename = get_option( 'stylesheet' );
  $themename = preg_replace("/\W/", "_", strtolower($themename) );

  $optionsframework_settings = get_option('optionsframework');
  $optionsframework_settings['id'] = $themename;
  update_option('optionsframework', $optionsframework_settings);
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the "id" fields, make sure to use all lowercase and no spaces.
 *
 */

function optionsframework_options() {

  // Pull all the categories into an array
  $options_categories = array();
  $options_categories_obj = get_categories();
  foreach ($options_categories_obj as $category) {
      $options_categories[$category->cat_ID] = $category->cat_name;
  }

  // Pull all the tags into an array
  $options_tags = array();
  $options_tags_obj = get_tags( array('hide_empty' => false) );
  $options_tags[''] = __( 'Select a tag:', 'alienship' );
  foreach ($options_tags_obj as $tag) {
      $options_tags[$tag->term_id] = $tag->name;
  }

  // Pull all the pages into an array
  $options_pages = array();
  $options_pages_obj = get_pages('sort_column=post_parent,menu_order');
  $options_pages[''] = __( 'Select a page:', 'alienship' );
  foreach ($options_pages_obj as $page) {
      $options_pages[$page->ID] = $page->post_title;
  }

  // If using image radio buttons, define a directory path
  $imagepath =  get_bloginfo('stylesheet_directory') . '/img/';

  $options = array();

  // Display Settings tab
  $options[] = array(
      'name' => __( 'Display Options', 'alienship' ),
      'type' => 'heading'
    );


  // Navigation elements
  $options[] = array(
      'name' => __( 'Navigation Elements', 'alienship' ),
      'desc' => __( 'Top navbar, breadcrumb navigation, and content navigation design options', 'alienship' ),
      'type' => 'info'
    );

  /* $options[] = array( 'name' => "Show logo image in Top Menu navigation bar?",
            'desc' => "Check this box to show a logo image in the Top Menu navigation bar. Upload your logo image below. Default is disabled.",
            'id' => "alienship_logo_in_navbar",
            'std' => '0',
            'type' => 'checkbox');

  $options[] = array( 'name' => "Upload a logo image for the Top Menu navigation bar.",
            'desc' => "Upload an image to use as a logo image in the Top Menu navigation bar. Note: You must enable the option above for this image to be displayed. FOR BEST RESULTS: upload an image that isn't too large.",
            'id' => "alienship_logo_in_navbar_file",
            'type' => "upload"); */

  $options[] = array(
      'name' => __( 'Show Top Menu navigation bar?', 'alienship' ),
      'desc' => __( 'Displays the top navbar on your site, even if there\'s no menu assigned in Appearance > Menu. Uncheck this box to hide it. Default is enabled.', 'alienship' ),
      'id'   => 'alienship_show_top_navbar',
      'std'  => '1',
      'type' => 'checkbox'
    );

  $options[] = array(
      'name' => __( 'Show site name in Top Menu navigation bar?', 'alienship' ),
      'desc' => __( 'Default is enabled. Uncheck this box to hide site name in Top Menu navigation bar.', 'alienship' ),
      'id'   => 'alienship_name_in_navbar',
      'std'  => '1',
      'type' => 'checkbox'
    );

  $options[] = array(
      'name' => __( 'Show site description in Top Menu navigation bar?', 'alienship' ),
      'desc' => __( 'Check this box to show site description in Top Menu navigation bar. NOTE: Enabling this option will shift your nav menu to the right to make room for the site description. Site description is hidden on mobile devices. Default setting is disabled.', 'alienship' ),
      'id'   => 'alienship_desc_in_navbar',
      'std'  => '0',
      'type' => 'checkbox'
    );

  $options[] = array(
      'name' => __( 'Show search bar in Top Menu navigation bar?', 'alienship' ),
      'desc' => __( 'Default is enabled. Uncheck this box to turn it off.', 'alienship' ),
      'id'   => 'alienship_search_bar',
      'std'  => '1',
      'type' => 'checkbox'
    );

  $options[] = array(
      'name' => __( 'Show Breadcrumb Navigation?', 'alienship' ),
      'desc' => __( 'Default is show. Uncheck this box to hide breadcrumbs.', 'alienship' ),
      'id'   => 'alienship_breadcrumbs',
      'std'  => '1',
      'type' => 'checkbox'
    );

  $options[] = array(
      'name' => __( 'Show content navigation above posts?', 'alienship' ),
      'desc' => __( 'Displays links to next and previous posts above the current post and above the posts on the index page. Default is hide. Check this box to show content nav above posts.', 'alienship' ),
      'id'   => 'alienship_content_nav_above',
      'std'  => '0',
      'type' => 'checkbox'
    );

  $options[] = array(
      'name' => __( 'Show content navigation below posts?', 'alienship' ),
      'desc' => __( 'Displays links to next and previous posts below the current post and below the posts on the index page. Default is show. Uncheck this box to hide content nav above posts.', 'alienship' ),
      'id'   => 'alienship_content_nav_below',
      'std'  => '1',
      'type' => 'checkbox'
    );

  // Miscellaneous text options
  $options[] = array(
      'name' => __( 'Miscellaneous Text', 'alienship' ),
      'desc' => __( 'Miscellaneous text items, such as site name and description and custom footer text.', 'alienship' ),
      'type' => 'info'
    );

  $options[] = array(
      'name' => __( 'Show custom footer text?', 'alienship' ),
      'desc' => __( 'Default is disabled. Check this box to use custom footer text. Fill in your text below.', 'alienship' ),
      'id'   => 'alienship_custom_footer_toggle',
      'std'  => '0',
      'type' => 'checkbox'
    );

  $options[] = array(
      'name' => __( 'Custom footer text', 'alienship' ),
      'desc' => __( 'Enter the text here that you would like displayed at the bottom of your site. This setting will be ignored if you do not enable "Show custom footer text" above.', 'alienship' ),
      'id'   => 'alienship_custom_footer_text',
      'std'  => '',
      'type' => 'text'
    );

  $options[] = array(
      'name' => __( 'Posts and Pages', 'alienship' ),
      'desc' => __( 'Options related to the display of posts and pages, like excerpts and post meta information (published date, author, categories, and tags - is displayed on each post to provide your readers with information). Use the options below to control what is displayed.', 'alienship' ),
      'type' => 'info'
    );

  $options[] = array(
      'name'    => __( 'Display full content or excerpts on index, search, and archive type pages?', 'alienship' ),
      'desc'    => __( 'Excerpt shows a short snippet of your post, and full content shows it all. The default setting is Show entire post.', 'alienship' ),
      'id'      => 'alienship_archive_display',
      'std'     => 'full',
      'type'    => 'radio',
      'options' => array(
          'full'    => __( 'Show entire post', 'alienship' ),
          'excerpt' => __( 'Show post excerpt', 'alienship' )
      )
    );

  $options[] = array(
      'name' => __( 'Show post author?', 'alienship' ),
      'desc' => __( 'Displays the post author. Default is show. Uncheck this box to hide the post author.', 'alienship' ),
      'id'   => 'alienship_post_author',
      'std'  => '1',
      'type' => 'checkbox'
    );

  $options[] = array(
      'name' => __( 'Show published date?', 'alienship' ),
      'desc' => __( 'Displays the date the article was posted. Default is show. Uncheck this box to hide post published date.', 'alienship' ),
      'id'   => 'alienship_published_date',
      'std'  => '1',
      'type' => 'checkbox'
    );

  $options[] = array(
      'name' => __( 'Show post categories?', 'alienship' ),
      'desc' => __( 'Displays the categories in which a post was published. Default is show. Uncheck this box to hide post categories.', 'alienship' ),
      'id'   => 'alienship_post_categories',
      'std'  => '1',
      'type' => 'checkbox'
    );

  $options[] = array(
      'name' => __( 'Show post categories on the index/posts page?', 'alienship' ),
      'desc' => __( 'Displays the post categories on the index/posts page - as defined in Settings > Reading. Default is show. Uncheck this box to hide post categories on the index/posts page.', 'alienship' ),
      'id'   => 'alienship_post_categories_posts_page',
      'std'  => '1',
      'type' => 'checkbox'
    );

  $options[] = array(
      'name' => __( 'Show post tags?', 'alienship' ),
      'desc' => __( 'Displays the tags attached to a post. Default is show. Uncheck this box to hide post tags.', 'alienship' ),
      'id'   => 'alienship_post_tags',
      'std'  => '1',
      'type' => 'checkbox'
    );

  $options[] = array(
      'name' => __( 'Show post tags on the index/posts page?', 'alienship' ),
      'desc' => __( 'Displays the post tags on the index/posts page - as defined in Settings > Reading. Default is show. Uncheck this box to hide post tags on the index/posts page.', 'alienship' ),
      'id'   => 'alienship_post_tags_posts_page',
      'std'  => '1',
      'type' => 'checkbox'
    );

  $options[] = array(
      'name' => __( 'Show link for # of comments / Leave a comment?', 'alienship' ),
      'desc' => __( 'Displays the number of comments and/or a Leave a comment message on posts. Default is show. Uncheck this box to hide.' ,'alienship' ),
      'id'   => 'alienship_post_comments_link',
      'std'  => '1',
      'type' => 'checkbox'
    );

  $options[] = array(
      'name' => __( 'Miscellaneous', 'alienship' ),
      'desc' => __( 'Miscellaneous design options.', 'alienship' ),
      'type' => 'info'
    );

  $options[] = array(
      'name' => __( 'Enable Responsive Design?', 'alienship' ),
      'desc' => __( 'Responsive design allows your site and its components to scale according to a range of resolutions and devices to provide a consistent experience. In other words, it looks good on computers, tablets, and smartphones. Default is enabled. If you don\'t need it, uncheck this box to turn it off.', 'alienship' ),
      'id'   => 'alienship_responsive',
      'std'  => '1',
      'type' => 'checkbox'
    );


  // Featured Posts tab
  $options[] = array(
      'name' => __( 'Featured Posts', 'alienship' ),
      'type' => 'heading'
    );

  $options[] = array(
      'name' => __( 'Featured Posts Information', 'alienship' ),
      'desc' => __( 'This feature displays certain posts in a photo slider or in a block grid at the top of your post index. This is a good way to make special content stand out. You can feature any post here, according to the criteria you choose below. Don\'t forget to assign featured images to your posts in the post editor!', 'alienship' ),
      'type' => 'info'
    );

  $options[] = array(
      'name' => __( 'Enable Featured Posts?', 'alienship' ),
      'desc' => __( 'Check this box to turn on featured posts functionality. Set the options below to determine how your featured posts will work. Default is disabled.', 'alienship' ),
      'id'   => 'alienship_featured_posts',
      'std'  => '0',
      'type' => 'checkbox'
    );

  $options[] = array(
      'name'    => __( 'Display Featured Posts in a slider or in a grid?', 'alienship' ),
      'desc'    => __( 'Displays your featured posts in either a photo slider or a block grid. The default setting is Slider.', 'alienship' ),
      'id'      => 'alienship_featured_posts_display_type',
      'std'     => '1',
      'type'    => 'radio',
      'options' => array(
          '1' => __( 'Slider', 'alienship' ),
          '0' => __( 'Grid', 'alienship' )
      )
    );

  $options[] = array(
      'name'    => __( 'Featured Posts Tag', 'alienship' ),
      'desc'    => __( 'The tag you select here determines which posts show in the featured posts slider or grid. Example: if you were to select the moo tag, posts tagged with moo would be displayed. Don\'t forget to attach your featured images in the post editor!', 'alienship' ),
      'id'      => 'alienship_featured_posts_tag',
      'type'    => 'select',
      'class'   => 'mini',
      'options' => $options_tags
    );

  $options[] = array(
      'name'    => __( 'Maximum # of Featured Posts to display', 'alienship' ),
      'desc'    => __( 'Select the maximum number of posts you want to display in the featured posts slider or grid. The default is three. NOTE: The grid displays two posts per row. For best results, select an even number here.', 'alienship' ),
      'id'      => 'alienship_featured_posts_maxnum',
      'std'     => '3',
      'type'    => 'radio',
      'options' => array(
          '1' => __( 'One', 'alienship' ),
          '2' => __( 'Two', 'alienship' ),
          '3' => __( 'Three', 'alienship' ),
          '4' => __( 'Four', 'alienship' ),
          '5' => __( 'Five', 'alienship' ),
          '6' => __( 'Six', 'alienship' )
      )
    );

  $options[] = array(
      'name'    => __( 'Duplicate featured posts' ,'alienship' ),
      'desc'    => __( 'Show posts from the featured content section in the rest of the body. Default is Hide.', 'alienship' ),
      'id'      => 'alienship_featured_posts_show_dupes',
      'std'     => '0',
      'type'    => 'radio',
      'options' => array(
          '1' => __( 'Show duplicate posts', 'alienship' ),
          '0' => __( 'Hide duplicate posts', 'alienship' )
      )
    );

  $options[] = array(
      'name' => __( 'Featured Posts Images', 'alienship' ),
      'desc' => __( 'A note about images: For best results, all of your images should be the same size (preferably the size you set below). If they are not the same size, your content will not look as good. For example: the photo slider will display images of varying sizes, but when it does the slider resizes itself between each slide. The grid will not display evenly if images are different sizes.', 'alienship' ),
      'type' => 'info'
    );

  $options[] = array(
      'name'  => __( 'Featured post image width', 'alienship' ),
      'desc'  => __( 'Enter the width (in pixels) you want the featured images to be. Default is 745 pixels.', 'alienship' ),
      'id'    => 'alienship_featured_posts_image_width',
      'std'   => '745',
      'class' => 'mini',
      'type'  => 'text'
    );

  $options[] = array(
      'name'  => __( 'Featured post image height', 'alienship' ),
      'desc'  => __( 'Enter the height (in pixels) you want the featured images to be. Default is 350 pixels.', 'alienship' ),
      'id'    => 'alienship_featured_posts_image_height',
      'std'   => '350',
      'class' => 'mini',
      'type'  => 'text'
    );


  /* Theme plugin heading */
  $options[] = array(
      'name' => __( 'Theme Plugins', 'alienship' ),
      'type' => 'heading'
    );

  $options[] = array(
      'name' => __( 'Javascript Plugins Information', 'alienship' ),
      'desc' => __( 'Read the description provided with each plugin. Some of these plugins require another plugin to function properly (Example: Carousel requires Transitions for the animation to work). Disable any plugins that you aren\'t using.', 'alienship' ),
      'type' => 'info'
    );

  $options[] = array(
      'name' => __( 'Transitions' ),
      'desc' => __( 'Transitions are used to animate things such as the carousel, modals, fade out alerts, etc. * Required for animation in plugins.', 'alienship' ),
      'id'   => 'alienship_transitions_plugin',
      'std'  => '1',
      'type' => 'checkbox'
    );

  $options[] = array(
      'name' => __( 'Alerts', 'alienship' ),
      'desc' => __( 'The alert plugin is a tiny class for adding close functionality to alerts. * Requires Transitions if you want them to fade out on close.', 'alienship' ),
      'id'   => 'alienship_alerts_plugin',
      'std'  => '1',
      'type' => 'checkbox'
    );

  $options[] = array(
      'name' => __( 'Modals', 'alienship' ),
      'desc' => __( 'Message boxes that slide down and fade in from the top of the page. Default setting is disabled. * Requires Transitions to function properly.', 'alienship' ),
      'id'   => 'alienship_modals_plugin',
      'std'  => '0',
      'type' => 'checkbox'
    );

  $options[] = array(
      'name' => __( 'Dropdown Menus', 'alienship' ),
      'desc' => __( 'Add dropdown menus in the navbar, tabs, and pills.', 'alienship' ),
      'id'   => 'alienship_dropdowns_plugin',
      'std'  => '1',
      'type' => 'checkbox'
    );

  $options[] = array(
      'name' => __( 'Affix Menus', 'alienship' ),
      'desc' => __( 'Add support for affix menus. Default is disabled.', 'alienship' ),
      'id'   => 'alienship_affix_plugin',
      'std'  => '0',
      'type' => 'checkbox'
    );

  $options[] = array(
      'name' => __( 'Scrollspy', 'alienship' ),
      'desc' => __( 'Use scrollspy to automatically update the links in your navbar to show the current active link based on scroll position. Default setting is disabled.', 'alienship' ),
      'id'   => 'alienship_scrollspy_plugin',
      'std'  => '0',
      'type' => 'checkbox'
    );

  $options[] = array(
      'name' => __( 'Tabs', 'alienship' ),
      'desc' => __( 'Make tabs and pills more useful by allowing them to toggle through tabbable panes of content.', 'alienship' ),
      'id'   => 'alienship_tabs_plugin',
      'std'  => '1',
      'type' => 'checkbox'
    );

  $options[] = array(
      'name' => __( 'Tooltips', 'alienship' ),
      'desc' => __( 'Tooltips that use CSS3 for animations and data-attributes for local title storage.', 'alienship' ),
      'id'   => 'alienship_tooltips_plugin',
      'std'  => '1',
      'type' => 'checkbox'
    );

  $options[] = array(
      'name' => __( 'Popovers', 'alienship' ),
      'desc' => __( 'Add small overlays of content, like those on the iPad, to any element for housing secondary information. * Requires Tooltips.', 'alienship' ),
      'id'   => 'alienship_popovers_plugin',
      'std'  => '1',
      'type' => 'checkbox'
    );

  $options[] = array(
      'name' => __( 'Buttons', 'alienship' ),
      'desc' => __( 'Do more with buttons. Control button states or create groups of buttons for more components like toolbars.', 'alienship' ),
      'id'   => 'alienship_buttons_plugin',
      'std'  => '1',
      'type' => 'checkbox'
    );

  $options[] = array(
      'name' => __( 'Collapse', 'alienship' ),
      'desc' => __( 'Get base styles and flexible support for collapsible components like accordions and navigation.', 'alienship' ),
      'id'   => 'alienship_collapse_plugin',
      'std'  => '1',
      'type' => 'checkbox'
    );

  $options[] = array(
      'name' => __( 'Carousel', 'alienship' ),
      'desc' => __( 'Create a merry-go-round of any content you wish to provide in an interactive slideshow of content. * Required for Featured Posts.', 'alienship' ),
      'id'   => 'alienship_carousel_plugin',
      'std'  => '1',
      'type' => 'checkbox'
    );

  $options[] = array(
      'name' => __( 'Typeahead', 'alienship' ),
      'desc' => __( 'A basic, easily extended plugin for quickly creating elegant typeaheads with any form text input. Default setting is disabled.', 'alienship' ),
      'id'   => 'alienship_typeahead_plugin',
      'std'  => '0',
      'type' => 'checkbox'
    );


  return $options;

}
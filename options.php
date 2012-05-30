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
  $options_tags[''] = 'Select a tag:';
  foreach ($options_tags_obj as $tag) {
      $options_tags[$tag->term_id] = $tag->name;
  }

  // Pull all the pages into an array
  $options_pages = array();
  $options_pages_obj = get_pages('sort_column=post_parent,menu_order');
  $options_pages[''] = 'Select a page:';
  foreach ($options_pages_obj as $page) {
      $options_pages[$page->ID] = $page->post_title;
  }

  // If using image radio buttons, define a directory path
  $imagepath =  get_bloginfo('stylesheet_directory') . '/img/';

  $options = array();

  // Display Settings tab
  $options[] = array( "name" => "Display Options",
            "type" => "heading");


  // Navigation elements
  $options[] = array( "name" => "Navigation Elements",
            "desc" => "Top navbar, breadcrumb navigation, and content navigation design options",
            "type" => "info");

  /* $options[] = array( "name" => "Show logo image in Top Menu navigation bar?",
            "desc" => "Check this box to show a logo image in the Top Menu navigation bar. Upload your logo image below. Default is disabled.",
            "id" => "alienship_logo_in_navbar",
            "std" => "0",
            "type" => "checkbox");

  $options[] = array( "name" => "Upload a logo image for the Top Menu navigation bar.",
            "desc" => "Upload an image to use as a logo image in the Top Menu navigation bar. Note: You must enable the option above for this image to be displayed. FOR BEST RESULTS: upload an image that isn't too large.",
            "id" => "alienship_logo_in_navbar_file",
            "type" => "upload"); */

  $options[] = array( "name" => "Show Top Menu navigation bar?",
            "desc" => "Displays the top navbar on your site, even if there's no menu assigned in Appearance > Menu. Uncheck this box to hide it. Default is enabled.",
            "id" => "alienship_show_top_navbar",
            "std" => "1",
            "type" => "checkbox");

  $options[] = array( "name" => "Show site name in Top Menu navigation bar?",
            "desc" => "Default is enabled. Uncheck this box to hide site name in Top Menu navigation bar.",
            "id" => "alienship_name_in_navbar",
            "std" => "1",
            "type" => "checkbox");

  $options[] = array( "name" => "Show site description in Top Menu navigation bar?",
            "desc" => "Check this box to show site description in Top Menu navigation bar. NOTE: Enabling this option will shift your nav menu to the right to make room for the site description. Site description is hidden on mobile devices. Default setting is disabled.",
            "id" => "alienship_desc_in_navbar",
            "std" => "0",
            "type" => "checkbox");

  $options[] = array( "name" => "Show search bar in Top Menu navigation bar?",
            "desc" => "Default is enabled. Uncheck this box to turn it off.",
            "id" => "alienship_search_bar",
            "std" => "1",
            "type" => "checkbox");

  $options[] = array( "name" => "Show Breadcrumb Navigation?",
            "desc" => "Default is show. Uncheck this box to hide breadcrumbs.",
            "id" => "alienship_breadcrumbs",
            "std" => "1",
            "type" => "checkbox");

  $options[] = array( "name" => "Show content navigation above posts?",
            "desc" => "Displays links to next and previous posts above the current post and above the posts on the index page. Default is hide. Check this box to show content nav above posts.",
            "id" => "alienship_content_nav_above",
            "std" => "0",
            "type" => "checkbox");

  $options[] = array( "name" => "Show content navigation below posts?",
            "desc" => "Displays links to next and previous posts below the current post and below the posts on the index page. Default is show. Uncheck this box to hide content nav above posts.",
            "id" => "alienship_content_nav_below",
            "std" => "1",
            "type" => "checkbox");

  // Miscellaneous text options
  $options[] = array( "name" => "Miscellaneous Text",
            "desc" => "Miscellaneous text items, such as site name and description and custom footer text.",
            "type" => "info");

  $options[] = array( "name" => "Show custom footer text?",
            "desc" => "Default is disabled. Check this box to use custom footer text. Fill in your text below.",
            "id" => "alienship_custom_footer_toggle",
            "std" => "0",
            "type" => "checkbox");

  $options[] = array( "name" => "Custom footer text",
            "desc" => "Enter the text here that you would like displayed at the bottom of your site. This setting will be ignored if you do not enable \"Show custom footer text\" above.",
            "id" => "alienship_custom_footer_text",
            "std" => "",
            "type" => "text");

  $options[] = array( "name" => "Posts and Pages",
            "desc" => "Options related to the display of posts and pages, like excerpts and post meta information (published date, author, categories, and tags - is displayed on each post to provide your readers with information). Use the options below to control what is displayed.",
            "type" => "info");

  $options[] = array( "name" => "Display full content or excerpts on index, search, and archive type pages?",
            "desc" => "Excerpt shows a short snippet of your post, and full content shows it all. The default setting is Show entire post.",
            "id" => "alienship_archive_display",
            "std" => "full",
            "type" => "radio",
            "options" => array("full" => "Show entire post","excerpt" => "Show post excerpt"));

  $options[] = array( "name" => "Show post author?",
            "desc" => "Displays the post author. Default is show. Uncheck this box to hide the post author.",
            "id" => "alienship_post_author",
            "std" => "1",
            "type" => "checkbox");

  $options[] = array( "name" => "Show published date?",
            "desc" => "Displays the date the article was posted. Default is show. Uncheck this box to hide post published date.",
            "id" => "alienship_published_date",
            "std" => "1",
            "type" => "checkbox");

  $options[] = array( "name" => "Show post categories?",
            "desc" => "Displays the categories in which a post was published. Default is show. Uncheck this box to hide post categories.",
            "id" => "alienship_post_categories",
            "std" => "1",
            "type" => "checkbox");

  $options[] = array( "name" => "Show post categories on the index/posts page?",
            "desc" => "Displays the post categories on the index/posts page - as defined in Settings > Reading. Default is show. Uncheck this box to hide post categories on the index/posts page.",
            "id" => "alienship_post_categories_posts_page",
            "std" => "1",
            "type" => "checkbox");

  $options[] = array( "name" => "Show post tags?",
            "desc" => "Displays the tags attached to a post. Default is show. Uncheck this box to hide post tags.",
            "id" => "alienship_post_tags",
            "std" => "1",
            "type" => "checkbox");

  $options[] = array( "name" => "Show post tags on the index/posts page?",
            "desc" => "Displays the post tags on the index/posts page - as defined in Settings > Reading. Default is show. Uncheck this box to hide post tags on the index/posts page.",
            "id" => "alienship_post_tags_posts_page",
            "std" => "1",
            "type" => "checkbox");

  $options[] = array( "name" => "Show link for # of comments / Leave a comment?",
            "desc" => "Displays the number of comments and/or a Leave a comment message on posts. Default is show. Uncheck this box to hide.",
            "id" => "alienship_post_comments_link",
            "std" => "1",
            "type" => "checkbox");

  $options[] = array( "name" => "Miscellaneous",
            "desc" => "Miscellaneous design options.",
            "type" => "info");

  $options[] = array( "name" => "Enable custom image on login page?",
            "desc" => "Enable this option and upload an image below to display a custom image on the login/register page. This replaces the default WordPress image. Default is disabled.",
            "id" => "alienship_custom_login_image",
            "std" => "0",
            "type" => "checkbox");

  $options[] = array( "name" => "Upload a custom image for the login page",
            "desc" => "Upload an image to use as a custom image on the login/register page. FOR BEST RESULTS: upload an image that is 274 x 63 pixels.",
            "id" => "alienship_custom_login_image_file",
            "type" => "upload");

  $options[] = array( "name" => "Hide admin bar for all users?",
            "desc" => "Enable this option to hide the WordPress admin bar on the front end for all users (including admins). Default setting is disabled.",
            "id" => "alienship_disable_admin_bar",
            "std" => "0",
            "type" => "checkbox");

  $options[] = array( "name" => "Enable Responsive Design?",
            "desc" => "Responsive design allows your site and its components to scale according to a range of resolutions and devices to provide a consistent experience. In other words, it looks good on computers, tablets, and smartphones. Default is enabled. If you don't need it, uncheck this box to turn it off.",
            "id" => "alienship_responsive",
            "std" => "1",
            "type" => "checkbox");


  // Featured Posts tab
  $options[] = array( "name" => "Featured Posts",
            "type" => "heading");

  $options[] = array( "name" => "Featured Posts Information",
            "desc" => "This feature displays certain posts in a photo slider or in a block grid at the top of your post index. This is a good way to make special content stand out. You can feature any post here, according to the criteria you choose below. Don't forget to assign featured images to your posts in the post editor!",
            "type" => "info");

  $options[] = array( "name" => "Enable Featured Posts?",
            "desc" => "Check this box to turn on featured posts functionality. Set the options below to determine how your featured posts will work. Default is disabled.",
            "id" => "alienship_featured_posts",
            "std" => "0",
            "type" => "checkbox");

  $options[] = array( "name" => "Display Featured Posts in a slider or in a grid?",
            "desc" => "Displays your featured posts in either a photo slider or a block grid. The default setting is Slider.",
            "id" => "alienship_featured_posts_display_type",
            "std" => "1",
            "type" => "radio",
            "options" => array("1" => "Slider","0" => "Grid"));

  $options[] = array( "name" => "Featured Posts Tag",
            "desc" => "The tag you select here determines which posts show in the featured posts slider or grid. Example: if you were to select the moo tag, posts tagged with moo would be displayed. Don't forget to attach your featured images in the post editor!",
            "id" => "alienship_featured_posts_tag",
            "type" => "select",
            "class" => "mini",
            "options" => $options_tags);

  $options[] = array( "name" => "Maximum # of Featured Posts to display",
            "desc" => "Select the maximum number of posts you want to display in the featured posts slider or grid. The default is three. NOTE: The grid displays two posts per row. For best results, select an even number here.",
            "id" => "alienship_featured_posts_maxnum",
            "std" => "3",
            "type" => "radio",
            "options" => array("1" => "One","2" => "Two","3" => "Three","4" => "Four","5" => "Five","6" => "Six"));

  $options[] = array( "name" => "Duplicate featured posts",
            "desc" => "Show posts from the featured content section in the rest of the body. Default is Hide.",
            "id" => "alienship_featured_posts_show_dupes",
            "std" => "0",
            "type" => "radio",
            "options" => array("1" => "Show duplicate posts","0" => "Hide duplicate posts"));

  $options[] = array( "name" => "Featured Posts Images",
            "desc" => "A note about images: For best results, all of your images should be the same size (preferably the size you set below). If they are not the same size, your content will not look as good. For example: the photo slider will display images of varying sizes, but when it does the slider resizes itself between each slide. The grid will not display evenly if images are different sizes.",
            "type" => "info");

  $options[] = array( "name" => "Featured post image width",
            "desc" => "Enter the width (in pixels) you want the featured images to be. Default is 745 pixels.",
            "id" => "alienship_featured_posts_image_width",
            "std" => "745",
            "class" => "mini",
            "type" => "text");

  $options[] = array( "name" => "Featured post image height",
            "desc" => "Enter the height (in pixels) you want the featured images to be. Default is 350 pixels.",
            "id" => "alienship_featured_posts_image_height",
            "std" => "350",
            "class" => "mini",
            "type" => "text");


  /* Theme plugin heading */
  $options[] = array( "name" => "Theme Plugins",
            "type" => "heading");

  $options[] = array( "name" => "Javascript Plugins Information",
            "desc" => "Read the description provided with each plugin. Some of these plugins require another plugin to function properly (Example: Carousel requires Transitions for the animation to work). Disable any plugins that you aren't using.",
            "type" => "info");

  $options[] = array( "name" => "Transitions",
            "desc" => "Transitions are used to animate things such as the carousel, modals, fade out alerts, etc. * Required for animation in plugins.",
            "id" => "alienship_transitions_plugin",
            "std" => "1",
            "type" => "checkbox");

  $options[] = array( "name" => "Alerts",
            "desc" => "The alert plugin is a tiny class for adding close functionality to alerts. * Requires Transitions if you want them to fade out on close.",
            "id" => "alienship_alerts_plugin",
            "std" => "1",
            "type" => "checkbox");

  $options[] = array( "name" => "Modals",
            "desc" => "Message boxes that slide down and fade in from the top of the page. Default setting is disabled. * Requires Transitions to function properly.",
            "id" => "alienship_modals_plugin",
            "std" => "0",
            "type" => "checkbox");

  $options[] = array( "name" => "Dropdown Menus",
            "desc" => "Add dropdown menus in the navbar, tabs, and pills.",
            "id" => "alienship_dropdowns_plugin",
            "std" => "1",
            "type" => "checkbox");

  $options[] = array( "name" => "Scrollspy",
            "desc" => "Use scrollspy to automatically update the links in your navbar to show the current active link based on scroll position. Default setting is disabled.",
            "id" => "alienship_scrollspy_plugin",
            "std" => "0",
            "type" => "checkbox");

  $options[] = array( "name" => "Tabs",
            "desc" => "Make tabs and pills more useful by allowing them to toggle through tabbable panes of content.",
            "id" => "alienship_tabs_plugin",
            "std" => "1",
            "type" => "checkbox");

  $options[] = array( "name" => "Tooltips",
            "desc" => "Tooltips that use CSS3 for animations and data-attributes for local title storage.",
            "id" => "alienship_tooltips_plugin",
            "std" => "1",
            "type" => "checkbox");

  $options[] = array( "name" => "Popovers",
            "desc" => "Add small overlays of content, like those on the iPad, to any element for housing secondary information. * Requires Tooltips.",
            "id" => "alienship_popovers_plugin",
            "std" => "1",
            "type" => "checkbox");

  $options[] = array( "name" => "Buttons",
            "desc" => "Do more with buttons. Control button states or create groups of buttons for more components like toolbars.",
            "id" => "alienship_buttons_plugin",
            "std" => "1",
            "type" => "checkbox");

  $options[] = array( "name" => "Collapse",
            "desc" => "Get base styles and flexible support for collapsible components like accordions and navigation.",
            "id" => "alienship_collapse_plugin",
            "std" => "1",
            "type" => "checkbox");

  $options[] = array( "name" => "Carousel",
            "desc" => "Create a merry-go-round of any content you wish to provide in an interactive slideshow of content. * Required for Featured Posts.",
            "id" => "alienship_carousel_plugin",
            "std" => "1",
            "type" => "checkbox");

  $options[] = array( "name" => "Typeahead",
            "desc" => "A basic, easily extended plugin for quickly creating elegant typeaheads with any form text input. Default setting is disabled.",
            "id" => "alienship_typeahead_plugin",
            "std" => "0",
            "type" => "checkbox");



  /* Advanced Settings tab */
  $options[] = array( "name" => "Advanced",
            "type" => "heading");

  $options[] = array( "name" => "Customize outgoing emails",
            "desc" => "This section allows you to override the default WordPress settings for outgoing email sender information. Instead of an email coming from \"WordPress\", you can make it say anything you want. You can do the same with the sender email address, and the return address that is used if any problems occur during delivery. \r\n &nbsp;\r\nThe default setting is enabled, and it uses your site name as the From Name and your Site Admin email address as the From address and Return Path. You can change these defaults below. If you disable this feature your site will send emails using the WordPress defaults.",
            "type" => "info");

  $options[] = array( "name" => "Enable custom sender features?",
            "desc" => "Turn on the custom sender features. Unless you specify custom values below, this tells Alien Ship to send emails that use your site name in the From field and your site admin email as the sender and return addresses. To set your own custom information, select the box below and type in your own values. Default setting is enabled.",
            "id" => "alienship_phpmailer_rewrite",
            "std" => "1",
            "type" => "checkbox");

  $options[] = array( "name" => "Enable customized sender information?",
            "desc" => "This allows you to customize the sender information of emails coming from your site. You must turn on \"Enable custom sender features\" above for this to work. NOTE: If you enable this option, fill in ALL fields below - otherwise your email may not work properly. Default setting is disabled.",
            "id" => "alienship_phpmailer_rewrite_custom",
            "std" => "0",
            "type" => "checkbox");

  $options[] = array( "name" => "From Name",
            "desc" => "Enter the name you want to use in the From: field.",
            "id" => "alienship_phpmailer_rewrite_custom_from_name",
            "std" => "",
            "type" => "text");

  $options[] = array( "name" => "From Email Address",
            "desc" => "Enter the Sender email address you want to use in the From: field.",
            "id" => "alienship_phpmailer_rewrite_custom_from_email",
            "std" => "",
            "type" => "text");

  $options[] = array( "name" => "Return Email Address",
            "desc" => "Enter the return email address you want to use in case a problem happens during delivery.",
            "id" => "alienship_phpmailer_rewrite_custom_sender",
            "std" => "",
            "type" => "text");

  $options[] = array( "name" => "Analytics",
            "type" => "info",
            "desc" => "Track your site traffic.");

  $options[] = array( "name" => "Enable analytics?",
            "desc" => "If you use an analytics product such as Google Analytics or Piwik, you can add your tracking code below. If you use a separate plugin for analytics, you can ignore this section. Default setting is disabled.",
            "id" => "alienship_analytics",
            "std" => "0",
            "type" => "checkbox");

  $options[] = array( "name" => "Analytics code",
            "desc" => "Enter your analytics tracking code here (WITH the &lt;script&gt; and &lt;/script&gt; tags). Note: Any text you include here will be included in your pages, EVEN IF IT IS INCORRECT. Double check your code! If the analytics option is not enabled above, this text will be ignored.",
            "id" => "alienship_analytics_code",
            "std" => "",
            "type" => "textarea");


  return $options;

}
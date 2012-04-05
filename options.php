<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 * 
 */

function optionsframework_option_name() {
	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = get_theme_data(STYLESHEETPATH . '/style.css');
	$themename = $themename['Name'];
	$themename = preg_replace("/\W/", "", strtolower($themename) );
	
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

	/* Disabled for now. Functionality is used in the Appearance > Header screen
	 * $options[] = array( "name" => "Show site name and description below Top Menu navigation bar?",
						"desc" => "Default is enabled. Uncheck this box to turn it off.",
						"id" => "alienship_name_and_desc_below_navbar",
						"std" => "1",
						"type" => "checkbox");
	 */

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

	$options[] = array( "name" => "Post Meta Information",
						"desc" => "Post meta information - published date, author, categories, and tags - is displayed on each post to provide your readers with information. Use the options below to control what is displayed.",
						"type" => "info");

	$options[] = array( "name" => "Show published date and author?",
						"desc" => "Displays the date the article was posted and the author that posted it. Default is show. Uncheck this box to hide post published date and post author.",
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



	// Colors
	$options[] = array( "name" => "Colors",
						"type" => "heading");

	$options[] = array( "name" => "Colors",
						"desc" => "Choose the colors you want to use on your site.",
						"type" => "info");

	$options[] = array( "name" => "Enable Custom Colors?",
						"desc" => "Check this box to turn on custom colors. Set the colors below. If this option is not enabled, all settings below will be ignored. Default setting is disabled.",
						"id" => "alienship_enable_custom_colors",
						"std" => "0",
						"type" => "checkbox");

	$options[] = array( "name" => "Body background color",
						"desc" => "The background color of the whole web page. The default setting #FFFFFF.",
						"id" => "alienship_color_body_bg",
						"std" => "#FFFFFF",
						"class" => "hidden",
						"type" => "color");

	$options[] = array( "name" => "Link color",
						"desc" => "The color of links (the &lt;a&gt; element). The default setting #0088CC.",
						"id" => "alienship_color_link",
						"std" => "#0088CC",
						"class" => "hidden",
						"type" => "color");

	$options[] = array( "name" => "Link hover color",
						"desc" => "The color of all your links when you hover the mouse over them. The default setting #005580.",
						"id" => "alienship_color_link_hover",
						"std" => "#005580",
						"class" => "hidden",
						"type" => "color");

	$options[] = array( "name" => "Top Menu navigation bar link color",
						"desc" => "The color of links in the navbar. The default setting #999999.",
						"id" => "alienship_color_navbar_link",
						"std" => "#999999",
						"class" => "hidden",
						"type" => "color");

	$options[] = array( "name" => "Top Menu navigation bar link hover color",
						"desc" => "The color of links in the navbar when you hover the mouse over them. The default setting #FFFFFF.",
						"id" => "alienship_color_navbar_link_hover",
						"std" => "#FFFFFF",
						"class" => "hidden",
						"type" => "color");

	$options[] = array( "name" => "Top Menu navigation bar active link text color",
						"desc" => "The color of the text in active links in the navbar. The default setting #FFFFFF.",
						"id" => "alienship_color_navbar_link_active",
						"std" => "#FFFFFF",
						"class" => "hidden",
						"type" => "color");

	$options[] = array( "name" => "Top Menu navigation bar active link background color",
						"desc" => "The background color of active links in the navbar. The default setting #222222.",
						"id" => "alienship_color_navbar_link_active_bg",
						"std" => "#222222",
						"class" => "hidden",
						"type" => "color");

	$options[] = array( "name" => "Top Menu navigation bar background gradient color # 1",
						"desc" => "If your browser supports it, the Top Menu navbar is displayed with a gradient effect from top to bottom. This option sets the top of the gradient. The default setting #333333.",
						"id" => "alienship_color_navbar_color1",
						"std" => "#333333",
						"class" => "hidden",
						"type" => "color");

	$options[] = array( "name" => "Top Menu navigation bar background gradient color # 2",
						"desc" => "If your browser supports it, the Top Menu navbar is displayed with a gradient effect from top to bottom. This option sets the bottom of the gradient. The default setting #222222.",
						"id" => "alienship_color_navbar_color2",
						"std" => "#222222",
						"class" => "hidden",
						"type" => "color");

	$options[] = array( "name" => "Top Menu navigation bar search box background color",
						"desc" => "The color of the search box in the top navbar. The default setting #626262.",
						"id" => "alienship_color_navbar_search_bg",
						"std" => "#626262",
						"class" => "hidden",
						"type" => "color");

	$options[] = array( "name" => "Top Menu navigation bar search box background color when focused",
						"desc" => "The color of the search box when it's in focus. The default setting #FFFFFF.",
						"id" => "alienship_color_navbar_search_bg_focused",
						"std" => "#FFFFFF",
						"class" => "hidden",
						"type" => "color");

	$options[] = array( "name" => "Top Menu navigation bar search box placeholder text color",
						"desc" => "The color of the default placeholder text in the search bar. The default setting #CCCCCC.",
						"id" => "alienship_color_navbar_search_placeholder",
						"std" => "#CCCCCC",
						"class" => "hidden",
						"type" => "color");

	$options[] = array( "name" => "Sidebar background color",
						"desc" => "The background color of widget areas. The default setting #F5F5F5.",
						"id" => "alienship_color_sidebar_bg",
						"std" => "#F5F5F5",
						"class" => "hidden",
						"type" => "color");

	$options[] = array( "name" => "Post separator color",
						"desc" => "The thin line that separates posts from other posts on the page of posts and from the comments on a single post view. The default setting #EEEEEE.",
						"id" => "alienship_color_footer_entry_meta_border",
						"std" => "#EEEEEE",
						"class" => "hidden",
						"type" => "color");


	//Fonts

	$options[] = array( "name" => "Fonts",
						"type" => "heading");

	$options[] = array( "name" => "Fonts",
						"desc" => "Choose the fonts you want to use on your site. NOTE: Some fonts aren't available in all styles, such as 'lighter'.",
						"type" => "info");

	$options[] = array( "name" => "Enable Custom Fonts?",
						"desc" => "Check this box to turn on custom font options. Set the fonts below. NOTE: If this option is not enabled, all settings below will be ignored. Default setting is disabled.",
						"id" => "alienship_enable_custom_fonts",
						"std" => "0",
						"type" => "checkbox");

	$options[] = array( "name" => "Heading Font - h1",
						"desc" => "The font used to display h1 headings. The default setting is Helvetica Neue, size 30px, bold, normal, color #333333.",
						"id" => "alienship_h1_font",
						"std" => array('size' => '30px','face' => 'Helvetica Neue','style' => 'normal','weight' => 'bold','color' => '#333333'),
						"type" => "typography");

	$options[] = array( "name" => "Heading Font - h2",
						"desc" => "The font used to display h2 headings. The default setting is Helvetica Neue, size 24px, bold, normal, color #333333.",
						"id" => "alienship_h2_font",
						"std" => array('size' => '24px','face' => 'Helvetica Neue','style' => 'normal','weight' => 'bold','color' => '#333333'),
						"type" => "typography");

	$options[] = array( "name" => "Heading Font - h3",
						"desc" => "The font used to display h3 headings. The default setting is Helvetica Neue, size 18px, bold, normal, color #333333.",
						"id" => "alienship_h3_font",
						"std" => array('size' => '18px','face' => 'Helvetica Neue','style' => 'normal','weight' => 'bold','color' => '#333333'),
						"type" => "typography");

	$options[] = array( "name" => "Heading Font - h4",
						"desc" => "The font used to display h4 headings. The default setting is Helvetica Neue, size 14px, bold, normal, color #333333.",
						"id" => "alienship_h4_font",
						"std" => array('size' => '14px','face' => 'Helvetica Neue','style' => 'normal','weight' => 'bold','color' => '#333333'),
						"type" => "typography");

	$options[] = array( "name" => "Heading Font - h5",
						"desc" => "The font used to display h5 headings. The default setting is Helvetica Neue, size 12px, bold, normal, color #333333.",
						"id" => "alienship_h5_font",
						"std" => array('size' => '12px','face' => 'Helvetica Neue','style' => 'normal','weight' => 'bold','color' => '#333333'),
						"type" => "typography");

	$options[] = array( "name" => "Heading Font - h6",
						"desc" => "The font used to display h6 headings. The default setting is Helvetica Neue, size 11px, bold, normal, color #333333.",
						"id" => "alienship_h6_font",
						"std" => array('size' => '11px','face' => 'Helvetica Neue','style' => 'normal','weight' => 'bold','color' => '#333333'),
						"type" => "typography");

	$options[] = array( "name" => "Body Text Font",
						"desc" => "The font used to display text in the main body of the site. The default setting is Helvetica Neue, size 13px, normal, color #333333.",
						"id" => "alienship_body_font",
						"std" => array('size' => '13px','face' => 'Helvetica Neue','style' => 'normal','weight' => 'normal','color' => '#333333'),
						"type" => "typography");

	$options[] = array( "name" => "Page / Post Paragraph Font",
						"desc" => "The font used in page / post paragraphs. The default setting is Helvetica Neue, size 14px, normal, color #333333.",
						"id" => "alienship_post_paragraph_font",
						"std" => array('size' => '14px','face' => 'Helvetica Neue','style' => 'normal','weight' => 'normal','color' => '#333333'),
						"type" => "typography");

	$options[] = array( "name" => "Site Name in Navigation Bar",
						"desc" => "The font used for the site name displayed in the navigation bar. The default setting is Helvetica Neue, size 20px, normal, color #999999.",
						"id" => "alienship_site_name_navbar_font",
						"std" => array('size' => '20px','face' => 'Helvetica Neue','style' => 'normal','weight' => 'normal','color' => '#999999'),
						"type" => "typography");

	$options[] = array( "name" => "Site Description in Navigation Bar",
						"desc" => "The font used for the site description displayed in the navigation bar. The default setting is Helvetica Neue, size 13px, normal, color #999999.",
						"id" => "alienship_site_desc_navbar_font",
						"std" => array('size' => '13px','face' => 'Helvetica Neue','style' => 'normal','weight' => 'normal','color' => '#999999'),
						"type" => "typography");

	// Featured Posts tab
	$options[] = array( "name" => "Featured Posts",
						"type" => "heading");

	$options[] = array( "name" => "Featured Posts Information",
						"desc" => "This feature displays certain posts in a photo slider at the top of your post index. This is a good way to make special content stand out. You can feature any post here, according to the criteria you choose below. Don't forget to assign featured images to your posts in the post editor!",
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
						"desc" => "The tag you select here determines which posts show in the featured posts slider. Example: if you were to select the moo tag, posts tagged with moo would be displayed in your slider. Don't forget to attach your featured images in the post editor!",
						"id" => "alienship_featured_posts_tag",
						"type" => "select",
						"class" => "mini",
						"options" => $options_tags);

	$options[] = array( "name" => "Maximum # of Featured Posts to display",
						"desc" => "Select the maximum number of posts you want to display in the featured posts slider. The default is three.",
						"id" => "alienship_featured_posts_maxnum",
						"std" => "3",
						"type" => "radio",
						"options" => array("1" => "One","2" => "Two","3" => "Three","4" => "Four","5" => "Five"));

	$options[] = array( "name" => "Duplicate featured posts",
						"desc" => "Show posts from the featured content section in the rest of the body. Default is Hide.",
						"id" => "alienship_featured_posts_show_dupes",
						"std" => "0",
						"type" => "radio",
						"options" => array("1" => "Show duplicate posts","0" => "Hide duplicate posts"));

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

/* Customize and extend the tyopgraphy options. Support for more font faces, and separation of weights and styles. */
function alienship_recognized_font_faces( $value ) {
    return array(
			'Helvetica Neue, Helvetica, sans-serif' => 'Helvetica Neue, Helvetica, sans-serif',
			'Open Sans, sans-serif' => 'Open Sans, sans-serif',
			'Cabin, sans-serif' => 'Cabin, sans-serif',
			'Arial, Helvetica, sans-serif' => 'Arial, Helvetica, sans-serif',
			'Verdana, Geneva, sans-serif'   => 'Verdana, Geneva, sans-serif',
			'Trebuchet, sans-serif' => 'Trebuchet, sans-serif',
			'Georgia, serif'   => 'Georgia, serif',
			'Times, Times New Romain, serif'     => 'Times New Roman, serif',
			'Tahoma, Geneva, sans-serif'    => 'Tahoma, Geneva, sans-serif',
    );
}
add_filter( 'of_recognized_font_faces', 'alienship_recognized_font_faces' );


function of_recognized_font_weights() {
	$default = array(
		'normal'      => 'Normal',
		'bold'        => 'Bold',
		'lighter'				=> 'Lighter',
		);
	return apply_filters( 'of_recognized_font_weights', $default );
}


function alienship_recognized_font_styles( $value ) {
    return array(
			'normal' => 'Normal',
			'italic' => 'Italic',
    );
}
add_filter( 'of_recognized_font_styles', 'alienship_recognized_font_styles' );


function alienship_sanitize_typography( $input ) {
	$output = wp_parse_args( $input, array(
		'size'  => '',
		'face'  => '',
		'style' => '',
		'weight' => '',
		'color' => ''
	) );

	$output['size']  = apply_filters( 'of_font_size', $output['size'] );
	$output['face']  = apply_filters( 'of_font_face', $output['face'] );
	$output['style'] = apply_filters( 'of_font_style', $output['style'] );
	$output['weight'] = apply_filters( 'of_font_weight', $output['weight'] );
	$output['color'] = apply_filters( 'of_color', $output['color'] );

	return $output;
}
add_filter( 'of_sanitize_typography', 'alienship_sanitize_typography' );


function of_sanitize_font_weight( $value ) {
	$recognized = of_recognized_font_weights();
	if ( array_key_exists( $value, $recognized ) ) {
		return $value;
	}
	return apply_filters( 'of_default_font_weight', current( $recognized ) );
}
add_filter( 'of_font_weight', 'of_sanitize_font_weight' );
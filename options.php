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
	$options[] = array( "name" => "Design Options",
						"type" => "heading");

	$options[] = array( "name" => "Show site name in Top Menu navigation bar?",
						"desc" => "Default is enabled. Uncheck this box to hide site name in Top Menu navigation bar.",
						"id" => "alienship_name_in_navbar",
						"std" => "1",
						"type" => "checkbox");

	$options[] = array( "name" => "Show search bar in Top Menu navigation bar?",
						"desc" => "Default is enabled. Uncheck this box to turn it off.",
						"id" => "alienship_search_bar",
						"std" => "1",
						"type" => "checkbox");
							
	$options[] = array( "name" => "Show site name and description below Top Menu navigation bar?",
						"desc" => "Default is enabled. Uncheck this box to turn it off.",
						"id" => "alienship_name_and_desc_below_navbar",
						"std" => "1",
						"type" => "checkbox");

	$options[] = array( "name" => "Enable Breadcrumb Navigation?",
						"desc" => "Default is enabled. Uncheck this box to turn off breadcrumbs.",
						"id" => "alienship_breadcrumbs",
						"std" => "1",
						"type" => "checkbox");

	$options[] = array( "name" => "Enable Responsive Design?",
						"desc" => "Responsive design allows your site and its components to scale according to a range of resolutions and devices to provide a consistent experience. In other words, it looks good on computers, tablets, and smartphones. Default is enabled. If you don't need it, uncheck this box to turn it off.",
						"id" => "alienship_responsive",
						"std" => "1",
						"type" => "checkbox");


	// Featured Posts tab
	$options[] = array( "name" => "Featured Posts",
						"type" => "heading");

							
	$options[] = array( "name" => "Enable Featured Posts?",
						"desc" => "Default is disabled. Check this box to turn them on. Select a tag below to determine which posts are displayed in the featured slider.",
						"id" => "alienship_featured_posts",
						"std" => "0",
						"type" => "checkbox");

	$options[] = array( "name" => "Featured Posts Tag",
						"desc" => "The tag you select here determines which posts show in the featured posts slider.",
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


	/* Javascript plugin heading */
	$options[] = array( "name" => "Javascript plugins",
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


	return $options;
}
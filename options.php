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
		
	$options[] = array( "name" => "Basic Settings",
						"type" => "heading");

	$options[] = array( "name" => "Enable Breadcrumb Navigation?",
						"desc" => "Default is enabled. Uncheck this box to turn them off.",
						"id" => "alienship_breadcrumbs",
						"std" => "1",
						"type" => "checkbox");
							
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

	return $options;
}
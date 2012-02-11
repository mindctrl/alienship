/* Adding the class "dropdown" to li elements with submenus  */	
  jQuery(document).ready(function(){
  jQuery("ul.sub-menu").parent().addClass("dropdown"); //original
  jQuery("ul.children").parent().addClass("dropdown"); // wp_page_menu output
  jQuery("[id^=menu-] li.dropdown a").addClass("dropdown-toggle"); //original
  jQuery("ul.nav li.dropdown a").addClass("dropdown-toggle"); // wp_page_menu output
  jQuery("ul.sub-menu li a").removeClass("dropdown-toggle"); //original
  jQuery("ul.children li a").removeClass("dropdown-toggle"); // wp_page_menu output
  jQuery('.dropdown-toggle').append('<b class="caret"></b>'); //original
  });


  jQuery(document).ready(function(){
  // Don't FORGET: replace all $ with jQuery to prevent conflicts //
  jQuery('a.dropdown-toggle')
  .attr('data-toggle', 'dropdown');
  });

  jQuery(document).ready(function(){
  jQuery(function () {
  jQuery('.dropdown-toggle').dropdown();
  })
  });

/* Adding the class "dropdown" to li elements with submenus  */	
jQuery(document).ready(function(){
  jQuery("ul.sub-menu").addClass("dropdown-menu").removeClass("sub-menu"); // switch sub-menu to dropdown-menu
  jQuery("ul.children").addClass("dropdown-menu").removeClass("children"); // switch wp_page_menu children to dropdown-menu
  jQuery("ul.dropdown-menu").parent().addClass("dropdown"); //add dropdown to top-level li.
  jQuery("[id^=menu-] li.dropdown a").addClass("dropdown-toggle"); //add dropdown-toggle to top-level menu item
  jQuery("ul.nav li.dropdown a").addClass("dropdown-toggle"); // add dropdown-toggle to wp_page_menu output
  jQuery("ul.dropdown-menu li a").removeClass("dropdown-toggle"); //remove dropdown-toggle from dropdown menu items
  jQuery('.dropdown-toggle').append('<b class="caret"></b>'); //add dropdown indicator/caret
});


  jQuery(document).ready(function(){
    jQuery('a.dropdown-toggle')
    .attr('data-toggle', 'dropdown');
  });

jQuery(document).ready(function(){
  jQuery(function () {
    jQuery('.dropdown-toggle').dropdown();
  })
});
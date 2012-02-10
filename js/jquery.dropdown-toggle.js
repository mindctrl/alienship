/* Adding the class "dropdown" to li elements with submenus  */	
  jQuery(document).ready(function(){
  jQuery("ul.sub-menu").parent().addClass("dropdown");
  jQuery("[id^=menu-] li.dropdown a").addClass("dropdown-toggle");
  jQuery("ul.sub-menu li a").removeClass("dropdown-toggle");
  jQuery('.dropdown-toggle').append('<b class="caret"></b>');
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

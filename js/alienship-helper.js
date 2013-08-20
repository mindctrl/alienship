jQuery(document).ready(function(){
	// Style current page link
	jQuery("ul.pagination").children("li:not(:has(a))").addClass("active");
	// Style the search widget input
	jQuery( 'input#s' ).addClass( 'form-control' );
});
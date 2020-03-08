( function( $ ) {
	var WidgetHelloWorldHandler = function( $scope, $ ) {
		var btn = $scope.find('.eb-hover');
		if ( $(btn).hasClass('eb-hover') ) {
			$(btn).hover(function() {
				$(this).removeClass('animated');
			});
		}
	};
	
	// Make sure you run this code under Elementor..
	$( window ).on( 'elementor/frontend/init', function() {
		elementorFrontend.hooks.addAction( 'frontend/element_ready/eb-button-extended.default', WidgetHelloWorldHandler );
	} );
} )( jQuery );

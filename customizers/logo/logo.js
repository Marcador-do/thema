/*
 *|=======================================|
 *| [logo.js]
 *|
 *| Customizer transport for real updates
 *| on change
 *| 
 *| 
 *| @author Richard Blondet
 *| @package marcadordo
 *|=======================================|
*/
( function( $ ) {
	/* Marcador Logo customizer */
	wp.customize( 'marcador_logo_setting_handler', function( value ) {
		value.bind( function( IMAGE_URL ) {
			$('#page-content-wrapper #logo').attr("src", IMAGE_URL );
		});
	});
})( jQuery );
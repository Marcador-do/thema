/*
 *|=======================================|
 *| [sidebar-menu.js]
 *|
 *| Holds the logic for the sidebar menu
 *| as an 'class'.
 *| 
 *| @package marcadordo
 *| @author Richard Blondet
 *|=======================================|
*/

/**
 * SidebarMenu 
 *
 * @class SidebarMenu
 * Singleton for sidebar menu
 * @param { Object }
 * @author Richard Blondet
 */
var SidebarMenu = (function() {
	
	/** Singleton class instance */
	var instance;
	
	function constructor( args ) {
		var parentElement = document.getElementById("wrapper");	
		var classOpener = "toggled";
		
		/**
		 * Opens the menu
		 * @return {undefined}
		 */
		var open = function() {
			parentElement.className = classOpener;
		}

		/**
		 * Closes the menu
		 * @return {undefined}
		 */
		var close = function() {
			parentElement.className = "";
		};

		/**
		 * Check whether the menu is opened
		 * @return {Bool}
		 */
		var isOpen = function() {
			var bool;
			if ( parentElement.classList ) {
				bool = parentElement.classList.contains( classOpener );
			}
			else {
				bool = new RegExp('(^| )' + classOpener + '( |$)', 'gi').test( parentElement.className );
			}
			return bool;
		};
		isOpen();

		/**
		 * Exposing
		 */
		return {
			open: open,
			close: close,
			isOpen: isOpen
		}
	}

	/**
	 * Get the Singleton instance if one exists 
	 * or create one if it doesn't
	 */
	return {
		getInstance: function( args ) {
			if( !instance ) {
				instance = constructor( args );
			}
			return instance;
		}
	}

})();
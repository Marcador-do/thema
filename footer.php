<?php  
/**
 * [footer.php]
 *
 * Footer file
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @author Richard Blondet <richardblondet@gmail.com>
 * @package marcadordo
 */
?>
		</div>
		<!-- /#page-content-wrapper -->
	</div>
	<!-- /#wrapper -->
	<?php wp_footer(); ?>
	<script type="text/javascript">
		var init;
		(function(page){

			/**
			 * Configure the sidebarMenu
			 * file: [sidebar-menu.js]
			 */
			function setSidebarMenu() {
				var sideMenu = SidebarMenu.getInstance();
				var menuToggleButtons = [
					document.getElementsByClassName("sidebar-bar-close")[0],
					document.getElementsByClassName("navbar-menu-btn")[0]
				];
				/** Add the event to everyone of the provided buttons */
				[].forEach.call( menuToggleButtons, function(btn){
					btn.onclick = function(e) {
						e.preventDefault();
						if( sideMenu.isOpen() ) {
							sideMenu.close();
						} else {
							sideMenu.open();
						}
					}
				});

				/** Add the close to the `esc` keypress */
				document.onkeyup = function( e ) {
					var key_number = ( typeof e.which === "number" ) ? e.which : e.keyCode;
					if( key_number === 27 ) {
						if( sideMenu.isOpen() ) {
							sideMenu.close();
						}
					}
				}
			}

			/**
			 * Initialize sidebarnav submenu
			 * file: [sidebar-nav-submenu.js]
			 */
			function setSubmenuSidebar() {
				var elements = document.querySelectorAll('li[sidebar-nav-submenu]');

				new SidebarNav_SubMenu( elements );
			}

			/**
			 * Open the sidebar menu and focus the input when clicked
			 * @return {Bool} undefined
			 */
			function sidebarSearchPatch() {
				var sideMenu = SidebarMenu.getInstance();
				var searchButton = document.querySelector("#sidebar-search-toggle");
				var input = document.querySelectorAll('#sidebar-search-form .form-control')[0];
					
					/** Obey to the clicked event without modifying onclick */
					searchButton.addEventListener('click', function( e ) {
						if(! sideMenu.isOpen() ) {
							sideMenu.open();
							/* always open the search when this clicked */
							searchButton.className = "toggled";
							/** Focus input right away */
							input.focus();
						}
					});
			}

			init = function() {
				setSidebarMenu();
				setSubmenuSidebar();
				sidebarSearchPatch();
			};
			/** @type {function} triggers on page load */
			page.onload = init;
		}(window));
	</script>
	</body><!-- /body -->
</html><!-- /html -->

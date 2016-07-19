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
				[].forEach.call(menuToggleButtons, function(btn){
					btn.onclick = function(e) {
						e.preventDefault();
						if( sideMenu.isOpen() ) {
							sideMenu.close();
						} else {
							sideMenu.open();
						}
					}
				});
			}

			/**
			 * Initialize sidebarnav submenu
			 * file: [sidebar-nav-submenu.js]
			 */
			function setSubmenuSidebar() {
				var elements = document.querySelectorAll('li[sidebar-nav-submenu]');

				new SidebarNav_SubMenu( elements );
			}
			init = function() {
				setSidebarMenu();
				setSubmenuSidebar();
			};
			/** @type {function} triggers on page load */
			page.onload = init;
		}(window));
	</script>
	</body><!-- /body -->
</html><!-- /html -->

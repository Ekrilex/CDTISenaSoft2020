<?php 

	include_once '../Lib/helpers.php';
	include_once '../View/Partials/HtmlHead.php';

	echo "<body>";
		echo "<div class='wrapper static-sidebar'>";

			include_once '../View/Partials/NavBar.php';
			include_once '../View/Partials/SideBar.php';

			echo "<div class='main-panel'>";

				echo "<div class='content'>";

					if(isset($_GET['modulo'])){

						resolve();

					}else{
						include_once '../View/Partials/Content.php';
					}

				echo "</div>";

				include_once '../View/Partials/Footer.php';


			echo "</div>";

		echo "</div>";

		include_once '../View/Partials/Scripts.php';
	echo "</body>";
?>
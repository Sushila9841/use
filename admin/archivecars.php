<?php
session_start();
require '../connection/connect.php';
include '../templates/adminheader.php';
include '../templates/adminnavbar.php';
?>
	<main class="admin">

	<?php
	include '../templates/adminsidebar.php';
	?>

	<section class="right">
		
	<?php


		if (isset($_SESSION['logged_in_admin']) && $_SESSION['logged_in_admin'] == true) {

			$products = $pdo->query("UPDATE cars SET visible = 'Archive' WHERE id = " . $_POST['id']);

			echo 'Car has been Archived';

		}

		else {
			
			
				include 'login.php';
			
			
		}
		?>
	
	</section>
		</main>
	
	
		<?php
		include '../templates/adminfooter.php';
		?>
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


		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

			$products = $pdo->query('DELETE FROM team_member WHERE id = ' . $_POST['id']);

			echo 'team_member deleted';

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
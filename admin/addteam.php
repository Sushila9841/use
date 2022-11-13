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


	if (isset($_POST['submit'])) {

		$stmt = $pdo->prepare('INSERT INTO team_member (name) VALUES (:name)');

		$criteria = [
			'name' => $_POST['name']
		];

		$stmt->execute($criteria);
		echo 'team_member added';
	}
	else {
		if (isset($_SESSION['logged_in_admin']) && $_SESSION['logged_in_admin'] == true) {
		?>


			<h2>Add team_member</h2>

			<form action="" method="POST">
				<label>Name</label>
				<input type="text" name="name" />


				<input type="submit" name="submit" value="Add team_member" />

			</form>
			

			<?php
		}

		else {
			
			include 'login.php';
		
		}

	}
	?>

</section>
	</main>


	<?php
	include '../templates/adminfooter.php';
	?>
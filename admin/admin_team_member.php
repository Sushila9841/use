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
		?>


			<h2>TeamMember</h2>

			<a class="new" href="addteam.php">Add TeamMember</a>

			<?php
			echo '<table>';
			echo '<thead>';
			echo '<tr>';
			echo '<th>Name</th>';
			echo '<th style="width: 5%">&nbsp;</th>';
			echo '<th style="width: 5%">&nbsp;</th>';
			echo '</tr>';

			$categories = $pdo->query('SELECT * FROM team_member');

			foreach ($categories as $category) {
				echo '<tr>';
				echo '<td>' . $category['name'] . '</td>';
				echo '<td><a style="float: right" href="editteam.php?id=' . $category['id'] . '">Edit</a></td>';
				echo '<td><form method="post" action="deleteteam.php">
				<input type="hidden" name="id" value="' . $category['id'] . '" />
				<input type="submit" name="submit" value="Delete" />
				</form></td>';
				
				echo '</tr>';
			}

			echo '</thead>';
			echo '</table>';

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
			
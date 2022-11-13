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


			<h2>queries</h2>


			<?php
			echo '<table>';
			echo '<thead>';
			echo '<tr>';
			echo '<th>name</th>';
			echo '<th>feedback</th>';
			echo '<th>report</th>';

			echo '<th style="width: 5%">&nbsp;</th>';
			echo '<th style="width: 5%">&nbsp;</th>';
			echo '<th style="width: 5%">&nbsp;</th>';
			echo '<th style="width: 5%">&nbsp;</th>';

			echo '</tr>';

			$queries = $pdo->query('SELECT * FROM queries');

			foreach ($queries as $enquire) {
				
				echo '<tr>';
				echo '<td>' . $enquire['name'] . '</td>';
				echo '<td>' . $enquire['feedback'] . '</td>';
				echo '<td>' . $enquire['report'] . '</td>';
				
				
				
				echo '<td><form method="post" action="completequeries.php">
				<input type="hidden" name="id" value="' . $enquire['id'] . '" />
				<input type="submit" name="submit" value="DONE" />
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
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


			<h2>news</h2>

			<a class="new" href="add_news.php">Add new News</a>

			<?php
			echo '<table>';
			echo '<thead>';
			echo '<tr>';
			echo '<th>Title</th>';
			echo '<th>Description</th>';
			
			echo '<th style="width: 12%">Price</th>';
			echo '<th style="width: 7%">&nbsp;</th>';
			echo '<th style="width: 8%">&nbsp;</th>';
			

			echo '</tr>';

			$news = $pdo->query('SELECT * FROM news');

			foreach ($news as $new) {
				
				echo '<tr>';
				echo '<td>' . $new['title'] . '</td>';
				echo '<td>' . $new['description'] . '</td>';
			
				
				
				echo '<td><form method="post" action="deletenew.php">
				<input type="hidden" name="id" value="' . $new['id'] . '" />
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
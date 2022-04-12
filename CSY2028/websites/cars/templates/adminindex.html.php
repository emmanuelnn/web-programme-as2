	<?php
	if (isset($_POST['submit'])) {
		if ($_POST['password'] == 'opensesame') {
			$_SESSION['loggedin'] = true;	
		}
	}


	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	?>

	<section class="left">
		<ul>
			<li><a href="/manufacturers/list">Manufacturers</a></li>
			<li><a href="/cars/listall">Cars</a></li>
			<li><a href="/news/list">News</a></li>
			<li><a href="/enquires/list">Enquires</a></li>

		</ul>
	</section>

	<section class="right">
	<h2>You are now logged in</h2>
	</section>
	<?php
	}

	else {
		?>
		<h2>Log in</h2>

		<form action="index.php" method="post" style="padding: 40px">

			<label>Enter Password</label>
			<input type="password" name="password" />

			<input type="submit" name="submit" value="Log In" />
		</form>
	<?php
	}
	?>
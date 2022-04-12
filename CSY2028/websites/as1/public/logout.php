<?php
$myTitle = 'Northampton News - Logout';
require '../header.php';
?>



<?php

unset($_SESSION['loggedin']);
echo '<h1>You are now logged out</h1>';

echo '<p><a href="login.php">click here to log back in</a></p>';

?>

<?php
require '../footer.php';
?>

<?php
$myTitle = 'Northampton News - Delete Category';
require '../header.php';
?>




<?php

$server = 'mysql';
$username = 'student';
$password = 'student';


$schema = 'assignment1';

$pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password);

$stmt = $pdo->prepare('DELETE FROM assignment1.category 
                        WHERE categoryId = :categoryId');

$values = [
    'categoryId' => $_GET['categoryId']

];

$stmt->execute($values);

echo '<p>Record deleted</p>';
echo '<ul><a href="adminCategories.php">Back to main category</a></ul>';


?>



<?php
require '../footer.php';
?>






<?php
$myTitle = 'Northampton News - Delete Article';
require '../header.php';
?>



<?php
$server = 'mysql';
$username = 'student';
$password = 'student';


$schema = 'assignment1';

$pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password);

$stmt = $pdo->prepare('DELETE FROM assignment1.article 
                        WHERE articleid = :articleid');

$values = [
    'articleid' => $_GET['articleid']

];

$stmt->execute($values);

echo '<p>Record deleted</p>';
echo '<ul><a href="adminArticles.php">Back to main articles</a></ul>';



?>





<?php
require '../footer.php';
?>



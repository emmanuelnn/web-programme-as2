<?php
$myTitle = 'Northampton News - Articles';
require '../header.php';
?>



<?php
if (isset($_GET['articleid'])) {
$server = 'mysql';
$username = 'student';
$password = 'student';
$schema = 'assignment1';

$pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password);


$stmt = $pdo->prepare('SELECT * FROM assignment1.article WHERE articleid = :articleid');
    

$values = [
    'articleid' => $_GET['articleid'],

];
$stmt->execute($values);

$row = $stmt->fetch();

    echo '<h2>' . $row['title'] . '</h2>';
    echo '<p>' . $row['content'] . '</p>';
    echo '<p> Publish on ' . $row['publishDate'] . '<p>';





?>

<?php
}


if (isset($_POST['submit'])) {
 $_SESSION['name'] = $_POST['name'];
 
 echo 'comment was added';
}


else {
?>
<form action="Article.php" method="POST">
 <label>Enter your name: </label>
 <input type="text" name="name" />
 <label>Enter your email: </label>
 <input type="text" name="name" />
 <label>comment</label> <textarea></textarea>
 <input type="submit" name="submit" value="Submit" />
</form>
<?php
}
?>

<?php
require '../footer.php';
?>



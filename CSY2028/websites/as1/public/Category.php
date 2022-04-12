<?php
$myTitle = 'Northampton News - Category';
require '../header.php';
?>




<h2>Select Category:</h2>
<ul>

<?php

    $server = 'mysql';
    $username = 'student';
    $password = 'student';

    $schema = 'assignment1';
    
    $pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password);
    
    
    
        $stmt = $pdo->prepare('SELECT * FROM assignment1.category');
    
        $stmt->execute();
    
        foreach ($stmt as $row) {
            echo '<li><a href="viewArticle.php?categoryId=' . $row['categoryId'] . '">' . $row['name'] . '</a></li>';
        }
    ?>


<?php
require '../footer.php';
?>
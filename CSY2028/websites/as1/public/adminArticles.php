<?php
$myTitle = 'Northampton News - Manage Articles';
require '../header.php';
?>

<h1>Add Articles</h1>
<ul>
    <li><a href="addArticle.php">Add Article</a></li>
</ul>

<h1>Select Articles</h1>
<ul>



<?php

    $server = 'mysql';
    $username = 'student';
    $password = 'student';

    $schema = 'assignment1';
    
    $pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password);
    
    
    
        $stmt = $pdo->prepare('SELECT * FROM assignment1.article');
    
        $stmt->execute();
    
        foreach ($stmt as $row) {
            echo '<h2>' . $row['title'] . '</h2>';
            echo '<li><a href="editArticle.php?articleid=' . $row['articleid'] . '">' . 'Edit ' . $row['title'] . '</a></li>';
            echo '<li><a href="deleteArticle.php?articleid=' . $row['articleid'] . '">' . 'Delete ' . $row['title'] . '</a></li>';

        }

?>

    </ul>


<?php
require '../footer.php';
?>






<?php
$myTitle = 'Northampton News - Manage Categories';
require '../header.php';
?>

<h1>Add Category</h1>
<ul>
	<li><a href="addCategory.php">Add Category</a></li>
</ul>

<h1>Select Category</h1>
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
            echo '<h2>' . $row['name'] . '</h2>';
            echo '<li><a href="editCategory.php?categoryId=' . $row['categoryId'] . '">' . 'Edit ' . $row['name'] . '</a></li>';
            echo '<li><a href="deleteCategory.php?categoryId=' . $row['categoryId'] . '">' . 'Delete ' . $row['name'] . '</a></li>';
        }
    ?>

    </ul>
<?php
require '../footer.php';
?>



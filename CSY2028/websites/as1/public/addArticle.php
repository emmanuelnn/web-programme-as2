<?php
$myTitle = 'Northampton News - Add Article';
require '../header.php';






$server = 'mysql';
$username = 'student';
$password = 'student';


$schema = 'assignment1';

$pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password);

if (isset($_POST['submit'])) {
    if (isset($_POST['submit'])) {
        $stmt = $pdo->prepare('INSERT INTO assignment1.article(title, content, categoryId, publishDate) 
        VALUES (:title, :content, :categoryId, :publishDate)');
            
            $date = new DateTime();
            $date = $date->format('Y-m-d H:i');


            $values = [
                'title' => $_POST['title'],
                'content' => $_POST['content'],
                'categoryId' => $_POST['categoryId'],
                'publishDate' => $date
                
            ];
    
            $stmt->execute($values);
            echo  'Article added';
            echo '<p><a href="adminArticles.php">Back to list</a>';

    
    }
}
        else {
            ?>
            <form action="addArticle.php" method="post">
            <label>Title:</label>
            <input type="text"  name="title" />
            <label>Content:</label>
            <textarea name="content"> </textarea>
                       
            <label>Category:</label>
            <select name="categoryId">
	<?php

		$stmt = $pdo->prepare('SELECT * FROM assignment1.category');
		$stmt->execute();

		foreach ($stmt as $row) {
			if ($row['categoryId'] == $game['categoryId']) {
				echo '<option value="' . $row['categoryId'] . '" selected="selected">' . $row['name'] . '</option>';
			}
			else {
				echo '<option value="' . $row['categoryId'] . '">' . $row['name'] . '</option>';
			}
		}

	?>
            </select>
            <input type="submit" value="Add" name="submit" />
            </form>
            <?php
        }
    
    
    ?>
    













<?php
require '../footer.php';
?>

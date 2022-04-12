<?php
$myTitle = 'Northampton News - Register';
require '../header.php';
?>





<?php




$server = 'mysql';
$username = 'student';
$password = 'student';
$schema = 'assignment1';

$pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password);

if (isset($_POST['submit'])) {
	$stmt = $pdo->prepare('INSERT INTO assignment1.register(email, userpassword, name) 
    VALUES (:email, :userpassword, :name)');

    $userpassword = $_POST['userpassword'];

    $hash = password_hash($userpassword, PASSWORD_DEFAULT);
    

        $values = [
            'email' => $_POST['email'],
            'userpassword' => $hash,
            'name' => $_POST['name']
        ];

        $stmt->execute($values);

        echo '<h1>You have been registered</h1>';

        echo '<p><a href="login.php">click here to log in</a></p>';



    }
    else {
        ?>
    
        <form action="register.php" method="post">
    
            <label>Email</label>
            <input type="text"  name="email" />
    
            <label>Password</label>
            <input type="password"  name="userpassword" />

            <label>Name</label>
            <input type="text"  name="name" />


            <input type="submit" value="submit" name="submit" />
        </form>
        <?php
    }
?>






<?php
require '../footer.php';
?>

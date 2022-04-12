<?php
$myTitle = 'Northampton News - Login';
require '../header.php';
?>

<a href="admin.php">Go to Admin login</a>
<?php

$server = 'mysql';
$username = 'student';
$password = 'student';

$schema = 'assignment1';

$pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password);

if (isset($_POST['submit'])) {
    
    $stmt = $pdo->prepare('SELECT * FROM assignment1.register WHERE email = :email');
    $values = [
     'email' => $_POST['email'],
    ];
    $stmt->execute($values);

    $user = $stmt->fetch();

    if ($user){

    if (password_verify($_POST['userpassword'], $user['userpassword'])) {
     $_SESSION['loggedin'] = $user['registerid'];
     echo 'You are now logged in';


     }




    }
    else {
     echo 'Sorry, your account could not be found';
    }
    
    
}
       
       else {
           
        ?>
        <form action="login.php" method="POST">
         <label>email: </label> <input type="text" name="email" />
         <label>Password: </label> <input type="password" name="userpassword" />
         <input type="submit" name="submit" value="Log In" />
        </form>
        <?php
        }
        ?>




<?php
require '../footer.php';
?>

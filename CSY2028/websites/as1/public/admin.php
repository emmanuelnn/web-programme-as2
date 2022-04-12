<?php
$myTitle = 'Northampton News - Admin';
require '../header.php';

if (isset($_POST['submit'])) {
    
        //Check they entered the correct username/password
        if ($_POST['email'] === 'admin@web.com' && $_POST['password'] === 'password') {

            $_SESSION['loggedin'] = true;


            echo '<p><a href="adminArticles.php">Manage article</a></p>';


            echo '<p><a href="admincategories.php">Manage Category</a></p>';

           
        }
         else {
            echo '<p>Admin email and password is invalid</p>';

            echo '<a href="admin.php">Please try again</a>';
         }
    }

        
       
       else {
           
        ?>
        <form action="admin.php" method="POST">
         <label>email: </label> <input type="text" name="email" />
         <label>Password: </label> <input type="password" name="password" />
         <input type="submit" name="submit" value="Log In" />
        </form>
        <?php
        }
        ?>




<?php
require '../footer.php';
?>

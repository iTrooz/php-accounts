<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Register</title>
</head>
<body>
    <?php
        // Check if post informations are available, happen when validating form
        if($_SERVER['REQUEST_METHOD']=="POST"){
            // Execute db.php file (Ctrl+C Ctrl+V but without beacons)
            require("php/db.php");
            // Hash the password so it's unreadable (don't you dare not hash it)
            $hash = password_hash($_POST["password"], PASSWORD_BCRYPT);
            // Create prepare statement with arguments of columns in DB
            $ps = $db->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
            // Replace "?" values above with variables in Post method, starting at 1
            $ps->bindParam(1, $_POST["username"]);
            $ps->bindParam(2, $hash);
            $ps->execute();
            // rowCount() count row edited, verify that one row has been edited so we're sure there is no error
            if($ps->rowCount()==1){
                echo "Account creation OK. Now please login";
            }else{
                echo "An internal error occured !";
            }
        }
    ?>
    <form action="register.php" method="post">
        <input type="text" name="username" placeholder="username" required="true">
        <input type="password" name="password" placeholder="password" required="true">
        <input type="submit" value="Register">
    </form>
</body>
</html>

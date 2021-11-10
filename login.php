<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
</head>
<body>
    <?php
        if($_SERVER['REQUEST_METHOD']=="POST"){
            require("php/db.php");
            $ps = $db->prepare("SELECT id, password FROM users WHERE username=?");
            $ps->bindParam(1, $_POST["username"]);
            $ps->execute();
            if($row = $ps->fetch()){ // true if there's a row, and put it in "row"
                if(password_verify($_POST["password"], $row["password"])){ // "compare" plaintext password with hash
                    echo "Login OK !";
                    session_start(); // enable the request-wide $_SESSION variable
                    $_SESSION["logintime"] = time();
                    $_SESSION["username"] = $_POST["username"];
                    $_SESSION["id"] = $row["id"];
                }else{
                    echo "Wrong password";
                }
            }else{
                echo "No account found with this name";
            }
        }
    ?>
    <form action="login.php" method="post">
        <input type="text" name="username" placeholder="username" required="true">
        <input type="password" name="password" placeholder="password" required="true">
        <input type="submit" value="Login">
    </form>
</body>
</html>
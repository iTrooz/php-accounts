<?php
    // test file
    include "php/login.php";
    enforce_login();
    echo "Welcome ".$_SESSION["username"]." !";
?>
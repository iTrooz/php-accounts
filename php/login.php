<?php
    function is_login(){
        if(isset($_COOKIE["PHPSESSID"])) { // has a session cookie ?
            session_start(); // read from it
            if(isset($_SESSION["logintime"])){
                $MAX_SESSION_TIME = 60*60*4; // 4 hours, then no longer valid
                if(time()<$_SESSION["logintime"]+$MAX_SESSION_TIME){ // is timeout reached ?
                    return true;
                }else{
                    // while we are at it, destroy the session
                    session_destroy();
                }
            }
        }
        return false;
    }
    function enforce_login(){ // will not return if user not login
        if(!is_login()){
            header("Location: login.php?redirect=1");
            die();
        }
    }
?>
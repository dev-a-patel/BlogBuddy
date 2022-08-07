<?php

    function usersOnly()
    {
        $redirect = "http://localhost:9999/blogbuddy/index.php";
        if (empty($_SESSION['id'])) {
            $_SESSION['message'] = 'Please <b>LOGIN</b> first';
            $_SESSION['type'] = 'error';
            header('location: '.$redirect);
            header('location: '.$redirect);
            exit(0);
        }
    }

    function adminOnly()
    {
        $redirect = "http://localhost:9999/blogbuddy/index.php";
        if (empty($_SESSION['id']) || empty($_SESSION['admin'])) {
            $_SESSION['message'] = 'You are NOT AUTHORIZED!';
            $_SESSION['type'] = 'error';
            header('location: '.$redirect);
            exit(0);
        }
    }

    function guestsOnly()
    {
        $redirect = "http://localhost:9999/blogbuddy/index.php";
        if (isset($_SESSION['id'])) {
            // $_SESSION['message'] = 'Please <b>LOGIN</b> first';
            // $_SESSION['type'] = 'error';
            header('location: '.$redirect);
            exit(0);
        }
    }
?>
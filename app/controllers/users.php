<?php

include("C:/xampp/htdocs/blogbuddy/app/database/db.php");
include("C:/xampp/htdocs/blogbuddy/app/helpers/validateUser.php");
include("C:/xampp/htdocs/blogbuddy/app/helpers/middleware.php");

$table = 'users';
$users = selectAll($table);

$errors = array();
$id = '';
$username = '';
$email = '';
$admin = '';
$password = '';

function loginUser($user)
{
    $_SESSION['id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['admin'] = $user['admin'];
    $_SESSION['message'] = "You are now logged in.";
    $_SESSION['type'] = "success";
    header('location: http://localhost:9999/blogbuddy/index.php ');
    exit();

    if($_SESSION['admin']){
        header('location: http://localhost:9999/blogbuddy/admin/post/index.php ');
    }
    else {
        header('location: http://localhost:9999/blogbuddy/index.php ');
    }
}

if(isset($_POST['register-btn']) || isset($_POST['create-admin']))
{
    $errors = validateUser($_POST);

    if (count($errors)===0) 
    {
        unset($_POST['register-btn'], $_POST['create-admin']);
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

        if (isset($_POST['admin'])) {
            $_POST['admin'] = 1;
            $user_id = create($table, $_POST);
            $_SESSION['message'] = "Admin User Created";
            $_SESSION['type'] = "success";
            header('location: http://localhost:9999/blogbuddy/admin/user/index.php '); 
            exit();
        } 

        else {
            $_POST['admin'] = 0;
            $user_id = create($table, $_POST);
            $user = selectOne($table, ['id' => $user_id]);
            loginUser($user);
        }
    }
    else {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $admin = isset($_POST['admin'])? 1 : 0;
    }
}

if (isset($_POST['update-user']))
{
    adminOnly();

    $errors = validateUser($_POST);

    if (count($errors)===0) 
    {   
        $id = $_POST['id'];
        unset($_POST['id'], $_POST['update-user']);
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $_POST['admin'] = isset($_POST['admin']) ? 1 : 0;
        $count = update($table, $id, $_POST);
        $_SESSION['message'] = "User <b>Updated</b>";
        $_SESSION['type'] = "success";
        header('location: http://localhost:9999/blogbuddy/admin/user/index.php '); 
        exit();
    }

    else {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $admin = isset($_POST['admin'])? 1 : 0;
    }
}

if (isset($_GET['id'])) 
{
    $user = selectOne($table,['id' => $_GET['id']]);
    $id = $user['id'];
    $username = $user['username'];
    $email = $user['email'];
    // $password =  $user['password'];
    $admin = isset($user['admin'])? 1 : 0;

}
if(isset($_POST['login-btn']))
{

    $errors = validateLogin($_POST);

    if (count($errors)===0) 
    {
        $user = selectOne($table,['email' => $_POST['email']]);
        
        if ($user && password_verify($_POST['password'], $user['password'])) 
        {
            loginUser($user);
        } 
        else 
        {
            array_push($errors, 'Wrong Credentials');    
        }
    }
    $email = $_POST['email'];
    $password = $_POST['password'];
}

if (isset($_GET['delete_id'])) 
{
    adminOnly();

    $count = delete($table, $_GET['delete_id']);
    $_SESSION['message'] = "User <b>Deleted</b>";        
    $_SESSION['type'] = "success"; 
    header("location: http://localhost:9999/blogbuddy/admin/user/index.php ");       
    exit(); 
}

?>
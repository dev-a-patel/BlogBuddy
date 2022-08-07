<?php
include("C:/xampp/htdocs/blogbuddy/app/database/db.php");
include("C:/xampp/htdocs/blogbuddy/app/helpers/middleware.php"); 

include("C:/xampp/htdocs/blogbuddy/app/helpers/validatePost.php");

$topics = selectAll('topics');
$table = 'posts' ;
$posts = selectAll($table);

$errors = array();
$id = '';
$title = '';
$body = '';
$topic_id = '';
$published = '';
$image='';

if (isset($_GET['id'])) 
{
    $post = selectOne($table, ['id'=>$_GET['id']]);
    // dd($post);
    $id = $post['id'];
    $title = $post['title'];
    $body = $post['body'];
    $topic_id = $post['topic_id'];
    $published = $post['published'];
}

if ( isset($_GET['published']) && isset($_GET['p_id'])) 
{
    usersOnly();
    $published = $_GET['published'];
    $p_id = $_GET['p_id'];
    $count = update($table, $p_id, ['published' => $published]);
    if ($published == 1) {
        $_SESSION['message'] = "Post <b>Published</b>";        
    } else {
        $_SESSION['message'] = "Post <b>Unpublished</b>";        
    }
    
    $_SESSION['type'] = "success"; 
    header("location: http://localhost:9999/blogbuddy/admin/post/index.php ");       
    exit(); 
}

if (isset($_GET['delete_id'])) 
{
    usersOnly();
    $count = delete($table, $_GET['delete_id']);
    $_SESSION['message'] = "Post <b>Deleted</b> successfully";        
    $_SESSION['type'] = "success"; 
    header("location: http://localhost:9999/blogbuddy/admin/post/index.php ");       
    exit(); 
}

if (isset($_POST['add-post'])) 
{
    usersOnly();
    $errors = validatePost($_POST);
    // dd($_FILES['image']);
    if (!empty($_FILES['image']['name'])) {
        $image_name = time().'_'.$_FILES['image']['name'];
        $destination = "C:/xampp/htdocs/blogbuddy/assets/dbimgs/".$image_name;

        $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);

        if ($result) {
            $_POST['image'] = $image_name;
        } 
        else {
            array_push($errors, "Failed to Upload Image ");
        }  
    } 
    else {
        array_push($errors, "Image is required!");
    }
    
    
    if (count($errors) === 0) 
    {
        unset($_POST['add-post']);        
        $_POST['user_id'] = $_SESSION['id'];        
        $_POST['username'] = $_SESSION['username'];        
        $_POST['published'] = isset($_POST['published']) ? 1:0;        
        $_POST['body'] = htmlentities($_POST['body']);     
        
        // $_POST['likes'] = 0;
        
        $post_id = create($table, $_POST);        
        $_SESSION['message'] = "Post <b>Created</b> successfully";        
        $_SESSION['type'] = "success"; 
        header("location: http://localhost:9999/blogbuddy/admin/post/index.php ");        
    } 
    else 
    {    
        $title= $_POST['title'];    
        $body = $_POST['body'];    
        // $image = $_FILES['image']['name'];
        
        $topic_id = $_POST['topic_id'];    
        $published = isset($_POST['published']) ? 1:0;    
    }
}

if (isset($_POST['like-btn'])) {
    # code...
}

if (isset($_POST['update-post'])) 
{
    usersOnly();
    $errors = validatePost($_POST);
    // dd($_FILES['image']);
    if (!empty($_FILES['image']['name'])) {
        $image_name = time().'_'.$_FILES['image']['name'];
        $destination = "C:/xampp/htdocs/blogbuddy/assets/dbimgs/".$image_name;
        
        $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);
        
        if ($result) {
            $_POST['image'] = $image_name;
        } 
        else {
            array_push($errors, "Failed to Upload Image ");
        }  
    } 
    else {
        // $image_name = substr($post['image'],11);
        array_push($errors, "Image is required!");
    }

    if (count($errors) === 0) 
    {
        $id = $_POST['id'];
        unset($_POST['update-post'],$_POST['id']);  

        $_POST['user_id'] = $_SESSION['id']; 
        // $_POST['username'] = $_SESSION['username'];       
        $_POST['published'] = isset($_POST['published']) ? 1:0;        
        $_POST['body'] = htmlentities($_POST['body']);     
           
        $post_id = update($table, $id, $_POST);        
        $_SESSION['message'] = "Post <b>Updated</b> successfully";        
        $_SESSION['type'] = "success"; 
        header("location: http://localhost:9999/blogbuddy/admin/post/index.php ");        
    } 
    else 
    {    
        $title= $_POST['title'];    
        $body = $_POST['body'];    
        // $image = $_FILES['image']['name'];

        $topic_id = $_POST['topic_id'];    
        $published = isset($_POST['published']) ? 1:0;    
    }
}
?>
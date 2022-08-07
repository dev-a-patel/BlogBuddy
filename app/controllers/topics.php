<?php

include("C:/xampp/htdocs/blogbuddy/app/database/db.php");
include("C:/xampp/htdocs/blogbuddy/app/helpers/validateTopic.php");
include("C:/xampp/htdocs/blogbuddy/app/helpers/middleware.php");


$table = 'topics';
$errors = array();
$id = '';
$name= '';
$description = '';


$topics = selectAll($table);
// dd($topics);

if(isset($_POST['add-topic'])){
    usersOnly();

    $errors = validateTopic($_POST);
    
    if(count($errors)===0)
    {
        unset($_POST['add-topic']);
        $topic_id = create($table,$_POST);
        $_SESSION['message']='Topic <b>Created</b> successfully';
        $_SESSION['type']= 'success';
        header("location: http://localhost:9999/blogbuddy/admin/topic/index.php ");
        exit();
    }
    else {
        $name = $_POST['name'];
        $description = $_POST['description'];
    }
}

if(isset($_GET['id'])){
    $id= $_GET['id'];
    $topic = selectOne($table,['id'=>$id]);
    $id = $topic['id'];
    $name= $topic['name'];
    $description = $topic['description'];
}

if(isset($_GET['del_id'])){
    adminOnly();

    $id= $_GET['del_id'];
    $count = delete($table, $id);
    $_SESSION['message']='Topic <b>Deleted</b> successfully';
    $_SESSION['type']= 'success';
    header("location: http://localhost:9999/blogbuddy/admin/topic/index.php ");
    exit();
}

if(isset($_POST['update-topic'])){
    usersOnly();

    $errors = validateTopic($_POST);

    if(count($errors)===0)
    {
        $id=$_POST['id']; 
        unset($_POST['update-topic'], $_POST['id']);
        $topic_id = update($table,$id,$_POST);
        $_SESSION['message']='Topic <b>Updated</b> successfully';
        $_SESSION['type']= 'success';
        header("location: http://localhost:9999/blogbuddy/admin/topic/index.php ");
        exit();
    }
    else {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
    }
}
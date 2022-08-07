<?php include("C:/xampp/htdocs/blogbuddy/app/controllers/posts.php"); 
usersOnly();

if($_SESSION['admin'])
{
  $posts = selectAll('posts');
}
else
$posts = selectAll('posts',['user_id'=>$_SESSION['id']]);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"content="width-device-width,initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible"content="ie-edge">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://fonts.googleapis.com/css2?family=Jost&family=Montserrat&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../../assets/css/admin-style.css">
  <title>Manage | BlogBüddy</title>
  <Style>
    header{
        z-index:1;
    }
    body{
        z-index:0;
        overflow-y:hidden;
    }

    .page-wrapper{
        height:100%;
    }
    /* admin-wrapper */
    .admin-wrapper{
        height: 100%;
        width: 100%;
        display: flex;
        position:fixed;
        top:55px;
    }

    .left-sidebar{
        flex:1;
        background-color: rgb(4, 128, 128);
        height:100%;
    }

    .admin-content{
        margin:auto;
        flex:5;
        height: 100%;
        width: fit-content;
        padding: 50px ;
        padding-top: 40px ;
        overflow-y: scroll;
        z-index:1;
      }
      
      thead{
        background:lightgrey;
      }

      .fa-sort-up,.fa-sort-down{
        font-size:0.67rem;
        padding:0px;
        margin:1px;
        /* height:fit-content; */
        /* width:fit-content; */
      }
  </Style>
</head>

<body>
  <!-- nav -->
  <?php include("C:/xampp/htdocs/blogbuddy/app/includes/adminHeader.php"); ?>

  <!-- // nav -->

  <!-- page-wrapper -->
  <div class="page-wrapper">
      <!-- ADMIN-wrapper -->
      <div class="admin-wrapper">
          <!-- left-sidebar -->
          <?php include("C:/xampp/htdocs/blogbuddy/app/includes/adminSidebar.php"); ?>

          <!-- // left-sidebar -->
          
          <!-- Admin-content -->
          <div class="admin-content">
            <div class="button-group">
                <a href="create.php" class="btn">Add Post</a>
                <a href="index.php" class="btn">Manage Posts</a>
            </div>

            <div class="content">
                <h2 class="page-title">Manage Posts</h2>

                <?php include("C:/xampp/htdocs/blogbuddy/app/helpers/formErrors.php"); ?>
                <?php include("C:/xampp/htdocs/blogbuddy/app/includes/messages.php"); ?>
                

                <table>
                    <thead>
                      <form action='' method="post">
                      <tr>
                        <th>
                          <!-- <button name="id-asc"><b>^</b></button> -->
                          No.
                          <!-- <button name="id-dsc"><b> v</b></button> -->
                        </th>

                        <th>Title</th>
                        <!-- <th>Topic</th> -->
                        <?php if($_SESSION['admin']):?>
                        <th> 
                          <!-- <span class="sort-btn"> -->
                            <button name="auth-asc" class="fa-solid fa-sort-up"></button>Author<button name="auth-dsc" class="fa-solid fa-sort-down"></button>
                          <!-- </span> -->
                        </th>
                        <?php endif;?>

                        <th> 
                          <!-- <span class="sort-btn"> -->
                            <button name="likes-asc"class="fa-solid fa-sort-up"></button>Likes<button name="likes-dsc" class="fa-solid fa-sort-down"></button>
                          <!-- </span> -->
                        </th>
                        
                        <th> 
                          <!-- <span class="sort-btn"> -->
                            <button name="views-asc" class="fa-solid fa-sort-up"></button>Views<button name="views-dsc" class="fa-solid fa-sort-down"></button>
                          <!-- </span> -->
                        </th>
                        
                        <th colspan="<?php if($_SESSION['admin']){ echo '2';} else echo '3';?>" style="text-align: left;"> 
                          <!-- <span class="sort-btn"> -->
                            <button name="pub-asc" class="fa-solid fa-sort-up"></button>Action<button name="pub-dsc" class="fa-solid fa-sort-down"></button>
                          <!-- </span> -->
                        </th>
                      </tr>
                      </form>
                    </thead>

                    <tbody>
                    <?php 
                      if ($_SESSION['admin']){
                        $condition = '';
                      } 
                      else {
                        $condition = ['user_id'=> $_SESSION['id']];
                      }
                      

                      if(isset($_POST["id-asc"]))
                      {
                        $posts = sortBy('posts','id','ASC',$condition);
                      }
                      elseif(isset($_POST["id-dsc"]))
                      {
                        $posts = sortBy('posts','id','DESC',$condition);
                      }
                      elseif(isset($_POST["auth-asc"]))
                      {
                        $posts = sortBy('posts','username','ASC',$condition);
                      }
                      elseif(isset($_POST["auth-dsc"]))
                      {
                        $posts = sortBy('posts','username','DESC',$condition);
                      }
                      elseif(isset($_POST["likes-asc"]))
                      {
                        $posts = sortBy('posts','likes','ASC',$condition);
                      }
                      elseif(isset($_POST["likes-dsc"]))
                      {
                        $posts = sortBy('posts','likes','DESC',$condition);
                      }
                      elseif(isset($_POST["views-asc"]))
                      {
                        $posts = sortBy('posts','views','ASC',$condition);
                      }
                      elseif(isset($_POST["views-dsc"]))
                      {
                        $posts = sortBy('posts','views','DESC',$condition);
                      }
                      elseif(isset($_POST["pub-asc"]))
                      {
                        $posts = sortBy('posts','published','ASC',$condition);
                      }
                      elseif(isset($_POST["pub-dsc"]))
                      {
                        $posts = sortBy('posts','published','DESC',$condition);
                      }
                    ?>
                    <?php foreach($posts as $key => $post): ?>
                          <tr>
                            <td><?php echo $key + 1; ?></td>
                            <?php if (strlen($post['title'])>35) :?>
                              <td><?php echo substr($post['title'],0,32)."..."; ?></td>
                            <?php else:?>
                              <td><?php echo $post['title']; ?></td>
                            <?php endif;?>
                            <!-- <td><?php //echo $post['topic_id']; ?></td> -->
                            
                            <?php if($_SESSION['admin']):?>
                              <td><?php echo $post['username']; ?></td>
                            <?php endif;?>
                            
                            <td><?php echo $post['likes']; ?></td>
                            <td><?php echo $post['views']; ?></td>
                            
                            <?php if(!$_SESSION['admin']):?>
                              <td><a href="edit.php?id=<?php echo $post['id']; ?>" class="edit">Edit</a></td>
                            <?php endif;?>
                            
                            <td><a href="edit.php?delete_id=<?php echo $post['id']; ?>" class="delete">Delete</a></td>

                            <?php if($post['published']):?>
                                <td><a href="edit.php?published=0&p_id=<?php echo $post['id']; ?>" class="publish" style="color:yellowgreen;">Unpublish</a></td>
                            <?php else: ?>
                                <td><a href="edit.php?published=1&p_id=<?php echo $post['id']; ?>" class="publish">Publish</a></td>
                            <?php endif;?>
                          </tr>
                      <?php endforeach;?>
                       
                    </tbody>
                </table>
            </div>
          </div>
          <!-- // Admin-content -->
      </div>
      <!-- // ADMIN-wrapper -->
  </div>
  <!-- // page-wrapper -->

  <!-- SCRIPTS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer">
  </script>

  <script src="assets/js/script.js" type="text/javascript"></script>
<!--//scripts  -->
</body>
</html>
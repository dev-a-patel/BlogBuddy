<?php include("C:/xampp/htdocs/blogbuddy/app/controllers/posts.php"); 
usersOnly();
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
        padding: 40px 50px ;
        overflow-y: scroll;
        width: fit-content;
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
                <h2 class="page-title">Edit Posts</h2>

                <?php include("C:/xampp/htdocs/blogbuddy/app/helpers/formErrors.php"); ?>

                <form action="edit.php" method="POST" enctype="multipart/form-data">
                  <input type="hidden" name="id" value="<?php echo $id; ?>" id="topic-id">

                    <div class="input-group">
                        <label for="post-title">Title</label>
                        <input type="text" name="title" value="<?php echo $title;?>" id="post-title">
                    </div>

                    <div class="input-group">
                        <label for="body">Body</label>
                        <textarea name="body" id="body" cols="30" rows="10"><?php echo $body;?></textarea>
                    </div>

                    <div class="input-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" id="image" style="background-color: white;" value="<?php echo $image;?>">
                    </div>

                    <div class="input-group">
                        <label for="selected-topic">Topic</label>
                        <select name="topic_id" id="selected-topic">
                            <?php foreach($topics as $key => $topic): ?>
                                <?php if(!empty($topic_id) && ($topic_id === $topic['id'])): ?>
                                    <option selected value="<?php echo $topic_id; ?>"><?php echo $topic['name'];?></option>
                                <?php else: ?>  
                                    <option value="<?php echo $topic['id']; ?>"><?php echo $topic['name'];?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div>
                    <?php if(empty($published) && $published == 0):?>
                            <label for="published" class="pub-label">
                                <input type="checkbox" name="published" id="published"  class="pub-label">
                                Publish
                            </label>
                        <?php else:?>
                            <label for="published" class="pub-label">
                                <input type="checkbox" name="published" id="published"  class="pub-label" checked>
                                Publish
                            </label>
                        <?php endif;?>
                    </div>

                    <div class="input-group">
                        <button type="submit" name="update-post" class="btn">Update Post</button>
                    </div>
                </form>
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

  <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>

  <script src="../../assets/js/script.js" type="text/javascript"></script>
<!--//scripts  -->
</body>
</html>
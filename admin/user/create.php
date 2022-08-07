<?php include("C:/xampp/htdocs/blogbuddy/app/controllers/users.php"); 
adminOnly();
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
                <a href="create.php" class="btn">Add User</a>
                <a href="index.php" class="btn">Manage Users</a>
            </div>

            <div class="content">
                <h2 class="page-title">Add Users</h2>

                <?php include("C:/xampp/htdocs/blogbuddy/app/helpers/formErrors.php"); ?>

                <form action="create.php" method="post">
                <div class="input-group">
                    <label for="u-name">Name</label>
                    <input id="u-name" name="username" value="<?php echo $username;?>" type="text" autocomplete="off">
                </div>
                
                <div class="input-group">
                    <label for="u-email">Email</label>
                    <input id="u-email" name="email" value="<?php echo $email; ?>" type="email" autocomplete="off">
                </div>
                
                <div class="input-group">
                    <label for="u-password">Password</label>
                    <input id="u-password" name="password" type="password">
                </div>

                    <div>
                        <?php if (isset($admin) && $admin == 1 ): ?>
                            <input type="checkbox" name="admin" id="published"  class="pub-label" checked>
                            <label for="published" class="pub-label">Admin</label>
                        <?php else: ?>
                            <input type="checkbox" name="admin" id="published"  class="pub-label" >
                            <label for="published" class="pub-label">Admin</label>
                        <?php endif; ?>
                    </div>

                    <div class="input-group">
                        <button type="submit" name="create-admin" class="btn">Add User</button>
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

  <script src="../../script.js" type="text/javascript"></script>
<!--//scripts  -->
</body>
</html>
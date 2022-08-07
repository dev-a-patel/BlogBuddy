<?php include("C:/xampp/htdocs/blogbuddy/app/controllers/users.php"); 

$prof = selectOne('users',['id'=>$_SESSION['id']]);

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"content="width=device-width,initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible"content="ie-edge">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://fonts.googleapis.com/css2?family=Jost&family=Montserrat&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="assets/css/newstyle.css">
  <link rel="stylesheet" type="text/css" href="assets/css/profile-style.css">
  <title>BlogBüddy</title>
</head>
<body>
    <?php include("C:/xampp/htdocs/blogbuddy/app/includes/userHeader.php"); ?>


    <!-- profile-cont -->
    <div class="profile-cont">
        <div class="page-wrap">
            <!-- BRAND -->
            <div class="brand-cont">
                <span class="brand">Your Profile</span>
            </div>
            <!-- // BRAND -->
            
            <?php include("C:/xampp/htdocs/blogbuddy/app/helpers/formErrors.php"); ?>
        
            <!-- FORM -->
            <div class="form-wrap">
                <form action="register.php" class="form">
                    <div class="input-group">
                        <label for="u-name" class="form-label">   User Name :</label>
                        <div class="value"><?php echo $prof['username'];?></div>
                    </div> 
                    
                    <div class="input-group">
                        <label for="u-email" class="form-label" >Email :</label>
                        <div class="value"><?php echo $prof['email'];?></div>

                    </div>
                    
                    <div class="input-group">
                        <label for="u-password" class="form-label">User Type:</label>
                        <div class="value"><?php if($_SESSION['admin']!=1){echo "User";} else {echo "Admin";} ?></div>
                    </div>
                    
                    <div class="input-group">
                        <a style="display:block; text-align:center" id="reg-btn" name="register-btn" class="form-button" href="index.php" >Home</a>
                    </div>
                </form>
            </div>
            <!-- // FORM -->

        </div>
    
    </div>

</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer">
</script>

<script src="assets/js/script.js" type="text/javascript"></script>
</html>
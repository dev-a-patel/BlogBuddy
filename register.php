<?php include("C:/xampp/htdocs/blogbuddy/app/controllers/users.php"); 
    guestsOnly();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/form-style.css">
    <title>Sign-Up to BlogBuddy</title>
    <style>
        * {
        margin: 0px;
        padding: 0px;
        box-sizing: border-box;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body{
            display: grid;
            place-items: center;
            width: 100%;    
            height:100vh;
            background-color: #e4e4e4da;
        }

        .page-wrap {
        min-width: 250px;
        border-radius: 10px 10px 10px 10px ;
        background-color: #fff;
        }

        .brand-cont{
        border-radius: 10px 10px 0px 0px ;
        background-color: rgba(0, 128, 128, 0.626);
        display: flex;
        justify-content: center;
        align-items: center;
        padding:8px;
        }

        .brand{
        text-align: center;
        font-weight: 600;
        font-size: 1.3rem;
        }

        .input-group {
        position: relative;
        margin:20px 15px;
        }

        .form-label {
        position: absolute;
        top: 0.53rem;
        left: 1.4rem;
        transition: all 0.25s;
        }

        .form-input {
        width: 100%;
        padding: 10px;
        border: 1px solid green;
        border-radius: 4px;
        color: #000;
        background-color: white;
        outline: none;
        font-size: 0.9rem;
        }  

        .invalid{
        display: block;
        visibility: hidden;
        color:red;
        font-size: 0.6rem;
        text-align: right;
        padding-top: 2px;
        }

        .form-input:focus ~ .form-label,
        .form-input:not(:placeholder-shown).form-input:not(:focus) ~.form-label
        {
        top:-0.45rem;
        left:0.7rem;
        font-size: 0.7rem;
        color: teal;
        padding-inline: 5px;
        background-color: white;
        }

        .form-button{
        width: 100%;
        align-items: center;
        padding: 3px;
        cursor: pointer;
        border: none;
        color:rgba(0, 128, 128, 0.626) ;
        border-radius: 4px;
        font-weight: 500;
        font-size: 0.9rem;
        box-shadow: 0px 0px 2px black;
        transition: all 0.23s;
        }

        .form-button:hover{
        color: #fff;
        background-color:rgba(0, 128, 128, 0.626) ;
        font-weight: 400;
        box-shadow: 0px 0px 2px teal;
        }

        .or-cont{
        display: flex;
        justify-content: space-evenly;
        padding: 0px 20px 20px 20px;
        font-size: 0.85rem;
        }
    </style>
</head>

<body>
    <div class="page-wrap">
        <!-- BRAND -->
        <div class="brand-cont">
            <span class="brand">Sign-Up</span>
        </div>
        <!-- // BRAND -->
        
        <?php include("C:/xampp/htdocs/blogbuddy/app/helpers/formErrors.php"); ?>
    
        <!-- FORM -->
        <div class="form-wrap">
            <form action="register.php" name="Register" class="form" method="POST" onsubmit="return check()">
                <div class="input-group">
                    <input id="u-name" name="username" class="form-input" autocomplete ="off" placeholder=" " type="text" style="border:1px solid teal;">
                    <label for="u-name" class="form-label">Name</label>
                    <div class="invalid">&#9432; Username is too short!</div>
                </div>
                
                <div class="input-group">
                    <input id="u-email" name="email" class="form-input" autocomplete="off" placeholder=" " type="text" novalidate>
                    <label for="u-email" class="form-label" >Email</label>
                    <div class="invalid">&#9432; Invalid email!</div>
                </div>
                
                <div class="input-group">
                    <input id="u-password" name="password" class="form-input" placeholder=" " type="password">
                    <label for="u-password" class="form-label">Password</label>
                    <div class="invalid">&#9432; Password is too weak!</div>
                </div>
                
                <div class="input-group">
                    <button type="submit" id="reg-btn" name="register-btn" class="form-button" >Sign-Up</button>
                </div>
            </form>
        </div>
        <!-- // FORM -->

        <!-- OR -->
        <div class="or-cont">
            <span class="or-text">Already a User?</span>
            <a href="login.php" target="_self" rel="noreferrer" class="or-link">Sign-In</a>
        </div>
        <!-- // OR -->
    </div>

    <script type="text/javascript" src="assets/js/validate.js"></script>
</body>
</html>


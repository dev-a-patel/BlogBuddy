<header class="header">

    <div class="logo">
      <a href="index.php"><h1 class="logo-text"><span class="logo-name">Blog</span><span class="logo-name">Büddy</span></h1></a>
    </div>
    <ul class="nav">
      <li  class="nav-tab"><a class="nav-tab-li" href="index.php"> Home </a></li>
      
      <?php if (isset($_SESSION['id'])){?>
        
        
        <!-- <?php //if ($_SESSION['admin']): ?> -->
          <li  class="nav-tab"><a class="nav-tab-li" href="admin/post/index.php"> Manage </a></li>
        <!-- <?php //endif;?> -->

        <li  class="nav-tab"><a class="nav-tab-li" href="logout.php"> Logout </a></li>
        
        <li  class="nav-tab"><a class="nav-tab-li" href="profile.php">
        <i class="fa-solid fa-user"></i> 
          <?php echo $_SESSION['username']; ?>
        </a></li>

      <?php } else { ?>
        <li  class="nav-tab"><a class="nav-tab-li" href="register.php"> Sign-Up </a></li>
        <li  class="nav-tab"><a class="nav-tab-li" href="login.php"> Login </a></li>
      <?php } ?>
    </ul>
    <i  class="fa fa-bars menu-toggle"></i>
    
</header>
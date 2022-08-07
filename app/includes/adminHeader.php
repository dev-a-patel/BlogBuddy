<header class="header">
    <div class="logo">
      <a href="http://localhost:9999/blogbuddy/index.php"><h1 class="logo-text"><span class="logo-name">Blog</span><span class="logo-name">Büddy</span></h1></a>
    </div>
    <ul class="nav">
      <li  class="nav-tab"><a class="nav-tab-li" href="http://localhost:9999/blogbuddy/logout.php"> Logout </a></li>
      
      <li  class="nav-tab"><a class="nav-tab-li" href="http://localhost:9999/blogbuddy/profile.php">
      <?php if ($_SESSION['admin']):?>
      <i class="fa-solid fa-user-gear"></i> 
      <?php else:?>
      <i class="fa-solid fa-user"></i> 
      <?php endif;?>
      <?php echo $_SESSION['username']; ?>
      </a></li>
    </ul>
    <i  class="fa fa-bars menu-toggle"></i>
</header>
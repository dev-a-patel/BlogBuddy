<div class="left-sidebar">
<ul class="manage-list">
    <li class="list-item"><a href="http://localhost:9999/blogbuddy/admin/post/index.php">Manage Posts</a></li>
    <?php if($_SESSION['admin']):?>
    <li class="list-item"><a href="http://localhost:9999/blogbuddy/admin/user/index.php">Manage Users</a></li>
    <?php endif;?>
    <li class="list-item"><a href="http://localhost:9999/blogbuddy/admin/topic/index.php">Manage Topics</a></li>
</ul>
</div>
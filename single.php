<?php 
include("C:/xampp/htdocs/blogbuddy/app/controllers/posts.php"); 

$p = array();
$likes = array();
$reacts = array();
$id = $_GET['id'];

if (!empty($_SESSION)) {
  $u_id = $_SESSION['id'];
  $u_name = $_SESSION['username'];
} 
else {
  $u_id = '';
  $u_name = '';
}



if (isset($id)) {
  $p = selectOne('posts', ['id' => $id, 'published' => 1]);
  $viewedBy = $p['views'];
  $viewedBy++;
  update('posts', $id, ['views' => $viewedBy]);
}

$five = select('posts', ['published' => 1], 4);

if (($u_id != '') || ($u_id != 0) ) {
  $likes = selectOne('likes',['post_id' => $id, 'user_id' => $u_id]);
  $reacts = selectOne('reactions',['post_id' => $id, 'user_id' => $u_id]);
}

else {
  $likes = selectOne('likes',['post_id' => $id]);
}



if(isset($_POST['like-btn']) && ($u_id != '') && ($u_id != 0) )
{
  
  if( (empty($likes['post_id']) && empty($likes['user_id'])) && empty($likes['liked']))
  {
    create('likes', ['post_id' => $id , 'user_id' => $u_id , 'username' => $u_name , 'liked' => 1 ]);
    ++$p['likes'];
    $p['likes'];
    update('posts', $id, ['likes' => $p['likes']]);
    $viewedBy = $p['views'];
    --$viewedBy;
    update('posts', $id, ['views' => $viewedBy]);
    header("location: "."http://localhost:9999/blogbuddy/single.php?id=".$id);
    
  }
  
  elseif((!empty($likes['post_id']) && !empty($likes['user_id'])) && $likes['liked'] == 0  )
  {
    update('likes', $likes['id'], ['liked' => 1]);
    ++$p['likes'];
    $p['likes'];
    update('posts', $id, ['likes' => $p['likes']]);
    $viewedBy = $p['views'];
    --$viewedBy;
    update('posts', $id, ['views' => $viewedBy]);
    header("location: "."http://localhost:9999/blogbuddy/single.php?id=".$id);
  }
  
  elseif(( !empty($likes['post_id']) && !empty($likes['user_id'])) && $likes['liked'] == 1)
  {
    update('likes', $likes['id'], ['liked' => 0]);
    --$p['likes'];
    $p['likes'];
    update('posts', $id, ['likes' => $p['likes']]);
    $viewedBy = $p['views'];
    --$viewedBy;
    update('posts', $id, ['views' => $viewedBy]);
    header("location: "."http://localhost:9999/blogbuddy/single.php?id=".$id);
  }
}


if(isset($_POST['react']) && ($u_id != '') && ($u_id != 0) )
{
  
  if( (empty($reacts['post_id']) && empty($reacts['user_id'])) && empty($reacts['react']))
  {
    create('reactions', ['post_id' => $id , 'user_id' => $u_id , 'username' => $u_name , 'react' => $_POST['react'] ]);
    $viewedBy = $p['views'];
    --$viewedBy;
    update('posts', $id, ['views' => $viewedBy]);
    header("location: "."http://localhost:9999/blogbuddy/single.php?id=".$id);
    
  }
  
  elseif((!empty($reacts['post_id']) && !empty($reacts['user_id'])) )
  {
    update('reactions', $reacts['id'], ['react' => $_POST['react']]);
    $viewedBy = $p['views'];
    --$viewedBy;
    update('posts', $id, ['views' => $viewedBy]);
    header("location: "."http://localhost:9999/blogbuddy/single.php?id=".$id);
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"content="width=device-width,initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible"content="ie-edge">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://fonts.googleapis.com/css2?family=Jost&family=Montserrat&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="assets/css/single-style.css">
  <title>
      <?php if (strlen($p['title'])>40) :?>
      <?php echo substr($p['title'],0,37)."..."; ?>
      <?php else:?>
      <?php echo $p['title']; ?>
      <?php endif;?>
  </title>
  <style>
      header{
        width:100%;
        position:sticky;
        top:0px;
        z-index:1;
      }
      .post-imps {
        margin: 20px 20px 15px 4px ;
        font-size: 0.8rem;
      }

      .fa-thumbs-up{
        font-size: 1.18rem;
        color: grey;
        border: none;
        background: transparent;
      }

      #like-btn{
        width: 30px;
        height: 30px;
        border:none;
        border-radius:50%;
        transition: all 0.2s;
      }
      
      #like-btn:hover{
        
        background-color: white;
        box-shadow: 0px 0px 1px 1px skyblue;
      }
      
      #like-btn:hover .fa-thumbs-up{
        cursor: pointer;
        color: skyblue;
        transform: scale(1.2,1.2);
      }

      .react-form{
        margin-top:5px;
      }
      button.react {
            width:30px;
            height:30px;
            margin:10px 0px;
            transition: all 0.2s;
            border-radius: 50%;
            border:none;
            background-color: lightcyan;
        }
        
        button.react:hover{
            transform: scale(1.3,1.3);
            cursor:pointer;
            border-radius: 50%;
            background-color: skyblue;
        }

        .emoji
        {
          font-size:1rem;
        }
  </style>
</head>

<body>
  <!-- nav -->
  <?php include("C:/xampp/htdocs/blogbuddy/app/includes/userHeader.php"); ?>

  <!-- //nav -->

  <div class="single-wrap">

    <!-- SINGLE Post -->
    <div class="single-post">
      <h2 class="single-head"><?php echo $p['title']; ?></h2>
      <div class="info-cont">
        <span class="auth-name">~ <i class="fa-regular fa-user"></i> <?php echo $p['username']; ?></span>
        <span class="pub-date"><i class="fa-regular fa-clock illust"></i> <?php echo date('F j, Y',strtotime($p['created_at']));?></span>
      </div>
      <div class="text-cont">
        <img src="<?php echo 'http://localhost:9999/blogbuddy/assets/dbimgs/'.$p['image']; ?>" alt="" class="single-image">
        <!-- <p class="text-para"> -->
          <?php echo html_entity_decode($p['body']); ?>
        <!-- </p> -->
      </div>
      <div class="post-imps">
        <form method="post" >
          <span class="post-likes">
          <?php if(($u_id != 0) && ($u_id != '')):?>
              <button id="like-btn" name="like-btn" type="submit" width="100%" onclick="clicked()">
                  <i class="fa-solid fa-thumbs-up like" id="like-icon" style="color:<?php if($likes['liked'] == 1){echo 'rgba(13, 99, 175, 0.804)';} else{echo 'grey';}?>" >
                  </i>
                </button> 
                <?php else:?>
                  <!-- <span class="post-likes"> -->
                    <i class="fa-regular fa-thumbs-up" ></i>&nbsp;
                  <!-- </span> -->
                  <?php endif;?>
                  <b><?php echo $p['likes']; ?></b>
                </span>
              </form>
              
              <?php if(($u_id != 0) && ($u_id != '')):?>
                <form name="reaction" action="#" method="post" class="react-form">
                  <button class="react" name= "react" value="heart" style="background-color:<?php if ($reacts['react'] == "heart") {
                    echo "skyblue";} else { echo "lightcyan";}
                    ?>"><span class="emoji" id="heart">💖</span></button>
                  <button class="react" name= "react" value="bulb" style="background-color:<?php if ($reacts['react'] == "bulb") {
                    echo "skyblue";} else { echo "lightcyan";}
                    ?>"><span class="emoji" id="bulb">💡</span></button>
                  <button class="react" name= "react" value="clap" style="background-color:<?php if ($reacts['react'] == "clap") {
                    echo "skyblue";} else { echo "lightcyan";}
                    ?>"><span class="emoji" id="clap">👏🏻</span></button>
                  <button class="react" name= "react" value="agree" style="background-color:<?php if ($reacts['react'] == "agree") {
                    echo "skyblue";} else { echo "lightcyan";}
                    ?>"><span class="emoji" id="agree">💯</span></button>
                  <button class="react" name= "react" value="wow" style="background-color:<?php if ($reacts['react'] == "wow") {
                    echo "skyblue";} else { echo "lightcyan";}
                    ?>"><span class="emoji" id="wow">😍</span></button>
                </form>
              <?php endif;?>
      </div>
    </div>
    
    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Popular -->
      <div class="popular">
        <h2 class="popular-title">Other Posts</h2>
        <?php foreach($five as $post):?>
          <div class="pop-post">
            <img src="<?php echo 'http://localhost:9999/blogbuddy/assets/dbimgs/'.$post['image'];?>" alt="" class="pop-image">
            <a href="single.php?id=<?php echo $post['id']; ?>" target="_blank" class="pop-name">
              <?php if (strlen($post['title'])>50) :?>
              <?php echo substr($post['title'],0,47)."..."; ?>
            <?php else:?>
              <?php echo $post['title']; ?>
            <?php endif;?>
          </a>
          </div>
          <?php endforeach;?>
        </div>
      <!-- // popular -->

      <!-- Topics -->
      <div class="topics">
        <h2 class="topic-title">Topics</h2>
        <ul class="topic-list">
          <?php foreach($topics as $key => $topic): ?>
          <li><a href="index.php<?php echo '?t_id='.$topic['id'].'&t_name='.$topic['name']; ?>"><?php echo $topic['name']; ?></a></li>
        <?php endforeach; ?>
        </ul>
      </div>
      <!-- // Topics -->

    </div>
    <!-- // Sidebar -->
  </div>
<!-- // single post -->

<?php if(isset($_POST['react'])){dd($_POST);} ?>
  <!-- SCRIPTS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer">
    </script>

<script src="assets/js/script.js" type="text/javascript"></script>
  <script type="text/javascript">
    
    var _like = document.getElementById("like-icon").style;
    
    function clicked()
    {
        if(_like.color === "rgba(13, 99, 175, 0.804)")
        {
          _like.color = "grey";
          x=0;
          console.log(_like.color,", Unset : ",x);
        }

        else
        {
          _like.color = "rgba(13, 99, 175, 0.804)";
          x =1 ;
          console.log(_like.color,", Liked : ",x);
        }
    }

  </script>
  <!-- // Scripts -->

</body>
</html>
  
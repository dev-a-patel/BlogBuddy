<?php 
// include("C:/xampp/htdocs/blogbuddy/app/database/db.php");
include("C:/xampp/htdocs/blogbuddy/app/controllers/topics.php"); 

$posts = array();
$postsTitle = 'Recent Posts';
$term = '';
$count = '';
$three = mostLiked('posts', ['published' => 1], 3);
// $recent = recent('posts', ['published' => 1], 3);

if (isset($_POST['search-term']) && ($_POST['search-term']!= '')) 
{
  $term = $_POST['search-term'];
  $posts = searchPosts($term);
  
  if (!empty($posts)) {
    $postsTitle = "You Searched for '". $term ."'";
  } 
  else {
    $postsTitle = "Sorry!! No Results for '". $term ."'";
  }
  unset($_POST['search-term']);
  unset($term) ;  
} 

elseif (isset($_GET['t_id'])) {
    $posts = byTopic($_GET['t_id']);
    $topic_name = $_GET['t_name'];
    
    if (!empty($posts)) {
      $postsTitle = "Posts Related to Topic : <i>'". $topic_name."'</i>" ;
    } 
    else {
      $postsTitle = "Sorry!! No Post for Topic : <i>'". $topic_name."'</i>";
    }
    unset($_GET['t_id']);
}

else{
  $count = $count;
  $posts = recent('posts', ['published' => 1], $count);
}

// dd($three);
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
  <title>BlogBüddy</title>

  <style>

      header{
        width:100%;
        position:sticky;
        top:0px;
        z-index:1;
      }
      .slide-post{
          width: 33%;
          height: 340px;
          border-radius: 7px;
          min-width:180px;
          background-color: #e4e4e4;
          transition: all 0.7s;
      }

      .page-wrapper{
        width:100%;
        height:400px;
        margin-bottom: 20px;
      }

      .post-info h4{
        text-align:justify;
        min
        padding:8px 10px;
      }

      .post-imps .post-likes{
          padding: 0px 15px;
          font-size: 0.8rem;
      }

      .post-imps .post-views{
        float: right;
        padding: 4px 15px;
        font-size: 0.8rem;
        font-style: italic;
      }
      
      .post-info .post-date{
        /* float: right; */
        padding: 4px 15px;
        font-size: 0.8rem;
        font-style: italic;
      }
          
      .main-content .post{
        max-width:900px;
        margin:auto;
        margin-bottom: 20px;

      }
      .post-preview h4{
          text-align: justify;
      }

      /* .post-preview span{
       
        } */
        
        .post-preview .post-auth{
          font-size: 0.8rem;
          margin:7px 0px;
          display: block;
        }
        
        .post-preview {
          margin-left: 1.5rem;
          flex: 6;
        }
        .img-wrapper{
          /* flex:4; */
          margin-right:10px;
          display: flex;
          width:fit-content;
        }
        
        .img-wrapper .post-image
        {
          margin:auto;
        }
        .post-preview div,
        .post-preview .btn.readmore{
          width:100%;
          margin-left: 0rem;
          display:block;          
        }

        .post-preview .post-date{
          /* display: inline; */
          margin: 0px;
          padding: 0px;
          /* font-style: italic; */
          font-size: 0.8rem;
        }
        
        .post-preview .post-views{
        /* display: inline; */
        float: right;
        margin: 0px;
        padding-right: 15px;
        padding-top: 2px;
        font-size: 0.8rem;
      }

      .post-preview p{
        display: block;
        font-size:0.9rem;
          font-style: normal;
          line-height: 1.2rem;
          padding: 7px 0px;
          text-align: justify;
          word-wrap: break-word;
        }
        
        .post-preview .readmore{
          margin-top: 10px;
          
      }

    @media only screen and (max-width:750px)
    {
        header{
            position: relative;
        }
        
        .menu-toggle{
            display:block;
            padding:8px 10px;
            font-size: 1.2rem;
            margin-right: 5px;
        }

        .menu-toggle:hover{
            background-color: black;
            color: white;
            border-radius: 50%;
            padding: 8px 10px ;
            transition: all 0.3s;
        }
        
        .nav{
            position: absolute;
            left: 0px;
            top:55px;
            flex-direction: column;
            width:100%;
            max-height: 0px;
            overflow: hidden;
            background-color: var(--pri-col);
            z-index: 1;
        }

        .showing{
            max-height: 100em;
        }
        
        .nav-tab{
            width:97%;
        }
        
        .nav-tab:hover{
            padding-left: 25px;
        }

        .nav-tab-li{
            display: block;
        }

        #slide-post-3{
            display: none;
        }
        
        .post-slider .slide-post{
            width:fit-content;
        }

        .post-wrapper{
            margin:auto;
            display: flex;
            justify-content: center;
        }
            
        .post-slider{
            width: 100%;
        }

        .content{
            display: flex;
            flex-direction: column;
            flex-wrap: wrap;
            flex-shrink: inherit;
        }

        .main-content{
            padding: 20px 0px 0px 0px;
        }

        .main-content .post{
            margin-bottom: 20px;
            width: fit-content;
        }

        .sidebar{
            flex-direction: row;
            width:90vw;
            margin: auto;
            justify-content: space-between;
            padding: 20px;
        }

        .sidebar .search, .sidebar .topics{
            width: 45%;
        }
    }

    @media only screen and (max-width:580px)
    {
        .post-wrapper{
            width:97%;
            justify-content: center;
            padding:0 7vw;
        }
            
        #slide-post-2{
            display:none;
        }

        #slide-post-1{
            min-width:230px;
        }

        .content{
            word-wrap: break-word;
        }
        .main-content{
            padding: 20px 0px 0px 0px;
            margin: 10px 0px;

        }

        .main-content .post{
            flex-direction: column;
        }
        
        .img-wrapper{
            margin-bottom: 25px;
            margin-right: 0px;
        }

        .post-image{
            width:80vw;
            margin-bottom:7px
        }

        .post-preview{
            max-width:250px;
            margin-left:0px;
        }

        .sidebar{
            flex-direction: column;
            width:90vw;
            justify-content: space-between;
            padding: 12px;
        }

        .sidebar .search, .sidebar .topics{
            width: 100%;
        }
    }
  </style>

</head>

<body>
  <!-- nav -->
  <?php include("C:/xampp/htdocs/blogbuddy/app/includes/userHeader.php"); ?>

  <!-- // nav -->

  <?php include("C:/xampp/htdocs/blogbuddy/app/includes/messages.php"); ?>

  <div class="page-wrapper">
    <!-- Post Slider -->
    <h1 class="slider-title">Trending Posts</h1>
    <div class="post-slider">

      <div class="post-wrapper">

        <?php foreach ($three as $key => $post): ?>
          
          <div class="post slide-post"  id="slide-post-<?php echo $key+1;?>">
            <img src="<?php echo 'http://localhost:9999/blogbuddy/assets/dbimgs/'.$post['image']; ?>" alt="" class="slider-image">
            <div class="post-info">
              <h4><a href="single.php?id=<?php echo $post['id']; ?>">
                  <?php if (strlen($post['title'])>45) :?>
                    <?php echo substr($post['title'],0,42)."..."; ?>
                  <?php else:?>
                    <?php echo $post['title']; ?>
                  <?php endif;?>
              </a></h4>
              <span class="post-auth"><i class="fa-regular fa-user"></i>&nbsp;<?php echo $post['username']; ?></span>
              <!-- &nbsp;
              <span class="post-date"><i class="fa-regular fa-clock"></i> &nbsp; <?php //echo date('F j, Y',strtotime($post['created_at']));?></span> -->
            </div>
            <div class="post-imps">
              <span class="post-likes"><i class="fa-regular fa-thumbs-up"></i>&nbsp;<?php echo $post['likes']; ?></span>
              &nbsp;
              <span class="post-views"><i class="fa-regular fa-eye"></i>&nbsp;<?php echo $post['views'];?></span>
            </div>
          </div>
         
        <?php endforeach; ?>
          
        </div> 

      </div>
    </div>
  </div>
  <!-- // page-wrapper -->

  <!-- content -->
  <div class="content clearfix">
    <div class="main-content">
        <h1 class="recent-post-title"><?php echo $postsTitle; ?></h1>
        <?php foreach ($posts as $key => $p): ?>
          <div class="post">
            <div class="img-wrapper">
              <img src="<?php echo 'http://localhost:9999/blogbuddy/assets/dbimgs/'.$p['image']; ?>"alt=""class="post-image">
            </div>
            <div class="post-preview">
              <h4><a href="single.php?id=<?php echo $p['id']; ?>"> <?php echo $p['title'];?></a></h4>
              <span class="post-auth"><i class="fa-regular fa-user"></i>&nbsp; <?php echo $p['username']; ?></span>
              <!-- &nbsp; -->
              <div>
                <span class="post-date"><i class="fa-regular fa-clock"></i> <?php echo date('F j, Y',strtotime($p['created_at']));?></span>
                <span class="post-views"><i class="fa-regular fa-eye"></i>&nbsp;<?php echo $p['views'];?></span>
              </div>
                  <?php echo html_entity_decode(substr($p['body'],0,130)."...");?>
              <a href="single.php?id=<?php echo $p['id']; ?>" class="btn readmore"> Read More </a>
            </div>
          </div>
        <?php endforeach; ?>
      
      <div class="post" style="display:none;">
        <div class="img-wrapper">
          <img src="assets/images/kali.png"alt=""class="post-image">
        </div>
        <div class="post-preview">
          <h4><a href="single.hmt1"> The strongest and sweetest songs yet remain to be sung </a></h4>
          <span class="post-auth">Writer</span>
          &nbsp;
          <span class="post-date">Mar 11,2019</span>
          <p class="preview-text">
            Lorem ipsum dolor sit amet consectetur,adipisicing elit.
            Exercitationem optio possimusainventore maxime laborum.
          </p>
          <a href="single.php" class="btn readmore"> Read More </a>
        </div>
    </div>
  </div>
  <!-- //content -->

  <!-- SIDE-BAR -->
  <div class="sidebar">

    <div class="section search">
      <h1 class="section-title">Search</h1>
      <form action="index.php" method="post">
        <input type="text" name="search-term" id="search-term" class="text-input"  autocomplete="off" placeholder="Search...">
      </form>
    </div>

    <div class="section topics">
      <h1 class="section-title">Topics</h1>
      <ul class="topic-list">
      <?php foreach($topics as $key => $topic): ?>
        <li><a href="index.php<?php echo '?t_id='.$topic['id'].'&t_name='.$topic['name'];?>"><?php echo $topic['name']; ?></a></li>
      <?php endforeach; ?>        
      </ul>
    </div>
  </div>
  <!-- //Side-bar -->
  
  <!-- SCRIPTS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer">
  </script>

  <script src="assets/js/script.js" type="text/javascript"></script>
  <!--//scripts  -->

</body>
</html>
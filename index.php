<?php 
//connection File 
require_once('includes/config.php');
$categoryArray = $user->getCategory();
 include("head.php");
?>

<title>My Blog</title>
<?php include("header.php"); ?>

<div class="container">
  <div class="content">
   
      <?php
          try {   
                //selecting data by id
                if(isset($_GET['catId'])){
                  if($_GET['catId'] !=''){
                    $stmt = $db->query('SELECT articleId, articleTitle,articleDescription, cdate FROM blog_post WHERE catId = '.$_GET['catId'].' ORDER BY articleId DESC LIMIT 3');
                  } 
                }else{
                  $stmt = $db->query('SELECT articleId, articleTitle,articleDescription, cdate FROM blog_post ORDER BY articleId DESC LIMIT 3');
                }
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
                if(!empty($result)){
                  foreach ($result as $key => $row) {
                      echo '<div id="'.$row['articleId'].'">';
                      echo '<h1><a href="show.php?id='.$row['articleId'].'">'.$row['articleTitle'].'</a></h1>';
                      echo '<hr>';
                      echo '<p>Posted on '.date('jS M Y', strtotime($row['cdate'])).'</p>';
                      echo '<p>'.$row['articleDescription'].'</p>';                
                      echo '<p><button class="readbtn"><a href="show.php?id='.$row['articleId'].'">Read More</a></button></p>';                
                    echo '</div>';
                  }
                }else{
                  echo "no blog are avalable for this category";
                }
          
            }catch(PDOException $e) {
              echo $e->getMessage();
            }
      ?> 
  </div>
</div>
<div class="loader"style="display: none;"></div>

<?php include("footer.php");  ?>
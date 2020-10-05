<?php

	require_once('../../includes/config.php');
	$limit = PAGINATIONLIMIT;

	$retunArray = array();

	$page_no = $_GET['page_no'];
	$offset = ($page_no - 1) *$limit;

	if(isset($_GET['catId'])){

		$stmt = $db->query("SELECT articleId, articleTitle,articleDescription, cdate FROM blog_post WHERE catId='".$_GET['catId']."'  ORDER BY articleId DESC LIMIT $offset,$limit");
	}else{
		$stmt = $db->query("SELECT articleId, articleTitle,articleDescription, cdate FROM blog_post ORDER BY articleId DESC LIMIT $offset,$limit");
	}

   	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

   	foreach ($result as $key => $row){

   		echo '<div id="'.$row['articleId'].'"><h1><a href="show.php?id='.$row['articleId'].'">'.$row['articleTitle'].'</a></h1><hr><p>Posted on '.date('jS M Y', strtotime($row['cdate'])).'</p><p>'.$row['articleDescription'].'</p><p><button class="readbtn"><a href="show.php?id='.$row['articleId'].'">Read More</a></button></p></div>';
   	}
?>

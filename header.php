<link href="admin/assets/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
require_once('includes/config.php');
$categoryArray = $user->getCategory();

?>
<div class="navbar">
  <a href="http://localhost/myblog/">Home</a>
  <div class="dropdown">
    <button class="dropbtn">Category 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <?php
      if($categoryArray != ''){
      	foreach ($categoryArray as $key => $value) {
      		echo '<a href="?catId='.$value['catId'].'">'.$value['catName'].'</a>';
      	}
      }
      ?>
    </div>
  </div> 
</div>
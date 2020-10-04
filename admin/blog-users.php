<?php
//include connection file 
require_once('../includes/config.php');

//check logged in or not 
if(!$user->is_logged_in()){ header('Location: login.php'); }

// add / edit page
if(isset($_GET['deluser'])){

  if($_GET['deluser'] !='1'){

    $stmt = $db->prepare('DELETE FROM blog_users WHERE userId = :userId') ;
    $stmt->execute(array(':userId' => $_GET['deluser']));

    header('Location: blog-users.php?action=deleted');
    exit;

  }
} 

?>

<?php include("head.php");  ?>
  <title>Users-My Blog</title>
  <script language="JavaScript" type="text/javascript">
  function deluser(id, title)
  {
    if (confirm("Are you sure you want to delete '" + title + "'"))
    {
      window.location.href = 'blog-users.php?deluser=' + id;
    }
  }
  </script>
  <?php include("header.php");  ?>

  <div class="content">
   <?php 
    //show message from add / edit page
    if(isset($_GET['action'])){ 
      echo '<h3>User '.$_GET['action'].'.</h3>'; 
    } 
    ?>

    <table>
    <tr>
      <th>Username </th>
      <th>Email </th>
      <th>Edit </th>
      <th>Delete </th>
    </tr>
     <?php
      try {

        $stmt = $db->query('SELECT userId, username, email FROM blog_users ORDER BY userId');
        while($row = $stmt->fetch()){
          
          echo ' <tr class="main">';
          echo ' <td class="username">'.$row['username'].' </td>';
          echo ' <td class="email">'.$row['email'].' </td>';
          ?>
          <td>
            <button class="editbtn" data-toggle="modal" data-target="#editmyModal" userId="<?php echo $row['userId'];?>">Edit</button>
            <?php if($row['userId'] != 1){?>
            </td>
            <td><button class="delbtn"><a userId="<?php echo $row['userId'];?>" href="javascript:deluser('<?php echo $row['userId'];?>','<?php echo $row['username'];?>')">Delete</a></button>
            <?php } 
            ?>
          </td>
          <?php 
          echo '</tr>';
        }
      }catch(PDOException $e) {
        echo $e->getMessage();
      }
    ?>
    </table>
    <!-- <p><button class="editbtn"><a href='add-blog-user.php'>Add User</a></button></p> -->
    <button type="button" class="editbtn" data-toggle="modal" data-target="#myModal">Add User</button>

    <!-- for add user -->
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Add New User</h4>
          </div>
          <div class="modal-body">
            <form action="" method="post">
                <p><label>Username</label><br>
                <input type="text" id="username" name="username" value=""></p>

                <p><label>Password</label><br>
                <input type="password" id="password" name="password" value=""></p>

                <p><label>Confirm Password</label><br>
                 <input type="password" id="confirm_pass" name="passwordConfirm" value=""></p>

                <p><label>Email</label><br>
                <input type="text" id="email" name="email" value=""></p>
            </form>
          </div>
          <div class="modal-footer">
            <button name="submit" class="subbtn">Add User</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>

    <!-- for edit user -->
    <div id="editmyModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit User</h4>
          </div>
          <div class="modal-body">
            <form action="" method="post">
                <input type="hidden" name="" id="edituserId" value="">
                <p><label>Username</label><br>
                <input type="text" id="editusername" name="username" value=""></p>

                <p><label>Password</label><br>
                <input type="password" id="editpassword" name="password" value=""></p>

                <p><label>Confirm Password</label><br>
                 <input type="password" id="editconfirm_pass" name="passwordConfirm" value=""></p>

                <p><label>Email</label><br>
                <input type="text" id="editemail" name="email" value=""></p>
            </form>
          </div>
          <div class="modal-footer">
            <button name="submit" class="edit subbtn">Update User</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>

  </div>

<?php include("footer.php");  ?>
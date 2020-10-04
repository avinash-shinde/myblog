<?php
require_once('../../includes/config.php');

$returnArray = array();
$error = 1;
$msg = 'somthing went wrong';

try{
	if($_POST['isAjax'] == 1){
		$userId = isset($_POST['userId']) ? $_POST['userId'] : '';
		$username = isset($_POST['username']) ? $_POST['username'] : '';
		$password = isset($_POST['password']) ? $_POST['password'] : '';
		$email = isset($_POST['email']) ? $_POST['email'] : '';

		$stmt = $db->prepare('UPDATE blog_users SET username = :username, password = :password, email = :email WHERE userId = :userId') ;
        $stmt->execute(array(
            ':username' => $username,
            ':password' => md5($password),
            ':email' => $email,
            ':userId' => $userId
        ));
        $error = 0;
		$msg = 'User Updated';
		$returnArray['error'] = $error;
		$returnArray['msg'] = $msg;
		echo json_encode($returnArray);die();

	}else{
		$returnArray['error'] = $error;
		$returnArray['msg'] = $msg;
		echo json_encode($returnArray);die();
	}
}catch(PDOException $e){
	$returnArray['error'] = 1;
	$returnArray['msg'] = $e->getMessage();
	echo json_encode($returnArray);die();
}
?>
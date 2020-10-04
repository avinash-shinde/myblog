<?php
require_once('../../includes/config.php');

$returnArray = array();
$error = 1;
$msg = 'somthing went wrong';

try{
	if($_POST['isAjax'] == 1){
		$username = isset($_POST['username']) ? $_POST['username'] : '';
		$password = isset($_POST['password']) ? $_POST['password'] : '';
		$email = isset($_POST['email']) ? $_POST['email'] : '';

		$stmt = $db->prepare('INSERT INTO blog_users (username,password,email) VALUES (:username, :password, :email)') ;
        $stmt->execute(array(
            ':username' => $username,
            ':password' => $password,
            ':email' => $email
        ));
        $error = 0;
		$msg = 'User Added';
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

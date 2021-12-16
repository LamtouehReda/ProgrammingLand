<?php 
session_start();
include'connect.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
	$username=trim(strip_tags($_POST['username']));
	$password=trim(htmlspecialchars($_POST['password']));

	$stmt=$connect->prepare("SELECT * FROM users WHERE username LIKE :username");
	$stmt->bindParam(':username',$username);
	$stmt->execute();
	$result=$stmt->fetch();
	if($stmt->rowCount()>0){
		if(password_verify($password,$result['password'])==1){
			echo 'OK';
			$_SESSION['user_id']=$result['id'];
			$_SESSION['username']=$result['username'];
			$_SESSION['email']=$result['email'];
			$_SESSION['password']=$result['password'];
			$refreshAfter = 5;
			header('Refresh: 5 ;url= ./z_index.php');
		}else{
			echo "password wrong";
		}
	}
}else{
    header('location:../z-index.php');
}


 ?>
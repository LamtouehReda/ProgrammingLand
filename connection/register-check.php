<?php

include 'connect.php';
if($_SERVER['REQUEST_METHOD']=='POST'){

        //get the inputs data
		$username=trim(strip_tags($_POST['username']));
		$email=filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
		$password=trim(htmlspecialchars($_POST['password']));

		function checkPassword($pass){
			$errors=[];
			if(strlen($pass)<8){
				$errors[]='password must contain at least 8 characters';
			}
			if(!preg_match("#[0-9]+#", $pass)){
				$errors[]='password must contain at least 1 number';
			}
			if(!preg_match("#[a-zA-Z]+#", $pass)){
				$errors[]='password must contain at least 1 letter';
			}
			return $errors;
		}

		$stmt=$connect->prepare("SELECT * FROM users WHERE username LIKE :username OR email LIKE :email ");
		$stmt->bindParam(':username',$username);
		$stmt->bindParam(':email',$email);
		$stmt->execute();

		if(empty($username) || empty($email) || empty($password)){
			echo "please fill out all the fields";
		}else 
		if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
			echo 'Invalide email format';
		}else
		if(count(checkPassword($password))!=0){
            foreach (checkPassword($password) as $err ) {
            	echo $err;
            }
		}else
		if($stmt->rowCount()!=0){
            echo "username or email exist";
		}
		else{
		$stmt=$connect->prepare("INSERT INTO users (username,email,password) VALUES (:username,:email,:password)");
		$stmt->bindParam(':username',$username);
		$stmt->bindParam(':email',$email);
		$password=password_hash($password, PASSWORD_DEFAULT);
		$stmt->bindParam(':password',$password);
		$stmt->execute();
		echo "OK";
		}

}else{
	header('location:../z-index.php');
}




?>
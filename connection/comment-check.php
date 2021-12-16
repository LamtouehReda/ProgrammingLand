<?php 
session_start();
include'connect.php';
if($_SERVER['REQUEST_METHOD']=='POST'){

	$cm_author=$username=trim(strip_tags($_POST['cm-name']));
	$cm_content=trim(htmlspecialchars($_POST['cm-content']));
	$post_id=$_GET['id'];
		if(empty($cm_content) || empty($cm_author) ){
			echo "Please fill out all fields";
		}else{
		$stmt=$connect->prepare("INSERT INTO comments (post_id,cm_content,cm_author) VALUES (:post_id,:cm_content,:cm_author)");
		$stmt->bindParam(':post_id',$post_id);
		$stmt->bindParam(':cm_content',$cm_content);
		$stmt->bindParam(':cm_author',$cm_author);
	    $stmt->execute();
	    if(isset($stmt)){
	    	echo "ok";
	    }else{
	    	echo "something wrong";
	    }
		}



}else{
    header('location:../z-index.php');
}


 ?>
<?php 

session_start();
include'connect.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
    $post_title=trim(strip_tags($_POST['title']));
    $post_content=$_POST['article'];
    $post_category=$_POST['category'];
    $post_img=$_FILES['img'];
    //upload images
    function validImg(array $img){
    	$img_allowed_exe=['jpg','jpeg','png','gif'];
    	$img_exe=strtolower(end(explode('.', $img['name'])));
    	if($img['size']>3000000 ){
    		return 'Image too large';
    	}
    	if($img['size']==0 ){
    		return 'Image empty';
    	}
    	if($img['error']!==0){
    		return 'something wrong with your image';
    	}
    	if(!in_array($img_exe, $img_allowed_exe)){
            return 'invalide image format';
    	}
    	return 'valid';
    }
    if(empty($post_title)  || empty($post_category) || !isset($post_img) ||empty($post_content)){
            echo "please fill out all fields";
    }else{
    	    if(validImg($post_img)=='valid'){
        	$img_exe=strtolower(end(explode('.', $post_img['name'])));
            $img_newname=uniqid('post',false).'.'.$img_exe;
            $img_dir='../images/post_images/'.$img_newname;
            move_uploaded_file($post_img['tmp_name'], $img_dir);

            $stmt=$connect->prepare("INSERT INTO posts(post_title,post_content,post_author,post_category,post_image,post_date)
             VALUES (:title,:content,:author,:category,:image,:post_date)");
            $stmt->bindParam(':title',$post_title);
            $stmt->bindParam(':content',$post_content);
            $stmt->bindParam(':category',$post_category);
            $stmt->bindParam(':image',$img_newname);
            $stmt->bindParam(':author',$post_author);
            $stmt->bindParam(':post_date',$post_date);
            $post_author=$_SESSION['username'];
            $post_date=date('y-m-d');
            $stmt->execute();

            if(isset($stmt)){
                $rs=$connect->prepare("SELECT post_id FROM posts WHERE post_title LIKE :title");
                $rs->bindParam(':title',$post_title);
                $rs->execute();
                $rs=$rs->fetch();
                $_SESSION['post_id']=$rs['post_id'];
            	echo "OK";
            }else{
            	echo "Oups something wrong";
            }
        }else{
        	echo validImg($post_img);
        }
    }
}else{
   header('location:../z-index.php');
}

?>
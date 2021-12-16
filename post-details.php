<?php 
include 'session.php';

//session_destroy();
?>

<?php include "include/header.php";
include "connection/connect.php";
 ?>
<div id="modal-wrapper" class="modal">
  <?php include "register.php"; ?>
</div>

        <div class="page-title wb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <h2><i class="fa fa-leaf bg-green"></i> Blog</h2>
                    </div><!-- end col -->
                    <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Blog</li>
                        </ol>
                    </div><!-- end col -->                    
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end page-title -->

        <section class="section wb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">
                        <?php
                        if(isset($_GET['id'])){
                        $stmt=$connect->prepare("SELECT * FROM posts WHERE post_id=:id");
                        $stmt->bindParam(':id',$id);
                        $id=(int)$_GET['id'];
                        $stmt->execute();
                        $stmt=$stmt->fetch();

                        }
                        if(isset($stmt)){
                        echo '
                            <div class="blog-title-area">
                                <span class="color-green"><a href="garden-category.html" title="">'.$stmt['post_category'].'</a></span>

                                <h3>'.$stmt['post_title'].'</h3>

                                <div class="blog-meta big-meta">
                                    <small><a href="garden-single.html" title="">'.$stmt['post_date'].'</a></small>
                                    <small><a href="blog-author.html" title="">by '.$stmt['post_author'].'</a></small>
                                    <small><a href="#" title=""><i class="fa fa-eye"></i> 2344</a></small>
                                </div><!-- end meta -->

                                <div class="post-sharing">
                                    <ul class="list-inline">
                                        <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                                        <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                                        <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div><!-- end post-sharing -->
                            </div><!-- end title -->

                            <div class="single-post-media">
                                <img src="images/post_images/'.$stmt['post_image'].'" alt="" class="img-fluid">
                            </div><!-- end media -->

                            <div class="blog-content">'.$stmt['post_content'].'</div><!-- end content -->

                            <div class="blog-title-area">
                                <div class="tag-cloud-single">
                                    <span>Tags</span>
                                    <small><a href="#" title="">lifestyle</a></small>
                                    <small><a href="#" title="">colorful</a></small>
                                    <small><a href="#" title="">trending</a></small>
                                    <small><a href="#" title="">another tag</a></small>
                                </div><!-- end meta -->

                                <div class="post-sharing">
                                    <ul class="list-inline">
                                        <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                                        <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                                        <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div><!-- end post-sharing -->
                            </div><!-- end title -->

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="banner-spot clearfix">
                                        <div class="banner-img">
                                            <img src="upload/banner_01.jpg" alt="" class="img-fluid">
                                        </div><!-- end banner-img -->
                                    </div><!-- end banner -->
                                </div><!-- end col -->
                            </div><!-- end row -->

                            <hr class="invis1">


                            ';

                        
                        }
                        ?>
                            <div class="custombox clearfix">
                                <h4 class="small-title">You may also like</h4>
                                <div class="row">
                                    <?php
                                    if(isset($_GET['id'])){
                                    $stmt=$connect->prepare("SELECT * FROM posts NATURAL JOIN users WHERE id=author_id LIMIT 2");
                                    $stmt->execute();
                                    if(isset($stmt)){
                                        $stmt=$stmt->fetchAll();
                                        if(count($stmt>0)){
                                        foreach ($stmt as $row) {
                                            echo '
                                    <div class="col-lg-6">
                                        <div class="blog-box">
                                            <div class="post-media">
                                                <a href="post-details.php?id='.$row['post_id'].'" title="">
                                                    <img src="images/post_images/'.$row['post_image'].'" alt="" class="img-fluid">
                                                    <div class="hovereffect">
                                                        <span class=""></span>
                                                    </div><!-- end hover -->
                                                </a>
                                            </div><!-- end media -->
                                            <div class="blog-meta">
                                                <h4><a href="post-details.php?id='.$row['post_id'].'" title="">'.$row['post_title'].'</a></h4>
                                                <small><a href="blog-category-01.html" title="">Trends</a></small>
                                                <small><a href="blog-category-01.html" title="">'.$row['post_date'].'</a></small>
                                            </div><!-- end meta -->
                                        </div><!-- end blog-box -->
                                    </div><!-- end col -->
                                            ';
                                        }
                                        }
                                    }
                                    }
                                    ?>

                                </div><!-- end row -->
                            </div><!-- end custom-box -->

                            <hr class="invis1">
                            <div class="custombox clearfix">
                                <h4 class="small-title">Comments</h4>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="comments-list">
                        <?php
                        $perpg=3;
                        if(isset($_GET['id'])){
                        if(isset($_GET['page'])){$pg=(int)$_GET['page'];}else{$pg=1;}
                        $from=($pg-1)*$perpg;
                        $com=$connect->prepare("SELECT * FROM comments NATURAL JOIN posts WHERE post_id=:id LIMIT $from,$perpg");
                        $com->bindParam(':id',$id);
                        $id=$_GET['id'];
                        $com->execute();
                        $com=$com->fetchAll();
                        if(isset($com) ){
                            if(count($com)>0){
                                foreach ($com as $row) {
                                    echo '
                                            <div class="media">
                                                <a class="media-left" href="#">
                                                    <img src="images/users_images/user.png" alt="" class="rounded-circle">
                                                </a>
                                                <div class="media-body">
                                                    <h4 class="media-heading user_name">'.$row['cm_author'].' <small>5 days ago</small></h4>
                                                    <p>'.$row['cm_content'].'</p>
                                                </div>
                                            </div>
                                    ';
                                }
                            }
                        }
                        }

                        ?>
                                <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-start">
                                        <?php
                                        if(isset($_GET['id'])){
                                        $stmt=$connect->prepare("SELECT count(*) FROM comments NATURAL JOIN posts WHERE post_id=:id");
                                        $stmt->bindParam(':id',$id);
                                        $id=$_GET['id'];
                                        $stmt->execute();
                                        $stmt=$stmt->fetch();
                                        $nb=$stmt[0];
                                        for($i=1;$i<=ceil($nb/$perpg);$i++){
                                            echo '<li  class="page-item '.($i==$pg ? 'active' : '').'"><a class="page-link" href="post-details.php?id='.$_GET['id'].'&page='.$i.'">'.$i.'</a></li>';
                                        }
                                        }
                                        ?>
                                    </ul>
                                </nav>

                                        </div>
                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div><!-- end custom-box -->

                            <hr class="invis1">


                            <div class="custombox clearfix">
                                <h4 class="small-title">Leave a Reply</h4>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form class="form-wrapper" id="comments-form"
                                         action="connection/comment-check.php?id=<?php echo $_GET['id']?>" method="POST">
                                            <input type="text" id="cm-name" name="cm-name" class="form-control" placeholder="Your name">
                                            <textarea name="cm-content" id="cm-content" class="form-control" placeholder="Your comment"></textarea>
                                            <div id="cm-messages"></div>
                                            <button name="submit" type="submit" class="btn btn-primary">Submit Comment</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div><!-- end page-wrapper -->
                    </div><!-- end col -->

                    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                    <?php include "include/sidebar.php"; ?>"
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>

<?php include "include/footer.php"; ?>

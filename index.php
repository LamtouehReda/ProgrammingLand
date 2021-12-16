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
        <section class="section first-section">
            <div class="container-fluid">
                <div class="masonry-blog clearfix">
                    <?php 
                    $stmt=$connect->prepare("SELECT * FROM  posts WHERE post_category LIKE :cat");
                    $stmt->bindParam(':cat',$cat);
                    $cat='linux';
                    $stmt->execute();
                    if(isset($stmt)){
                        $stmt=$stmt->fetch();
                        echo'
                    <div class="left-side">
                        <div class="masonry-box post-media">
                             <img src="images/post_images/'.$stmt['post_image'].'" alt="" class="img-fluid">
                             <div class="shadoweffect">
                                <div class="shadow-desc">
                                    <div class="blog-meta">
                                        <span class="bg-aqua"><a href="post-details.php?id='.$stmt["post_id"].'" title="">'.$stmt['post_category'].'</a></span>
                                        <h4><a href="post-details.php?id='.$stmt["post_id"].'" title="">'.$stmt['post_title'].'</a></h4>
                                        <small><a href="#" title="">'.$stmt['post_date'].'</a></small>
                                        <small><a href="#" title="">By '.$stmt['post_author'].'</a></small>
                                    </div><!-- end meta -->
                                </div><!-- end shadow-desc -->
                            </div><!-- end shadow -->
                        </div><!-- end post-media -->
                    </div><!-- end left-side -->
                        ';
                    }
                    ?>
                    <?php 
                    $stmt=$connect->prepare("SELECT * FROM  posts WHERE post_category LIKE :cat");
                    $stmt->bindParam(':cat',$cat);
                    $cat='programming';
                    $stmt->execute();
                    if(isset($stmt)){
                        $stmt=$stmt->fetch();
                        echo'
                    <div class="center-side">
                        <div class="masonry-box post-media">
                             <img src="images/post_images/'.$stmt['post_image'].'" alt="" class="img-fluid">
                             <div class="shadoweffect">
                                <div class="shadow-desc">
                                    <div class="blog-meta">
                                        <span class="bg-aqua"><a href="post-details.php?id='.$stmt["post_id"].'" title="">'.$stmt['post_category'].'</a></span>
                                        <h4><a href="post-details.php?id='.$stmt["post_id"].'" title="">'.$stmt['post_title'].'</a></h4>
                                        <small><a href="#" title="">'.$stmt['post_date'].'</a></small>
                                        <small><a href="#" title="">by '.$stmt['post_author'].'</a></small>
                                    </div><!-- end meta -->
                                </div><!-- end shadow-desc -->
                            </div><!-- end shadow -->
                        </div><!-- end post-media -->
                    </div><!-- end left-side -->
                        ';
                    }
                    ?>
                    <?php 
                    $stmt=$connect->prepare("SELECT * FROM  posts WHERE post_category LIKE :cat");
                    $stmt->bindParam(':cat',$cat);
                    $cat='ethical hacking';
                    $stmt->execute();
                    if(isset($stmt)){
                        $stmt=$stmt->fetch();
                        echo'

                    <div class="right-side hidden-md-down">
                        <div class="masonry-box post-media">
                             <img src="images/post_images/'.$stmt['post_image'].'" alt="" class="img-fluid">
                             <div class="shadoweffect">
                                <div class="shadow-desc">
                                    <div class="blog-meta">
                                        <span class="bg-aqua"><a href="post-details.php?id='.$stmt["post_id"].'" title="">'.$stmt['post_category'].'</a></span>
                                        <h4><a href="post-details.php?id='.$stmt["post_id"].'" title="">'.$stmt['post_title'].'</a></h4>
                                        <small><a href="#" title="">'.$stmt['post_date'].'</a></small>
                                        <small><a href="#" title="">by '.$stmt['post_author'].'</a></small>
                                    </div><!-- end meta -->
                                </div><!-- end shadow-desc -->
                             </div><!-- end shadow -->
                        </div><!-- end post-media -->
                    </div><!-- end right-side -->
                        ';
                    }
                    ?>
                </div><!-- end masonry -->
            </div>
        </section>

        <section class="section wb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">
                            <div class="blog-list clearfix">
                                <?php
                                $perpg=6;
                                if(isset($_GET['page'])){$pg=(int)$_GET['page'];}else{$pg=1;}
                                $from=($pg-1)*$perpg;
                                $stmt=$connect->prepare("SELECT * FROM posts ORDER BY post_date DESC LIMIT $from,$perpg ");
                                $stmt->execute();
                                $stmt=$stmt->fetchAll();
                                foreach($stmt as $row){
                                   echo '
                                <div class="blog-box row">
                                    <div class="col-md-4">
                                        <div class="post-media">
                                            <a href="post-details.php?id='.$row["post_id"].'" title="">
                                                <img src="images/post_images/'.$row['post_image'].'" alt="" class="img-fluid">
                                                <div class="hovereffect"></div>
                                            </a>
                                        </div><!-- end media -->
                                    </div><!-- end col -->

                                    <div class="blog-meta big-meta col-md-8">
                                        <span class="bg-aqua"><a href="post-details.php?id='.$row["post_id"].'" title="">'.$row['post_category'].'</a></span>
                                        <h4><a href="post-details.php?id='.$row["post_id"].'" title="">'.$row['post_title'].'</a></h4>
                                        <p>Aenean interdum arcu blandit, vehicula magna non, placerat elit. Mauris et pharetratortor. Suspendissea sodales urna. In at augue elit. Vivamus enim nibh, maximus ac felis nec, maximus tempor odio.</p>
                                        <small><a href="#" title=""><i class="fa fa-eye"></i> 1887</a></small>
                                        <small><a href="#" title="">'.$row['post_date'].'</a></small>
                                        <small><a href="#" title="">'.$row['post_author'].'</a></small>
                                    </div><!-- end meta -->
                                </div><!-- end blog-box -->
                                <hr class="invis">
                                   ';
                                }
                                
                                ?>


                                <div class="row">
                                    <div class="col-lg-10 offset-lg-1">
                                        <div class="banner-spot clearfix">
                                            <div class="banner-img">
                                                <img src="upload/banner_05.jpg" alt="" class="img-fluid">
                                            </div><!-- end banner-img -->
                                        </div><!-- end banner -->
                                    </div><!-- end col -->
                                </div><!-- end row -->

                                <hr class="invis">




                            </div><!-- end blog-list -->
                        </div><!-- end page-wrapper -->

                        <hr class="invis">

                        <div class="row">
                            <div class="col-md-12">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-start">
                                        <?php
                                        $stmt=$connect->prepare("SELECT count(*) FROM posts");
                                        $stmt->execute();
                                        $stmt=$stmt->fetch();
                                        $nb=$stmt[0];
                                        for($i=1;$i<=ceil($nb/$perpg);$i++){
                                            echo '<li  class="page-item '.($i==$pg ? 'active' : '').'"><a class="page-link" href="z-index.php?page='.$i.'">'.$i.'</a></li>';
                                        }
                                        ?>
                                    </ul>
                                </nav>
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end col -->

                    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                    <?php include "include/sidebar.php"; ?>"
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>

<?php include "include/footer.php"; ?>

<?php 
include "session.php";
include "connection/connect.php";
include "include/header.php"; ?>
<div id="modal-wrapper" class="modal">
  <?php include "register.php"; ?>
</div>
        <div class="page-title wb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <h2><i class="fa fa-leaf bg-green"></i> Category by: <?php echo $_GET['cat']; ?></h2>
                    </div><!-- end col -->
                    <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Blog</a></li>
                            <li class="breadcrumb-item active"><?php echo $_GET['cat']; ?></li>
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
                            <div class="blog-list clearfix">

                                <div class="row">
                                    <div class="col-lg-10 offset-lg-1">
                                        <div class="banner-spot clearfix">
                                            <div class="banner-img">
                                                <img src="" alt="" class="img-fluid">
                                            </div><!-- end banner-img -->
                                        </div><!-- end banner -->
                                    </div><!-- end col -->
                                </div><!-- end row -->

                                <hr class="invis">
                                <?php
                                $perpg=6;
                                if(isset($_GET['page'])){$pg=(int)$_GET['page'];}else{$pg=1;}
                                $from=($pg-1)*$perpg;
                                $stmt=$connect->prepare("SELECT * FROM posts WHERE post_category LIKE :cat LIMIT $from,$perpg ");
                                $stmt->bindParam(':cat',$cat);
                                $cat=$_GET['cat'];
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

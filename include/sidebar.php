                        <div class="sidebar">
                            <div class="widget">
                                <h2 class="widget-title">Search</h2>
                                <form class="form-inline search-form">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Search on the site">
                                    </div>
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                </form>
                            </div><!-- end widget -->

                            <div class="widget">
                                <h2 class="widget-title">Recent Posts</h2>
                                <div class="blog-list-widget">
                                    <div class="list-group">
                                    <?php 
                                    $stmt=$connect->prepare("SELECT * FROM  posts ORDER BY post_date DESC  ");
                                    $stmt->execute();
                                    if(isset($stmt)){
                                        $stmt=$stmt->fetchAll();
                                    for($i=0;$i<3;$i++){
                                    echo'
                                        <a href="post-details.php?id='.$stmt[$i]["post_id"].'" class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="w-100 justify-content-between">
                                                <img src="images/post_images/'.$stmt[$i]["post_image"].'" alt="" class="img-fluid float-left">
                                                <h5 class="mb-1">'.$stmt[$i]["post_title"].'</h5>
                                                <small>'.$stmt[$i]["post_date"].'</small>
                                            </div>
                                        </a>
                                        
                                    ';
                                        }
                                    }
                                    ?>

                                    </div>
                                </div><!-- end blog-list -->
                            </div><!-- end widget -->

                            <div class="widget">
                                <h2 class="widget-title">Advertising</h2>
                                <div class="banner-spot clearfix">
                                    <div class="banner-img">
                                        <img src="upload/banner_04.jpg" alt="" class="img-fluid">
                                    </div><!-- end banner-img -->
                                </div><!-- end banner -->
                            </div><!-- end widget -->

                            <div class="widget">
                                <h2 class="widget-title">Instagram Feed</h2>
                                <div class="instagram-wrapper clearfix">
                                    <a href="#"><img src="upload/garden_sq_01.jpg" alt="" class="img-fluid"></a>
                                    <a href="#"><img src="upload/garden_sq_02.jpg" alt="" class="img-fluid"></a>
                                    <a href="#"><img src="upload/garden_sq_03.jpg" alt="" class="img-fluid"></a>
                                    <a href="#"><img src="upload/garden_sq_04.jpg" alt="" class="img-fluid"></a>
                                    <a href="#"><img src="upload/garden_sq_05.jpg" alt="" class="img-fluid"></a>
                                    <a href="#"><img src="upload/garden_sq_06.jpg" alt="" class="img-fluid"></a>
                                    <a href="#"><img src="upload/garden_sq_07.jpg" alt="" class="img-fluid"></a>
                                    <a href="#"><img src="upload/garden_sq_08.jpg" alt="" class="img-fluid"></a>
                                    <a href="#"><img src="upload/garden_sq_09.jpg" alt="" class="img-fluid"></a>
                                </div><!-- end Instagram wrapper -->
                            </div><!-- end widget -->

                            <div class="widget">
                                <h2 class="widget-title">Popular Categories</h2>
                                <div class="link-widget">
                                    <ul>
                                    <?php 
                                    $stmt=$connect->prepare("SELECT post_category, COUNT(post_id) AS nb FROM posts GROUP BY post_category ");
                                    $stmt->execute();
                                    if(isset($stmt)){
                                        $stmt=$stmt->fetchAll();
                                        foreach($stmt as $row){
                                    echo'

                                        <li><a href="category.php?cat='.$row['post_category'].'">'.$row['post_category'].' <span>('.$row['nb'].')</span></a></li>

                                    ';
                                }
                                    }
                                    ?>

                                    </ul>
                                </div><!-- end link-widget -->
                            </div><!-- end widget -->
                        </div><!-- end sidebar -->
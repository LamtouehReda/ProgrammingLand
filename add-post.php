<?php
session_start();
if(isset($_SESSION['user_id'])){
    include "include/header.php";
    echo '
<article class="col-lg-9">
    <div class="row">
        <div class="col-md-1">
        </div>
      <div class="col-md-10">
      <div class="card border-primary mb-3"  >
  <div class="card-header"><b> Add new Article</b></div>
  <div class="card-body ">
  <form  id="post-form" action="" method="POST" enctype="multipart/form-data" >
  <div class="col-sm-10">

  </div>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Article Title</label>
    <div class="col-sm-10">
      <input type="text" name="title" class="form-control" id="inputEmail3" value="">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Article</label>
    <div class="col-sm-10">
     <textarea  class="form-control" name="article" id="inputPassword3" rows="20" value=""></textarea>
    </div>
  </div>
  <div class="form-group row">
  <label for="inputPassword3" class="col-sm-2 col-form-label">Category</label>
  <div class="col-sm-10">
  <select class="custom-select" name="category">
  <option selected>Choose the Category</option>
  <option value="programming">programming</option>
  <option value="linux">linux</option>
  <option value="ethical hacking">ethical hacking</option>
  </select>
</div>
  </div>
  <div class="form-group row">
    <label for="exampleFormControlFile1" class="col-sm-2 col-form-label">Article Image</label>
    <div class="col-sm-10">
    <input type="file" class="form-control-file" name="img" id="exampleFormControlFile1">
    </div>
  </div>
  <div class="form-group row" >
    <div class="col-sm-10"  id="post-messages">
     
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10">
    <button type="submit" id="submit" name="submit" class="btn btn-primary " style="margin-left:125px"><i class="fa fa-plus"></i> Add</button>  
    </div>
  </div>
</form>
  </div>
</div>
      </div>


</article>
    ';
include "include/footer.php";
}else{
    header("location:z-index.php");
}

?>





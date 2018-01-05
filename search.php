<?php include 'inc/header.php';?>
<?php include 'inc/navsection.php';?>
<?php
 
 if (!isset($_GET['search'])||$_GET['search']==NULL) 

 	header("Location: index.php");
 	else
 {
 	$search=$_GET['search'];
 }

 ?>

<div class="contentsection contemplete clear">
<div class="row">  
      <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
          <div class="maincontent ">
          <?php

          $query="select * from tbl_post where title like '%$search%' or body like '%$search%'";
          $post=$db->select($query);
          if($post)
          {
          while($result=$post->fetch_assoc()){

          ?>
         <div class="samepost">
              <div class="samepostbody">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 fb">
                         <a href="https://www.facebook.com/<?php echo $result['posterid'];?>" ><img src=" https://graph.facebook.com/<?php echo $result['posterid'];?>/picture?type=square"></a>

                         <h4><a href="https://www.facebook.com/<?php echo $result['posterid'];?>"><?php echo $result['postername']?></a></h4>
                        </div>
                    </div> 
                    <div class="title">
                    <h4><a href="post.php?id=<?php echo $result['id']?>;"><?php echo $result['catagory'];?></a></h4>

                    <h1><a href="post.php?id=<?php echo $result['id']?>;"><?php echo $result['title'];?></a></h1>
                    </div>
                    <p><?php echo $result['body']; ?></p> 

                                           
                    </div>                   
              </div>  
              <?php } }?>
          </div>
      </div>
    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
    <?php include 'inc/sidebar.php'; ?>
    </div>     
</div>
<?php include 'inc/footer.php'; ?>
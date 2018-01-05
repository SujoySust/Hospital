<?php include 'inc/header.php'; ?>
<?php include 'inc/navsection.php'; ?>

 <?php
 $a=0;
 if (!isset($_GET['catid'])||$_GET['catid']==NULL) {
   $a=1;
 }else
 {

    $cat_id = $_GET['catid'];
      $a=0;
 }

 ?>

<div class="contentsectionlist templete clear">
   <div class="row">
   <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
      <div class="sidebar clear">
      <div class="semisidebar">
          <h2>Doctor's Catagories</h2>
          <ul>
          <?php
          $query="select distinct catid,expertise from tbl_doc";
          $catagory=$db->select($query);
          if($catagory)
          {
            while ($result=$catagory->fetch_assoc()) {
          ?>
          <li><a href="doctors.php?catid=<?php echo $result['catid'];?>"><?php echo $result['expertise'];?></a></li>
          <?php } } else{ ?>
          <li>No Catagori Found</li>
          <?php }?>
          </ul>
          </div>
     </div>

</div> 
<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
<div class="row">

    <?php
        if($a==1)  
        {
        $query="select * from tbl_doc";
        }else{
        $query="select * from tbl_doc where catid = $cat_id";
        }

        $post=$db->select($query);
        if($post)
        {
        while($result=$post->fetch_assoc()){

    ?>

          <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
           <div class="maincontentlist">
              <h3 style="text-align: center;"><?php echo $result['expertise'];?></h3>
              <a href="doctorprofile.php?cat_id=<?php echo $result['id'];?>">

              <img src="<?php echo $result['image']; ?>" class="img-responsive" onerror="this.style.display='none'"> 

              </a>
              <a href="doctorprofile.php?cat_id=<?php echo $result['id'];?>"><h4><?php echo $result['name']; ?></h4></a>            


          </div> 
          </div>  


          <?php } }?>

      </div>

</div>
</div>
</div>
<?php include 'inc/footer.php'; ?>
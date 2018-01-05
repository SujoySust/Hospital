<?php include 'inc/header.php'; ?>
<?php include 'inc/navsection.php'; ?>

 <?php
 $a=0;
 if (!isset($_GET['catid'])||$_GET['catid']==NULL) {
   $a=1;
 }else
 {

    $catid = $_GET['catid'];
      $a=0;
 }

 ?>
<div class="contentsectionlist templete clear">
<div class="row">

      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <div class="sidebar clear">

               <div class="postdata">  
                  <form action="hospitalmap.php" method="POST" enctype="multipart/form-data">
                  <table>
                  <tr>
                  <td>
                  <select id="select" name="division">
                  <option value="Dhaka">Dhaka</option>
                  <option value="Chittagong">Chittagong</option>
                  <option value= "Rajshahi">Rajshahi</option>
                  <option value= "Sylhet">Sylhet</option>
                  <option value= "Khulna">Khulna</option>
                  <option value= "Barisal">Barisal</option>
                  <option value= "Rangpur">Rangpur</option>
                  <option value= "Others">Others</option>
                  </select>
                  </td>

                  <td>
                  <select id="select" name="zilla">
                  <option value="Dhaka">Dhaka</option>
                  <option value="Chittagong">Chittagong</option>
                  <option value= "Rajshahi">Rajshahi</option>
                  <option value= "Sylhet">Sylhet</option>
                  <option value= "Khulna">Khulna</option>
                  <option value= "Barisal">Barisal</option>
                  <option value= "Rangpur">Rangpur</option>
                  <option value= "Others">Others</option>
                  </select>
                  </td>

                  <td>
                  <select id="select" name="thana">
                  <option value="Khulsi">Khulsi</option>
                  <option value="Double mooring">Double mooring</option>
                  <option value= "HALISHAHAR">HALISHAHAR</option>
                  <option value= "Bondor">Bondor</option>
                  <option value= "Sugandha">Sugandha</option>
                  <option value= "Other">Others</option>
                  </select>
                  </td>


                  <td>
                  <input type="submit" name="mapsubmit" Value="Search"/>
                  </td>
                  </tr>
                  </table>
                  </form>
            </div>
        </div>
    </div>



<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
      <div class="sidebar clear">
      <div class="semisidebar">
          <h2>Hospital Catagories</h2>
          <ul>
          <?php
          $query="select distinct catid,catagory  from hos_tbl";
          $catagory=$db->select($query);
          if($catagory)
          {
            while ($result=$catagory->fetch_assoc()) {
          ?>
          <li><a href="hospital.php?catid=<?php echo $result['catid'];?>"><?php echo $result['catagory'];?></a></li>
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
        $query="select * from hos_tbl";
        }else{
        $query="select * from hos_tbl where catid = $catid";
        }

        $post=$db->select($query);
        if($post)
        {
        while($result=$post->fetch_assoc()){

    ?>

          <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
          <div class="maincontentlist">
              <h3 style="text-align: center;"><?php echo $result['catagory'];?></h3>
              <a href="hospitalprofile.php">
              <img src="<?php echo $result['pic'];?>" class="img-responsive" onerror="this.style.display='none'"> 
              </a>
              <a href="hospitalprofile.php?cat_id=<?php echo $result['id'];?>"><h4><?php echo $result['name']; ?></h4></a>
          </div>   
          </div>
          <?php } }?>
</div>
</div>  
</div>
</div> 

<?php include 'inc/footer.php'; ?>
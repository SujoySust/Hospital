<?php include 'inc/header.php'; ?>
<?php include 'inc/navsection.php'; ?>
<?php include 'inc/slider.php'; ?>

<div class="clear"></div>

<div class="contentsection templete clear">      
  


<div class="row">  

      <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
      <div class="sidebar clear">

               <div class="postdata">
                  <span></span>   
                  <form action="" method="POST" enctype="multipart/form-data">
                  <table>
                  <tr>

                  <td>
                  <input type="text" name="title" placeholder="Enter Post Title..." class="medium" />
                  </td>
                  </tr>

                  <tr>

                  <td>
                  <select id="select" name="catagory">
                  <option value="BLOOD REQUEST">BLOOD REQUEST</option>
                  <option value="BLOOD DONOR">BLOOD DONOR</option>
                  <option value= "DOCTOR">DOCTOR</option>
                  <option value= "HOSPITALS">HOSPITALS</option>
                  <option value= "EMERGENCY">EMERGENCY</option>
                  <option value= "HELP">HELP</option>
                  <option value= "HEALTH">HEALTH</option>
                  <option value= "SUGGESTIONS">SUGGESTIONS</option>
                  <option value= "REVIEWS">REVIEWS</option>
                  <option value= "OTHERS">OTHERS</option>
                  </select>
                  </td>

                  </tr>   

                  <tr>                                 
                  <td>
                  <textarea  class="tinymce" name="body" rows="10" ></textarea>
                  </td>
                  </tr>
                  <tr>

                  <td>
                  <input type="submit" name="submit" Value="Save" onclick="Refresh" />
                  </td>
                  </tr>
                  </table>
                  </form>
            </div>
            <div class="semisidebar">

                <h2 style="text-align: center;">Catagories</h2>
                <ul><li><a href="posts.php">Home</a></li></ul>
                <ul><li><a href="hospital.php">Hospital List</a></li></ul>
                <ul><li><a href="doners.php">Blood Donor</a></li></ul>
                <ul><li><a href="doctors.php">Doctors List</a></li></ul>
                <ul><li><a href="posts.php">Ambulance</a></li></ul>
                <ul><li><a href="hospitalmap.php">Nearest Hospitals</a></li></ul>
            
            </div>
      </div>
      </div> 
      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
          <div class="maincontent ">
          <?php

          $query="select * from tbl_post order by id desc";
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
                    <h5><a href="post.php?id=<?php echo $result['id']?>;"><?php echo $result['catagory'];?></a></h5>

                    <h3><a href="post.php?id=<?php echo $result['id']?>;"><?php echo $result['title'];?></a></h3>
                    </div>
                    <p><?php echo $result['body']; ?></p> 

                                           
                    </div> 
                    <h4><a href="post.php?id=<?php echo $result['id']?>;">Comment</a></h4>                  
              </div>  
              <?php } }?>
          </div>
      </div>
    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">

    <?php include 'inc/sidebar.php'; ?>
    </div>     
</div>
</div>        
 <?php include 'inc/footer.php'; ?>
</body>
</html>
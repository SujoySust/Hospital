<?php include 'inc/header.php'; ?>
<?php include 'inc/navsection.php'; ?>
 <?php
 $a=0;
 if (!isset($_GET['cat_id'])||$_GET['cat_id']==NULL) {
   $a=1;
 }else
 {

    $cat_id = $_GET['cat_id'];
      $a=0;
 }

 ?>

 <div class="contentsectionlist templete clear">
   <div class="row">

   <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>
   <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
          <div class="row">
          <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3"><h4 class="lined margin-20">Doctor Profile </h4></div>
          <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6"></div>
          <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3"><a href="doners.php" style="text-decoration: none;"><h4 class="lined margin-20">Back to Donor Page</h4></a></div>
          </div>

    <?php
        if($a==1)  
        {
        $query="select * from donor_tbl";
        }else{
        $query="select * from donor_tbl where id = $cat_id";
        }

        $post=$db->select($query);
        if($post)
        {
        while($result=$post->fetch_assoc()){

    ?>
          <div class="maincontentlist">
          <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
          <div class="contentimage">
             <a href="https://www.facebook.com/<?php echo $result['facebookid']?>">
                  <img src="<?php echo $result['image'];?>" class="img-responsive" onerror="this.style.display='none'"> 
              </a>
              <a href="https://www.facebook.com/<?php echo $result['facebookid']?>"><h4 class="lined margin-20" style="text-align: center;"><?php echo $result['name'];?></h4></a>
          </div>                 
          </div>
           <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
           <div class="mytable">
            <h4 class="lined margin-20">Degree / Specialization: </h4>
             <p>
             Last update <strong><?php echo $result['lastupdate'];?></strong><br>
             Blood Group <strong><?php echo $result['bloodgroup'];?></strong>
            </p>
             <h4 class="lined margin-20">Details Information: </h4>

                  <table class="table">
                      <tbody>
                  <tr>
                  <td>
                    <b>Name</b>
                  </td>
                  <td>
                     <?php echo $result['name']?>
                  </td>                 
                </tr>
                <tr>
                  <td>
                    <b>Age </b>
                  </td>
                  <td>
                    
                  </td> 
                </tr>
                <tr>
                  <td>
                    <b>Work</b>
                  </td>
                  <td>
                    <?php echo $result['work'];?>
                  </td> 
                </tr>
                

                 <tr>
                      <td><b>Last Donate Date</b></td>
                      <td><?php echo $result['lastupdate']; ?></td>
                      </tr>

                      <tr>
                      <td><b>Address</b></td>
                      <td><?php echo $result['address']; ?></td>
                      </tr>
                      <tr>
                      <td><b>Phone</b></td>
                      <td><?php echo $result['contract']; ?></td>
                      </tr>
                      <tr> 
                      <td><b>Email</b></td>                
                      <td><?php echo $result['email']; ?></td>
                      </tr>
                      <tr> 
                      </tbody>
                  </table>
              </div>
              </div>   
              </div>
              <?php } }?>
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>
</div>
</div>
<?php include 'inc/footer.php'; ?>
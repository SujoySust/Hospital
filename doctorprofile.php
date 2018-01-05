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
          <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3"><h4 class="lined margin-20">    Back to Doctor Page</h4></div>
          </div>

    <?php
        if($a==1)  
        {
        $query="select * from tbl_doc";
        }else{
        $query="select * from tbl_doc where id = $cat_id";
        }

        $post=$db->select($query);
        if($post)
        {
        while($result=$post->fetch_assoc()){

    ?>
          <div class="maincontentlist">
          <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
          <div class="contentimage">
             <a href="#portfolioModal1">
                  <img src="<?php echo $result['image'];?>" class="img-responsive" onerror="this.style.display='none'"> 
              </a>
              <h4 class="lined margin-20" style="text-align: center;"><?php echo $result['name'];?></h4>
          </div>                 
          </div>
           <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
           <div class="mytable">
            <h4 class="lined margin-20">Degree / Specialization: </h4>
             <p>
             MBBS, FCPS (Surgery), FRCS (Glasgow),<br/>
             MS (Surgery), FICS<br/>
             Fellow Colorectal Surgery (NUH), Singapore<br/>
             General Colon & Rectal Surgeon<br/><br/>
            </p>
             <h4 class="lined margin-20">Details Information: </h4>

                  <table class="table">
                      <tbody>
                  <tr>
                  <td>
                    <b>Department </b>
                  </td>
                  <td>
                     <?php echo $result['expertise']?>
                  </td>                 
                </tr>
                <tr>
                  <td>
                    <b>Designation </b>
                  </td>
                  <td>
                    Professor
                  </td> 
                </tr>
                <tr>
                  <td>
                    <b>Educational Qualification</b>
                  </td>
                  <td>
                    <?php echo $result['qualification'];?>
                  </td> 
                </tr>
                <tr>
                  <td>
                    <b>Training/Conference</b>
                  </td>
                  <td>
                    
                  </td> 
                </tr>
                <tr>
                  <td>
                    <b>Research & Publications</b>
                  </td>
                  <td>
                    
                    
                  </td> 
                </tr>
                
                <tr>
                  <td>
                    <b>Specialization</b>
                  </td>
                  <td>
                    
                  </td> 
                </tr>
                <tr>
                  <td>
                    <b>Previous Experience</b>
                  </td>
                  <td>
                    
                  </td> 
                </tr>
                <tr>
                  <td>
                    <b>Special Achievement</b>
                  </td>
                  <td>
                    
                  </td> 
                </tr>
                <tr>
                  <td>
                    <b>Success Story</b>
                  </td>
                  <td>
                    
                  </td> 
                </tr> 

                 <tr>
                      <td><b>Hospital</b></td>
                      <td><?php echo $result['organization']; ?></td>
                      </tr>


                 <tr>
                      <td><b>Chamber</b></td>
                      <td><?php echo $result['chamber']; ?></td>
                      </tr>

                      <tr>
                      <td><b>Location</b></td>
                      <td><?php echo $result['location']; ?></td>
                      </tr>
                      <tr>
                      <td><b>Phone</b></td>
                      <td><?php echo $result['phone']; ?></td>
                      </tr>
                      <tr> 
                      <td><b>Email</b></td>                
                      <td><?php echo $result['email']; ?></td>
                      </tr>
                      <tr> 
                      <td><b>Website</b></td>                
                      <td><?php echo $result['website']; ?></td>
                      </tr>

                      <tr> 
                      <td><b>Details</b></td>                
                      <td><?php echo $result['details']; ?></td>
                      </tr>
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
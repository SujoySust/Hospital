<nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <a href="index.php"><img src="images/logo.png"></a>
            <div class="navbar-header page-scroll">
              
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
              
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.php">HOME</a>
                    </li>
                    <li class="dropdown">
               
                              <a href="hospital.php" class="dropdown-toggle" data-toggle="dropdown">HOSPITAL</a>
                              <ul class="dropdown-menu">
                                 <li><a href="hospitalsignup.php">Add New hospital</a> </li>
                                 <li class="divider"></li>
                                  <?php
                                   $query="select distinct catagory,catid from hos_tbl";
                                   $post= $db->select($query);
                                   if($post)
                                   {
                                    while($result=$post->fetch_assoc())
                                    {
                                   ?>
                                 <li><a href="hospital.php?catid=<?php echo $result['catid'];?>"><?php echo $result['catagory'];?></a></li>
                                  <li class="divider"></li>
                                 <?php } }?>
                              </ul>
                                                        

                  </li>
                 <li class="dropdown">
                                <a href="doners.php" class="dropdown-toggle" data-toggle="dropdown">BLOOD DONERS</a>
                                <ul class="dropdown-menu">                                   
                                  <li><a href="doners.php?cat_id=1">A+</a></li>
                                  <li class="divider"></li>
                                  <li><a href="doners.php?cat_id=2">A-</a></li>
                                  <li class="divider"></li>
                                  <li><a href="doners.php?cat_id=3">B+</a></li>
                                  <li class="divider"></li>
                                  <li><a href="doners.php?cat_id=4">B-</a></li>
                                  <li class="divider"></li>
                                  <li><a href="doners.php?cat_id=5">AB+</a></li>
                                  <li class="divider"></li>
                                  <li><a href="doners.php?cat_id=6">AB-</a></li>
                                  <li class="divider"></li>
                                  <li><a href="doners.php?cat_id=7">O+</a></li>
                                  <li class="divider"></li>
                                  <li><a href="doners.php?cat_id=8">O-</a></li>
                                </ul>      
                  </li>

                  <li class="dropdown">
                                 <a href="doctors.php" class="dropdown-toggle" data-toggle="dropdown">DOCTORS</a>
                                 <ul class="dropdown-menu">
                                  <?php
                                   $query="select distinct expertise,catid from tbl_doc";
                                   $post= $db->select($query);
                                   if($post)
                                   {
                                    while($result=$post->fetch_assoc())
                                    {
                                   ?>
                                   <li><a href="doctors.php?cat_id=<?php echo $result['catid']; ?>"><?php echo $result['expertise']?></a></li>
                                   <li class="divider"></li>
                                   <?php  } } else { header("Location:404.php"); } ?>
                                </ul>
                              
                  </li>

                  <li class="dropdown">
                      <a href="doctors.php" class="dropdown-toggle" data-toggle="dropdown">LOGIN</a>
                       <ul class="dropdown-menu">
                            <li><a href="doctorsignup.php">DOCTOR LOGIN</a></li>
                            <li class="divider"></li>
                            <li><a href="donorsignup.php">DONOR LOGIN</a></li>

                       </ul>    
                  </li>


                  <li>
                  <?php 

                       if(!$loggedin)
                       {
                        ?>
                        <a href="<?php echo $login_url;?>">Login With Facebook</a>

                      <?php
                       }else{
                      ?>
                      <a href="<?php echo $logout;?>">Logout</a>
                      <?php
                       }
                      ?>

                </li>

                </ul>

                   <form action="search.php" method="get" class="navbar-form nav navbar-nav navbar-right" role="search">
                      <div class="form-group">
                        <input type="text" name="search" class="form-control" placeholder="Search">
                      </div>
                      <input type="submit" name="submit" value="Search"/>
                  </form>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>         
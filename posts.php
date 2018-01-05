<?php include 'inc/header.php'; ?>
<?php include 'inc/navsection.php'; ?>

 <?php
 
 if (!isset($_GET['catagory'])||$_GET['catagory']==NULL) {

 	header("Location: 404.php");
 }else
 {
 	$id=$_GET['catagory'];
 }

 ?>
	<div class="contentsection templete clear">

				<div class="row">
			                 
			          <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
					      <div class="maincontent clear">

						    <?php
			                 $query="select * from tbl_post where catid=$id";
			                 $post= $db->select($query);
			                 if($post)
			                 {
			                 	while($result=$post->fetch_assoc())
			                 	{
						    ?>

						    <div class="samepost clear">
								    <h1><a href="post.php?id=<?php echo $result['id']; ?>"><?php echo $result['title']; ?></a></h1>
				                     <p><?php echo $result['body']; ?></p>
						    </div>
			               
							<?php  } }?>
							</div>
						</div>	

						<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
			                       
			                  <?php include 'inc/sidebar.php'; ?>
			             </div>
				</div>
	</div>

		<?php include 'inc/footer.php'; ?>
<?php include 'inc/header.php'; ?>
<?php include 'inc/navsection.php'; ?>

 <?php
 
 if (!isset($_GET['id'])||$_GET['id']==NULL) {

 	header("Location: 404.php");
 }else
 {
 	$id=$_GET['id'];
 }
 ?>

<div class="contentsection templete clear">

	<div class="row">

		<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
			<div class="maincontent clear">

			<?php
			$query="select * from tbl_post where id=$id";
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

				<div id="disqus_thread"></div>
				<script>
				(function() { // DON'T EDIT BELOW THIS LINE
				var d = document, s = d.createElement('script');
				s.src = 'https://localhost-hospital.disqus.com/embed.js';
				s.setAttribute('data-timestamp', +new Date());
				(d.head || d.body).appendChild(s);
				})();
				</script>
				<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

			<?php  } } else { header("Location:404.php"); } ?>
			</div>
		</div>	
		<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
		<?php include 'inc/sidebar.php'; ?>
		</div>
	</div>
</div>
		
<?php include 'inc/footer.php'; ?>
<?php include 'inc/header.php'; ?>
<?php include 'inc/navsection.php'; ?>

<div class="contentsection templete clear">

	<div class="row">  

	<div id="map" style="width:100%;height: 1000px">

	</div>
	<?php 
		if(!empty($_POST['mapsubmit'])){
			$division = $_POST['division'];
			$zilla = $_POST['zilla'];
			$thana = $_POST['thana'];
		}
	?>
		<script>
			function myMap() {
				var a=24.5041;
				var b=90.120850;

				var myCenter = new google.maps.LatLng(a,b);
				var mapCanvas = document.getElementById("map");
				var mapOptions = {center: myCenter, zoom: 5};
				var map = new google.maps.Map(mapCanvas, mapOptions);
				var marker = new google.maps.Marker({position:myCenter});
				marker.setMap(map);
				
				<?php
				// if(!empty($_POST['mapsubmit'])){
				// 	$division = 'Chittagong';
				// 	$zilla = 'Chittagong';
				// 	$thana = 'Khulsi';

					$query="select * from tbl_map where division like '%$division%' or zilla like '%$zilla%' or thana like '%$thana%'";
					$post=$db->select($query);
					if($post)
					{
						$i=0;
						while($result=$post->fetch_assoc()){
							?>  
							var myCenter = new google.maps.LatLng(<?php echo $result['latitude'];?>,<?php echo $result['logitude'];?>);
					
						    var marker = new google.maps.Marker({position:myCenter});
							marker.setMap(map);

							<?php } }   ?>        
						}

				
					</script>

					<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBr5JTkt6JNh87CeAgphkHYFb9GnY2bGT0&callback=myMap"></script>

				</div>
			</div>
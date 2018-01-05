<?php
if(!empty($_POST['hospitalsignupfield'])){
	
if ($_SERVER["REQUEST_METHOD"] == "POST") {
switch ($_POST['catagoryhos']) {
		case 'Public Medical College':
			$catid=1;
			break;
			case 'Private Medical College':
			$catid=2;
			break;
			case 'Goverment Hospital':
			$catid=3;
			break;
			case 'Private Hospital':
			$catid=4;
			break;
			case 'Clinic':
			$catid=5;
			break;		
		default:
			# code...
			break;
	}	
$catagoryid = mysqli_real_escape_string($db->link,$catid);	
$name = mysqli_real_escape_string($db->link,$_POST['name']);
$catagory = mysqli_real_escape_string($db->link,$_POST['catagoryhos']);
$location = mysqli_real_escape_string($db->link,$_POST['location']);
$phone = mysqli_real_escape_string($db->link,$_POST['phone']);
$email = mysqli_real_escape_string($db->link,$_POST['email']);
$details = mysqli_real_escape_string($db->link,$_POST['details']); 

$permited  = array('jpg', 'jpeg', 'png', 'gif');
$file_name = $_FILES['image']['name'];
$file_size = $_FILES['image']['size'];
$file_temp = $_FILES['image']['tmp_name'];

$div = explode('.', $file_name);
$file_ext = strtolower(end($div));
$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
$uploaded_image = "images/uploads/".$unique_image;

if ($file_size >1048567) {
 echo "<span class='error'>Image Size should be less then 1MB!
 </span>";
} elseif (in_array($file_ext, $permited) === false) {
 echo "<span class='error'>You can upload only:-"
 .implode(', ', $permited)."</span>";
} else{
move_uploaded_file($file_temp, $uploaded_image);

$query = "INSERT INTO hos_tbl(name, location, pic,details,phone,email,catid,catagory) 
VALUES('$name','$location','$uploaded_image','$details','$phone','$email','$catagoryid','$catagory')";
$inserted_rows = $db->insert($query);

if ($inserted_rows) {
	echo "<span>Data Inserted Succeessful</span>";
 ob_start();
 header("Location:index.php");
}else {
 echo "<span class='error'>Data Not Inserted !</span>";
}
}
}
}
?>
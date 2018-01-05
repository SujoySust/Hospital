   <span></span>
    <?php
    if (!empty($_POST['submit'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $catid=0;

            switch ($_POST['catagory']) {
              case 'BLOOD REQUEST':
                  $catid=1;
                  break;
                  case 'BLOOD DONOR':
                  $catid=2;
                  break;
                  case 'DOCTOR':
                  $catid=3;
                  break;
                  case 'HOSPITALS':
                  $catid=4;
                  break;
                  case 'EMERGENCY':
                  $catid=5;
                  break;
                  case 'HELP':
                  $catid=6;
                  break;
                  case 'HEALTH':
                  $catid=7;
                  break;
                  case 'SUGGESTIONS':
                  $catid=8;
                  break;
                   case 'REVIEWS':
                  $catid=9;
                  break;
                   case 'NEWS':
                  $catid=10;
                  break;
                   case 'OTHERS':
                  $catid=11;
                  break;
              
                  default:
                  $catid=0;
                  break;
          }
      
     if($loggedin == true) {
     $poster_id = mysqli_real_escape_string($db->link,$id);
     $catagoryid= mysqli_real_escape_string($db->link,$catid);
     $poster_name = mysqli_real_escape_string($db->link,$name);
     $title = mysqli_real_escape_string($db->link,$_POST['title']);
     $body = mysqli_real_escape_string($db->link,$_POST['body']);
     $catagory = mysqli_real_escape_string($db->link,$_POST['catagory']);

    $query = "INSERT INTO tbl_post (catid,posterid,postername,title, body, catagory) 
    VALUES('$catagoryid','$poster_id','$poster_name','$title','$body','$catagory')";

    $inserted_rows = $db->insert($query);

    if ($inserted_rows) {
        echo "<span>Data Inserted Successfully</span>";
      ob_start();
         header("Location:index.php");
    }else {
     echo "<span class='error'>Data Not Inserted !</span>".mysqli_error();
    }
    }
   else{

    echo "<span class='error'>You must loggedin to post!</span>";
 }
}
 }
?>
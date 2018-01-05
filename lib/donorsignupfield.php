   <span></span>

<?php
        if (!empty($_POST['donor'])) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $catid = 0;
          switch ($_POST['bloodgroup']) {
              case 'A+':
                  $catid=1;
                  break;
                  case 'A-':
                  $catid=2;
                  break;
                  case 'B+':
                  $catid=3;
                  break;
                  case 'B-':
                  $catid=4;
                  break;
                  case 'AB+':
                  $catid=5;
                  break;
                  case 'AB-':
                  $catid=6;
                  break;
                  case 'O+':
                  $catid=7;
                  break;
                  case 'O-':
                  $catid=8;
                  break;
              
              default:
                  $catid=0;
                  break;
          }

          if($loggedin == true){
        $name = mysqli_real_escape_string($db->link,$name);
        $facebookid = mysqli_real_escape_string($db->link,$id);
        $catagoryid =mysqli_real_escape_string($db->link,$catid);
        $bloodgroup = mysqli_real_escape_string($db->link,$_POST['bloodgroup']);
        $work = mysqli_real_escape_string($db->link,$_POST['work']);
        $lastupdate = mysqli_real_escape_string($db->link,$_POST['lastupdate']);
        $contract = mysqli_real_escape_string($db->link,$_POST['contract']);
        $email = mysqli_real_escape_string($db->link,$_POST['email']);
        $address = mysqli_real_escape_string($db->link,$_POST['address']);

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
        $query = "INSERT INTO donor_tbl(catid,facebookid, name, bloodgroup, work, lastupdate, image, address, contract, email) 
        VALUES('$catagoryid','$facebookid','$name','$bloodgroup','$work','$lastupdate','$uploaded_image','$address','$contract','$email')";
        $inserted_rows = $db->insert($query);
      }
        if ($inserted_rows) {
         ob_start();
         header("Location:index.php");
        }else {
         echo "<span class='error'>Data Not Inserted !</span>";
        }

    }else{
        echo "<span class='error'>Please Login with facebook !</span>";
      }

       }
     }
?>
 <?php
        if (!empty($_POST['doctorsignup'])) {  
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        switch ($_POST['expertise']) {
              case 'Accupuncture':
                  $catid=1;
                  break;
                  case 'Anaesthesiologist':
                  $catid=2;
                  break;
                  case 'Allergy Specialist':
                  $catid=3;
                  break;
                  case 'Cardiologist':
                  $catid=4;
                  break;
                  case 'Cosmetologist':
                  $catid=5;
                  break;
                  case 'Dental Surgeon':
                  $catid=6;
                  break;
                  case 'Diabetologist':
                  $catid=7;
                  break;
                  case 'Dietician & Nutritionist':
                  $catid=8;
                  break;
                   case 'ENT Surgeon':
                  $catid=9;
                  break;
                   case 'Gastro Physician / Surgeon':
                  $catid=10;
                  break;
                   case 'Hematologist':
                  $catid=11;
                  break;
                     case 'Maternity & Child Specialist':
                  $catid=12;
                  break;
                     case 'Medicine':
                  $catid=13;
                  break;
                     case 'Nephrologist':
                  $catid=14;
                  break;
                     case 'Neuro-Spine Physician':
                  $catid=15;
                  break;
                     case 'Oncologist- Medical / Surgeon':
                  $catid=16;
                  break;
                     case 'Ophthalmologist (Eye Specialist)':
                  $catid=17;
                  break;
                     case 'Orthopaedic':
                  $catid=18;
                  break;
                     case 'Surgery':
                  $catid=19;
                  break;
                     case 'Homeopathy Doctor':
                  $catid=20;
                  break;
                     case 'Astrologer':
                  $catid=21;
                  break;
                     case 'Urologist':
                  $catid=22;
                  break;

              
                  default:
                  $catid=0;
                  break;
          }
        $name = mysqli_real_escape_string($db->link,$_POST['name']);
        $catagoryid = mysqli_real_escape_string($db->link,$catid);
        $qualification = mysqli_real_escape_string($db->link,$_POST['qualification']);
        $expertise = mysqli_real_escape_string($db->link,$_POST['expertise']);
        $organization = mysqli_real_escape_string($db->link,$_POST['organization']);
        $chamber = mysqli_real_escape_string($db->link,$_POST['chamber']);
        $location = mysqli_real_escape_string($db->link,$_POST['location']);
        $phone = mysqli_real_escape_string($db->link,$_POST['phone']);
        $email = mysqli_real_escape_string($db->link,$_POST['email']);
        $website = mysqli_real_escape_string($db->link,$_POST['website']);
        $details = mysqli_real_escape_string($db->link,$_POST['details']); 

        $permited  = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "images/uploads/".$unique_image;

         if($name==""||$qualification==""||$expertise==""||$phone=="")
         {
            echo "<span class='error'>Please must fill * field !</span>";
        }elseif ($file_size >1048567) {
         echo "<span class='error'>Image Size should be less then 1MB!
         </span>";
        } elseif (in_array($file_ext, $permited) === false) {
         echo "<span class='error'>You can upload only:-"
         .implode(', ', $permited)."</span>";
        } else{
        move_uploaded_file($file_temp, $uploaded_image);

        $query = "INSERT INTO tbl_doc(catid,name, qualification, expertise, organization, chamber, location, phone, email, website, image, details) 
        VALUES('$catagoryid','$name','$qualification','$expertise','$organization','$chamber','$location','$phone','$email','$website','$uploaded_image','$details')";
        $inserted_rows = $db->insert($query);

        if ($inserted_rows) {
          echo "<span>Data Inserted Succeessfully</span>";
         ob_start();
         header("Location:index.php");
        }else {
         echo "<span class='error'>Data Not Inserted !</span>";
        }
        }
       }
     }
?>
<?php

    ///$post=$result['id'];

    if (!empty($_POST['comment'])) {
 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      
     if($loggedin == true) {
    // $facebookid = mysqli_real_escape_string($db->link,$id);
    // $name = mysqli_real_escape_string($db->link,$name);
     //$postid = mysqli_real_escape_string($db->link,$post]);

    $details = mysqli_real_escape_string($db->link,$_POST['details']);

    $query = "INSERT INTO tbl_coment (details) 
    VALUES('$details');";

    $inserted_rows = $db->insert($query);

    if ($inserted_rows) {
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
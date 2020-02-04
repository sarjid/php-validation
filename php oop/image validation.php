<?php
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $permited  = array('jpg', 'jpeg', 'png', 'gif');
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_temp = $_FILES['image']['tmp_name'];

    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
    $uploaded_image = "uploads/".$unique_image;

    if (empty($file_name)) {
     echo "<span class='error'>Please Select any Image !</span>";
    }elseif ($file_size >1048567) {
     echo "<span class='error'>Image Size should be less then 1MB!
     </span>";
    } elseif (in_array($file_ext, $permited) === false) {
     echo "<span class='error'>You can upload only:-"
     .implode(', ', $permited)."</span>";
    } else{
    move_uploaded_file($file_temp, $uploaded_image);
    $query = "INSERT INTO tbl_image(image) 
    VALUES('$uploaded_image')";
    $inserted_rows = $db->insert($query);
    if ($inserted_rows) {
     echo "<span class='success'>Image Inserted Successfully.
     </span>";
    }else {
     echo "<span class='error'>Image Not Inserted !</span>";
    }
    }
   }
  ?>
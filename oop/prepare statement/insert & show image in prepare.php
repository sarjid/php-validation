<?php

    $connection = new mysqli("localhost", "root", "usbw", "test");

    if (mysqli_connect_errno()) {
        echo "Database Connect failed";
        exit();
    }

        $sql = "SELECT image FROM images WHERE id = ?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("i",$id);
        $id = 1;
        $stmt->execute();
        $stmt->bind_result($image);
        $stmt->fetch();
        header("content-type: jpg");
        // echo '<img src="data:image/jpg;base64, '.base64_encode($image).'" >';
        echo $image;
  




// insert blob data or picture into database 
//     $sql  = "INSERT INTO images(image) VALUES(?)";
//     $stmt = $connection->prepare($sql);
//     $stmt->bind_param("b", $image);
//     $image = file_get_contents("sarjid.jpg");
//    $stmt->send_long_data(0, $image);
//     $stmt->execute();

?>
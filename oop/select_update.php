 $db = new mysqli("localhost", "root", "usbw", "userdata");


    if (mysqli_connect_errno()) {
        echo "connection fail";
       exit();
    }else {
        echo "connection successfull";
        
    }

    // update data 
    $sql = " UPDATE tbl_user SET skill = 'php,java,boot' WHERE id = '1' ";

    $result = $db->query($sql);


    // select data 
//     $sql = "SELECT * FROM tbl_user";
//    $result = $db->query($sql);
//    while ($data = $result->fetch_object()) {
//       echo $data->skill;
//    }
    
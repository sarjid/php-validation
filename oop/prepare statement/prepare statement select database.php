<?php

    $connection = new mysqli("localhost", "root", "usbw", "userdata");

    if (isset($connection)) {
        $sql = "SELECT name, skill FROM tbl_user order by id";
        $stmt = $connection->prepare($sql);
        $stmt->execute();
        $stmt->bind_result($name, $skill);
        while ($stmt->fetch()) {
           echo "$name <br>";
           echo "$skill <br>";
        }

    }else {
        echo "Database Connection Error";
    }

?>
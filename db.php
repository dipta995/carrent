<?php
$con = new mysqli("localhost", "root", "", "car_rent");
function validation($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    // $description = mysqli_real_escape_string($con,$description);
?>
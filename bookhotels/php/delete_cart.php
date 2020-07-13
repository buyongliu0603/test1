<?php
error_reporting(0);
include_once("dbconnect.php");
$email = $_POST['email'];
$bhotelid = $_POST['bhotelid'];


if (isset($_POST['bhotelid'])){
    $sqldelete = "DELETE FROM CART WHERE EMAIL = '$email' AND BHOTELID='$bhotelid'";
}else{
    $sqldelete = "DELETE FROM CART WHERE EMAIL = '$email'";
}
    
    if ($conn->query($sqldelete) === TRUE){
       echo "success";
    }else {
        echo "failed";
    }
?>
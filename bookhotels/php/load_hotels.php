<?php
error_reporting(0);
include_once ("dbconnect.php");
$description = $_POST['description'];
$name = $_POST['name'];

if (isset($description)){
    if ($description == "Recent"){
        $sql = "SELECT * FROM HOTEL ORDER BY ID lIMIT 21";    
    }else{
        $sql = "SELECT * FROM HOTEL WHERE DESCRIPTION = '$description'";    
    }
}else{
    $sql = "SELECT * FROM HOTEL ORDER BY ID lIMIT 21";    
}
if (isset($name)){
   $sql = "SELECT * FROM HOTEL WHERE NAME LIKE  '%$name%'";
}


$result = $conn->query($sql);

if ($result->num_rows > 0)
{
    $response["hotels"] = array();
    while ($row = $result->fetch_assoc())
    {
        $hotellist = array();
        $hotellist["id"] = $row["ID"];
        $hotellist["name"] = $row["NAME"];
        $hotellist["location"] = $row["LOCATION"];
        $hotellist["description"] = $row["DESCRIPTION"];
        $hotellist["budget"] = $row["BUDGET"];
        $hotellist["quantity"] = $row["TOTALROOMS"];
        $hotellist["date"] = $row["DATE"];
        array_push($response["hotels"], $hotellist);
    }
    echo json_encode($response);
}
else
{
    echo "nodata";
}
?>
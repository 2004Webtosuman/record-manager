<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link href="index.css" rel="stylesheet">
</head>
<body>
   
</body>
</html>


<?php
include "front.php";
try{
   $productName = $_POST['productName'];
   $productPrice = $_POST['productPrice'];
   $productQuantity = $_POST['productQuantity'];
$productRemarks = $_POST['productRemarks'];


// $productName = isset($_POST['productName']) ? $_POST['productName'] : null;
// $productPrice = isset($_POST['productPrice']) ? $_POST['productPrice'] : null;
// $productQuantity = isset($_POST['productQuantity']) ? $_POST['productQuantity'] : null;
// $productRemarks = isset($_POST['productRemarks']) ? $_POST['productRemarks'] : null;

// var_dump($_POST);


if (empty($productName)  || !is_numeric($productPrice) || !is_numeric($productQuantity) || empty($productRemarks)) {
   throw new Exception("Invalid input data.");
}
$server="localhost";
$username="root";
$password="";
$database="projectdb";

$conn=mysqli_connect($server,$username,$password,$database);
if(!$conn){
    die("connection fail".mysqli_connect_error());
}
else{
    echo "connection sucessfull!!"."<br>";
}
$sql="INSERT INTO `project_tbl` ( `Name`, `Price`, `Quantity`, `Remarks`)
 VALUES ('$productName', '$productPrice', '$productQuantity','$productRemarks')";
$result=mysqli_query($conn,$sql);
if($result){
    echo "<div class='message' style='visibility:visibile';>Data inserted sucessfully</div>";
}    
} catch (Exception $e) {
echo "Error: " . $e->getMessage();
}
?>

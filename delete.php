<?php


include './databaseconnection.php';

$sql="delete from tbl_product where product_id=".$_GET['id'];
mysqli_query($con, $sql);

header("Location:Admin.php");

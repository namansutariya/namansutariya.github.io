<?php session_start();
include './databaseconnection.php';
if(isset($_SESSION["username"])&&!empty($_SESSION["username"]))
{
$sql="select * from tbl_user where user_id='".$_SESSION["username"]."'";
$result=  mysqli_query($con, $sql);
$data=  mysqli_fetch_object($result);
if($data->user_type=="Admin")
{
    header("Location:Admin.php");
}

}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <?php include './autoload.php'; ?>
    </head>
    <body>
        <div class="container" style="margin-top: 50px;">
            <div class="breadcrumb">
                <li><a href="emp.php">Home</a></li>
                <li><a href="empmanage.php">Sell Product</a></li>
                <li><a href="logout.php">Logout</a></li>
            </div>
            <div class="jumbotron">
                <h2>Welcome to <?php echo $_SESSION["username"] ?></h2>
            </div>
        </div>
    </body>
</html>

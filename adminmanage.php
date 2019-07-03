<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
include './databaseconnection.php';
if(isset($_SESSION["username"])&&!empty($_SESSION["username"]))
{
$sql="select * from tbl_user where user_id='".$_SESSION["username"]."'";
$result=  mysqli_query($con, $sql);
$data=  mysqli_fetch_object($result);

if($data->user_type=="Employee")
{
    header("Location:emp.php");
}
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <?php include './autoload.php'; ?>
    </head>
    <body>
        <?php 
            include './databaseconnection.php';
            if(isset($_POST)&&!empty($_POST))
            {
                $sql="insert into tbl_product values(null,'".$_POST["pname"]."','".$_POST["pdescription"]."',".$_POST["pprice"].",'".$_POST["product_type"]."',".$_POST["pqty"].")";
                mysqli_query($con, $sql) or die("insert fail");
            }
        ?>
        <form method="post">
            <div class="container" style="margin-top: 50px;">
                <div class="breadcrumb">
                    <li><a href="Admin.php">Home</a></li>
                    <li><a href="adminmanage.php">Manage Product</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </div>

                <div class="jumbotron">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Product Name</label>
                                <input type="text" class="form-control" name="pname" />
                                <label>Product Description</label>
                                <textarea name="pdescription" class="form-control" rows="4"></textarea>
                                <label>Product Type</label>
                                <select name="product_type" class="form-control">
                                    <option value="-1">Choose Product Type</option>
                                    <option>Electronics</option>
                                    <option>Watch</option>
                                    <option>Mens</option>
                                    <option>Womens</option>
                                    <option>Mobiles</option>
                                    <option>Laptop</option>
                                </select>
                                <label>Product Quantity</label>
                                <input type="text" class="form-control" name="pqty" />
                                <label>Product Price</label>
                                <input type="text" class="form-control" name="pprice" />
                                <br/>
                                <input type="submit" value="Add" class="btn btn-lg btn-info">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>

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
                <li><a href="Admin.php">Home</a></li>
                <li><a href="adminmanage.php">Manage Product</a></li>
                <li><a href="logout.php">Logout</a></li>
            </div>
            <div class="jumbotron">
                <h2>Welcome to <?php echo $_SESSION["username"] ?></h2>
            </div>
            <br />
            <div class="jumbotron">
                <table class="table table-responsive table-striped">
                    <tr>
                        <th>No</th>
                        <th>Product_Id</th>
                        <th>Product Name</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Product Type</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                    <?php 
                    include './databaseconnection.php';
                    $sql="select * from tbl_product";
                    $result=  mysqli_query($con, $sql);
                    $cnt=1;
                    while($row=  mysqli_fetch_assoc($result))
                    {
                        ?>
                    <tr>
                        <td><?php echo $cnt; ?></td>
                        <td><?php echo $row['product_id']; ?></td>
                        <td><?php echo $row['product_name'] ?></td>
                        <td><?php echo $row['Description'] ?></td>
                        <td><?php echo $row['quantity'] ?></td>
                        <td><?php echo $row['type'] ?></td>
                        <td><?php echo $row['price'] ?></td>
                        <td><?php echo "<a href=delete.php?id=".$row['product_id'].">Delete</a>"; ?></td>
                    
                    </tr>
                        <?php 
                        $cnt++;
                    }
                    ?>
                </table>
            </div>
        </div>
    </body>
</html>

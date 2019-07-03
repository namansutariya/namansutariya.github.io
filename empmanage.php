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
if($data->user_type=="Admin")
{
    header("Location:Admin.php");
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
        <form method="post" action="sell.php">
        <div class="container" style="margin-top: 50px;">
            <div class="breadcrumb">
                <li><a href="emp.php">Home</a></li>
                <li><a href="empmanage.php">Sell Product</a></li>
                <li><a href="logout.php">Logout</a></li>
            </div>
            <div class="row">
                <?php 
                    include './databaseconnection.php';
                    $sql="select * from tbl_product";
                    $result=  mysqli_query($con, $sql);
                    while($row=mysqli_fetch_assoc($result))
                    {
                        ?>
                <div class="col-md-3">
                    <div class="well well-lg">
                        <input type="checkbox" name="product[]" value="<?php echo $row['product_id'] ?>" /><br />
                        Quantity <select name="<?php echo $row['product_id'] ?>[]">
                            <?php $i=1; 
                            for($i=1;$i<=$row['quantity'];$i++)
                                { 
                                    ?>
                                        <option><?php echo $i ?></option>
                                    <?php
                                 } ?>
                        </select>
                    <?php 
                        echo "Product Name : ".$row['product_name']."<br>";
                        echo "Description : ".$row['Description']."<br>";
                        echo "Price : ".$row['price']."<br>";
                    ?>
                    </div>
                </div>
                        <?php
                    }
                ?>
            </div>
            <div class="jumbotron">
                
                    <input type="submit" value="Sell" class="btn btn-info" />
                
            </div>
        </div>
        </form>
    </body>
</html>

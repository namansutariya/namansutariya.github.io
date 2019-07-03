<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <?php include './autoload.php'; ?>
    </head>
    <body>
       
        <div class="container">
            
        <div class="jumbotron">
            <h2>Online Selling Store</h2>
          
            <div class="row">
                <div class="col-md-6">
                    <br />
                    <label>User Name :</label> <label><?php echo $_SESSION["username"] ?></label> <br />
                    
                    <h3>Products :</h3> <br>
                    
                    <table class="table table-striped">
                        <tr>
                            <td><label>Product Name</label></td>
                            <td><label>Quantity</label></td>
                            <td><label>Price</label></td>
                            <td><label>Amount</label></td>
                            
                        </tr>
                    
                    <?php
                        include './databaseconnection.php';
                        $total=0;
                        foreach ($_POST["product"] as $item)
                        {
                            $sql="select * from tbl_product where product_id=".$item;
                            $result=  mysqli_query($con, $sql);
                            $data=  mysqli_fetch_object($result);
                            ?>
                            
                        <tr>
                            <td><label><?php echo $data->product_name ?></label></td>
                             <td><label><?php echo $_POST[$item][0]  ?></label></td>
                             <td><label><?php echo $data->price  ?></label></td>
                             <td><label><?php echo $data->price*$_POST[$item][0]  ?></label></td>
                        </tr>
                            <?php
                            $total=$data->price*$_POST[$item][0]+$total;
                        }
                    ?>
                        <tr>
                            <td><h4><label>Total Amount</label></h4></td>
                            <td></td>
                            <td></td>
                            <td><h4><label><?php echo $total; ?></label></h4></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        </div>
    </body>
</html>

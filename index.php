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
        <?php 
            include './databaseconnection.php';
            if(isset($_POST)&&!empty($_POST))
            {
                $sql="select * from tbl_user where user_id='".$_POST['username']."' and password='".$_POST['password']."'";
                $result=  mysqli_query($con, $sql);
                $data=  mysqli_fetch_object($result);
                if($data->user_id==$_POST["username"]&&$data->password==$_POST["password"])
                {
                    if($data->user_type=="Admin")
                    {
                        $_SESSION["username"]=$_POST["username"];
                        header("Location:Admin.php");
                    }
                    if($data->user_type=="Employee")
                    {
                        $_SESSION["username"]=$_POST["username"];
                        header("Location:emp.php");
                    }
                }
                else
                {
                    echo "Fail";
                }
            }
        ?>
        <form method="post">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h2>Login</h2>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" name="username" />
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password" />
                                </div>
                                <div class="form-group col-md-offset-9">
                                    <a href="regi.php">Create New User</a>
                                </div>
                                <div class="form-group">
                                    <p></p>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <div class="form-group col-md-offset-10">
                                    <input type="submit" value="Login" class="btn btn-lg btn-info" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>

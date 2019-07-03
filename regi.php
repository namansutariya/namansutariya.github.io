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
               $sql="insert into tbl_user values('".$_POST["username"]."','".$_POST['password']."','".$_POST["fname"]."','".$_POST['lname']."','".$_POST["usertype"]."','".$_POST["contactno"]."')";
               mysqli_query($con, $sql) or die("insert fail");
               header("Location:index.php");
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
                                    <label>First Name</label>
                                    <input type="text" class="form-control" name="fname" />
                                    <label>Last name</label>
                                    <input type="text" class="form-control" name="lname" />
                                    <label>Contcat No</label>
                                    <input type="text" class="form-control" name="contactno" />
                                    <label>User Type</label>
                                    <select name="usertype" class="form-control">
                                        <option value="-1">Choose User Type</option>
                                        <option>Employee</option>
                                        <option>Admin</option>
                                    </select>
                                    
                                </div>
                                
                                <div class="form-group">
                                    <p></p>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <div class="form-group col-md-offset-10">
                                    <input type="submit" value="Sign Up" class="btn btn-lg btn-info" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>

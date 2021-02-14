<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>



<div class="container">
<div class="row">
<div class="col col-12 col-sm-2">
</div>
<div class="col col-12 col-sm-8">
<form method="POST">
<table class='table'>

<tr>
    <td>id</td>
    <td><input name="uid" class="form-control" type="text"></td>
</tr>

<tr>
    <td>name</td>
    <td><input name="uname" class="form-control" type="text"></td>
</tr>
<tr>
    <td>address</td>
    <td><input name="uaddress" class="form-control" type="text"></td>
</tr>
<tr>
    <td>mobile</td>
    <td><input name="umobile" class="form-control" type="text"></td>
</tr>
<tr>
    <td>user name</td>
    <td><input name="uuser" class="form-control" type="text"></td>
</tr>

<tr>
    <td>email</td>
    <td><input name="uemail" class="form-control" type="text"></td>
</tr>
<tr>
    <td>password</td>
    <td><input name="pwd" class="form-control" type="password"></td>
</tr>
<tr>
    <td></td>
    <td><button name="btn" class="btn btn-success">REGISTER</button></td>
</tr>
<div class="col col-12 col-sm-2">
<tr>
    <td></td>
    <td></td>

    <td>  <a href='userlogin.php'>  Click Here </a>   </td>
</tr>
</div>
</table>
</form>
</div>
</body>
</html>
<?php
if(isset($_POST["btn"]))
{

    $id=$_POST["uid"];
    $name=$_POST["uname"];
    $address=$_POST["uaddress"];
    $phone=$_POST["umobile"];
    $email=$_POST["uemail"];
    $user=$_POST["uuser"];
    $password=$_POST["pwd"];

    $connection=new mysqli("localhost","root","","fakeproductreview");
    $sql="INSERT INTO `user`(`id`, `name`, `address`, `mobile`, `email`, `username`, `password`) VALUES ($id,'$name','$address',$phone,'$email','$user','$password')";
    $result=$connection->query($sql);
    if($result===TRUE)
    {

        echo " <script>alert('Registered succesfully')</script> ".$connection->error;
    
        echo "<script> window.location.href='userlogin.php' </script> ".$connection->error;
    }
    
    else
    {
        echo "<script> alert('Invalid Credentials') </script> ".$connection->error;

    
    }
}
    
?>
<?php
session_start();
?>

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
<table class="table">

<tr>
    <td>username</td>
    <td><input name="uusername" class="form-control" type="text"></td>
</tr>
<tr>
    <td>password</td>
    <td><input name="upassword" class="form-control" type="password"></td>
</tr>
<tr>
    <td></td>
    <td><button name="btn" class="btn btn-success">LOGIN</button></td>
</tr>

<tr>
    <td>  <a href='user.php'> New Users Click Here </a>   </td>
    <td></td>
</tr>

</table>
</form>
</div>
<div class="col col-12 col-sm-2">
</div>

</body>
</html>
<?php
if(isset($_POST["btn"]))
{
    $username=$_POST["uusername"];
    $password=$_POST["upassword"];


    $connection=new mysqli("localhost","root","","fakeproductreview");


    $sql="SELECT `id`, `name`, `address`, `mobile`, `email`, `username`, `password` FROM `user` WHERE `username`='$username' and `password`='$password'";

    $result=$connection->query($sql);

    if($result->num_rows>0){

        while($row=$result->fetch_assoc()){
            $id=$row['id'];
            $_SESSION['uid']=$id;

            echo "<script> window.location.href='review.php' </script> ";

        }
    }
    else{
        echo "<script> alert('Invalid Credentials ')</script> ";


    }
}
    
?>

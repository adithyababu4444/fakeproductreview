
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
<nav class="navbar navbar-expand-lg navbar-light bg-warning">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Fake Product Review - USER </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
       
        <li class="nav-item">
          <a class="nav-link" href="userproduct.php">PRODUCT SEARCH</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="review.php">REVIEW ENTRY</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="profile.php">PROFILE</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">LOG OUT</a>
        </li>
       
      </ul>
      </div>
  </div>
</nav>


<div class="container">
<div class="row">
<div class="col col-12 col-sm-2">
</div>
<div class="col col-12 col-sm-8">


<?php

$id=$_SESSION['uid'];
$connection=new mysqli("localhost","root","","fakeproductreview");
$sql="SELECT `id`, `name`, `address`, `mobile`, `email`, `username` FROM `user` WHERE `id`=$id";
$result=$connection->query($sql);
if($result->num_rows>0)
{
  while($row=$result->fetch_assoc())
  {
      $getid=$row['id'];
      $getname=$row['name'];
      $getaddress=$row['address'];
      $getmobile=$row['mobile'];
      $getemail=$row['email'];
      $getuname=$row['username'];



echo"<table class='table'>
<form method='POST'>
<tr>
    <td>name</td>
    <td>  <input  type='text' value='$getname' class='form-control' name='pst'></td>
</tr>
<tr>
    <td>address</td>
    <td>  <input  type='text' value='$getaddress'class='form-control' name='add'></td>
</tr>
<tr>
    <td>mobile</td>
    <td>  <input  type='text' value='$getmobile' class='form-control' name='num'></td>
</tr>
<tr>
    <td>email</td>
    <td>  <input  type='text' value='$getemail' class='form-control' name='emi'></td>
</tr>

<tr>
    <td>user name</td>
    <td>$getuname</td>
</tr>
<tr>
    <td></td>
    <td><button name='btn'class='btn btn-success'>UPDATE</button></td>
</tr>
</table>
</form>";
}
}
?>
<div class="col col-12 col-sm-2">
</div>
</div>
</body>
</html>

<?php
if(isset($_POST["btn"]))
{
  $id=$_SESSION['uid'];


    $name=$_POST["pst"];
    $address=$_POST["add"];
    $phone=$_POST["num"];
    $email=$_POST["emi"];
    $connection=new mysqli("localhost","root","","fakeproductreview");
    $sql="UPDATE `user` SET`name`='$name',`address`='$address',`mobile`='$phone',`email`='$email' WHERE `id`=$id";
    $result=$connection->query($sql);
    if($result===TRUE)
    {

        echo " <script>alert('Profile Updated succesfully')</script> ".$connection->error;
        echo " <script>window.location.href='profile.php'</script> ";

    
    }
    
    else
    {
        echo "<script> alert('Invalid Credentials') </script> ".$connection->error;

    
    }
}
    
?>
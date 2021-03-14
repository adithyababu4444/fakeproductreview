
<?php
session_start();
?><!DOCTYPE html>
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
    <a class="navbar-brand" href="#">Fake product review - USER </a>
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
<form method="POST">
<table class="table">


<tr>
    <td>review</td>
    <td><input name="ureview" class="form-control" type="text"></td>
</tr>

<tr>
    <td>type</td>
    <td><input name="utype" class="form-control" type="text"></td>
</tr>
<tr>
    <td>status</td>
    <td><input name="ustatus" class="form-control" type="text"></td>
</tr>
<tr>
    <td></td>
    <td><button name="btn" class="btn btn-success">REGISTER</button></td>
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

  $ipaddress = '';
  if (isset($_SERVER['REMOTE_ADDR']))
      $ipaddress = $_SERVER['REMOTE_ADDR'];
  else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
      $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
  else if(isset($_SERVER['HTTP_X_FORWARDED']))
      $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
  else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
      $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
  else if(isset($_SERVER['HTTP_FORWARDED']))
      $ipaddress = $_SERVER['HTTP_FORWARDED'];
  else if(isset($_SERVER['HTTP_CLIENT_IP']))
      $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
  
  
$localIP = getHostByName(getHostName());
      // echo $ipaddress;



    $userid=$_SESSION['uid'];
    $ip=$localIP ;
    $review=$_POST["ureview"];
    $type=$_POST["utype"];
    $status=$_POST["ustatus"];

    $connection=new mysqli("localhost","root","","fakeproductreview");
    $sql="INSERT INTO `reviews`(  `userid`, `ip`, `review`, `type`, `status`) VALUES($userid,'$ip','$review','$type',$status)";

     $result=$connection->query($sql);
    if($result===true)
    {
        echo "<script>alert('inserted successfully')</script>";

    }
    else
    {
        echo "<script>alert('error in insertion')</script>";
}
    
}
?>
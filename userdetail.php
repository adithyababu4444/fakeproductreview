<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-warning">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Fake product review - ADMIN </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="product.php">Product Entry</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="productdetail.php">Product Search</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="userdetail.php">User Search</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="adminlogout.php">log out</a>
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
    <table class="table" >
    <tr>
        <td>mobile</td>
        <td><input name="umobile" class="form-control" type="text"></td>
    </tr>
    <tr>
        <td></td>
        <td><button name="btn" class="btn btn-success">SEARCH</button></td>
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

$mobile=$_POST["umobile"];
$connection=new mysqli("localhost","root","","fakeproductreview");
$sql="SELECT `id`, `name`, `address`, `email`, `username`, `password` FROM `user` WHERE `mobile`='$mobile'";
$result=$connection->query($sql);
if($result->num_rows>0)
{
while($row=$result->fetch_assoc())
{
    $getid=$row['id'];
    $getname=$row['name'];
    $getaddress=$row['address'];
    $getemail=$row['email'];
    $getuname=$row['username'];
    $getpwd=$row['password'];


echo "<table class='table'>
<tr>
<td>id<td>
<td>$getid</td>
</tr>
<tr>
<td>name<td>
<td>$getname</td>
</tr>
<tr>
<td>address<td>
<td>$getaddress</td>
</tr>
<tr>
<td>email<td>
<td>$getemail</td>
</tr>
<tr>
<td>username<td>
<td>$getuname</td>
</tr>
<tr>
<td>password<td>
<td>$getpwd</td>
</tr>
</table>";

}
}
else
{
    echo "no details has found";
}

}
?>
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
    <form method="POST">
    <table class="table" >
    <tr>
    <td>productname</td>
    <td><input name="uproname" class="form-control" type="text"></td>
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

$productname=$_POST["uproname"];
$connection=new mysqli("localhost","root","","fakeproductreview");
$sql="SELECT `id`, `specs`, `image` FROM `products` WHERE `productname`='$productname'";
$result=$connection->query($sql);
if($result->num_rows>0)
{
    while($row=$result->fetch_assoc())
{
    $getid=$row['id'];
    $getspecs=$row['specs'];
    $getimage=$row['image'];

echo "<table class='table'>
<tr>
<td>id<td>
<td>$getid</td>
</tr>
<tr>
<td>specs<td>
<td>$getspecs</td>
</tr>
<tr>
<td>image<td>
<td><img src='./$getimage' alt='' class='img-thumbnail' height=400 width=200></td>
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
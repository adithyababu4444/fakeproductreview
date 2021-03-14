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
          <a class="nav-link" href="product_update.php">Product Update</a>
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

echo " <form method='POST'> 
<table class='table'>
<tr>
<td>id<td>
<td><input type='text' name='id' class='form-control' value='$getid' readonly /></td>
</tr>

<tr>
<td>Product name <td>
<td><input type='text' name='pname' class='form-control' value='$productname'  /></td>
</tr>


<tr>
<td>specs<td>
<td>  <input type='text' name='specs' class='form-control' value='$getspecs' /> </td>
</tr>
<tr>
<td>image<td>
<td><img src='./$getimage' alt='' class='img-thumbnail' height=400 width=200></td>
</tr>

<tr>
<td><td>
<td>

<button class='btn btn-success' name='upbtn'> Update  </button>
</td>
</tr>


</table> </form> ";

}
}
else
{
    echo "no details has found";
}

}
?>


<?php


if(isset($_POST['upbtn']))

{


  // $productname=$_POST["productname"];
  $productId=$_POST["id"];

  $specs=$_POST["specs"];


  $pname=$_POST["pname"];



  $connection=new mysqli("localhost","root","","fakeproductreview");
  $sql="UPDATE `products` SET `specs`='$specs', productname='$pname' WHERE `id`=$productId ";
  $result=$connection->query($sql);
  if($result===TRUE)
  {
    echo " Succesfully Updated";
    
}
else{
  echo " Error ";

}

}
?>
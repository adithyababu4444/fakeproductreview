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
<form method="POST" enctype="multipart/form-data">
<table class="table">

<tr>
    <td>productname</td>
    <td><input name="uproname" class="form-control" type="text"></td>
</tr>
<tr>
    <td>specs</td>
    <td><input name="uspecs" class="form-control" type="text"></td>
</tr>
<tr>
    <td>image</td>
    <td><input name="fileToUpload" class="form-control" type="file"></td>
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

  $connection=new mysqli("localhost","root","","fakeproductreview");

    $productname=$_POST["uproname"];
    $specs=$_POST["uspecs"];

    $target_dir = "images/";
    $target_file = $target_dir . rand(999, 9999) . basename($_FILES["fileToUpload"]["name"]);
    // $Image = $connection->real_escape_string($target_file);
    $testage = $connection->real_escape_string($target_file);

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

      echo "<script>alert('File Uploaded successfully')</script>";

        // echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
      echo "<script>alert('File Uploading Failed')</script>";
    }


    $sql="INSERT INTO  `products`( `productname`, `specs`, `image`) VALUES ('$productname','$specs','$testage')";
     $result=$connection->query($sql);
    if($result===true)
    {
        echo "<script>alert('Product added successfully')</script>";

    }
    else
    {
        echo "<script>alert('error in insertion')</script>";
}
    
}
?>
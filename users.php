<?php 

  session_start();
  //logout
  if (isset($_GET['logout'])) {
    session_unset();

    session_destroy();

    header('location: index.php');
  }

  //ckeck if user

  if(!isset($_SESSION['role'])){
    header('location: index.php');
}else{
    if($_SESSION['role'] != 2){
        header('location: index.php');
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <title>Users</title>
</head>
<body>
  <h1>Users</h1>
</body>
</html>
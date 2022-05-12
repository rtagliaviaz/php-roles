<?php 
  include_once './config/database.php';

  //create user
  if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $db = new Database();
    $query = $db->connect()->prepare('INSERT INTO users (username, password, role_id) VALUES (:username, :password, 2)');
    $query->execute(['username' => $username, 'password' => $password]);

    if ($query) {
      echo '
      <div class="col-md-6 mx-auto mt-4">
        <div class="alert alert-success" role="alert">
        User created successfully
        </div>
      </div>';
    } else {
      echo '
      <div class="col-md-6 mx-auto mt-4">
        <div class="alert alert-danger" role="alert">
        User not created
        </div>
      </div>';
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
  <title>Sign Up</title>
</head>
<body>
<div class="col-md-6 mx-auto mt-4">
  <h2>Sing Up</h2>
  <form action="#" method="POST">
    Username: <br/><input type="text" name="username"><br/>
    Password: <br/><input type="text" name="password"><br/>
    <input type="submit" value="signup">
  </form>
</div>
</body>
</html>
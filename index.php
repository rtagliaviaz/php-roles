<?php 
  include_once './config/database.php';

  session_start();

  //logout
  if (isset($_GET['logout'])) {
    session_unset();

    session_destroy();
  }

  if (isset($_SESSION['role'])) {
    switch($_SESSION['role']){
      case 1;
        header('location: admin.php');
      break;

      case 2;
        header('location: users.php');
      break;

      default:
        // header('location: index.php');
    }
  }

  if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $db = new Database();
    $query = $db->connect()->prepare('SELECT*FROM users WHERE username = :username AND password = :password');
    $query->execute(['username' => $username, 'password' => $password]);
    $row = $query->fetch(PDO::FETCH_NUM);

    if ($row > 0) {
      $_SESSION['role'] = $row[1];


      switch($_SESSION['role']){
        case 1;
          header('location: admin.php');
        break;

        case 2;
          header('location: users.php');
        break;

        default:
          // header('location: index.php');
      } 
    } else {
      echo '
      <div class="col-md-6 mx-auto mt-4">
        <div class="alert alert-danger" role="alert">
        Username or password is incorrect
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
  <title>Index</title>
</head>

<body>
  <div class="col-md-6 mx-auto mt-4">
    <?php 
      include_once 'login.php';
    ?>
  </div>
</body>

</html>
<?php
 session_start();
 $domain = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'];

  ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Employee Management System</title>
  <link rel="stylesheet" href="<?php echo $domain. '/ems/css/bootstrap.min.css' ;?>" type="text/css">
  <link rel="stylesheet" href="<?php echo $domain. '/ems/css/custom.css' ;?>"type="text/css">
  <link rel="icon" type="image/x-icon" href="<?php echo $domain. '/ems/images/ems.png';?>">
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand" href="/ems/index.php"><img src="<?php echo $domain. '/ems/images/ems.png';?>" alt="logo" width="50" height="50"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor03">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a class="nav-link active" href="/ems/index.php">Home
                <span class="visually-hidden">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Features</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
              <?php
              if(isset( $_SESSION['dashboard'])){
                echo $_SESSION['dashboard'];               
              }
              ?>
            </li>
          </ul>
          <form class="d-flex">
            <input class="form-control me-sm-2" type="text" placeholder="Search">
            <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
          </form>
          <ul class="d-flex list-unstyled">
            <?php
            if (isset($_SESSION['logout'])) {
              echo $_SESSION['logout'];
            } else {
              echo " <li class='ms-2'><a href='/ems/logout.php' style='color:#fff;' class='btn btn-secondary mt-3' href='/ems/login.php' role='button' aria-haspopup='true' aria-expanded='false'>Log In</a></li>";
            }
            ?>
          </ul>

        </div>
      </div>
    </nav>
  </header>
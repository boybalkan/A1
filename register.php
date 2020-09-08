<?php
  include ('server.php');
 ?>


<!DOCTYPE html>
<html>

<head>
  <title>A1</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


  <link rel="stylesheet" href="css/styles.css">

  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&family=Ubuntu:wght@300;400&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">




  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="css/signup.css">

</head>


<body>

  <section id="title" class="colored-section">
    <div class="container-fluid">
      <!-- Nav Bar -->
      <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="index.html"><img src="images/a1logo.png" alt="Logo"></a>
        <h3 class="name">Tisch A1</h3>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">

          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="#footer">Regeln</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#pricing">Spiele</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.html">Einloggen</a>
            </li>
          </ul>
        </div>
      </nav>



      <div class="container h-100">
        <div class="d-flex justify-content-center h-100">
          <div class="user_card">
            <div class="d-flex justify-content-center">
              <div class="brand_logo_container">
                <img src="images/a1logo.png" class="brand_logo" alt="Logo">
              </div>
            </div>
            <div class="d-flex justify-content-center form_container">
              <form id="input-container" method="POST" action="register.php">
                <?php include('errors.php'); ?>
                <div class="input-group mb-2">
                  <input type="text" name="surname" class="form-control input_user" value="" placeholder="Nachname" required>
                  <input type="text" name="prename" class="form-control input_user" value="" placeholder="Vorname" required>
                </div>
                <div class="input-group mb-2">
                  <input type="text" name="mail" class="form-control input_user" value="" placeholder="E-Mail" required>
                </div>
                <div class="input-group mb-3">
                  <input type="text" name="bdate" class="form-control input_user" value="" placeholder="Geburtsdatum YYYY-MM-DD" required>
                </div>


                <div class="input-group mb-2">
                  <input type="text" name="username" class="form-control input_user" value="" placeholder="Username" required>
                </div>

                <div class="input-group mb-2">
                  <input type="password" name="pwd" class="form-control input_pass" value="" placeholder="Passwort" required>
                </div>
                <div class="input-group mb-2">
                  <input type="password" name="pwd-confirm" class="form-control input_pass" value="" placeholder="Passwort wiederholen" required>
                </div>
                <div class="form-group">

                </div>
                <div class="d-flex justify-content-center mt-3 login_container">
                  <button type="submit" name="register" class="btn login_btn">Sign Up</button>
                </div>
              </form>
            </div>

            <div class="mt-4">
              <div class="d-flex justify-content-center links">
                You have already an account? <a href="login.php" class="ml-2">Sign In</a>
              </div>
              <div class="d-flex justify-content-center links">
                <a href="#">Forgot your password?</a>
              </div>
            </div>
          </div>
        </div>
      </div>
</body>

</html>

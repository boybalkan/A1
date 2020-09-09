<?php
  session_start();
  include("DatabaseConnection.php");
  $username = "";
  $email = "";
  $surname ="";
  $prename = "";
  $mail = "";
  $bdate = "";
  $pwd = "";
  $pwdConfirm = "";
  $errors = array();

  //Connection
  //$db = mysqli_connect('localhost', 'root', '', 'TischA1');
  $db = new DatabaseConnection('localhost', 'root', '', 'TischA1');
  //Click on button
  if(isset($_POST['register'])){
    $username = trim($_POST['username']);
    $surname = trim($_POST['surname']);
    $prename = trim($_POST['prename']);
    $mail = trim($_POST['mail']);
    $bdate = trim($_POST['bdate']);
    $pwd = trim($_POST['pwd']);
    $pwdConfirm = trim($_POST['pwd-confirm']);
  }

  if(empty($username)){
    array_push($errors, "Username is required.");
  }
  if(empty($surname)){
    array_push($errors, "Surname is required.");
  }
  if(empty($prename)){
    array_push($errors, "Prename is required.");
  }
  if(empty($mail)){
    array_push($errors, "E-Mail is required.");
  }
  if(empty($bdate)){
    array_push($errors, "Birth date is required.");
  }
  if(empty($pwd)){
    array_push($errors, "Pwd is required.");
  }
  if(empty($pwdConfirm)){
    array_push($errors, "PwdConfirm is required.");
  }
  if($pwd != $pwdConfirm){
    array_push($errors, "Not the same password.");
  }

  if(count($errors) == 0 ){
    //Adding feature over 18!
    // $bday = strtotime($bdate);
    // $newBDate = date('Y-m-d', $bday);
    // echo $newBDate;
    //
    // $today = new DateTime(date('m.d.y'));
    // $newTDate = date('Y-m-d', $today);
    // $diff = $today->diff($newBDate);
    // echo $diff->y, $diff->m, $diff->d;
    $bdateN = date('Y-m-d', strtotime($bdate));
    $db->add_user($username, $surname, $prename, $mail, $bdateN, $pwd);

    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now logged in";
    header('location: index.php');


    //unset($_POST['register']);

  }

//login via login.php
  if(isset($_POST['login'])){
    $username = trim($_POST['username']);
    $password = trim($_POST['pwd']);
    $errors = array();

    // $db->login_user($username, $password, $errors);
    if(empty($username)){
      array_push($errors, "Username is required.");
    }
    if(empty($password)){
      array_push($errors, "Pwd is required.");
    }

      if(count($errors) == 7 ){

        $password = md5($password);
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = mysqli_query($db, $query);

        if(mysqli_num_rows($result) == 1){
          $_SESSION['username'] = $username;
          $_SESSION['success'] = "You are now logged in";
          header('location: index.php');
        }else{
          array_push($errors, "The username or password is incorrect");
          header('location: login.php');
        }
      }
  }

  //logout
  if(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['username']);
    header('location: login.php');
  }




 ?>

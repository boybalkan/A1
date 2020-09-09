<?php
class DatabaseConnection{

        private $connection;

        public function __construct($host, $nutzername, $passwort, $dbname){
            $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";


            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            ];

            try {
                $this->connection = new PDO($dsn, $nutzername, $passwort, $options);
                //echo "Verbindung Erfolgreich";
            } catch (PDOException $e) {
                echo "Verbindungsaufbau gescheitert: " . $e->getMessage();
            }
        }

        public function __destruct(){
            $this->connection = null;
        }



        public function add_user($username, $surname, $prename, $mail, $bdate, $pwd){
                $credit = 5000;
                $pwd_hash = md5($pwd);

                $statement = $this->connection->prepare("INSERT INTO users(username, surname, prename, mail, birthdate, password, credit)
                            VALUES(:username, :surname, :prename, :mail, :bdate, :pwd_hash, :credit)");
                $statement->bindParam(':username', $username);
                $statement->bindParam(':surname', $surname);
                $statement->bindParam(':prename', $prename);
                $statement->bindParam(':mail', $mail);
                $statement->bindParam(':bdate', $bdate);
                $statement->bindParam(':pwd_hash', $pwd_hash);
                $statement->bindParam(':credit', $credit);

                $statement->execute();
          }


          public function login_user($username, $password, $errors){
            if(empty($username)){
              array_push($errors, "Username is required.");
            }
            if(empty($password)){
              array_push($errors, "Pwd is required.");
            }

              if(count($errors) == 0 ){
                $password = md5($password);
                $query = $this->connection->prepare("SELECT * FROM users WHERE username LIKE '$username' AND password LIKE '$password'");
                $result = mysqli_query($db, $query);
                if(mysqli_num_rows($result) == 1){
                  $_SESSION['username'] = $username;
                  $_SESSION['success'] = "You are now logged in";
                  header('location: index.php');
                }else{
                  array_push($errors, "The username or password is incorrect.");
                  header('location: login.php');
                }
              }
          }
    }
?>

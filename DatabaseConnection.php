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
    }
?>

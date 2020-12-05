<?php 

    require_once 'phpmysqlconnection.php';

    if (isset($_POST['submit'])) {

      $firstname = $_POST['fname'];
      $lastname = $_POST['lname'];
      $password = $POST['password'];
      $password = md5($password);
      $email = $_POST['email'];

        echo $firstname . '<br>';
        echo $lastname . '<br>';
        echo $password . '<br>';
        echo $email . '<br>';

      date_default_timezone_set("Jamaica");
      $datetime = date("Y-m-d H:i:s");

      echo $datetime;

      try {
          
        $sql = "INSERT INTO Users (firstname, lastname, password, email, date_joined) 
        VALUES ('$firstname', '$lastname', '$password', '$email', '$datetime')";

        $conn->exec($sql);
      
      } catch(PDOException $e) {
          echo $sql . "<br>" . $e->getMessage();
      }
      
      $conn = null;

    }
?>
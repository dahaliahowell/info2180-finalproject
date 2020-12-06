<?php 

    require_once 'phpmysqlconnection.php';

    if (isset($_POST['submit'])) {

      // $firstname = $_POST['fname'];
      // $lastname = $_POST['lname'];
      // $password = $POST['password'];
      // $password = md5($password);
      // $email = $_POST['email'];

      $firstname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_STRING);
      $lastname = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_STRING);
      $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
      $password = md5($password);
      $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

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
<?php 

  require_once 'phpmysqlconnection.php';

  session_start();

  if (isset($_SESSION['userid'])) {
      include '../no-refresh.php';
  }

  if (isset($_POST["login"])) {
      $email = $_POST["email"];
      $password = $POST["password"];
      $password = md5($password);

      try {
        $stmt = $conn->query("SELECT * FROM users WHERE email = '$email' AND password = '$password'");
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($results) === 1) {
            $_SESSION['userid'] = $results[0]['id'];
        } else {
            echo '<script>alert("Something Went Wrong")</script>';
        }
    } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
  }
  

?>
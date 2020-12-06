<?php 
  require_once 'phpmysqlconnection.php';

  echo 'testing';

  session_start();

  if (isset($_SESSION['userid'])) {
    echo 'sessionid'.$_SESSION['userid'];
    header("location:../no-refresh.php");
  } else {
    
  if (isset($_POST["login"])) {
    // echo 'im in' . '<br>';
      // $email = $_POST["email"];
      // $password = $_POST["password"];
      $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
      $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
      // echo $email . '<br>' . $password . '<br>';
      $password = md5($password);

      echo $email . '<br>' . $password;

      try {
        $stmt = $conn->query("SELECT * FROM users WHERE email = '$email' AND password = '$password'");
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo '<pre>'; print_r($results); echo '</pre>';

        if (count($results) === 1) {
            $_SESSION['userid'] = $results[0]['id'];
        } else {
            echo '<script>alert("Something Went Wrong")</script>';
        }
    } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
  }
}
  

?>
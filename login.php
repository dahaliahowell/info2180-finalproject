<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8">
    <title>BugMe Issue Tracker | login</title>
    <link rel="stylesheet" href="styles/login.css" media="screen" />
    <link 
  href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" 
  rel="stylesheet"  type='text/css'>
    <script src="https://code.jquery.com/jquery-3.1.1.js"></script>
    <script src="" charset="utf-8"></script>
  </head>
    <body>
        <div class="container">
        <iframe id="some_name" name="some_name" style="display:none"></iframe>
            <form id="form" action="login.php" method="post">
                <h1 id="login"><i class="fa fa-bug" style="font-size: 1.5em;"></i>&nbsp;&nbsp;&nbsp;&nbsp;BugMe Issue Tracker LOGIN</h1>
                <div class="form-field">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email"></input>
                </div>
                <div class="form-field">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password"></input>
                </div>
                
                <div class="btn" id="submit-btn">
                    <button type="submit" class="btn" name="login">Log In</button>
                </div>
            </form>
            </div>
        
        </body>
</html>

<?php 

  require_once 'phpmysqlconnection.php';

  session_start();

  if (isset($_SESSION['userid'])) {
    header("location:no-refresh.php");
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


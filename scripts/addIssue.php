<?php 

    session_start();
    if (!isset($_SESSION['userid'])) {
        echo "<script>location.href='login.php'</script>";
    }

?>

<?php 

    require_once 'phpmysqlconnection.php';

    if (isset($_POST['submit'])) {

      $title = $_POST['title'];
      $description = $_POST['description'];

      $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
      $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);

      $user = (int) $POST['user'];
      $created_by = (int) $_SESSION['userid'];
      $type = $POST['type'];
      $priority = $_POST['priority'];

      date_default_timezone_set("Jamaica");
      $created = date("Y-m-d H:i:s");
      $updated = date("Y-m-d H:i:s");

      echo "Title " . $title . '<br>';
      echo "Description ".$description . '<br>';
      echo "Assigned to " . $user . '<br>';
      echo "Assign to before " . $POST['user'] . '<br>';
      echo "Created " . $created_by . '<br>';
      echo "Type " . $type . '<br>';
      echo "Priority " . $priority . '<br>';
      echo "Created " . $created . '<br>';
      echo "Updated " . $updated . '<br>';

      try {
          
        $sql = "INSERT INTO Issues (title, description, type, priority, status, assigned_to, created_by, created, updated) 
        VALUES ('$title', '$description', '$type', '$priority', 'Open', $user, $created_by, '$created', '$updated')";

        $conn->exec($sql);
      
      } catch(PDOException $e) {
          echo $sql . "<br>" . $e->getMessage();
      }
      
      $conn = null;

    }
?>
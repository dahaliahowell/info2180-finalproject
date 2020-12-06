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

      $title = filter_var($title, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
      $description = filter_var($description, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);

      $user = (int) $_POST['assigned'];
      $created_by = (int) $_SESSION['userid'];
      $type = $_POST['issue-type'];
      $priority = $_POST['priority'];

      date_default_timezone_set("Jamaica");
      $created = date("Y-m-d H:i:s");
      $updated = date("Y-m-d H:i:s");

      echo "Title " . $title . '<br>';
      echo "Description ".$description . '<br>';
      echo "Assigned to " . $user . '<br>';
      echo "Assign to before " . $_POST['assigned'] . '<br>';
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
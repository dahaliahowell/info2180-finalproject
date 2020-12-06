<?php 

    session_start();
    if (!isset($_SESSION['userid'])) {
        echo "<script>location.href='login.php'</script>";
    }

?>

<?php 

    require_once 'phpmysqlconnection.php';

    if (isset($_POST['closed'])) {

      $status = 'Closed';
      $id = (int) $_POST['closed'];

    } elseif (isset($_POST['inprogress'])) {

        $status = 'In Progress';
        $id = (int) $_POST['inprogress'];
  
    }

    echo $status ." ". $id;

    $updated = date("Y-m-d H:i:s");

    try {
          
        $sql = "UPDATE Issues SET status = '$status', updated = '$updated' WHERE id = $id";

        $conn->exec($sql);

        echo "<script>location.href='../no-refresh.php'</script>";
      
      } catch(PDOException $e) {
          echo $sql . "<br>" . $e->getMessage();
      }
      
      $conn = null;

?>
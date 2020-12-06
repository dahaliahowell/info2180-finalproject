<?php 
      
require_once 'phpmysqlconnection.php';

try {
    $stmt = $conn->query("SELECT id, firstname, lastname FROM Users");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

?>

<select name="assigned">
<?php foreach ($results as $row): ?>
<option value="<?=$row['id']?>"><?= $row['firstname'] . " " .$row['id'] . " ". $row['lastname']; ?></option>
<?php endforeach; ?>
</select>
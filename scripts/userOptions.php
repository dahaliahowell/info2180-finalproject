<?php 
      
require_once 'phpmysqlconnection.php';

try {
    $stmt = $conn->query("SELECT id, firstname, lastname FROM Users");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
?>

<select name="user">
<?php foreach ($results as $row): ?>
<option value="<?= (string) $row['id'];?>"><?= $row['firstname'] . " " . $row['lastname']; ?></option>
<? echo (string) $row['id'];?>
<?php endforeach; ?>
</select>
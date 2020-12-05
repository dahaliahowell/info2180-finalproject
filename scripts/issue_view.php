<?php header('Access-Control-Allow-Origin: *'); 

require_once 'phpmysqlconnection.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

  $check = '';

  $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
  
  if ($_GET['context'] === 'my_tickets') {

    $check = 'mytickets';
    $stmt = $conn->query("");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

  } else if ($_GET['context'] === 'open') {
    
    $check = 'open';
    $stmt = $conn->query("SELECT i.id, i.title, i.type, i.status, i.assigned_to, i.created, u.firstname as fn, u.lastname as ln FROM Issues i JOIN Users u ON i.assigned_to=u.id where i.status = 'Open'");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

  } else {

    $check = 'all';
    $stmt = $conn->query("SELECT i.id, i.title, i.type, i.status, i.assigned_to, i.created, u.firstname as fn, u.lastname as ln FROM Issues i JOIN Users u ON i.assigned_to=u.id");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  }


}
?>

<table>
    <tr>
        <th>Title</th>
        <th>Type</th>
        <th class="status">Status</th>
        <th>Assigned</th>
        <th>Created</th>
    </tr>
    <?php foreach ($results as $row): ?>
    <tr>
        <td><span id="ticket-span"><?= '#' . $row['id'] . " ";?></span><a href='issue.php?id=<?=$row['id']?>'><?= $row['title'];?></a></td>
        <td><?= $row['type'];?></td>
        <?php if ($row['status'] === 'Open'): ?>
            <td class="status"><span class="open">OPEN</span></td>
        <?php endif; ?>
        <?php if ($row['status'] === 'Closed'): ?>
            <td class="status"><span class="closed">CLOSED</span></td>
        <?php endif; ?>
        <?php if ($row['status'] === 'In Progress'): ?>
            <td class="status"><span class="in-progress">IN PROGRESS</span></td>
        <?php endif; ?>
        <td><?= $row['fn'] . " " . $row['ln'];?></td>
        <td><?= substr($row['created'],0,10)?></td>
    </tr>
    <?php endforeach; ?>
</table>
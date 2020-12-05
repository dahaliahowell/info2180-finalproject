<?php header('Access-Control-Allow-Origin: *'); 

require_once 'phpmysqlconnection.php';

    echo 'hiiii';

    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
  
    $id = (int) htmlspecialchars($_GET['id']);
    $stmt = $conn->query("SELECT * FROM Issues where id = $id");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>

<link rel="stylesheet" href="styles/issues.css"/>

<h1 class="no-margin-bottom-diff"><?= $results[0]['title']?></h1>
<h3 class="no-margin-top-diff"><?= 'Issue #' . $results[0]['description']?></h3>

<div id="issueDetails">
    <div id="main">
        <p><?= $results[0]['description']?></p>
        <br>
        <ul>
            <li><i class="fa fa-chevron-right" style="color: black;"></i>&nbsp;&nbsp;&nbsp;Issue created on <?= substr($results[0]['title'],0,10)?> at <?= substr($results[0]['title'],11,-1)?> <?= $results[0]['created_by']?></li>
            <li><i class="fa fa-chevron-right" style="color: black;"></i>&nbsp;&nbsp;&nbsp;Last updated on <?= substr($results[0]['title'],0,10)?> at <?= substr($results[0]['title'],11,-1)?></li>
        </ul>
    </div>
    <div id="aside">
        <div id="sidebar">
            <h4 class="no-margin-top">Assigned To</h4>
            <p class='no-margin-bottom'><?= $results[0]['assigned_to']?></p>
            <br>
            <h4 class="no-margin-top">Type</h4>
            <p class='no-margin-bottom'><?= $results[0]['type']?></p>
            <br>
            <h4 class="no-margin-top">Priority</h4>
            <p class='no-margin-bottom'><?= $results[0]['priority']?></p>
            <br>
            <h4 class="no-margin-top">Status</h4>
            <p class='no-margin-bottom'><?= $results[0]['status']?></p>
            <br>
        </div>
        <br>
        <form>
            <div>
                <button type="submit" name="closed" class="btn">Mark as Closed</button>
            </div>
            <br>
            <div>
                <button type="submit" name="inprogress" class="btn">Mark In Progress</button>
            </div>
        </form>
    </div>
</div>
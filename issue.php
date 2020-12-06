<?php header('Access-Control-Allow-Origin: *'); 

require_once 'scripts/phpmysqlconnection.php';

    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
  
    $id = (int) $_GET['id'];
    $stmt = $conn->query("SELECT *, i.id as issueId, u.firstname as fn, u.lastname as ln FROM Issues i JOIN Users u ON assigned_to=u.id where i.id = $id");
    $stmt1 = $conn->query("SELECT *, i.id as issueId, u.firstname as fn, u.lastname as ln FROM Issues i JOIN Users u ON created_by=u.id where i.id = $id");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $results1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);

    ini_set("display_errors", "1");

    error_reporting(E_ALL);


?>

<link 
href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" 
rel="stylesheet"  type='text/css'>
<link rel="stylesheet" href="styles/issues.css"/>
<link rel="stylesheet" href="styles/styles.css"/>

<h1 class="no-margin-bottom-diff"><?= $results[0]['title']?></h1>
<h3 class="no-margin-top-diff"><?= 'Issue #' . $results[0]['issueId']?></h3>

<div id="issueDetails">
    <div id="main">
        <p><?= $results[0]['description']?></p>
        <br>
        <ul>
            <li><i class="fa fa-chevron-right" style="color: black;"></i>&nbsp;&nbsp;&nbsp;Issue created on <?= substr($results[0]['created'],0,10)?> at <?= substr($results[0]['created'],11,16)?> by <?= $results1[0]['fn'] . " " . $results1[0]['ln']?>.</li>
            <li><i class="fa fa-chevron-right" style="color: black;"></i>&nbsp;&nbsp;&nbsp;Last updated on <?= substr($results[0]['updated'],0,10)?> at <?= substr($results[0]['updated'],11,16)?>.</li>
        </ul>
    </div>
    <div id="aside">
        <div id="sidebar">
            <h4 class="no-margin-top">Assigned To</h4>
            <p class='no-margin-bottom'><?= $results[0]['fn'] . " " . $results[0]['ln']?></p>
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
        <form action="scripts/updateIssue.php" method="post">
            <div>
                <button type="submit" name="closed" id="closed" value="<?=$results[0]['issueId']?>" class="button">Mark as Closed</button>
            </div>
            <br>
            <div>
                <button type="submit" name="inprogress" id="in-progress" value="<?=$results[0]['issueId']?>" class="button" id="in-progress">Mark In Progress</button>
            </div>
        </form>
    </div>
</div>
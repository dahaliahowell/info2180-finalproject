<?php 

    session_start();
    if (!isset($_SESSION['userid'])) {
        echo "<script>location.href='login.php'</script>";
    }

?>

<script src="app/issues_ajax.js" charset="utf-8"></script>

<div id="issues">
    <h1>Issues</h1>
    <button type="submit" class="btn">Create New Issue</button>
</div>

<div id="filter">
    <h4>Filter by:</h4>
    <button type="submit" id="all" class="filter-btn active-btn">ALL</button>
    <button type="submit" id="open" class="filter-btn">OPEN</button>
    <button type="submit" id="my-tickets" class="filter-btn" value="<?= (string) $_SESSION['userid'] ?>">MY TICKETS</button>
</div>
<br>

<div id="result"><?php include 'scripts/issue_view.php'?></div>
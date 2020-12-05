<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>BugMe Issue Tracker</title>
    <link rel="stylesheet" href="styles/styles.css"/>
    <link 
  href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" 
  rel="stylesheet"  type='text/css'>
    <script src="https://code.jquery.com/jquery-3.1.1.js"></script>
    <script src="app/no-refresh.js" charset="utf-8"></script>
  </head>
  <body>
    <div id="wrapper" class="container">
      <header>
        
      <h3><i class="fa fa-bug" style="font-size: 1.5em;"></i>&nbsp;&nbsp;&nbsp;&nbsp;BugMe Issue Tracker</h3>
      </header>
      <div id='flex'>
        <div id="left">
          <nav>
            <ul>
              <li><a id="nav-home" href="home.php"><i class="fa fa-fw fa-home"></i>Home</a></li>
              <li><a id="nav-about" href="addUserForm.php"><i class="fa fa-user-plus" aria-hidden="true"></i> Add User</a></li>
              <li><a id="nav-contact" href="addIssueForm.php"><i class="fa fa-plus-circle"></i> Add Issue</a></li>
              <li><a id="nav-contact" href="login.php"><i class="fa fa-power-off"></i> Logout</a></li>
              <li><a id="nav-contact" href="issue.php"><i class="fa fa-power-off"></i> Logout</a></li>
            </ul>
          </nav>
        </div>
        <div id='content'>
          <main>
            <?php include 'home.php'; ?>
          </main>
        </div>
      </div>
    </div>
  </body>
</html>


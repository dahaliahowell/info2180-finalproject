<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>BugMe Issue Tracker | login</title>
    <link rel="stylesheet" href="styles/login.css" media="screen" />
    <link 
  href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" 
  rel="stylesheet"  type='text/css'>
    <script src="https://code.jquery.com/jquery-3.1.1.js"></script>
    <script src="" charset="utf-8"></script>
  </head>
    <body>
        <div class="container">
            <form id="form" action="no-refresh.php" method="post">
                <h1 id="login"><i class="fa fa-bug" style="font-size: 1.5em;"></i>&nbsp;&nbsp;&nbsp;&nbsp;BugMe Issue Tracker LOGIN</h1>
                <div class="form-field">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email"></input>
                </div>
                <div class="form-field">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password"></input>
                </div>
                
                <div class="btn" id="submit-btn">
                    <button type="submit" class="btn">Log In</button>
                </div>
            </form>
            </div>
        
        </body>
</html>
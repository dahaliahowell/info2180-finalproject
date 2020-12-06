<link rel="stylesheet" href="styles/form.css"/>

<h1>New User</h1>

<form id="userForm" action="scripts/addUser.php" method="post">
  <div class="form-field">
    <label for="fname">Firstname</label>
    <input id="fname" type="text" name="fname" value="">
  </div>
  <div class="form-field">
    <label for="lname">Lastname</label>
    <input id="lname" type="text" name="lname" value="">
  </div>
  <div class="form-field">
    <label for="password">Password</label>
    <input type="password" name="password" value="" id="password">
  </div>
  <div class="form-field">
    <label for="email">Email</label>
    <input id="email" type="email" name="email" value="">
  </div>
  <br>
  <button type="submit" name="submit" class="btn" id="submit_btn">Submit</button>
</form>


<?php include 'scripts/addUser.php'; ?>
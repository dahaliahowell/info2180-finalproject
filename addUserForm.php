<h1>New User</h1>


<!--<iframe id="some_name" name="some_name" style="display:none"></iframe>-->
<form class="" action="scripts/addUser.php" method="post" target="some_name">
  <div class="form-field">
    <label for="fname">Firstname</label>
    <input type="text" name="fname" value="">
  </div>
  <div class="form-field">
    <label for="lname">Lastname</label>
    <input type="text" name="lname" value="">
  </div>
  <div class="form-field">
    <label for="password">Password</label>
    <input type="password" name="password" value="">
  </div>
  <div class="form-field">
    <label for="email">Email</label>
    <input type="email" name="email" value="">
  </div>
  <br>
  <button type="submit" name="submit" class="btn">Submit</button>
</form>

<?php include 'scripts/addUser.php'; ?>
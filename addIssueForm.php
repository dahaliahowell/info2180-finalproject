<h1>Create Issue</h1>

<form class="" action="#" method="post">
  <div class="form-field">
    <label for="title">Title</label>
    <input type="text" name="title" value="">
  </div>
  <div class="form-field">
    <label for="message">Description</label>
    <textarea name="description" rows="8" cols="40"></textarea>
  </div>
  <div class="form-field">
    <label for="user">Assigned To</label>
    <select name="user">
      <?php include "scripts/test.php";?>
    </select>
  </div>
  <div class="form-field">
    <label for="type">Type</label>
    <select name="type">
      <option value="Bug">Bug</option>
      <option value="Proposal">Proposal</option>
      <option value="Task">Task</option>
    </select>
  </div>
  <div class="form-field">
    <label for="priority">Priority</label>
    <select name="priority">
      <option value="Minor">Minor</option>
      <option value="Major">Major</option>
      <option value="Critical">Critical</option>
    </select>
  </div>
  <br>
  <button type="submit" name="submit" class="btn">Submit</button>
</form>
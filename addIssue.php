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
      <option value="user1">Pretend User 1</option>
      <option value="user2">Pretend User 2</option>
    </select>
  </div>
  <div class="form-field">
    <label for="type">Type</label>
    <select name="type">
      <option value="bug">Bug</option>
      <option value="proposal">Proposal</option>
      <option value="task">Task</option>
    </select>
  </div>
  <div class="form-field">
    <label for="priority">Priority</label>
    <select name="priority">
      <option value="minor">Minor</option>
      <option value="major">Major</option>
      <option value="critical">Critical</option>
    </select>
  </div>
  <br>
  <button type="submit" name="submit" class="btn">Submit</button>
</form>
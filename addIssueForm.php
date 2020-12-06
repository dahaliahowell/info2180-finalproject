<link rel="stylesheet" href="styles/form.css"/>
<script>
  // Hi sir, for some reason I had linking issues and embedding it was my last resort, my apologies.

  document.getElementById("issueForm").addEventListener("submit", function(e){

    console.log('clicked')

    // const password = document.getElementById('password');
    var validationFailed = false;

    var title = document.querySelector('#title');
    var description = document.querySelector('#description');

    clearErrors();

    if (isEmpty(title.value.trim())) {
        validationFailed = true;
        displayErrorMessage(title, "You must fill in a Title");
    };
  
    if (isEmpty(description.value.trim())) {
        validationFailed = true;
        displayErrorMessage(description, "You must fill in a Description");
    }

    if (validationFailed) {
        console.log('Please fix issues in Form submission and try again.');
        e.preventDefault();
    } else {
      title.value = "";
      description.value = "";
      alert('New Issue Successfully Created.');
    }

})

/**
 * Function to check if a textfield is empty.
 */
function isEmpty(value) {
    if (value === '' || value === null) {
    console.log('field is empty');
    return true;
    }
    return false;
}

/**
 * Function to add an element after another element.
 */
function insertAfter(element, newNode) {
    element.parentNode.insertBefore(newNode, this.nextSibling);
}

function clearErrors() {
    var elementsWithErrors = document.querySelectorAll('.error');
    for (var x = 0; x < elementsWithErrors.length; x++) {
      elementsWithErrors[x].setAttribute('class', '');
      elementsWithErrors[x].parentNode.removeChild(elementsWithErrors[x].nextElementSibling);
    }
}

/**
 * Display error message next to field.
 */
function displayErrorMessage(formField, message) {
    formField.setAttribute('class', 'error');
    var errorMessageText = document.createTextNode(message);
    var errorMessage = document.createElement('span');
    errorMessage.setAttribute('class', 'error-message');
    errorMessage.appendChild(errorMessageText);
    insertAfter(formField, errorMessage);
}
</script>

<h1>Create Issue</h1>

<iframe name="hiddenFrame" class="hide" style="display:none;"></iframe>  
<form id="issueForm" action="scripts/addIssue.php" method="post" target="hiddenFrame">
  <div class="form-field">
    <label for="title">Title</label>
    <input id="title" type="text" name="title" value="">
  </div>
  <div class="form-field">
    <label for="message">Description</label>
    <textarea id="description" name="description" rows="8" cols="40"></textarea>
  </div>
  <div class="form-field">
    <label for="assigned">Assigned To</label>
    <?php include "scripts/userOptions.php";?>
  </div>
  <div class="form-field">
    <label for="issue-type">Type</label>
    <select name="issue-type">
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

<link rel="stylesheet" href="styles/form.css"/>
<script>
  // Hi sir, for some reason I had linking issues and embedding it was my last resort, my apologies.

  document.getElementById("userForm").addEventListener("submit", function(e){

    console.log('clicked')

    // const password = document.getElementById('password');
    var validationFailed = false;

    var firstname = document.querySelector('#fname');
    var lastname = document.querySelector('#lname');
    var password = document.querySelector('#password');
    var email = document.querySelector('#email');

    clearErrors();

    if (isEmpty(firstname.value.trim())) {
        validationFailed = true;
        displayErrorMessage(firstname, "You must fill in your First Name");
    };
  
    if (isEmpty(lastname.value.trim())) {
        validationFailed = true;
        displayErrorMessage(lastname, "You must fill in your Last Name");
    }

    if (!isValidPassword(password.value.trim())) {
        validationFailed = true;
        displayErrorMessage(password, "Incorrect format for Password");
    };

    if (isEmpty(email.value.trim())) {
        validationFailed = true;
        displayErrorMessage(email, "You must fill in your Email Address");
    };


    if (validationFailed) {
        console.log('Please fix issues in Form submission and try again.');
        e.preventDefault();
    } else {
      // firstname.value = "";
      // lastname.value = "";
      // password.value = "";
      // email.value = "";
      alert('New User Successfully Added.');
    }

})

function isValidPassword(password) {
    return /^(?=.*[a-z|A-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/.test(password);
}

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
      //console.log(elementsWithErrors[x].nextElementSibling);
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
    //formField.insertAfter(errorMessage);
    insertAfter(formField, errorMessage);
}
</script>

<h1>New User</h1>

<iframe name="hiddenFrame" class="hide" style="display:none;"></iframe>
<form id="userForm" action="scripts/addUser.php" method="post" target="hiddenFrame">
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
window.onload = function(){

    const myform = document.getElementById("userForm");

    myform.addEventListener("submit", function(e){

        console.log('clicked')
        e.preventDefault();

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
            // alert('You must fill in your Last Name');
            displayErrorMessage(lastname, "You must fill in your Last Name");
        }
    
        if (!isValidPassword(password.value.trim())) {
            validationFailed = true;
            //alert('Incorrect format for password number.');
            displayErrorMessage(password, "Incorrect format for password");
        };

        if (isEmpty(email.value.trim())) {
            validationFailed = true;
            //alert('You must fill in your First Name');
            displayErrorMessage(email, "You must fill in your Email Address");
        };


        if (validationFailed) {
            console.log('Please fix issues in Form submission and try again.');
            element.preventDefault();
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

}
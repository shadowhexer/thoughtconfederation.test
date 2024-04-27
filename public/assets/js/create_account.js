// Checks if password length is greater than or equal to 8 characters

document.getElementById('passkey').addEventListener('input', function() {

    var origPass = document.getElementById('passkey').value;
    var checkPass = document.getElementById('checkpass');
    var messageElement = document.getElementById('passmessage');
    var passBase = /^(?=^.{8,}$)(?=.*\d)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/; 
    // '/^' and '/' are enclose symbols


    if (origPass.length < 8 && origPass.length > 0) 
    {
        this.style.border = '1px solid red';
        messageElement.innerHTML = 'Password must be 8 characters or more';
        checkPass.value = '';
        checkPass.disabled = true;
    }
    else if (!origPass.match(passBase))
    {
        this.style.border = '1px solid red';
        messageElement.innerHTML = 'Password must be have one uppercase letter and a number';
        checkPass.value = '';
        checkPass.disabled = true;
    } 
    else 
    {
        this.style.border = '1px solid green';
        messageElement.innerHTML = '';
        checkPass.disabled = false;

        document.getElementById('checkpass').disabled = false;
    }
    
});


// Checks if password matches with confirm password

document.getElementById('checkpass').addEventListener('input', function() {

    var origPass = document.getElementById('passkey').value;
    var checkPass = this.value;
    var messageElement = document.getElementById('passmessage');


    if (origPass !== checkPass) {

        messageElement.innerHTML = ''; // automatic string clear
        this.style.border = '1px solid red';
        messageElement.innerHTML = 'Password does not match';
        messageElement.style.color = 'red';

    } else {
        messageElement.innerHTML = '';
        this.style.border = '1px solid green';
        messageElement.innerHTML = '';
        messageElement.style.color = 'green';
    }

});

// Button should be disabled if "Terms and Conditions" is not checked.

document.getElementById('checkcon').addEventListener('change', function() {
    var submitButton = document.getElementById('submitform');
    submitButton.disabled = !this.checked;
});

// Char number counter

$('textarea').keyup(function() {
    var characterCount = $(this).val().length,
        current = $('#current'),
        maximum = $('#maximum'),
        theCount = $('#the-count');

    current.text(characterCount);
});

/* Uncomment this kung magsugod kag test

// Check if email already exists

fetch('http://localhost/login/forms/register.php', {
    method: 'POST',
    body: document.getElementById('create'), // Make sure to include your form data here
})
.then(response => response.json())
.then(data => {
    // Handle the response
    var messageElement = document.getElementById('emailCompare');
    
    if (data.status === 'error') {
        // Display error message
        messageElement.innerHTML = data.message;
        messageElement.style.color = 'red';
    } else if (data.status === 'success') {
        // Redirect to the login page or show a success message
        window.location.href = 'http://127.0.0.1:3000/ITE%2018/ITE%2018%20(Website)/Group%20Activity/Activity%205%20(PHP)/login/login';
    }
})
.catch(error => {
    console.error('Error:', error);
});

*/

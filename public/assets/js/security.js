fetch('http://localhost/login/forms/profile.php', {
    method: 'GET',
    headers: {'Accept': 'application/json'}
})
.then(response => response.json())  // Get the response as text
.then(data => {
    
    try {
        // Handle the response
        document.getElementById('username').value = data.username;
    } catch (error) {
        console.error('JSON Error: ', error);
    }
})  
.catch(error => {
    console.error('Fetch error: ', error);
}); 

/// Checks if password length is greater than or equal to 8 characters

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

// Char number counter


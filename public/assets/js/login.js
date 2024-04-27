fetch('http://localhost/login/forms/login.php?param=response.json', {
    method: 'GET',
    headers: {'Accept': 'application/json'}
})
.then(response => response.json())  // Get the response as text
.then(data => {

    if(data.status === "Invalid password")
    {
        alert(data.status);
    }

})

// Checks if password length is greater than or equal to 8 characters

document.getElementById('passkey').addEventListener('input', function() {

    var origPass = document.getElementById('passkey').value;
    var messageElement = document.getElementById('passmessage');
    // '/^' and '/' are enclose symbols

    var conDition = origPass.length < 8 && origPass.length >= 0;

    document.getElementById('submitform').disabled = conDition;


    if (conDition) 
    {
        messageElement.innerHTML = '';
        this.style.border = '1px solid red';
        messageElement.innerHTML = 'Password must be 8 characters or more';
        messageElement.value = '';
        document.getElementById('submitform').disabled = conDition;
    } 
    else 
    {
        messageElement.innerHTML = '';
        this.style.border = '1px solid green';
        messageElement.innerHTML = '';
        document.getElementById('submitform').disabled = false;
    }
    
});
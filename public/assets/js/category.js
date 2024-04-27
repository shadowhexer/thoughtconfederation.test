// Get categories
fetch('forms/categories.php', {
    method: 'GET',
    headers: {
        'Accept': 'application/json'
    }
})
    .then(response => response.json()) // Get the response as text
    .then(data => {

        try {
            document.getElementById('general').textContent = '(' + data.general + ')';
            document.getElementById('digital_art').textContent = '(' + data.digital_art + ')';
            document.getElementById('politics').textContent = '(' + data.politics + ')';
            document.getElementById('reviews').textContent = '(' + data.reviews + ')';
            document.getElementById('education').textContent = '(' + data.education + ')';

        } catch (error) {
            console.error('JSON Error: ', error);
        }
    })
    .catch(error => {
        console.error('Fetch error: ', error);
    });
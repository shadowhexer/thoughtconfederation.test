fetch('forms/blog.php', {
    method: 'GET',
    headers: {
        'Accept': 'application/json'
    }
})
    .then(response => response.json()) // Get the response as text
    .then(data => {

        try {
            // Handle the response
            document.getElementById('entry-img').src = data.image;
            document.getElementById('post-title').textContent = data.post_title;

        } catch (error) {
            console.error('JSON Error: ', error);
        }
    })
    .catch(error => {
        console.error('Fetch error: ', error);
    });

// Get categories for categories
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

/* Get data for comments
fetch('forms/comments.php', {
    method: 'GET',
    headers: {
        'Accept': 'application/json'
    }
})
    .then(response => response.json()) // Get the response as text
    .then(data => {

        try {
            const comment = document.getElementById('comment-field');
            document.getElementById('comments-count').textContent = data.count + " Comment(s)";
            document.getElementById('comment_count').textContent = data.count + " Comment(s)";

            for (var index = 0; index < data.count; index++) {
                // Profile Picture
                var profile = data[index].avatar;
                var size = 200; // Specify the size of the image (in pixels)
                var imageUrl = getGravatarImage(profile, size);

                // Handle the response
                const newComment = document.createElement('div');
                newComment.setAttribute("id", "comment" + index);
                newComment.setAttribute("class", "comment");

                newComment.innerHTML = '<div class="d-flex"><div class="comment-img"><img id="avatar" src="' + imageUrl + '"></div><div><h5><a href="/project/profile.php?user_id=' + data[index].id + '" id="name">' + data[index].name + '</a></h5><time id="date">' + data[index].date_comment + '</time><p id="comment_field">' + data[index].comments + '</p></div></div>';
                comment.appendChild(newComment);
            }


        } catch (error) {
            console.error('JSON Error: ', error);
        }
    })
    .catch(error => {
        console.error('Fetch error: ', error);
    });

// PP function
function getGravatarImage(avatar, size) {
    // Construct the Gravatar URL with the hash and optional parameters
    var gravatarUrl = 'https://www.gravatar.com/avatar/' + avatar + '?s=' + size;

    return gravatarUrl;
} */
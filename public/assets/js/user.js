document.getElementById('postBtn').addEventListener('click', function () {
    var postContent = CKEDITOR.instances['editor'].getData();
        if (postContent.trim() !== "") {
            CKEDITOR.instances['editor'].setData('');
        }
});
// Function to add a new post to the top of the timeline
function addPostToTimeline(postContent) {
    var postHtml = `
        <li class="timeline-item">
            <div class="card card-white grid-margin">
                <div class="card-body">
                    <div class="timeline-item-header">
                        <img src="https://www.gravatar.com/avatar/<?php echo md5($result['email']); ?>?s=200">
                        <p><?php echo $result['display_name']; ?><span> posted a status</span></p>
                        <small>Just Now</small>
                    </div>
                    <div class="timeline-item-post">
                        <p>${postContent}</p>
                        <div class="post-options">
                           <button class="btn btn-link like-btn" style="background-color: #43d39e; color: white;"><i class="fas fa-heart" style="color: white;"></i>(<span class="likes-count">0</span>)</button>
                           <button class="btn btn-link comment-toggle" style="background-color: #43d39e; color: white;">Comment</button>
                           <button class="btn btn-link delete-btn" onclick="deletePost(this)" style="background-color: #43d39e; color: white;">Delete</button>

                           </div>
                        <div class="comment-section" style="display:none;">
                            <textarea class="form-control comment-text" rows="2" placeholder="Write a comment"></textarea>
                            <button class="btn btn-primary btn-sm comment-btn">Submit</button>
                        </div>
                        <div class="timeline-comment-section"></div>
                    </div>
                </div>
            </div>
        </li>`;
    document.getElementById('timeline-ul').insertAdjacentHTML('afterbegin', postHtml);
    // Save posts to local storage
    savePostsToLocalStorage();
}

// Function to delete a post
function deletePost(button) {
    var postItem = button.closest('.timeline-item');
    postItem.remove();
    // Save posts to local storage after deletion
    savePostsToLocalStorage();
}

// Function to save posts to local storage
function savePostsToLocalStorage() {
    var posts = document.getElementById('timeline-ul').innerHTML;
    localStorage.setItem('posts', posts);
}

// Function to load posts from local storage
function loadPostsFromLocalStorage() {
    var posts = localStorage.getItem('posts');
    if (posts) {
        document.getElementById('timeline-ul').innerHTML = posts;
    }
}

// Load posts from local storage when the page loads
window.addEventListener('load', function () {
    loadPostsFromLocalStorage();
});

let subMenu = document.getElementById("subMenu");

function toggleMenu() {
    subMenu.classList.toggle("open-menu");
}
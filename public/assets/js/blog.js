// Get data
fetch('forms/blog.php', {
    method: 'GET',
    headers: {
        'Accept': 'application/json'
    }
})
    .then(response => response.json()) // Get the response as text
    .then(data => {

        try {
            /* Handle the response
            document.getElementById('title_image').src = data.image;
            document.getElementById('posterName').text = data.username;
            document.getElementById('title').href = "/project/post.php?post_id=" + data.post_id;
            //document.getElementById('initial-caption').innerHTML = data.blog_post.split('. ', 1)[0];
            document.getElementById('datePost').innerText = data.date_post;
            document.getElementById('comments-count').textContent = data.count + " Comment(s)";
            document.getElementById('title').innerHTML = data.post_title; */

            for (var index = 0; index < data.blog_count; index++) 
            {
                const field = document.getElementById('field');
                const post = document.createElement('div');
                post.setAttribute("id", "blog" + index);

                post.innerHTML = '<article class="entry" data-aos="zoom-in" data-aos-duration="1000"><div class="entry-img"><img src="'+data[index].image+'" alt="" class="img-fluid"></div><h2 class="entry-title"><a href="/project/post.php?post_id="' + data[index].post_id + '">'+data[index].post_title+'</a></h2><div class="entry-meta" ><ul><li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="" id="posterName">'+data[index].username+'</a></li><li class="d-flex align-items-center"><i class="bi bi-clock"></i><timeid="datePost">'+data[index].date_post+'</time></li><li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i><div id="comments-count">'+ data[index].count + ' Comment(s)</div></li></ul></div></article><div class="blog-pagination"><ul class="justify-content-center"><li class="active"><a href="#">1</a></li></ul></div>';

                
                field.appendChild(post);
            }
                
            

        } catch (error) {
            console.error('JSON Error: ', error);
        }
    })
    .catch(error => {
        console.error('Fetch error: ', error);
    });
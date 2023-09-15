$(document).ready(function () {
    $(".categoryButton").click(function () {
        var category = $(this).data('category');

        $.ajax({
            type: "GET",
            url: "/posts/category" + category,
             data: {
                  _token: "{{ csrf_token() }}",
                  category: category,
           },
           
            dataType: "json",
            success: function (data) {
                var postList = $("#postsList");
                postList.empty();

                if (data.posts.length > 0) {
                    for (var i = 0; i < data.posts.length; ++i) {
                        var post = data.posts[i];
                        var postHtml = '<div class="col">';
                        postHtml += '<div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">';
                        postHtml += '<div class="col p-4 d-flex flex-column position-static">';
                        postHtml += '<strong class="d-inline-block mb-2 text-success-emphasis">' + post.category_post + '</strong>';
                        postHtml += '<h3 class="mb-0">' + post.title_post + '</h3>';
                        postHtml += '<div class="mb-1 text-body-secondary">Nov 11</div>';
                        postHtml += '<p class="mb-auto">' + post.body_post + '</p>';
                        postHtml += '<a href="#" class="icon-link gap-1 icon-link-hover stretched-link">';
                        postHtml += 'Continue reading';
                        postHtml += '<svg class="bi"><use xlink:href="#chevron-right"></use></svg>';
                        postHtml += '</a>';
                        postHtml += '</div>';
                        postHtml += '<div class="col-auto d-none d-lg-block">';
                        postHtml += '<img src="{{ $postImages[$post->id] }}" class="bd-placeholder-img" width="200" height="250" alt="Post image">';
                        postHtml += '</div>';
                        postHtml += '</div>';
                        postHtml += '</div>';

                        postList.append(postHtml);
                    }
                } else {
                    postList.append('<p>Nu există postări pentru această categorie.</p>');
                }
            },
        });
    });
});

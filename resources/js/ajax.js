
// codul ajax pentru functionalitatea de filtrare pe categorie


$(document).ready(function () {
    $(".categoryButton").click(function () {
        var category = $(this).data('category');

        $.ajax({
            type: "GET",
            url: "/posts/category/" + category,
            data: {
                _token: "{{ csrf_token() }}",
                category: category,
            },
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
                        postHtml += '<svg class="bd-placeholder-img" width="200" height="auto"';
                        postHtml += 'xmlns="http://www.w3.org/2000/svg" role="img"';
                        postHtml += 'aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice"';
                        postHtml += 'focusable="false">';
                        postHtml += '<title>Placeholder</title>';
                        postHtml += '<rect width="100%" height="100%" fill="#55595c"></rect>';
                        postHtml += '<text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>';
                        postHtml += '</svg>';
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


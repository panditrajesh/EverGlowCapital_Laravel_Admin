<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Blogs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <p>Everglow Capital</p>
    <h3>Our Blog</h3>
    <div class="blog">
        @foreach ($blogs as $data)

            <div class="blog-image border border-1" style="height:200px; width:300px">
                <img src="{{asset("uploads/" . $data->blog_image)}}" height="200px" width="300px" alt="blog image">
            </div>
            <p class="blog-category">{{$data->blog_category}}</p>
            <h3 class="blog-heading">{{$data->blog_heading}}</h3>
            <p class="blog-shortdescription">{{$data->blog_shortdesc}}</p>
        @endforeach
    </div>
</body>

</html>
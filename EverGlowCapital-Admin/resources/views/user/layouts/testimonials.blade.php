<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testimonials</title>
</head>

<body>
    <div class="container">
        @foreach ($testimonials as $data)
            <h2>{{$data->testimonial_section_heading}}</h2>
            <div class="testimonial">
                <div class="testimonial-image border border-1" style="height:200px; width:300px">
                    <img src="{{asset("uploads/" . $data->testimonial_image)}}" height="200px" width="300px" alt="image">
                </div>
                <h2 class="testimonial-heading">{{$data->testimonial_heading}}</h2>
                <p class="testimonial-shortdesc">
                    {{$data->testimonial_shortdesc}}
                </p>
                <p class="testimonial-author">{{$data->testimonial_author}}</p>
                <p class="testimonial-position">{{$data->testimonial_author_position}}</p>
            </div>
            <br>

        @endforeach
    </div>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
</head>

<body>
    <div class="container">
        @foreach ($benefits as $data)

            <div class="perks-and-benefits">
                <h2 class="benefit-heading">{{$data->benefit_heading}}</h2>
                <div class="benifit-desc border border-1">
                    <img src="{{asset("uploads/" . $data->benefit_image)}}" alt="image" height="100px" width="100px">
                    <p class="benefit-name">{{$data->benefit_name}}</p>
                    <p class="benefit-desc">{{$data->benefit_desc}}</p>
                </div>
            </div>
        @endforeach
    </div>
    </div>
</body>

</html>
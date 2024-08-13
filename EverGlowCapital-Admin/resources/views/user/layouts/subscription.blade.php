<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <div class="container">

        @foreach ($subscriptions as $data)
            <h3 class="subscription-heading">{{$data->subscription_heading}}</h3>
            <div class="subscription-section">
                <p class="subscription-para">{{$data->subscription_para}}</p>
            </div>

        @endforeach
        <br>
        <button class="btn btn-success">Payment now only $200/monthly</button>
    </div>
</body>

</html>
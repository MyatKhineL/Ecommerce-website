<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Online-Shop')</title>
    <link rel="stylesheet" href="{{ asset("Css/app.css") }}">
    <link rel="stylesheet" href="{{ asset("Css/Style.css") }}">
</head>

<body>

<div class="container">
    <div class="row mt-5">
        @include('Admin.sidebar')
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/app.js') }}"></script>
</body>

</html>

<html lang="en">
<head>
    <title></title>
    @include('includes.admin_inc.header')
</head>
<body>
<div class="container">
    <div class="row text-center mt-5">
        <div class="col-md-5 mt-5 offset-2">
            <div class="text-center mt-5">
                <div class="error mx-auto text-center" data-text="APPEND">APPEND</div>
                <p style="margin-left:30%" class="lead text-gray-800">Waiting for Accept Your Subscribe </p>
                <p class="text-gray-500">Will Contact You Soon.</p>
                <a href="{{route('home')}}">&larr; Back to Home</a>
            </div>
        </div>
    </div>
</div>

@include('includes.admin_inc.scripts')

</body>
</html>


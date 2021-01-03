<html>
<head>
   @include('includes.header')
    <style>
        .navbar-light .navbar-brand{color: white}
        .navbar-light .navbar-nav .nav-link{color: white}
        #timer div {
            background: linear-gradient(to bottom, #6441a5, #2a0845); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            color: #ffffff;
            width: 100px;
            height: 105px;
            border-radius: 5px;
            font-size: 35px;
            font-weight: 700;
            margin-left: 10px;
            margin-right: 10px;
        }
        #timer div span {
            display: block;
            margin-top: -2px;
            font-size: 15px;
            font-weight: 500;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light navbar-floating" style="font-family: 'Mada', sans-serif">
    <div class="container">
        <a class="navbar-brand" href="#">
            {{--            <img src="{{asset('front/favicon.png')}}" alt="" width="70">--}}
            فـاست كارت
            <img style="animation:wobble 2s linear infinite" src="{{asset('front/img/shopping-cart.png')}}">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="ml-auto my-2 my-lg-0"  id="navbarToggler">
            <ul class="navbar-nav ml-lg-5 mt-3 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link"  style="font-weight:bolder; font-size: 20px" href="{{route('logout')}}">تسجيل خروج</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<main style="font-family: 'Mada', sans-serif">
    <div class="page-hero-section bg-image hero-mini" style="background-image: url('{{asset('front/img/hero_mini.svg')}}');">
        <div class="hero-caption">
            <div class="container fg-white h-100">
                <div class="row justify-content-center align-items-center text-center h-100">
                    <div class="col-lg-6">
                        <h3 class="mb-4 fw-medium">الوقت المتبقي من الاشتراك </h3>

                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-dark justify-content-center bg-transparent">
                                <li class="breadcrumb-item">كارت</li>
                                <li class="breadcrumb-item active" aria-current="page">فاست</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>


</main>
<div id="timer" class="flex-wrap d-flex justify-content-center mt-5">
    <div id="days" class="align-items-center flex-column d-flex justify-content-center"></div>
    <div id="hours" class="align-items-center flex-column d-flex justify-content-center"></div>
    <div id="minutes" class="align-items-center flex-column d-flex justify-content-center"></div>
    <div id="seconds" class="align-items-center flex-column d-flex justify-content-center"></div>
</div>

@include('includes.scripts')
<script>
    function makeTimer() {
        var endTime = new Date("{{$end_date}}");
        var endTime = (Date.parse(endTime)) / 1000;
        var now = new Date();
        var now = (Date.parse(now) / 1000);
        var timeLeft = endTime - now;
        var days = Math.floor(timeLeft / 86400);
        var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
        var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600 )) / 60);
        var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));
        if (hours < "10") { hours = "0" + hours; }
        if (minutes < "10") { minutes = "0" + minutes; }
        if (seconds < "10") { seconds = "0" + seconds; }
        $("#days").html(days + "<span>Days</span>");
        $("#hours").html(hours + "<span>Hours</span>");
        $("#minutes").html(minutes + "<span>Minutes</span>");
        $("#seconds").html(seconds + "<span>Seconds</span>");
    }
    setInterval(function() { makeTimer(); }, 0);
</script>
</body>
</html>



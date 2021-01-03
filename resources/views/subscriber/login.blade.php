
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('pref/css/bootstrap.min.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Mada&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('pref/css/style.css')}}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="{{asset('front/favicon.png')}}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Reem+Kufi&display=swap" rel="stylesheet">
    <title>Sign in </title>
    <style>
        .form-control::-webkit-input-placeholder {
            color: white;
        }
    </style>
</head>
<body style=" background-image:url({{asset('pref/images/3866553.jpg')}});
    height: 100%;
    color: black;
    background-repeat: no-repeat;
    background-size: cover;font-family: 'Mada', sans-serif">
<div  style=" background-color: rgba(0,0,0,0.2);  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2),
 0 6px 20px 0 rgba(0, 0, 0, 0.19);border-radius: 10px; margin-top:8%" class="col-md-6 p-5 offset-md-3  ">
    <h1 class="text-center mt-1">تسجيل دخول <br></h1>
    <p class="text-center" >للمشتركين في احدي خدماتنا</p>

    <form style="margin-top:10%; "  action="{{route('doLogin_auth')}}" method="post" autocomplete="off" >
        @csrf
        <div class="form-group">
            <input style="background-color: rgba(0,0,0,0.3); color: white;font-weight: bold" type="text" value="{{old('email')}}"  placeholder="البريد الالكتروني" class="form-control" name="email">
        </div>
        <div class="input-group mb-3">
            <input  style="background-color: rgba(0,0,0,0.3);color: white; font-weight: bold" type="password" id="myInput" name="password" class="form-control" placeholder="كلمة السر">

        </div>
        <div style="text-align: center ; margin-top: 30px " >
            <button type="submit" style="background-color: rgba(0,0,0,0.3);color: white; text-decoration: none;font-weight: bold" name="login_btn" class="btn btn-light">تسجيل دخول </button>
            <span style="display: block; margin-top: 10px"><a style="font-size: 30px;text-decoration: none; color: black" href="{{route('home')}}">   الرئيسيه↩ </a> </span>

        </div>


    </form>
    @include('includes.errors')

</div>

</body>
</html>


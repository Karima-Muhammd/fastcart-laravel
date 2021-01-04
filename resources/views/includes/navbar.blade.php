<nav class="navbar navbar-expand-lg navbar-light navbar-floating">
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
                    <a class="nav-link"  style="font-weight:bolder; font-size: 25px" href="{{route('home')}}">الرئيسية</a>
                </li>
                <li class="nav-item">
                    <a href="https://wa.me/+966500454595"  style="font-weight:bolder; font-size: 25px" class="nav-link" >
                        اطلب واتساب
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"  style="font-weight:bolder; font-size: 25px"href="{{route('Message.index')}}">تواصل معنا</a>
                </li>
                <li class="nav-item">
                    {{session()->forget('subscriber')}}
                    @if(session()->has('subscriber') && isset(session()->get('subscriber')->id))
                    <a class="nav-link"  style="font-weight:bolder; font-size: 25px"href="{{route('counter',session()->get('subscriber')->id)}}">دخول</a>
                    @else
                    <a class="nav-link"  style="font-weight:bolder; font-size: 25px"href="{{route('login')}}">المشتركين</a>
                    @endif
                </li>
            </ul>
        </div>
    </div>
</nav>

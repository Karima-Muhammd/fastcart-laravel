@extends('layouts.app')
@section('content')
<div class="page-hero-section bg-image hero-home-1" style="background-image: url({{asset('front/img/output-onlinepngtools.png')}});">
    <div class="hero-caption pt-5">
        <div class="container h-100">
            <div class="row align-items-center h-100">
                <div class="col-lg-6 wow fadeInUp  text-center mt-1" style="font-family: 'Mada', sans-serif;">
                    <div class="badge mb-2" style="font-weight:bolder; font-size: 30px"><span class="icon mr-1"><span class="mai-globe"></span></span> خدمة توصيل الطلبات للحي في مناطق المملكة </div>
                    <ul dir="rtl" class="text-center" >
                        <li style="list-style:none">خدمة لتوصيـل الطلبات بأسعار رمزيه وبسيطة</li>
                        <li style="list-style:none">اختيار المنتجات الافضل للمستخدم بعنايه </li>
                        <li style="list-style:none">امكانية العميل بالمتابعه المستمره للطلب</li>
                        <li style="list-style:none">السلامه والأمان عن طريق تعقيم جميع الطلبات المستلمه</li>
                        <li style="list-style:none">سرعة التواصيل و سهولة التواصل والطلب</li>
                        <li style="list-style:none">توفير باقات شهريه للفرد والعائله</li>
                    </ul>
                    <p class="mb-4" style="font-weight:bolder; font-size: 15px"></p>
                    <a href="{{route('Ticket.index')}}" class="btn btn-primary rounded-pill " style="font-weight:bolder; font-size: 15px">اطلب الأن</a>
                </div>
                <div class="col-lg-6 d-none d-lg-block wow zoomIn">
                    <div class="img-place floating-animate ">
                        <img src="{{asset('front/img/app_preview_1.png')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- packages -->
<div class="page-section bg-image mt-5" style="background-image: url('{{asset("front/img/pattern_2.svg")}}')">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-3 mb-5 mb-lg-0 wow fadeInUp" style="font-family: 'Mada', sans-serif">
                <h5 style="font-weight: bolder"  class="mb-4 text-center">اختر باقتك الان مع فاست كارت</h5>
                <p class="mb-5">اختر باقتك بحسب طلباتك الخدمه الاسرع والأفر </p>
                <a href="#" class="btn btn-gradient btn-split-icon rounded-pill">
                    <span class="icon mai-call-outline"></span> اطلب الان مباشرة
                </a>

            </div>
            <div class="col-lg-9">
                <div class="pricing-table">
                    @foreach($packages as $package)
                    <div class="pricing-item active wow zoomIn ">
                        <div class="pricing-header">
                            <h5>{{$package->name}}</h5>
                            <h6 style="color: #602FDA" class="fw-normal">  قيمة الاشتراك {{$package->subscribePrice}} ريال</h6>
                        </div>
                        <div class="pricing-body">
                            <ul class="theme-list">
                                <li class="list-item">عدد المحطات {{$package->no_station}} لليوم</li>
                                <li class="list-item">قيمة الطلب {{$package->orderPrice}} ريال</li>
                                <li class="list-item">عدد الطلبات الشهريه {{$package->no_orderPerMonth}} </li>
                                <li class="list-item">عدد الطلبات المجانيه {{$package->no_orderFree}}</li>
                            </ul>
                        </div>
                        <a href="{{route('Package.show',$package->id)}}" type="submit"  class="btn btn-dark">اشترك</a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<div class="position-realive bg-image" style="background-image: url('{{asset('front/img/pattern_4.svg')}}')">

{{--why choose fastcart--}}
<div class="page-section bg-dark fg-white">
    <div class="container">
        <h1 class="text-center">لما تختار فاست كارت ؟</h1>

        <div class="row justify-content-center mt-5">
            <div class="col-md-6 col-lg-3 py-3">
                <div class="card card-body border-0 bg-transparent text-center wow zoomIn">
                    <div class="mb-3">
                        <img src="{{asset('front/img/icons/rocket.svg')}}" alt="">
                    </div>
                    <p class="fs-large">سريع جدا</p>
                    <p class="fs-small fg-grey" style="font-family: 'Mada', sans-serif;">أسرع خدمه توصيل داخل نطاق الحي </p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 py-3">
                <div class="card card-body border-0 bg-transparent text-center wow zoomIn" data-wow-delay="200ms">
                    <div class="mb-3">
                        <img src="{{asset('front/img/icons/testimony.svg')}}" alt="">
                    </div>
                    <p class="fs-large">اختيار أفضل المنتجات</p>
                    <p class="fs-small fg-grey" style="font-family: 'Mada', sans-serif;">يتم اختار أجود المنتجات المطلوبه للتوصيل</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 py-3">
                <div class="card card-body border-0 bg-transparent text-center wow zoomIn" data-wow-delay="400ms">
                    <div class="mb-3">
                        <img src="{{asset('front/img/icons/promotion.svg')}}" alt="">
                    </div>
                    <p class="fs-large">سرعه التواصل والطلب</p>
                    <p class="fs-small fg-grey" style="font-family: 'Mada', sans-serif;" >يتم التواصل وتوصيل الطلب بسهوله وسرعه عاليه</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 py-3">
                <div class="card card-body border-0 bg-transparent text-center wow zoomIn" data-wow-delay="600ms">
                    <div class="mb-3">
                        <img src="{{asset('front/img/icons/coins.svg')}}" alt="">
                    </div>
                    <p class="fs-large">توفير باقات شهريه</p>
                    <p class="fs-small fg-grey" style="font-family: 'Mada', sans-serif;" >يتم توفير باقات شهريه للفرد والعائله وبها طلبات مجانيه ايضا</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 py-3">
                <div class="card card-body border-0 bg-transparent text-center wow zoomIn" data-wow-delay="800ms">
                    <div class="mb-3">
                        <img src="{{asset('front/img/icons/support.svg')}}" alt="">
                    </div>
                    <p class="fs-large">متابعة الطلب </p>
                    <p class="fs-small fg-grey" style="font-family: 'Mada', sans-serif;">امكانية العميل بالمتابعه النستمره للطلب</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 py-3">
                <div class="card card-body border-0 bg-transparent text-center wow zoomIn" data-wow-delay="1000ms">
                    <div class="mb-3">
                        <img src="{{asset('front/img/icons/mask.png')}}" alt="">
                    </div>
                    <p class="fs-large">السلامه والامان</p>
                    <p class="fs-small fg-grey" style="font-family: 'Mada', sans-serif;" >السلامه والأمان عن طريق تعقيم جميع الطلبات المستلمه والحرص علي ارتداء الكمامات عند توصيل الطلب</p>
                </div>
            </div>
        </div>
    </div>
</div>
{{--  safe way  --}}
<div class="page-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 py-3">
                <div class="img-place  wow zoomIn">
                    <img src="{{asset('front/img/app_preview_2.png')}}" alt="">
                </div>
            </div>
            <div class="col-lg-6 py-3 mt-lg-5">
                <div class="iconic-list">
                    <div class="iconic-item wow fadeInUp">
                        <div class="iconic-md iconic-text bg-warning fg-white rounded-circle">
                            <span class="mai-cube"></span>
                        </div>
                        <div class="iconic-content">
                            <h5>ارتداء الكمامات</h5>
                            <p class="fs-small" style="font-family: 'Mada', sans-serif;">ارتداء الكمامات عند توصيل الطلب</p>
                        </div>
                    </div>
                    <div class="iconic-item wow fadeInUp">
                        <div class="iconic-md iconic-text bg-info fg-white rounded-circle">
                            <span class="mai-shield"></span>
                        </div>
                        <div class="iconic-content">
                            <h5>تعقيم المنتجات</h5>
                            <p class="fs-small" style="font-family: 'Mada', sans-serif;">تعقيم المنتجات قبل التوصيل</p>
                        </div>
                    </div>
                    <div class="iconic-item wow fadeInUp">
                        <div class="iconic-md iconic-text bg-indigo fg-white rounded-circle">
                            <span class="mai-desktop-outline"> </span>
                        </div>
                        <div class="iconic-content">
                            <h5>الفروع</h5>
                            <p class="fs-small">حرصا منا علي سلامتك يتم استقبال الطلبات في الفرع الكترونيا فقط</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</div>
@endsection

@extends('layouts.app')
@section('content')
    <main>
        <div class="page-hero-section bg-image hero-mini" style="background-image: url('{{asset('front/img/hero_mini.svg')}}');">
            <div class="hero-caption">
                <div class="container fg-white h-100">
                    <div class="row justify-content-center align-items-center text-center h-100">
                        <div class="col-lg-6">
                            <h3 class="mb-4 fw-medium">{{$package->name}}</h3>
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

        <div class="page-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 py-3">
                        <form  id="store_subscribe" >
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <input type="text" name="name" value="" placeholder="اسم كامل " class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="password" name="password" value="" placeholder="كلمة السر" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" name="phone" value="" placeholder="رقم التليفون" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" name="email" value="" placeholder="البريد الألكتروني" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <select name="package_id"   class="custom-select" id="inputGroupSelect01">
                                            <option value="{{$package->id}}">{{$package->name}}</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" name="street" value="" placeholder="اسم الشارع" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" name="no_flat" value="" placeholder="رقم الشقه" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" name="no_flour" value="" placeholder="رقم الدور " class="form-control">
                                </div>
                                <div class="form-group col-md-6" hidden >
                                    <input type="text" name="end_date" value="{{$package->no_orderPerMonth}}" placeholder="رقم الدور " class="form-control">
                                </div>
                            </div>

                            <div class="mt-2 col-md-6">
                                <button type="submit" class="btn btn-gradient" >Continue to Pay {{$package->subscribePrice}} SAR ➟ </button>
                            </div>
                            <div class="alert alert-success mt-3"  style="display: none" id="msg_success"></div>
                            <div class="alert alert-danger mt-3"  style="display: none" id="msg_error"></div>

                        </form>

                    </div>
                    <!-- Sidebar -->
                    <div class="col-lg-4 py-3">
                        <div class="widget-wrap">
                            <h3 class="widget-title" style="font-family: 'Mada', sans-serif">مميزات</h3>
                            <ul class="categories" >
                                <li><a>عدد المحطات {{$package->no_station}} لليوم</a></li>
                                <li><a> قيمة الطلب {{$package->orderPrice}}ريال </a></li>
                                <li><a>عدد الطلبات الشهريه {{$package->no_orderPerMonth}} </a></li>
                                <li><a href="#">عدد الطلبات المجانيه {{$package->no_orderFree}}</a></li>
                                <li><a href="#">  قيمة الاشتراك {{$package->subscribePrice}} ريال</a></li>
                            </ul>
                        </div>

                    </div> <!-- end sidebar -->
                </div>
            </div>
        </div>

    </main>
@endsection
@section('script')
    <script>
        $("#store_subscribe").submit(function (e)
        {
            e.preventDefault()
            $("#msg_error").hide()
            $("#msg_error").empty()

            $("#msg_success").hide()
            $("#msg_success").empty()

            let subs_date= new FormData($("#store_subscribe")[0])
            //  console.log(cate_date.get('name'))
            $.ajax({
                type:"POST",
                url:"{{route('Subscriber.store')}}",
                data:subs_date,
                contentType:false,
                processData:false,
                success : function (data)
                {
                    $("#msg_success").show()
                    $("#msg_success").text(data.success)

                },
                error : function (xhr,status,error)
                {
                    $("#msg_error").empty()
                    $("#msg_success").empty()
                    $("#msg_error").show()
                    $.each(xhr.responseJSON.errors,function (key,item)
                    {
                        $("#msg_error").append("<p>"+ item +"</p>")

                    });
                }
            });
        });

    </script>

@endsection

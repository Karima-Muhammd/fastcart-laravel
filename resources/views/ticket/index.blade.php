@extends('layouts.app')

@section('content')
    <div >

        <div class="page-hero-section bg-image hero-mini" style="background-image: url({{asset('front/img/hero_mini.svg')}});">
            <div class="hero-caption">
                <div class="container fg-white h-100">
                    <div class="row justify-content-center align-items-center text-center h-100">
                        <div class="col-lg-6" >
                            <h3 class="mb-4 fw-medium">احجز تذكرتك مع فاست كارت</h3>
                            <h5 class="mb-4 fw-medium">بدون الحجز في باقات شهريه </h5>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-dark justify-content-center bg-transparent">
                                    <li class="breadcrumb-item"><a >الان</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">ارسل طلبك </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>

            <div class="container justify-content-center" style="font-family: 'Mada', sans-serif;">
                    <div class=" my-3 wow fadeInUp">
                        <div class="page-section bg-image " style="background-image: url('{{asset("front/img/pattern_1.svg")}}')">
                        <div class="page-section">
                                <div class="row">

                                    <div class="col-lg-7 mb-lg-0">
                                        <div class="img-place w-lg-75 wow zoomIn">
                                            <img src="{{asset('front/img/illustration_contact.svg')}}" alt="">
                                        </div>
                                    </div>
                                    <div class="col-lg-5 mt-5  ">
                                        <h2 class="wow fadeInUp">تحتاج الي توصيل طلبك ؟ <br>
                                            لا تقلق تواصل معنا الأن </h2>
                                        <form id="send_ticket"  >
                                            @csrf
                                            <div class="form-group wow fadeInUp">
                                                <label for="name" class="fw-medium fg-grey">الاسم كامل </label>
                                                <input type="text" class="form-control" name="name">
                                            </div>

                                            <div class="form-group wow fadeInUp">
                                                <label for="email" class="fw-medium fg-grey">رقم التواصل </label>
                                                <input type="text" class="form-control" name="phone">
                                            </div>

                                            <div class="form-group wow fadeInUp">
                                                <label for="message" class="fw-medium fg-grey">اكتب طلبك هنا</label>
                                                <textarea rows="6" class="form-control" name="order"></textarea>
                                            </div>

                                            <div class="form-group mt-4 wow fadeInUp">
                                                <button type="submit" class="btn btn-primary">ارسل طلبك</button>
                                            </div>
                                            <div class="alert alert-success mt-3"  style="display: none" id="msg_success"></div>
                                            <div class="alert alert-danger mt-3"  style="display: none" id="msg_error"></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>

@endsection
@section('script')
    <script>
        $("#send_ticket").submit(function (e)
        {
            e.preventDefault()
            $("#msg_error").hide()
            $("#msg_error").empty()

            $("#msg_success").hide()
            $("#msg_success").empty()

            let tkt_date= new FormData($("#send_ticket")[0])
            //  console.log(cate_date.get('name'))
            $.ajax({
                type:"POST",
                url:"{{route('Ticket.store')}}",
                data:tkt_date,
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


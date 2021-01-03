@extends('layouts.app')

@section('content')
    <div class="bg-light">

        <div class="page-hero-section bg-image hero-mini" style="background-image: url({{asset('front/img/hero_mini.svg')}});">
            <div class="hero-caption">
                <div class="container fg-white h-100">
                    <div class="row justify-content-center align-items-center text-center h-100">
                        <div class="col-lg-6" >
                            <h3 class="mb-4 fw-medium">Contact</h3>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-dark justify-content-center bg-transparent">
                                    <li class="breadcrumb-item"><a >Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Contact</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-section">
            <div class="container" style="font-family: 'Mada', sans-serif;">
                <div class="row justify-content-center">
                    <div class="col-lg-10 my-3 wow fadeInUp">
                        <div class="card-page">
                            <div class="row row-beam-md">
                                <div class="col-md-4 text-center py-2">
                                    <i class="mai-location-outline h3"></i>
                                    <p class="fg-primary fw-medium fs-vlarge">الموقع</p>
                                    <p class="mb-0">السعوديه ، جده ، حي سامر ، شارع عبدالله بن العطاء</p>
                                </div>
                                <div class="col-md-4 text-center py-1 py-md-1">
                                    <i class="mai-call-outline h3"></i>
                                    <p class="fg-primary fw-medium fs-vlarge">رقم التواصل</p>
                                    <p class="mb-0">+415 123 89245</p>
                                </div>
                                <div class="col-md-4 text-center py-3 py-md-2">
                                    <i class="mai-mail-open-outline h3"></i>
                                    <p class="fg-primary fw-medium fs-vlarge">البريد الالكتروني</p>
                                    <p class="mb-0">support@fastcart.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-5 my-3 wow fadeInUp">
                        <div class="card-page">
                            <h3 class="fw-normal">  سنرد عليك في اسرع وقت ممكن</h3>
                            <form id="send_message" class="mt-3">
                                @csrf
                                <div class="form-group">
                                    <label for="name" class="fw-medium fg-grey">اسم كامل</label>
                                    <input type="text" class="form-control" name="name">
                                </div>

                                <div class="form-group">
                                    <label for="email" class="fw-medium fg-grey">البريد</label>
                                    <input type="text" class="form-control" name="email">
                                </div>

                                <div class="form-group">
                                    <label for="phone" class="fw-medium fg-grey">رقم التواصل</label>
                                    <input type="text" class="form-control" name="phone">
                                </div>

                                <div class="form-group">
                                    <label for="message" class="fw-medium fg-grey">اكتب هنا </label>
                                    <textarea rows="6" class="form-control" name="message"></textarea>
                                </div>

                                <p>*Your information will never be shared with any third party.</p>

                                <div class="form-group mt-4">
                                    <button type="submit" class="btn btn-primary">Send Message</button>
                                </div>
                                <div class="alert alert-success mt-3"  style="display: none" id="msg_success"></div>
                                <div class="alert alert-danger mt-3"  style="display: none" id="msg_error"></div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-7 my-3 wow fadeInUp">
                        <div class="card-page">
                                <div class="gmap_canvas"><iframe width="700" height="600" id="gmap_canvas" src="https://maps.google.com/maps?q=%D8%A7%D9%84%D8%B3%D8%B9%D9%88%D8%AF%D9%8A%D9%87%20%D8%AC%D8%AF%D9%87%20%D8%AD%D9%8A%20%D8%A7%D9%84%D8%B3%D8%A7%D9%85%D8%B1%D8%8C%D8%B4%D8%A7%D8%B1%D8%B9%20%D8%B9%D8%A8%D8%AF%D8%A7%D9%84%D9%84%D9%87%20%D8%A8%D9%86%20%D8%B9%D8%B7%D8%A7%D8%A1&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://embedgooglemap.net/124/"></a></div><style>.mapouter{position:relative;text-align:right;height:500px;width:500px;}.gmap_canvas {overflow:hidden;background:none!important;}</style>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- .bg-light -->


@endsection
@section('script')
    <script>
        $("#send_message").submit(function (e)
        {
            e.preventDefault()
            $("#msg_error").hide()
            $("#msg_error").empty()

            $("#msg_success").hide()
            $("#msg_success").empty()

            let msg_date= new FormData($("#send_message")[0])
            //  console.log(cate_date.get('name'))
            $.ajax({
                type:"POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url:"{{route('Message.store')}}",
                data:msg_date,
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

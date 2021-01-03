@extends('layouts.admin-app')
@section('styles')
    <link href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <h5 class="h5 mb-2 text-gray-800">Packages</h5>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Update Package </h6>
        </div>
        <div class="col-md-12  mt-3 pb-5">
            <form class="mt-3" id="editPackage" data-id="{{ $package->id }}"  >
                @csrf
                <div class="row">
                    <div class="form-group col-md-4">
                        <input type="text" name="name" value="{{old('name',$package->name)}}" placeholder="Package Name .." class="form-control">
                    </div>
                    <div class="form-group col-md-4">
                        <input type="text" name="no_station" value="{{old('no_station',$package->no_station)}}" placeholder="Number of Stations" class="form-control">
                    </div>

                    <div class="form-group col-md-4">
                        <input type="text" name="no_orderPerMonth" value="{{old('no_orderPerMonth',$package->no_orderPerMonth)}}"  placeholder="Number orders Per Month .." class="form-control">
                    </div>
                    <div class="form-group col-md-4">
                        <input type="text" name="no_orderFree" value="{{old('no_orderFree',$package->no_orderFree)}}"  placeholder="Number of Free Order.." class="form-control">
                    </div>
                    <div class="form-group col-md-4">
                        <input type="text" name="orderPrice" value="{{old('orderPrice',$package->orderPrice)}}"  placeholder=" Order Price.." class="form-control">
                    </div>
                    <div class="form-group col-md-4">
                        <input type="text" name="subscribePrice" value="{{old('subscribePrice',$package->subscribePrice)}}"  placeholder="Subscribe Price.." class="form-control">
                    </div>

                    <div class="col-md-8 text-center">
                        <button type="submit" style="width: 15rem; margin-left: 18rem" class="btn btn-success " >Update</button>
                    </div>

                </div>
                <div class="input-group col-md-6 offset-3 mt-3 text-center">

                </div>
            </form>
            @include('includes.errors')
            <div class="alert alert-success mt-3"  style="display: none" id="msg_success"></div>
            <div class="alert alert-danger mt-3"  style="display: none" id="msg_error"></div>

        </div>

    </div>
@endsection
@section('scripts')
    <script src="{{asset('admin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/js/demo/datatables-demo.js')}}"></script>
    <script>

        $("#editPackage").submit(function (e)
        {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            e.preventDefault()
            $("#msg_error").hide()
            $("#msg_error").empty()

            $("#msg_success").hide()
            $("#msg_success").empty()

            let package_date= new FormData($("#editPackage")[0])
            var id  = $("#editPackage").data("id");
            let _url = `/Admin/Package/edit/${id}`;
            //  console.log(cate_date.get('name'))
            $.ajax({
                type:"post",
                url:_url,
                data:package_date,
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

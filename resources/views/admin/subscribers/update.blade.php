@extends('layouts.admin-app')
@section('styles')
    <link href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the
         <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Update Subscriber </h6>
        </div>
        <div class="col-md-12  mt-3 pb-5">
{{--id="editSubscriber" data-id="{{ $subscriber->id }}"--}}
            <form class="mt-3" id="editSubscriber" data-id="{{ $subscriber->id }}"  >
                @csrf
                <div class="row">
                    <div class="form-group col-md-4">
                        <input type="text" name="name" value="{{old('name',$subscriber->name)}}" placeholder="Name .." class="form-control">
                    </div>
                    <div class="form-group col-md-4">
                        <input type="text" name="email" value="{{old('email',$subscriber->email)}}" placeholder="Email.." class="form-control">
                    </div>

                    <div class="form-group col-md-4">
                        <input type="text" name="phone" value="{{old('phone',$subscriber->phone)}}"  placeholder="Phone Number .." class="form-control">
                    </div>
                    <div class="form-group col-md-4">
                        <input type="text" name="street" value="{{old('street',$subscriber->street)}}"  placeholder="Number of Floor.." class="form-control">
                    </div>
                    <div class="form-group col-md-4">
                        <input type="text" name="no_flat" value="{{old('no_flat',$subscriber->no_flat)}}"  placeholder=" Number of Flat.." class="form-control">
                    </div>
                    <div class="form-group col-md-4">
                        <input type="text" name="no_flour" value="{{old('phone',$subscriber->no_flour)}}"  placeholder="Number of Floor.." class="form-control">
                    </div>
                    <div class="form-group col-md-4">
                        <input type="text" name="no_build" value="{{old('no_build',$subscriber->no_build)}}"  placeholder="Number of Build .." class="form-control">
                    </div>
                    <div class="form-group col-md-4 mb-5">
                        <select name="package_id" class="custom-select" id="inputGroupSelect01">
                            @foreach($packages as $package)
                                <option value="{{$package->id}}" @if($package->id==$subscriber->package_id) selected @endif() >{{$package->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <input type="text" disabled name="end_date" value="{{old('end_date',$subscriber->end_date)}}"  placeholder="End date .." class="form-control">
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

        $("#editSubscriber").submit(function (e)
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

            let subscriber_date= new FormData($("#editSubscriber")[0])
            var id  = $("#editSubscriber").data("id");
            let _url = `/Admin/Subscriber/edit/${id}`;
            //  console.log(cate_date.get('name'))
            $.ajax({
                type:"post",
                url:_url,
                data:subscriber_date,
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

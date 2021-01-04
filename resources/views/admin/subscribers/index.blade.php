@extends('layouts.admin-app')
@section('styles')
    <link href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <h5 class="h5 mb-5 text-gray-800"> Subscribers Table </h5>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Subscribers </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table style="font-size: 12px" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr style="text-align: center"  >
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>phone</th>
                        <th>street</th>
                        <th>no.flat</th>
                        <th>no.floor</th>
                        <th>no.Build</th>
                        <th>Start date</th>
                        <th>End date</th>
                        <th>Package</th>
                        <th>Status</th>
                        <th  >Actions</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr style="text-align: center">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Street</th>
                        <th>No.flat</th>
                        <th>No.floor</th>
                        <th>No.Build</th>
                        <th>Start date</th>
                        <th>End date</th>
                        <th>Package</th>
                        <th>Status</th>
                        <th  >Actions</th>
                    </tr>
                    </tfoot>
                    <tbody style="text-align: center">
                    @foreach($subscribers as $subscriber)
                        <tr id="row_subscriber{{$subscriber->id}}" >
                            <td>{{$subscriber->id}}</td>
                            <td>{{$subscriber->name}}</td>
                            <td>{{$subscriber->email}}</td>
                            <td>{{$subscriber->phone}}</td>
                            <td>{{$subscriber->street}}</td>
                            <td>{{$subscriber->no_flat}}</td>
                            <td>{{$subscriber->no_flour}}</td>
                            <td>{{$subscriber->no_build}}</td>
                            <td>{{$subscriber->created_at}}</td>
                            <td id="end">{{$subscriber->end_date}}</td>
                            <td>{{$subscriber->package->name}}</td>

                            <td >
                                <a type="submit" data-val="{{$subscriber->end_date}}" style="padding: 8px" data-id="{{ $subscriber->id }}" class="badge badge-warning active-btn" onclick="active(event.target)"  >
                                    @if($subscriber->status==0)Active @else UnActive @endif
                                </a>
                            </td>
                            <td  ><a  href="{{route('Subscriber.edit',$subscriber->id)}}" style="padding: 8px; margin-bottom: 4px; font-size: 10px" class="badge badge-success">Update</a>
                                <a type="submit" onclick="deleteSubscriber(event.target)" style="padding: 8px; font-size: 10px" data-id="{{ $subscriber->id }}" class="badge badge-danger">Delete</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('admin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/js/demo/datatables-demo.js')}}"></script>
    <script>
        function deleteSubscriber(event) {
            var id  = $(event).data("id");
            let _url = `/Admin/Subscriber/${id}`;
            let _token   = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: _url,
                type: 'DELETE',
                data: {
                    _token: _token
                },
                success: function(response)
                {
                    $("#row_subscriber"+id).remove();
                }
            });
        }
        function active(event) {
            var id  = $(event).data("id");
            var val  = $(event).data("val");
            let _url = `/Admin/un-active/${id}`;
            let _token   = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: _url,
                type: 'post',
                data: {
                    _token: _token
                },
                success: function(response) {

                    if($('.active-btn').html()=='Active')
                    {
                        $('.active-btn').html('UnActive');
                        $('#end').text(val)
                    }
                    else
                    {
                        $('.active-btn').html('Active');
                        $('#end').empty();
                    }

                }
            });
        }
    </script>


@endsection

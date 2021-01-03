@extends('layouts.admin-app')
@section('styles')
    <link href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <h5 class="h5 mb-5 text-gray-800"> Packages Table </h5>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Packages </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table style="font-size: 12px" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr style="text-align: center"  >
                        <th>ID</th>
                        <th>Name</th>
                        <th>Order</th>
                        <th>Phone</th>
                        <th  >Actions</th>

                    </tr>
                    </thead>
                    <tfoot>
                    <tr style="text-align: center">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Order</th>
                        <th>Phone</th>
                        <th  >Actions</th>
                    </tr>
                    </tfoot>
                    <tbody style="text-align: center">
                @foreach($tickets as $ticket)
                    <tr id="row_package{{$ticket->id}}" >
                        <td>{{$ticket->id}}</td>
                        <td>{{$ticket->name}}</td>
                        <td>{{$ticket->order}}</td>
                        <td>{{$ticket->phone}}</td>
                        <td  >
                            <a  href="{{route('Ticket.edit',$ticket->id)}}" style="padding: 4px; width: 80px" class="btn btn-success">Update</a>
                            <a type="submit" onclick="deletePackage(event.target)" data-id="{{ $ticket->id }}" class="btn btn-danger">Delete</a></td>
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
    function deletePackage(event) {
        var id  = $(event).data("id");
        let _url = `/Admin/Package/${id}`;
        let _token   = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
        url: _url,
        type: 'DELETE',
        data: {
        _token: _token
        },
        success: function(response)
        {
            $("#row_package"+id).remove();
        }
    });
    }

    </script>

@endsection

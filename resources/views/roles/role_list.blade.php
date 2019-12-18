@extends('layouts.master')

@section('content')

    <div class="app-main__inner">
        <div class="app-page-title app-page-title-simple">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div>
                        <div class="page-title-head center-elem">
                                        <span class="d-inline-block pr-2">
                                            <i class="lnr-apartment opacity-6"></i>
                                        </span>
                            <span class="d-inline-block">User List</span>
                        </div>
                        <div class="page-title-subheading opacity-10">
                            <nav class="" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a>
                                            <i aria-hidden="true" class="fa fa-home"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{{url('home')}}">Dashboards</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{{url('users')}}">User MGMT</a>
                                    </li>
                                    <li class="active breadcrumb-item" aria-current="page">
                                        User  List
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="page-title-actions">
                    <a href="{{ route('roles.export') }}" data-toggle="tooltip" title="Export Users" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark">
                        <i class="fa fa-file-excel"> Export</i>
                    </a>
                </div>
            </div>
        </div>
        @if(count($errors) > 0)
            <div class="alert alert-danger">
                Upload Validation Error<br><br>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <form action="{{ route('roles.import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="file" class="form-control">
            <br>
            <button class="btn btn-success">Import User Data</button>
        </form>
        <div class="main-card mb-3 card">
            <div class="card-body">
                <table style="width: 100%;"  id=""  class="table table-hover table-striped table-bordered data-table">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th width="100px">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection

@section('jquery-script')
    <script type="text/javascript">
        $(function () {
            $(".role_list_li").addClass("mm-active")
                    .parent()
                    .parent().addClass("mm-show")
                    .parent().addClass("mm-active")
            ;
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('roles.index') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'name', name: 'name'},
                    {data: 'description', name: 'description'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            }).on('click', '.delete', function (e) {
                e.preventDefault();
                var url = $(this).attr('href');
                console.log(url);
                if (confirm('Are you sure you want to delete this?')) {
                    $.ajax({
                        url:url ,
                        type: 'DELETE',
                        dataType: 'json',
                        data: {method: '_DELETE', "_token": "{{ csrf_token() }}"}
                    }).always(function (data) {
                        alert(data.message);
                        $('.data-table').DataTable().draw(false);
                    });
                }

            });

        });
    </script>
@endsection
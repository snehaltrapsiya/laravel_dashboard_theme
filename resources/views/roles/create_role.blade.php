@extends('layouts.master')

@section('content')
    <div class="app-main__inner">
        <div class="app-page-title app-page-title-simple">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div>
                        <div class="page-title-head center-elem">
                                        <span class="d-inline-block pr-2">
                                            <i class="lnr-user opacity-6"></i>
                                        </span>
                            <span class="d-inline-block">Add Role</span>
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
                                        <a href="{{url('roles')}}">Role MGMT</a>
                                    </li>
                                    <li class="active breadcrumb-item" aria-current="page">
                                        Add Role
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-card mb-3 card">
            <div class="card-body">
                <form action="{{ route('roles.store') }}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="position-relative row form-group">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input name="name" id="name" placeholder="Name" type="text" value="{{ old('name') }}"  class="form-control" autofocus>
                            @error('name')
                            <div class="col-xs-12 col-sm-reset inline text-danger"> {{ $message }} </div>
                            @enderror
                        </div>
                    </div>
                    <div class="position-relative row form-group">
                        <label for="description" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control"  placeholder="Description" id="description" name="description">
                                {{ old('description') }}
                            </textarea>
                            @error('description')
                            <div class="help-block col-xs-12 col-sm-reset inline text-danger"> {{ $message }} </div>
                            @enderror
                        </div>
                    </div>
                    <button class="mt-2 btn btn-info" type="submit">
                        <i class="ace-icon fa fa-check bigger-110"></i>
                        Submit
                    </button>
                    <a class="mt-2 btn btn-danger" href="#">
                        <i class="ace-icon fa fa-check bigger-110"></i>
                        Cancel
                    </a>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('jquery-script')
    <script>
        $(".add_role_li").addClass("mm-active")
                .parent()
                .parent().addClass("mm-show")
                .parent().addClass("mm-active")
        ;
    </script>
@endsection
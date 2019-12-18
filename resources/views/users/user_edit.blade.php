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
                            <span class="d-inline-block">Update User</span>
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
                                        Update User
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
                <form action="{{ route('users.update',$user->id) }}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    @method('PUT')
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="name" class="">Name</label>
                                <input type="text" id="name" class="form-control" name="name" value="{{ old('name') ? old('name') : $user->name }}" autofocus>
                                @error('name')
                                <div class="help-block col-xs-12 col-sm-reset inline"> {{ $message }} </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="email" class="">Email</label>
                                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') ? old('email') : $user->email }}">
                                @error('email')
                                <div class="col-xs-12 col-sm-reset inline text-danger"> {{ $message }} </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="password" class="">Password</label>
                                <input type="password" id="password" class="form-control" name="password" value="{{ old('password') }}" autofocus>
                                @error('password')
                                <div class="help-block col-xs-12 col-sm-reset inline"> {{ $message }} </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="conf_password" class="">Confirm Password</label>
                                <input type="password" name="conf_password" id="conf_password" class="form-control" value="{{ old('conf_password') }}">
                                @error('conf_password')
                                <div class="col-xs-12 col-sm-reset inline text-danger"> {{ $message }} </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="role" class="">Role</label>
                                <select class="form-control" name="role" id="role">
                                    <option value="">Select Role</option>
                                    @foreach($roles as $role)
                                        {{ $selectedRole = '' }}
                                        @if($role->id == old('role'))
                                            {{ $selectedRole = "selected='selected'" }}
                                        @else
                                            @if($role->id == $user->role_id)
                                                {{$selectedRole = "selected='selected'"}}
                                            @endif
                                        @endif
                                        <option value="{{ $role->id }}" {{$selectedRole}}>{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                @error('role')
                                <div class="help-block col-xs-12 col-sm-reset inline text-danger"> {{ $message }} </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="profile" class="">Profile</label>
                                <input type="file" id="profile" name="profile" class="form-control">
                                <img src="{{asset('uploads/'.$user->profile)}}" width="100px"/>
                                @error('profile')
                                <div class="help-block col-xs-12 col-sm-reset inline text-danger"> {{ $message }} </div>
                                @enderror
                            </div>
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
        $(".add_user_li").addClass("mm-active")
                .parent()
                .parent().addClass("mm-show")
                .parent().addClass("mm-active")
        ;
    </script>
@endsection
@extends('layouts.app')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Add User</h1>
</div>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item" aria-current="page"><a href="{{ URL('/user') }}">Manage User</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add User</li>
    </ol>
</nav>
<div class="card shadow mb-4">
    <div class="card-body">
        <form class="form-horizontal" method="POST" action="{{ URL('/user') }}" novalidate>
            {{ csrf_field() }}

            {{-- hidden data --}}
            <input type="hidden" name="userlogin" id="userlogin" value="{{ Auth::user()->name }}">
            <input type="hidden" name="thistime" id="thistime" value="{{ Carbon\Carbon::now()->toDateTimeString() }}">

            <div class="container">

                <div class="row">
                    <div class="form-group col-sm-6{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label class="col-sm-12">Full Name <font color="#FF0000">*</font></label>
                        <div class="col-sm-12">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div><!-- /.form-group -->
                </div><!-- /.row -->

                <div class="row">
                    <div class="form-group col-sm-6{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label class="col-sm-12">Position <font color="#FF0000">*</font></label>
                        <div class="col-sm-12">
                            <select name="position_id" id="position_id" class="form-control @error('position_id') is-invalid @enderror">
                                <option value="">Please Select</option>
                                @foreach($listposition as $key => $value)
                                <option value="{{ $value->position_id }}">{{ $value->position_name }}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div><!-- /.form-group -->
                </div><!-- /.row -->

                <div class="row">
                    <div class="form-group col-sm-6{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label class="col-sm-12">E-mail <font color="#FF0000">*</font></label>
                        <div class="col-sm-12">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email">

                            @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div><!-- /.form-group -->
                </div><!-- /.row -->

                <div class="row">
                    <div class="form-group col-sm-6{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label class="col-sm-12">Password <font color="#FF0000">*</font></label>
                        <div class="col-sm-12">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password">

                            @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div><!-- /.form-group -->
                    <div class="form-group col-sm-6">
                        <label class="col-sm-12">Confirm Password <font color="#FF0000">*</font></label>
                        <div class="col-sm-12">
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div><!-- /.form-group -->
                </div><!-- /.row -->


                <hr>

                <div class="row">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-2">
                        <a href="{{ URL('/branch') }}">
                            <button class="btn btn-danger btn-block" type="button">
                                <span class="text">Back</span>
                            </button>
                        </a>
                    </div>
                    <div class="col-sm-2">
                        <button class="btn btn-success btn-block" type="submit">
                            <span class="text">Save Change</span>
                        </button>
                    </div>
                    <div class="col-sm-4"></div>
                </div><!-- /.row -->

            </div>
        </form>
    </div>
</div>
@endsection

{{-- old data --}}
@extends('layouts.app')
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Update Branch</h1>
</div>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item" aria-current="page"><a href="{{ URL('/branch') }}">Manage Branch</a></li>
        <li class="breadcrumb-item active" aria-current="page">Update Branch</li>
    </ol>
</nav>
<div class="card shadow mb-4">
    <div class="card-body">
        <form class="form-horizontal" method="POST" action="{{ route('branch.update', $branch_id) }}" novalidate>
            {{ csrf_field() }}
            {{ method_field('PUT') }}

            {{-- hidden data --}}
            <input type="hidden" name="userlogin" id="userlogin" value="{{ Auth::user()->name }}">
            <input type="hidden" name="thistime" id="thistime" value="{{ Carbon\Carbon::now()->toDateTimeString() }}">

            <div class="container">

                <div class="row">
                    <div class="form-group col-sm-10{{ $errors->has('branch_name') ? ' has-error' : '' }}">
                        <label class="col-sm-12">Branch Name <font color="#FF0000">*</font></label>
                        <div class="col-sm-12">
                            <input id="branch_name" type="text" class="form-control" name="branch_name"
                                value="{{ $branch_name}}" required autofocus>

                            @if ($errors->has('branch_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('branch_name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div><!-- /.form-group -->
                    <div class="form-group col-sm-2">
                        <label class="col-sm-12">Sort</label>
                        <div class="col-sm-12">
                            <input type="number" name="branch_sort" id="branch_sort" value="{{ $branch_sort }}"
                                class="form-control">
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

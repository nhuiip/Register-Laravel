@extends('layouts.app')
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Manage User</h1>
    <a href="{{ URL('/user/create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fa fa-plus fa-sm text-white-50"></i>&nbsp;&nbsp;&nbsp;Add Data</a>
</div>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Manage User</li>
    </ol>
</nav>
<div class="card shadow mb-4">
    <div class="card-body">
        @if(count($listdata) != 0)
        <div class="table-responsive">
            <table class="table table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th style="width:10%">#</th>
                        <th style="width:15%">Full Name</th>
                        <th style="width:10%">Position</th>
                        <th style="width:25%">Email</th>
                        <th style="width:12.5%">Insert date</th>
                        <th style="width:5%;text-align:center">Action</th>
                        <th style="width:12.5%">Last Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($listdata as $key => $value)
                    <tr>
                        <td>{{ "B".str_pad($value->id,4,'0',STR_PAD_LEFT) }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->position_name }}</td>
                        <td>{{ $value->email }}</td>
                        <td>
                            {{ $value->create_name }}<br>
                            <small class="text-muted"><i class="fa fa-clock-o"></i>
                                {{ date('d/m/Y h:i A', strtotime($value->create_date)) }}</small>
                        </td>
                        <td>
                            @if (Auth::user()->position_id == 1)
                            <form class="form-horizontal" method="POST" action="{{ URL('user/'.$value->id) }}"
                                id="delete-form">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                {{-- hidden data --}}
                                <input type="hidden" name="userlogin" id="userlogin" value="{{ Auth::user()->name }}">
                                <input type="hidden" name="thistime" id="thistime"
                                    value="{{ Carbon\Carbon::now()->toDateTimeString() }}">
                                <div class="btn-group" style="width:100%">
                                    <button type="button"
                                        class="btn btn-danger btn-sm dropdown-toggle dropdown-toggle-split"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                        style="width:100%;">
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ URL::to('user/' . $value->id . '/edit') }}"><i
                                                class="fa fa-pencil"></i>&nbsp;&nbsp;&nbsp;Update
                                            Data</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#"
                                            onclick="event.preventDefault();document.getElementById('delete-form').submit();">
                                            <i class="fa fa-trash"></i>&nbsp;&nbsp;&nbsp;Delete
                                            Data</a>
                                    </div>
                                </div>
                            </form>
                            @else
                            <button type="button" class="btn btn-secondary btn-sm btn-block">
                                <i class="fa fa-ban"></i>
                            </button>
                            @endif
                        </td>
                        <td>
                            {{ $value->lastedit_name }}<br>
                            <small class="text-muted"><i class="fa fa-clock-o"></i>
                                {{ date('d/m/Y h:i A', strtotime($value->lastedit_date)) }}</small>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <hr>
        <center>data not found</center>
        @endif
    </div>
</div>
@endsection

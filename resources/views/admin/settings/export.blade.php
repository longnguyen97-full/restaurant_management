@extends('admin.layouts.master')

@section('title', 'Export')

@section('content')

    <div class="container-fluid">
        <h3>Export</h3>
        <form action="#" method="POST" name="exportform" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <a class="btn btn-info" href="{{ route('export.excel', ['method' => 'users']) }}">Export Users</a>
            </div>
            <div class="form-group">
                <a class="btn btn-info" href="{{ route('export.excel', ['method' => 'items']) }}">Export Items</a>
            </div>
            <div class="form-group">
                <a class="btn btn-info" href="{{ route('export.excel', ['method' => 'blogs']) }}">Export Blogs</a>
            </div>
        </form>
    </div>

@endsection

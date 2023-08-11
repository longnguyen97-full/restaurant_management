@extends('admin.layouts.master')

@section('title', 'Import')

@section('content')

    <div class="container-fluid">
        <h3>Import</h3>
        <form action="#" method="POST" name="importform" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <a class="btn btn-info" href="{{ route('import.excel', ['method' => 'users']) }}">Import Users</a>
            </div>
            <div class="form-group">
                <a class="btn btn-info" href="{{ route('import.excel', ['method' => 'items']) }}">Import Items</a>
            </div>
            <div class="form-group">
                <a class="btn btn-info" href="{{ route('import.excel', ['method' => 'blogs']) }}">Import Blogs</a>
            </div>
        </form>
    </div>

@endsection

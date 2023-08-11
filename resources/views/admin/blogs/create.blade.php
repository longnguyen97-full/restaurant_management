@extends('admin.layouts.master')

@section('title', 'Items - Create')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add Blog</h1>
    </div>
    {{-- Content --}}
    <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="input-title" name="title" placeholder="Enter title">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="input-description" name="description" cols="30" rows="10" class="form-control"
                placeholder="Enter description"></textarea>
        </div>
        <div class="form-group">
            <label for="thumbnail" class="form-label">Thumbnail</label>
            <input class="form-control" type="file" id="input-thumbnail" name="thumbnail">
        </div>
        <div class="form-group">
            <label for="input-price">Category</label>
            <select class="form-control w-50" id="input-category" name="category">
                <option default>Select category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
    </form>
@endsection

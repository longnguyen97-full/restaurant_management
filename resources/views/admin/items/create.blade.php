@extends('admin.layouts.master')

@section('title', 'Items - Create')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add Food</h1>
    </div>
    {{-- Content --}}
    <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="input-name">Name</label>
            <input type="text" class="form-control" id="input-name" name="input-name" placeholder="Enter name">
        </div>
        <div class="form-group">
            <label for="input-description">Description</label>
            <textarea id="input-description" name="input-description" cols="30" rows="10" class="form-control"
                placeholder="Enter description"></textarea>
        </div>
        <div class="form-group">
            <label for="input-price">Price</label>
            <input type="text" class="form-control" id="input-price" name="input-price" placeholder="Enter price">
        </div>
        <div class="form-group">
            <label for="input-thumbnail" class="form-label">Thumbnail</label>
            <input class="form-control" type="file" id="input-thumbnail" name="input-thumbnail">
        </div>
        <div class="form-group">
            <label for="input-price">Category</label>
            <select class="form-control w-50" id="input-category" name="input-category">
                <option default>Select category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
    </form>
@endsection

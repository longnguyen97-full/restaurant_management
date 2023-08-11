@extends('admin.layouts.master')

@section('title', 'Items - Edit')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Item</h1>
    </div>
    {{-- Content --}}
    <form action="{{ route('items.update', $item->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="form-group">
            <label for="input-name">Name</label>
            <input type="text" class="form-control" id="input-name" name="input-name" value="{{ $item->name }}">
        </div>
        <div class="form-group">
            <label for="input-description">Description</label>
            <textarea id="input-description" name="input-description" cols="30" rows="10" class="form-control">{{ $item->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="input-price">Price</label>
            <input type="text" class="form-control" id="input-price" name="input-price" value="{{ $item->price }}">
        </div>
        <div class="form-group">
            <label for="input-thumbnail" class="form-label">Thumbnail</label>
            <div class="view-thumbnail my-1">
                <img src="{{ asset("images/{$item->thumbnail}") }}" alt="{{ $item->name }}" width="300" height="300">
            </div>
            <div class="change-thumbnail">
                <input class="form-control" type="file" id="input-thumbnail" name="input-thumbnail">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection

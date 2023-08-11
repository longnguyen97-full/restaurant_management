@extends('admin.layouts.master')

@section('title', 'Items')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Items</h1>
    </div>
    {{-- Content --}}
    <table class="table">
        <thead>
            <tr>
                <th scope="col">NO</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">Thumbnail</th>
                <th scope="col">Date Modified</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $key => $item)
                <tr>
                    <th scope="row">{{ ++$key }}</th>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->price }}</td>
                    <td><img src="{{ asset("images/{$item->thumbnail}") }}" alt="{{ $item->name }}" width="150" height="150"></td>
                    <td>{{ $item->created_at }}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ url("items/$item->id") }}" role="button" class="btn btn-primary text-white">Detail</a>
                            <a href="{{ route('items.edit', $item->id) }}" role="button" class="btn btn-warning text-white">Edit</a>
                            <a class="btn btn-danger text-white" onclick="event.preventDefault(); document.getElementById('trigger-button-delete-{{ $item->id }}').submit();">Delete</a>
                            <form id="trigger-button-delete-{{ $item->id }}" action="{{ route('items.destroy', $item->id) }}" method="POST" style="display: block;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $items->links() }}
@endsection

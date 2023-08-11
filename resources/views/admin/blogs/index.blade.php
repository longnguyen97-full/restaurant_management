@extends('admin.layouts.master')

@section('title', 'Blogs')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Blogs</h1>
    </div>
    {{-- Content --}}
    <table class="table">
        <thead>
            <tr>
                <th scope="col">NO</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Thumbnail</th>
                <th scope="col">Date Modified</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($blogs as $key => $blog)
                <tr>
                    <th scope="row">{{ ++$key }}</th>
                    <td>{{ $blog->title }}</td>
                    <td>{{ $blog->description }}</td>
                    <td><img src="{{ asset("images/{$blog->thumbnail}") }}" alt="{{ $blog->name }}" width="150"
                            height="150"></td>
                    <td>{{ $blog->created_at }}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ url("blogs/$blog->id") }}" role="button"
                                class="btn btn-primary text-white">Detail</a>
                            <a href="{{ route('blogs.edit', $blog->id) }}" role="button"
                                class="btn btn-warning text-white">Edit</a>
                            <a class="btn btn-danger text-white"
                                onclick="event.preventDefault(); document.getElementById('trigger-button-delete-{{ $blog->id }}').submit();">Delete</a>
                            <form id="trigger-button-delete-{{ $blog->id }}"
                                action="{{ route('blogs.destroy', $blog->id) }}" method="POST" style="display: block;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $blogs->links() }}
@endsection

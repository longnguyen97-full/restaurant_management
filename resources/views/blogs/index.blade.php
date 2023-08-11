@extends('layouts.master')

@section('title', 'Blogs')

@section('content')

    <section class="ftco-section">
        <div class="container">
            <div class="row d-flex">
                @foreach ($blogs as $blog)
                    <div class="col-md-4 d-flex ftco-animate">
                        <div class="blog-entry align-self-stretch">
                            <a href="blog-single.html" class="block-20"
                                style="background-image: url('{{ $blog->thumbnail }}');">
                            </a>
                            <div class="text py-4 d-block">
                                <div class="meta">
                                    <div><a href="#">{{ $blog->created_at->format('M d, Y') }}</a></div>
                                    <div><a href="#">{{ $blog->user->name }}</a></div>
                                    <div><a href="#" class="meta-chat"><span class="icon-chat"></span>
                                            {{ $blog->comments_count }}</a></div>
                                </div>
                                <h3 class="heading mt-2"><a href="#">{{ $blog->title }}</a></h3>
                                <p>{{ $blog->description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $blogs->links('layouts.pagination') }}
        </div>
    </section>

@endsection

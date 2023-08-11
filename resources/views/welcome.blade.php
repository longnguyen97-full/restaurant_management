@extends('layouts.master')

@section('title', 'Homepage')

@section('content')

    @include('contents.intro')

    @include('contents.about')

    @include('contents.services')

    @include('contents.menu-intro')

    @include('contents.counter')

    @include('contents.best-seller')

    @include('contents.gallery')

    @include('contents.menu')

    @include('contents.testimony')

    @include('contents.recent-blog')

    @include('contents.appointment')

@endsection

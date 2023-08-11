@extends('layouts.master')

@section('title', 'Items')

@php
    $limit = 4;
    $list_menu = get_menu_list();
@endphp

@section('content')

    @include('contents.intro')

    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-5 pb-3">
                    <h3 class="mb-5 heading-pricing ftco-animate">Starter</h3>
                    @foreach ($list_menu['starter'] as $key => $item)
                        @if ($key < $limit)
                            <div class="pricing-entry d-flex ftco-animate">
                                <div class="img" style="background-image: url({{$item->thumbnail}});"></div>
                                <div class="desc pl-3">
                                    <div class="d-flex text align-items-center">
                                        <h3><span>{{$item->name}}</span></h3>
                                        <span class="price">${{$item->price}}</span>
                                    </div>
                                    <div class="d-block">
                                        <p>{{$item->description}}</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>

                <div class="col-md-6 mb-5 pb-3">
                    <h3 class="mb-5 heading-pricing ftco-animate">Main Dish</h3>
                    @foreach ($list_menu['main_dish'] as $key => $item)
                        @if ($key < $limit)
                            <div class="pricing-entry d-flex ftco-animate">
                                <div class="img" style="background-image: url({{$item->thumbnail}});"></div>
                                <div class="desc pl-3">
                                    <div class="d-flex text align-items-center">
                                        <h3><span>{{$item->name}}</span></h3>
                                        <span class="price">${{$item->price}}</span>
                                    </div>
                                    <div class="d-block">
                                        <p>{{$item->description}}</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>

                <div class="col-md-6">
                    <h3 class="mb-5 heading-pricing ftco-animate">Desserts</h3>
                    @foreach ($list_menu['desserts'] as $key => $item)
                        @if ($key < $limit)
                            <div class="pricing-entry d-flex ftco-animate">
                                <div class="img" style="background-image: url({{$item->thumbnail}});"></div>
                                <div class="desc pl-3">
                                    <div class="d-flex text align-items-center">
                                        <h3><span>{{$item->name}}</span></h3>
                                        <span class="price">${{$item->price}}</span>
                                    </div>
                                    <div class="d-block">
                                        <p>{{$item->description}}</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>

                <div class="col-md-6">
                    <h3 class="mb-5 heading-pricing ftco-animate">Drinks</h3>
                    @foreach ($list_menu['drinks'] as $key => $item)
                        @if ($key < $limit)
                            <div class="pricing-entry d-flex ftco-animate">
                                <div class="img" style="background-image: url({{$item->thumbnail}});"></div>
                                <div class="desc pl-3">
                                    <div class="d-flex text align-items-center">
                                        <h3><span>{{$item->name}}</span></h3>
                                        <span class="price">${{$item->price}}</span>
                                    </div>
                                    <div class="d-block">
                                        <p>{{$item->description}}</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    @include('contents.menu')

@endsection

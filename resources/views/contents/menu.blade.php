@php
    $limit = 3;
    $list_menu = get_menu_list();
@endphp

<section class="ftco-menu">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <span class="subheading">Discover</span>
                <h2 class="mb-4">Our Products</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there
                    live the blind texts.</p>
            </div>
        </div>
        <div class="row d-md-flex">
            <div class="col-lg-12 ftco-animate p-md-5">
                <div class="row">
                    <div class="col-md-12 nav-link-wrap mb-5">
                        <div class="nav ftco-animate nav-pills justify-content-center" id="v-pills-tab" role="tablist"
                            aria-orientation="vertical">
                            <a class="nav-link active" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1"
                                role="tab" aria-controls="v-pills-1" aria-selected="true">Main Dish</a>

                            <a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab"
                                aria-controls="v-pills-2" aria-selected="false">Drinks</a>

                            <a class="nav-link" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab"
                                aria-controls="v-pills-3" aria-selected="false">Desserts</a>
                        </div>
                    </div>
                    <div class="col-md-12 d-flex align-items-center">

                        <div class="tab-content ftco-animate" id="v-pills-tabContent">

                            <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-1-tab">
                                <div class="row">
                                    @foreach ($list_menu['main_dish'] as $key => $item)
                                        @if ($key < $limit)
                                            <div class="col-md-4 text-center">
                                                <div class="menu-wrap">
                                                    <a href="{{ url("items/$item->id") }}" class="menu-img img mb-4"
                                                        style="background-image: url({{ $item->thumbnail }});"></a>
                                                    <div class="text">
                                                        <h3><a href="{{ url("items/$item->id") }}">{{ $item->name }}</a></h3>
                                                        <p>{{ $item->description }}</p>
                                                        <p class="price"><span>${{ $item->price }}</span></p>
                                                        <p><a href="#" class="btn btn-primary btn-outline-primary add-to-cart" data-id="{{ $item->id }}">Add to cart</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>

                            <div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-2-tab">
                                <div class="row">
                                    @foreach ($list_menu['drinks'] as $key => $item)
                                        @if ($key < $limit)
                                            <div class="col-md-4 text-center">
                                                <div class="menu-wrap">
                                                    <a href="#" class="menu-img img mb-4"
                                                        style="background-image: url({{ $item->thumbnail }});"></a>
                                                    <div class="text">
                                                        <h3><a href="#">{{ $item->name }}</a></h3>
                                                        <p>{{ $item->description }}</p>
                                                        <p class="price"><span>${{ $item->price }}</span></p>
                                                        <p><a href="#" class="btn btn-primary btn-outline-primary add-to-cart" data-id="{{ $item->id }}">Add to cart</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>

                            <div class="tab-pane fade" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-3-tab">
                                <div class="row">
                                    @foreach ($list_menu['desserts'] as $key => $item)
                                        @if ($key < $limit)
                                            <div class="col-md-4 text-center">
                                                <div class="menu-wrap">
                                                    <a href="#" class="menu-img img mb-4" style="background-image: url({{ $item->thumbnail }});"></a>
                                                    <div class="text">
                                                        <h3><a href="#">{{ $item->name }}</a></h3>
                                                        <p>{{ $item->description }}</p>
                                                        <p class="price"><span>${{ $item->price }}</span></p>
                                                        <p><a href="#" class="btn btn-primary btn-outline-primary add-to-cart" data-id="{{ $item->id }}">Add to cart</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

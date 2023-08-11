@extends('layouts.master')

@section('title', 'Cart')

@section('content')

    <section class="ftco-section ftco-cart">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="cart-list">
                        <table class="table">
                            <thead class="thead-primary">
                                <tr class="text-center">
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Discount</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $key => $item)
                                    <tr class="text-center row-{{ $item['id'] }}">
                                        <td class="product-remove"><a href="#" class="remove-from-cart"
                                                data-id={{ $item['id'] }}><span class="icon-close"></span></a>
                                        </td>

                                        <td class="image-prod">
                                            <div class="img" style="background-image:url({{ $item['thumbnail'] }});">
                                            </div>
                                        </td>

                                        <td class="product-name">
                                            <h3>{{ $item['name'] }}</h3>
                                            <p>{{ $item['description'] }}</p>
                                        </td>

                                        <td class="price">${{ $item['price'] }}</td>

                                        <td class="quantity">
                                            <div class="input-group mb-3">
                                                <input type="text" name="quantity"
                                                    class="quantity form-control input-number"
                                                    value="{{ $item['quantity'] }}" min="1" max="100"
                                                    data-id={{ $item['id'] }}>
                                            </div>
                                        </td>

                                        <td class="discount">${{ $item['discount'] }}</td>

                                        <td class="total">${{ $item['total_each_item'] }}</td>
                                    </tr><!-- END TR-->
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row justify-content-end">
                <div class="col col-lg-3 col-md-6 mt-5 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                        <h3>Cart Totals</h3>
                        <p class="d-flex">
                            <span>Subtotal</span>
                            <span>${{ $card_totals['sub_total'] }}</span>
                        </p>
                        <p class="d-flex">
                            <span>Delivery</span>
                            <span>${{ $card_totals['delivery'] }}</span>
                        </p>
                        <p class="d-flex">
                            <span>Discount</span>
                            <span>${{ $card_totals['total_discount'] }}</span>
                        </p>
                        <hr>
                        <p class="d-flex total-price">
                            <span>Total</span>
                            <span>${{ $card_totals['total'] }}</span>
                        </p>
                    </div>
                    <p class="text-center"><a href="{{ url('checkout') }}" class="btn btn-primary py-3 px-4">Proceed to
                            Checkout</a>
                    </p>
                </div>
            </div>
        </div>
    </section>

@endsection

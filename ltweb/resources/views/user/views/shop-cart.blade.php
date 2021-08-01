@extends('user.layout')

@section('content')
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="{{ url('index') }}"><i class="fa fa-home"></i> Home</a>
                        <a href="{{ url('shop') }}">Shop</a>
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ url('update') }}" method="post">
                        @csrf
                        @method('POST')
                    <div class="cart-table">
                        <table>
                            <thead>
                            <tr>
                                <th>Ảnh</th>
                                <th class="p-name">Tên sản phẩm</th>
                                <th>Đơn giá</th>
                                <th>Số lượng</th>
                                <th>Tổng tiền</th>
                                <th><a href="{{ url('destroy') }}"><i class="ti-close"></i></a></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(\Gloudemans\Shoppingcart\Facades\Cart::content() as $cart)
                                <tr>
                                    <td class="cart-pic first-row"><img height="100px" src="{{ asset('backend/upload/'.$cart->options->avatar) }}" alt=""></td>
                                    <td class="cart-title first-row">
                                        <h5>{{ $cart->name }}</h5>
                                    </td>
                                    <td class="p-price first-row">{{ $cart->price }}</td>
                                    <td class="qua-col first-row">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="number" min="1" name="{{ $cart->id }}" value="{{ $cart->qty }}">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="total-price first-row">{{ $cart->price*$cart->qty }}</td>
                                    <td class="close-td first-row"><a href="{{ url('remove/'.$cart->rowId) }}"><i class="ti-close"></i></a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div style="margin-top: 50px" class="cart-buttons">
                            <a href="{{ url('shop') }}" class="primary-btn continue-shop">Tiếp tục shopping</a>
                            <button type="submit" class="primary-btn up-cart">Cập nhập giỏ hàng</button>
                        </div>
                    </div>
                    </form>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="discount-coupon">
                                <h6>Codes giảm giá</h6>
                                <form action="#" class="coupon-form">
                                    <input type="text" placeholder="Nhập codes của bạn">
                                    <button type="submit" class="site-btn coupon-btn">Áp dụng</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-4 offset-lg-4">
                            <div class="proceed-checkout">
                                <ul>
                                    <li class="subtotal">Tổng tiền hàng <span>{{ \Gloudemans\Shoppingcart\Facades\Cart::subtotal() }}</span></li>
                                    <li class="cart-total">Tổng tiền thanh toán <span>{{ \Gloudemans\Shoppingcart\Facades\Cart::total() }}</span></li>
                                </ul>
                                <a href="#" class="proceed-btn">Thanh toán</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

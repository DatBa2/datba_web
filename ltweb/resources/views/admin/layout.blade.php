<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('backend/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/bootstrap.min.css') }}">
</head>
<body>
<div class="wrapper">
    <div class="container">
        <div class="dashboard">
            <div class="left">
                    <span class="left__icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                <div class="left__content">
                    <div class="left__logo">LOGO</div>
                    <div class="left__profile">
                        <a style="text-align: center" href="{{ url('/') }}">
                            <div class="left__image"><img src="{{asset('backend/upload/'.Auth::user()->avatar)}}" alt=""></div>
                            <p class="left__name">{{ Auth::user()->name }}</p>
                        </a>
                    </div>
                    <ul class="left__menu">
                        <li class="left__menuItem">
                            <a href="{{ url('/') }}" class="left__title"><img src="{{ asset('backend/assets/icon-dashboard.svg')}}" alt="">Dashboard</a>
                        </li>
                        <li class="left__menuItem">
                            <div class="left__title"><img src="{{ asset('backend/assets/icon-tag.svg') }}" alt="">Sản Phẩm<img class="left__iconDown" src="{{ asset('backend/assets/arrow-down.svg') }}" alt=""></div>
                            <div class="left__text">
                                <a class="left__link" href="{{ url('product/create') }}">Thêm Sản Phẩm</a>
                                <a class="left__link" href="{{ url('product') }}">Xem Sản Phẩm</a>
                            </div>
                        </li>
                        <li class="left__menuItem">
                            <div class="left__title"><img src="{{ asset('backend/assets/icon-edit.svg') }}" alt="">Danh Mục SP<img class="left__iconDown" src="{{ asset('backend/assets/arrow-down.svg') }}" alt=""></div>
                            <div class="left__text">
                                <a class="left__link" href="{{ url('category/create') }}">Thêm Danh Mục</a>
                                <a class="left__link" href="{{ url('category') }}">Xem Danh Mục</a>
                            </div>
                        </li>
                        <li class="left__menuItem">
                            <a href="{{ url('customer') }}" class="left__title"><img src="{{ asset('backend/assets/icon-users.svg') }}" alt="">Khách Hàng</a>
                        </li>
                        <li class="left__menuItem">
                            <a href="view_orders.html" class="left__title"><img src="{{ asset('backend/assets/icon-book.svg') }}" alt="">Đơn Đặt Hàng</a>
                        </li>
                        <li class="left__menuItem">
                            <a href="{{ url('index') }}" target="_blank" class="left__title"><img src="{{ asset('backend/assets/shop.svg') }}" alt="">Trang Web</a>
                        </li>
                        <li class="left__menuItem">
                            <a href="{{ url('admin/'.Auth::id()) }}"><div class="left__title"><img src="{{ asset('backend/assets/icon-user.svg')}}" alt="">Admin</div></a>
                        </li>
                        <li class="left__menuItem">
                            <form id="" action="{{ route('logout') }}" method="POST">
                                @csrf
                                @method('POST')
                                <a href="" class="left__title"><img src="{{ asset('backend/assets/icon-logout.svg') }}" alt="">
                                    <input type="submit" value="Đăng xuất"></a>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="right">
                <div class="right__content">
                    <div class="right__title">Bảng điều khiển</div>
                    <p class="right__desc">Bảng điều khiển</p>
                    <div class="right__cards">
                        <a class="right__card" href="{{ url('product') }}">
                            <div class="right__cardTitle">Sản Phẩm</div>
                            <div class="right__cardNumber">{{ \App\Models\Product::count('id') }}</div>
                            <div class="right__cardDesc">Xem Chi Tiết <img src="{{ asset('backend/assets/arrow-right.svg') }}" alt=""></div>
                        </a>
                        <a class="right__card" href="view_customers.html">
                            <div class="right__cardTitle">Khách Hàng</div>
                            <div class="right__cardNumber">0</div>
                            <div class="right__cardDesc">Xem Chi Tiết <img src="{{ asset('backend/assets/arrow-right.svg') }}" alt=""></div>
                        </a>
                        <a class="right__card" href="{{ url('category') }}">
                            <div class="right__cardTitle">Danh Mục</div>
                            <div class="right__cardNumber">{{ \App\Models\Category::count('id') }}</div>
                            <div class="right__cardDesc">Xem Chi Tiết <img src="{{asset('backend/assets/arrow-right.svg')}}" alt=""></div>
                        </a>
                        <a class="right__card" href="view_orders.html">
                            <div class="right__cardTitle">Đơn Hàng</div>
                            <div class="right__cardNumber">0</div>
                            <div class="right__cardDesc">Xem Chi Tiết <img src="{{ asset('backend/assets/arrow-right.svg') }}" alt=""></div>
                        </a>
                    </div>
                </div>
                @yield('content')
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('backend/js/main.js') }}"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @if(isset($title))
        {{ $title }}
        @else
        {{ "" }}
        @endif
    </title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('frontend/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('frontend/css/themify-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/elegant-icons.css') }}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}" type="text/css">
</head>

<body>

        <div id="preloder">
            <div class="loader"></div>
        </div>

    <header class="header-section">
        <div class="header-top">
            <div class="container">
                <div class="ht-left">
                    <div class="mail-service">
                        <i class=" fa fa-envelope"></i>
                        nguyenbadat1092k@gmail.com
                    </div>
                    <div class="phone-service">
                        <i class=" fa fa-phone"></i>
                        0981.998.984
                    </div>
                </div>
                <div class="ht-right">
                    @if(\Illuminate\Support\Facades\Auth::check())
                        <a href="{{ url('index') }}" class="login-panel"><i class="fa fa-user"></i>{{ \Illuminate\Support\Facades\Auth::user()->name }}</a>
{{--                    @elseif(empty(session('success')))--}}
{{--                        <a href="{{ url('index') }}"><p><?php echo session('success') ?></p></a>--}}
                    @else
                    <a href="{{ url('user-login') }}" class="login-panel"><i class="fa fa-user"></i>Login</a>
                    @endif
                    <div class="top-social">
                        <a href="#"><i class="ti-facebook"></i></a>
                        <a href="#"><i class="ti-twitter-alt"></i></a>
                        <a href="#"><i class="ti-linkedin"></i></a>
                        <a href="#"><i class="ti-pinterest"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="{{ url('index') }}">
                                <img src="{{ asset('frontend/img/logo.png') }}" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <div class="advanced-search">
                            <button type="button" class="category-btn">Danh mục</button>
                            <div class="input-group">
                                <form action="{{ url('search') }}" method="get">
                                    @csrf
                                    @method('GET')
                                    <input name="search" type="text" placeholder="Bạn đang cần gì?">
                                    <button type="submit"><i class="ti-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 text-right col-md-3">
                        <ul class="nav-right">
                            <li class="cart-icon">
                                <a href="#">
                                    <img src="{{ asset('frontend/assets/bag-dash.svg') }}" alt="">
                                    <span>{{ \Gloudemans\Shoppingcart\Facades\Cart::count() }}</span>
                                </a>
                                <div class="cart-hover">
                                    <div class="select-items">
                                        <table>
                                            <tbody>
                                            @foreach(\Gloudemans\Shoppingcart\Facades\Cart::content() as $cart)
                                                <tr>
                                                    <td class="si-pic"><img height="100px" src="{{asset('backend/upload/'.$cart->options->avatar)}}" alt=""></td>
                                                    <td class="si-text">
                                                        <div class="product-selected">
                                                            <p>{{ $cart->price }} x {{ $cart->qty }}</p>
                                                            <h6>{{ $cart->name }}</h6>
                                                        </div>
                                                    </td>
                                                    <td class="si-close">
                                                        <a href="{{ url('remove/'.$cart->rowId) }}"><i class="ti-close"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="select-total">
                                        <span>Tổng tiền:</span>
                                        <h5>{{ \Gloudemans\Shoppingcart\Facades\Cart::subtotal() }}</h5>
                                    </div>
                                    <div class="select-button">
                                        <a href="{{ url('save-cart') }}" class="primary-btn view-card">Xem giỏ hàng</a>
                                        <a href="#" class="primary-btn checkout-btn">Thanh toán</a>
                                    </div>
                                </div>
                            </li>
                            <li class="cart-price">{{ \Gloudemans\Shoppingcart\Facades\Cart::subtotal() }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-item">
            <div class="container">
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <li class="@if($title == 'Trang trủ') active @endif"><a href="{{ url('index') }}">Trang trủ</a></li>
                        <li class="@if($title == 'Shop') active @endif"><a href="{{ url('shop') }}">Shop</a></li>
                        <li><a href="">Collection</a>
                            <ul class="dropdown">
                                @foreach(\App\Models\Category::get() as $category)
                                    <li><a href="{{ url('shop/'.$category->id) }}">{{ $category->name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li><a @if($title=='Trang trủ') href="#blog" @else href="index#blog" @endif >Bài viết</a></li>
                        <li><a href="https://www.facebook.com/profile.php?id=100014411171023">Liên hệ</a></li>
                        <li><a href="">Trang</a>
                            <ul class="dropdown">
                                <li><a href="./blog-details.html">Chi tiết bài viết</a></li>
                                <li><a href="{{ url('/save-cart') }}">Xem giỏ hàng</a></li>
                                <li><a href="./check-out.html">Thanh toán</a></li>
                                <li><a href="./faq.html">Câu hỏi</a></li>
                                @if(!(\Illuminate\Support\Facades\Auth::check()))
                                <li><a href="{{ url('user-register') }}">Đăng ký</a></li>
                                <li><a href="{{ url('user-login') }}">Đăng nhập</a></li>
                                @endif
                            </ul>
                        </li>
                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>

    @yield('content')

    <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer-left">
                        <div class="footer-logo">
                            <a href="#"><img src="{{asset('frontend/img/footer-logo.png')}}" alt=""></a>
                        </div>
                        <ul>
                            <li>Address: 66 99 ba dat</li>
                            <li>Phone: 0981998984</li>
                            <li>Email: nguyenbadat1092k@gmail.com</li>
                        </ul>
                        <div class="footer-social">
                            <a target="_blank" href=""><i class="fa fa-facebook"></i></a>
                            <a target="_blank" href=""><i class="fa fa-instagram"></i></a>
                            <a target="_blank" href=""><i class="fa fa-twitter"></i></a>
                            <a target="_blank" href=""><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1">
                    <div class="footer-widget">
                        <h5>Thông tin cá nhân</h5>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Thanh toán</a></li>
                            <li><a href="#">Liên hệ</a></li>
                            <li><a href="#">Dịch vụ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer-widget">
                        <h5>Tài khoản của tôi</h5>
                        <ul>
                            <li><a href="#">Tài khoản của tôi</a></li>
                            <li><a href="#">Liên hệ</a></li>
                            <li><a href="{{ url('save-cart') }}">Xem giỏ hàng</a></li>
                            <li><a href="{{ url('shop') }}">Shop</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="newslatter-item">
                        <h5>Join Our Newsletter Now</h5>
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="#" class="subscribe-form">
                            <input type="text" placeholder="Enter Your Mail">
                            <button type="button">Đăng ký</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-reserved">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-text">
                            Copyright <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://www.facebook.com/profile.php?id=100014411171023" target="_blank">Ba Đạt</a>
                        </div>
                        <div class="payment-pic">
                            <img src="{{ asset('frontend/img/payment-method.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{ asset('frontend/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.zoom.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.dd.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>
</body>

</html>

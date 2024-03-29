@extends('user.layout')

@section('content')
    <section>
        <div class="breacrumb-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-text">
                            <a href="{{ url('index') }}"><i class="fa fa-home"></i> Home</a>
                            <span>Login</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="register-login-section spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                        <div class="login-form">
                            <h2>Login</h2>
                            <form action="{{ url('user-login') }}" method="post">
                                @csrf
                                @method('POST')
                                <div class="group-input">
                                    <label for="username">Username or email address *</label>
                                    <input type="text" name="username" id="username">
                                </div>
                                <div class="group-input">
                                    <label for="pass">Password *</label>
                                    <input type="password" name="password" id="pass">
                                </div>
                                <div class="group-input gi-check">
                                    <div class="gi-more">
                                        <label for="save-pass">
                                            Save Password
                                            <input type="checkbox" id="save-pass">
                                            <span class="checkmark"></span>
                                        </label>
                                        <a href="#" class="forget-pass">Forget your Password</a>
                                    </div>
                                </div>
                                <button type="submit" class="site-btn login-btn">Sign In</button>
                            </form>
                            <div class="switch-login">
                                <a href="{{ url('user-register') }}" class="or-login">Or Create An Account</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

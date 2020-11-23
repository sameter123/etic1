@extends('layouts.app')
@section('body')
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container-fluid">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Login</li>
            </ol>
        </div><!-- End .container-fluid -->
    </nav>

    <div class="main-container">
        @include('parts.category.category-tree')

        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="heading">
                            <h2 class="title">Login</h2>
                            <p>If you have an account with us, please log in.</p>
                        </div><!-- End .heading -->



                        <form method="post">
                            @csrf
                            <input name="email" type="email" class="form-control" placeholder="E-posta Adresiniz" @if( session('email')) value="{{session('email')}}" @endif required>
                            <input name="password" type="password" class="form-control" placeholder="Şifreniz" required>
                            <label>
                                <input type="checkbox" name="remember">
                                Beni Hatırla
                            </label>



                            @if( session('errors')) <!-- Wrong Credentials info text -->
                            <br>
                                {{session('errors')}}
                            @endif

                            <div class="form-footer">
                                <button type="submit" class="btn btn-primary">Giriş</button>
                                <a href="#" class="forget-pass"> Şifremi Unuttum</a>
                            </div><!-- End .form-footer -->
                        </form>
                    </div><!-- End .col-md-6 -->

                    <div class="col-md-6">
                        <div class="heading">
                            <h2 class="title">Create An Account</h2>
                            <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
                        </div><!-- End .heading -->

                        <form action="#">
                            <input type="text" class="form-control" placeholder="First Name" required>
                            <input type="text" class="form-control" placeholder="Middle Name" required>
                            <input type="text" class="form-control" placeholder="Last Name" required>

                            <h2 class="title mb-2">Login information</h2>
                            <input type="email" class="form-control" placeholder="Email Address" required>
                            <input type="password" class="form-control" placeholder="Password" required>
                            <input type="password" class="form-control" placeholder="Confirm Password" required>

                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="newsletter-signup">
                                <label class="custom-control-label" for="newsletter-signup">Sing up our Newsletter</label>
                            </div><!-- End .custom-checkbox -->

                            <div class="form-footer">
                                <button type="submit" class="btn btn-primary">Create Account</button>
                            </div><!-- End .form-footer -->
                        </form>
                    </div><!-- End .col-md-6 -->
                </div><!-- End .row -->
            </div><!-- End .container-fluid -->
        </div><!-- End .main-content -->
    </div><!-- End .main-container -->
@endsection

@extends('layouts.app')

@section('content')
<section id="auth-login" class="row flexbox-container">
    <div class="col-xl-8 col-11 m-auto">
        <div class="card bg-authentication mb-0">
            <div class="row m-0">
                <!-- left section-login -->
                <div class="col-md-6 col-12 px-0 pt-0">
                    <div class="card disable-rounded-right mb-0 p-2 h-100 d-flex justify-content-center">
                        <div class="card-header pb-1">
                            <div class="card-title justify-content-center  pb-3">
                                <h3 style="text-align:center;color:red;font-size:39px;font-weight:bold">
                                    Gift App
                                </h3>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="divider">
                                    <div class="divider-text text-uppercase text-muted">
                                        <small>Login with email</small>
                                    </div>
                                </div>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group mb-50">
                                        <label class="text-bold-600 tt-u" for="exampleInputEmail1">Email address</label>
                                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email address">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-bold-600 tt-u" for="exampleInputPassword1">Password</label>
                                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                    </div>
                                    <div class="form-group d-flex flex-md-row flex-column justify-content-between align-items-center">
                                        <div class="text-left">
                                            <div class="checkbox checkbox-sm">
                                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                <label class="checkboxsmall" for="exampleCheck1">
                                                    <small>Keep me logged in</small>
                                                </label>
                                            </div>
                                        </div>

                                    </div>
                                    <button type="submit" class="btn btn-danger glow w-100 position-relative">Login
                                        <i id="icon-arrow" class="bx bx-right-arrow-alt"></i>
                                    </button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <small class="mr-25" style="color: #727E8C;">Don't have an account?</small>
                                    <a href="{{asset('register')}}"><small>Sign up</small></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- right section image -->
                <div class="col-md-6 d-md-block d-none text-center align-self-center p-3">
                    <div class="card-content">
                        <img class="img-fluid" style="height: 100%;width: auto;object-fit: cover" src="{{asset('img/login_cover.jpeg')}}" alt="branding logo">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
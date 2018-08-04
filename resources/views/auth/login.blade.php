@extends('layouts.auth')

@section('content')
    <div class="page-single">
        <div class="container">
            <div class="row">
                <div class="col col-login mx-auto">
                    <div class="text-center mb-6">
                        <img src="{{ asset('images/brand.svg') }}" class="h-6" alt="{{ config('app.name') }}">
                    </div>
                    <form class="card" action="{{ route('login') }}" method="post" pb-autologin="true" autocomplete="off">
                        @csrf {{-- Form field protection --}}
                        <div class="card-body p-6">
                            <div class="card-title">Login to your account</div>
                            <div class="form-group">
                                <label class="form-label">Email address</label>
                                <input type="email" class="form-control @error('email', 'is-invalid')" @input('email') id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" pb-role="username">
                                @error('email')
                            </div>
                            <div class="form-group">
                                <label class="form-label">Password<a href="{{ route('password.request') }}" class="float-right small">I forgot password</a></label>
                                <input type="password" class="form-control @error('password', 'is-invalid')" id="exampleInputPassword1" placeholder="Password" @input('password') pb-role="password">
                                @error('password')
                            </div>
                            <div class="form-group">
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" {{ old('remember') ? 'checked' : '' }} name="remember">
                                    <span class="custom-control-label">Remember me</span>
                                </label>
                            </div>
                            <div class="form-footer">
                                <button type="submit" class="btn btn-primary btn-block" pb-role="submit">Sign in</button>
                            </div>
                        </div>
                    </form>
                    <div class="text-center text-muted">
                        Don't have account yet? <a href={{ route('register') }}>Sign up</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

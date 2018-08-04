@extends('layouts.auth')

@section('content')
    <div class="page-single">
        <div class="container">
            <div class="row">
                <div class="col col-login mx-auto">
                    <div class="text-center mb-6">
                        <img src="{{ asset('images/brand.svg') }}" class="h-6" alt="{{ config('app.name') }}">
                    </div>
                    <form class="card" action="{{ route('register') }}" method="post" autocomplete="off">
                        @csrf {{-- Form field protection --}}
                        <input type="hidden" name="token" value={{ $token }}>

                        <div class="card-body p-6">
                            <div class="card-title">{{ __('Reset Password') }}</div>

                            <div class="form-group">
                                <label class="form-label">{{ __('E-Mail Address') }}</label>
                                <input type="email" class="form-control @error('email', 'is-invalid')" @input('email') placeholder="Your E-amil address">
                                @error('email')
                            </div>

                            <div class="form-group">
                                <label class="form-label">{{ __('Password') }}</label>
                                <input type="password" class="form-control @error('password', 'is-invalid')" placeholder="Your password" @input('password')>
                                @error('password')
                            </div>

                            <div class="form-group">
                                <label class="form-label">{{ __('Confirm Password') }}</label>
                                <input type="password" class="form-control" @input('password_confirmation') placeholder="Confirm password">
                            </div>
    
                            <div class="form-footer">
                                <button type="submit" class="btn btn-primary btn-block" pb-role="submit">{{ __('Reset Password') }}</button>
                            </div>
                        </div>
                    </form>
                    <div class="text-center text-muted">
                        Forget it, <a href={{ route('login') }}>send me back</a> to the sign in screen.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
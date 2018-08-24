@extends('layouts.auth')

@section('content')
    <div class="page-single">
        <div class="container">
            <div class="row">
                <div class="col col-login mx-auto">
                    <div class="text-center mb-6">
                        <img src="{{ asset('images/brand.svg') }}" class="h-6" alt="{{ config('app.name') }}">
                    </div>
                    <form class="card" action="{{ route('password.email') }}" method="post" autocomplete="off">
                        @csrf {{-- Form field protection --}}
                        <div class="card-body p-6">
                            <div class="card-title">{{ __('Reset password') }}</div>

                            @if (session('status'))
                                <div class="alert alert-success" role="alert">{{ session('status') }}</div>
                            @else
                                <p class="text-muted">Enter your email address and your password reset link will be emailed to you.</p>
                            @endif

                            <div class="form-group">
                                <label class="form-label">{{ __('E-Mail Address') }}</label>
                                <input type="email" class="form-control @error('email', 'is-invalid')" @input('email') placeholder="Your E-amil address">
                                @error('email')
                            </div>
    
                            <div class="form-footer">
                                <button type="submit" class="btn btn-primary btn-block" pb-role="submit">Send password reset link</button>
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

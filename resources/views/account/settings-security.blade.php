@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-9"> {{-- Content --}}
                <form class="card" method="POST" action="{{ route('account.security.update') }}">
                    @method('PATCH')    {{-- HTTP method spoofing --}}
                    @csrf               {{-- Form field protection --}}

                    <div class="card-body">
                        <h3 class="card-title">Edit account security</h3>

                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">New password</label>
                                    <input type="password" @input('password') class="form-control @error('password', 'is-invalid')" input="password">
                                    @error('password')
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">Repeat new password</label>
                                    <input type="password" class="form-control" input="password_confirmation">
                                </div>
                            </div>
                        </div>

                        <div class="card-footer text-right pr-0 pb-1">
                            <button type="submit" class="btn btn-primary">Update Profile</button>
                        </div>
                    </div>
                </form>
            </div> {{-- /// END content --}}

            <div class="col-lg-3 order-lg-1 mb-4"> {{-- Sidenav --}}
                @include('account.partials.sidenav')
            </div> {{-- /// Sidenav --}}
        </div>
    </div>
@endsection
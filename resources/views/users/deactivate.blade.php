@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form method="POST" action="{{ route('users.deactivate.store', $user) }}" class="card">
                    @csrf {{-- Form field protection --}}

                    <div class="card-body">
                        <h3 class="text-danger card-title">Deactivate login from {{ $user->firstname }} {{ $user->lastname }}</h3>

                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                By deactivating the login for <strong>{{ $user->firstname }} {{ $user->lastname }}</strong> you block the login for {{ config('app.name')  }},
                                This mean the person can't login for the given period of time. So make sure u want to do this.
                            </div>
                        </div>

                        <h3 class="card-title mb-3 mt-4">Confirm deactivation</h3>

                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Your password <span class="text-danger">*</span></label>
                                    <input type="password" @input('password') class="form-control @error('password', 'is-invalid')">
                                    @error('password')
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Deactivation period <span class="text-danger">*</span></label>

                                    <select @input('expired_at') class="form-control @error('expired_at', 'is-invalid')">
                                        @options($periods, 'expired_at')
                                    </select>

                                    @error('expired_at')
                                </div>
                            </div>
                        </div>

                        <div class="card-footer pl-0 pb-1">
                            <button type="submit" class="btn btn-danger">Deactivate user</button>
                            <a href="{{ route('users.index') }}" class="btn btn-link">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
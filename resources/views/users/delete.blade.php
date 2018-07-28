@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form method="POST" action="{{ route('users.destroy', $user) }}" class="card">
                    @csrf             {{-- Form filed protection --}}
                    @method('DELETE') {{-- HTTP method spoofing --}}

                    <div class="card-body">
                        <h3 class="card-title text-danger">Delete login from {{ $user->firstname }} {{ $user->lastname }}</h3>
                    
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                By deleting the user account for <strong>{{ $user->firstname }} {{ $user->lastname }}</strong>, they can't login into the application anymore. Also all data will be deleted from the user. <br>
                                So make sure u want to delete the user account in the application.
                            </div>
                        </div>

                        <h3 class="card-title mb-3 mt-4">Confirm delete</h3>

                         <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">Your password <span class="text-danger">*</span></label>
                                    <input type="password" @input('password') class="form-control @error('password', 'is-invalid')">
                                    @error('password')
                                </div>
                            </div>
                        </div>

                        <div class="card-footer pl-0 pb-1">
                            <button type="submit" class="btn btn-danger">Delete user</button>
                            <a href="{{ route('users.index') }}" class="btn btn-primary">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
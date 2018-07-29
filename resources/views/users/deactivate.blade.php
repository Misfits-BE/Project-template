@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form method="POST" action="" class="card">
                    @csrf {{-- Form field protection --}}

                    <div class="card-body">
                        <h3 class="text-danger card-title">Deactivate login from {{ $user->firstname }} {{ $user->lastname }}</h3>

                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                            </div>
                        </div>

                        <div class="card-footer pl-0 pb-1">
                            <button type="submit" class="btn btn-danger">Deactivate user</button>
                            <a href="{{ route('users.index') }}" class="btn btn-primary">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row row-cards">
            <div class="col-sm-6 col-lg-4">
                <div class="card p-3">
                    <div class="d-flex align-items-center">
                        <span class="stamp stamp-md bg-red mr-3">
                            <i class="fe fe-activity"></i>
                        </span>

                        <div>
                            <h4 class="m-0"><a href="{{ route('activities.index') }}">{{ $activityTotal }}<small> Activity logs</small></a></h4>
                            <small class="text-muted">{{ $activityToday }} handlings today</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="card p-3">
                    <div class="d-flex align-items-center">
                        <span class="stamp stamp-md bg-red mr-3">
                            <i class="fe fe-file-text"></i>
                        </span>

                        <div>
                            <h4 class="m-0"><a href="{{ route('fragments.index') }}">{{ $fragmentsTotal }} <small>Page fragments</small></a></h4>
                            <small class="text-muted">{{ $fragmentsToday }} fragments added today</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="card p-3">
                    <div class="d-flex align-items-center">
                        <span class="stamp stamp-md shadow-sm bg-red mr-3">
                            <i class="fe fe-users"></i>
                        </span>

                        <div>
                            <h4 class="m-0"><a href="{{ route('users.index') }}">{{ $usersTotal }} <small>Users</small></a></h4>
                            <small class="text-muted">{{ $usersToday }} created today</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">Users</h1>
            <div class="page-subtitle">{{ $users['collection']->firstItem() ?? '0' }} - {{ $users['collection']->lastItem() }} of {{ $users['count'] }} users</div>
            <div class="page-options d-flex">
                <div class="dropdown">
                    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown">
                        <i class="fe fe-filter mr-2"></i> Filter
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('users.index', ['filter' => 'recent']) }}">Recent users</a>
                        <a class="dropdown-item" href="{{ route('users.index') }}">All users</a>
                        <a class="dropdown-item" href="{{ route('users.index', ['filter' => 'deactivated']) }}">Deactivated users</a>
                        <a class="dropdown-item" href="{{ route('users.index', ['filter' => 'admins']) }}">Administrators</a>
                        <a class="dropdown-item" href="{{ route('users.index', ['filter' => 'deleted']) }}">Deleted users</a>
                    </div>
                </div>
                <a href="{{ route('users.create') }}" class="btn btn-secondary ml-2">
                    <i class="fe fe-user-plus"></i>
                </a>
                <form method="GET" action="{{ route('users.search') }}" class="input-icon ml-2">
                    <span class="input-icon-addon">
                        <i class="fe fe-search"></i>
                    </span>
                    <input @input('term') type="text" class="form-control w-10" placeholder="Search user">
                </form>
            </div>
        </div>

        <div class="row row-cards row-deck">
            <div class="col-12">
                <div class="card">
                    <table class="table @if ($users['count'] > 0) table-hover @endif table-outline table-vcenter text-nowrap card-table">
                        <thead>
                        <tr>
                            <th class="text-center w-1"><i class="icon-people"></i></th>
                            <th>User</th>
                            <th class="text-center">Role</th>
                            <th>Email</th>
                            <th>Activity</th>
                            <th class="text-center"><i class="icon-settings"></i></th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($users['collection'] as $user)
                            <tr>
                                <td class="text-center">
                                    <div class="avatar avatar d-block" style="background-image: url({{ Avatar::create($user->name)->setBorder(0, '#ffffff')->toBase64() }})">
                                        <span class="avatar-status {{ $user->isOnline() ? 'bg-green' : 'bg-red' }}"></span>
                                    </div>
                                </td>
                                <td>
                                    <div>@if ($user->isBanned())<i class="text-danger mr-1 fe fe-lock"></i>@endif {{ $user->name }}</div>
                                    <div class="small text-muted">
                                        Registered: {{ $user->created_at->toFormattedDateString() }}
                                    </div>
                                </td>
                                <td class="text-center">
                                    <span class="status-icon bg-success"></span> Admin
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <div class="small text-muted">Last login</div>
                                    <div>{{ $user->last_login_at ? $user->last_login_at->diffForHumans() : '-' }}</div>
                                </td>
                                <td class="text-center">
                                    <div class="item-action dropdown">
                                        <a href="javascript:void(0)" data-toggle="dropdown" class="icon"><i class="fe fe-more-vertical"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="javascript:void(0)" class="dropdown-item">
                                                <i class="dropdown-icon fe fe-tag"></i> View user
                                            </a>
                                            <a href="javascript:void(0)" class="dropdown-item">
                                                <i class="dropdown-icon fe fe-edit-2"></i> Edit user
                                            </a>

                                            @if ($user->isBanned())
                                                <a href="{{ route('users.activate', $user) }}" class="dropdown-item">
                                                    <i class="dropdown-icon text-success fe fe-rotate-ccw"></i> Activate user
                                                </a>
                                            @else {{-- User is not banned in the application --}}
                                                <a href="{{ route('users.deactivate', $user) }}" class="dropdown-item">
                                                    <i class="dropdown-icon fe fe-lock"></i> Deactivate user
                                                </a>
                                            @endif

                                            <div class="dropdown-divider"></div>

                                            @if ($user->trashed()) {{-- User has been deleted --}}
                                                <a href="{{ route('users.delete.undo', $user) }}" class="dropdown-item">
                                                    <i class="dropdown-icon text-success fe fe-rotate-ccw"></i> Undo delete
                                                </a>
                                            @else {{-- User has not been deleted --}}
                                                <a href="{{ route('users.delete', $user) }}" class="dropdown-item">
                                                    <i class="dropdown-icon text-danger fe fe-trash-2"></i> Delete account
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty {{-- When no user match with the criteria. --}}
                            <tr>
                                <td colspan="6" class="text-muted">
                                    <i class="fe fe-info mr-1"></i> No users found with the matching filter.
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>

                {{ $users['collection']->links() }}
            </div>
        </div>
    </div>
@endsection
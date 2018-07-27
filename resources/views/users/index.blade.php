@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">Users</h1>
            <div class="page-subtitle">{{ $users['collection']->firstItem() }} - {{ $users['collection']->lastItem() }} of {{ $users['count'] }} photos</div>
            <div class="page-options d-flex">
                <div class="dropdown">
                    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown">
                        <i class="fe fe-filter mr-2"></i> Filter
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('users.index', ['filter' => 'recent']) }}">Recent users</a>
                        <a class="dropdown-item" href="{{ route('users.index') }}">All users</a>
                        <a class="dropdown-item" href="{{ route('users.index', ['filter' => 'admins']) }}">Administrators</a>
                        <a class="dropdown-item" href="{{ route('users.index', ['filter' => 'deleted']) }}">Deleted users</a>
                    </div>
                </div>
                <a href="{{ route('users.create') }}" class="btn btn-secondary ml-2">
                    <i class="fe fe-user-plus"></i>
                </a>
                <div class="input-icon ml-2">
                  <span class="input-icon-addon">
                    <i class="fe fe-search"></i>
                  </span>
                    <input type="text" class="form-control w-10" placeholder="Search photo">
                </div>
            </div>
        </div>

        <div class="row row-cards row-deck">
            <div class="col-12">
                <div class="card">
                    <table class="table table-hover table-outline table-vcenter text-nowrap card-table">
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
                                        <span class="avatar-status bg-green"></span>
                                    </div>
                                </td>
                                <td>
                                    <div>{{ $user->name }}</div>
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
                                        <a href="javascript:void(0)" data-toggle="dropdown" class="icon"><i
                                                    class="fe fe-more-vertical"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="javascript:void(0)" class="dropdown-item"><i
                                                        class="dropdown-icon fe fe-tag"></i> Action </a>
                                            <a href="javascript:void(0)" class="dropdown-item"><i
                                                        class="dropdown-icon fe fe-edit-2"></i> Another action </a>
                                            <a href="javascript:void(0)" class="dropdown-item"><i
                                                        class="dropdown-icon fe fe-message-square"></i> Something else
                                                here</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="" class="dropdown-item">
                                                <i class="dropdown-icon text-danger fe fe-trash-2"></i> Delete account</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                        </tbody>
                    </table>
                </div>

                {{ $users['collection']->links() }}
            </div>
        </div>
    </div>
@endsection
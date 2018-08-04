@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">Activity logs</h1>
            <div class="page-subtitle">
                {{ $activities['collection']->firstItem() ?? '0' }} - {{ $activities['collection']->lastItem() ?? 0 }} of {{ $activities['count'] }} activity logs
            </div>
            <div class="page-options d-flex">
                <div class="dropdown">
                    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown">
                        <i class="fe fe-filter mr-1"></i> Filter
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('activities.index') }}">All logged handlings</a>
                        <a class="dropdown-item" href="{{ route('activities.index', ['filter' => 'users']) }}">Handlings on users</a>
                        <a class="dropdown-item" href="{{ route('activities.index', ['filter' => 'fragments']) }}">Handlings on fragments</a>
                    </div>
                </div>
                <form method="GET" action="{{ route('activities.search') }}" class="input-icon ml-2">
                    <span class="input-icon-addon"><i class="fe fe-search"></i></span>
                    <input @input('term') type="text" class="form-control w-10" placeholder="Search log message">
                </form>
            </div>
        </div> 
        
        <div class="row row-cards row-deck">
            <div class="col-12">
                <div class="card">
                    <table class="table @if ($activities['count'] > 0) table-hover @endif  table-sm table-vcenter text-nowrap card-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Causer</th>
                                <th>Log name</th>
                                <th>Log message</th>
                                <th>Timestamp</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($activities['collection'] as $activity) {{-- Loop through the activity logs --}}
                                <tr>
                                    <td><strong class="text-muted">#{{ $activity->id }}</strong></td>
                                    <td><strong>{{ $activity->causer->firstname }} {{ $activity->causer->lastname }}</strong></td>
                                    <td>{{ ucfirst($activity->log_name) }}</td>
                                    <td>{{ ucfirst($activity->description) }}</td>
                                    <td>{{ $activity->created_at->diffForHumans() }}</td>
                                </tr>
                            @empty {{-- There are no logs found.  --}} 
                                <tr>
                                    <td colspan="5" class="text-muted">No activity logs found under the given filter.</td>
                                </tr>
                            @endforelse {{-- /// END loop --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

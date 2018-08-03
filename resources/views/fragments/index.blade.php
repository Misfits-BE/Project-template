@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">Page fragments</h1>
            <div class="page-subtitle">
                {{ $fragments['content']->firstItem() ?? 0 }} - {{ $fragments['content']->lastItem() ?? 0 }} of {{ $fragments['count'] }} page fragments
            </div>

            <div class="page-options d-flex">
                <form method="GET" action="" class="input-icon ml-2">
                    <span class="input-icon-addon"><i class="fe fe-search"></i></span>
                    <input @input('term') type="text" class="form-control w-10" placeholder="Search page fragment">
                </form>
            </div>
        </div>

        <div class="row row-cards row-deck">
            <div class="col-12">
                <div class="card">
                    <table class="table @if ($fragments['count'] > 0) table-hover @endif table-outline table-vcenter text-nowrap card-table">
                        <thead>
                            <tr>
                                <th class="text-center w-1"><i class="icon-people"></i></th>
                                <th>Last editor</th>
                                <th>Status</th>
                                <th>Title</th>
                                <th>Last edit</th>
                                <th class="text-center"><i class="icon-settings"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($fragments['content'] as $fragment) {{-- If there are page fragments found --}}
                                <tr>
                                    <td class="text-center">
                                        <div class="avatar avatar d-block" style="background-image: url({{ Avatar::create($user->editor->name)->setBorder(0, '#ffffff')->toBase64() }})">
                                            <span class="avatar-status {{ $user->editor->isOnline() }} ? 'bg-green' : 'bg-red'"></span>
                                        </div>
                                    </td>
                                    <td>
                                        <div>@if ($user->isBanned())<i class="text-danger mr-1 fe fe-lock"></i>@endif {{ $user->name }}</div>
                                        <div class="small text-muted">
                                            Registered: {{ $user->created_at->toFormattedDateString() }}
                                        </div>
                                    </td>
                                    
                                    <td> {{-- Status indicator --}}
                                        @if ($fragment->is_public) {{-- Page fragment = public --}} 
                                            <span class="status-icon bg-success"></span> Public
                                        @elseif (! $fragment->is_public) {{-- Page fragment = draft --}}
                                            <span class="status-icon bg-warning"></span> Draft
                                        @endif 
                                    </td> {{-- /// Status indicator --}}

                                    <td>{{ $fragment->title }}</td>
                                    <td>{{ $fragment->updated_at->diffForHUmans() }}</td>
                                    
                                    <td> {{-- Options --}}

                                    </td> {{-- /// Options --}}
                                </tr>                                
                            @empty {{-- When no page fragments are found --}}
                                <tr>
                                    <td colspan="6" class="text-muted">
                                        <i class="fe fe-info mr-1"></i> No page fragments in the application. 
                                    </td>
                                </tr>
                            @endforelse {{-- /// END forelse loop --}}
                        </tbody>
                    </table>
                </div>

                {{ $fragments['content']->links() }} {{-- Pagination view instance --}}
            </div>
        </div>
    </div>
@endsection
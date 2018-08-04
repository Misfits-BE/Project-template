@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form method="POST" action="" class="card"> {{-- Edit form --}}
                    @csrf               {{-- Form field protection --}}
                    @form($fragment)    {{-- Bind data to the form --}}
                    @method('PATCH')    {{-- HTTP method spoofing --}}

                    <div class="card-body">
                        <h3 class="card-title">Edit page fragment: {{ $fragment->title }}</h3>

                        <div class="row">
                            <div class="col-md-8 col-sm-8">
                                <label class="form-label">Title <span class="text-danger">*</span></label>
                                <input type="text" @input('title') class="form-control" @error('title', 'is-invalid') placeholder="Page fragment title">
                                @error('title')
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-12 mt-3 mb-3">
                                <label class="form-label">Page content <span class="text-danger">*</span></label>
                                <textarea rows="4" @input('content') class="form-control @error('content', 'is-invalid')" placeholder="Page fragment content">@text('content')</textarea>
                                @error('text')
                            </div>
                        </div>

                        <div class="card-footer text-right pr-0 pb-1">
                            <a href="{{ route('fragments.index') }}" class="btn btn-link">Cancel</a>
                            <button type="submit" class="btn btn-primary">Update fragment</button>
                        </div>
                    </div>
                </form> {{-- /// END edit form --}}
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script defer src="https://cdn.ckeditor.com/4.9.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(function () {
            CKEDITOR.replace('content', {
                toolbar: [{
                    name: 'basicstyles',
                    groups: ['basicstyles', 'cleanup'],
                    items: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat']
                }, {
                    name: 'tools',
                    items: [
                        'Maximize', 'ShowBlocks',
                    ]
                }, ]
            });
        });
    </script>
@endpush 
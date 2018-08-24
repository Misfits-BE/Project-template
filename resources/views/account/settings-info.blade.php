@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-9">
                <form class="card" method="POST" action="{{ route('account.info.update') }}">
                    @method('PATCH')    {{-- HTTP method spoofing --}}
                    @csrf               {{-- Form field protection --}}
                    @form($authUser)    {{-- Bind the data from the authenticated user to the form --}}

                    <div class="card-body">
                        <h3 class="card-title">Edit account information</h3>
                        
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">First name <span class="text-danger">*</span></label>
                                    <input type="text" @input('firstname') class="form-control @error('firstname', 'is-invalid')">
                                    @error('firstname')
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Last name <span class="text-danger">*</span></label>
                                    <input type="text" @input('lastname') class="form-control @error('lastname', 'is-invalid')">
                                    @error('lastname')
                                </div>
                            </div>

                            <div class="col-sm-6 col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">Date of birth</label>
                                    <div class="row gutters-xs">
                                        <div class="col-5">
                                            <select @input('birth[month]') class="form-control custom-select">
                                                <option value="">Month</option>
                                                <option value="01">January</option>
                                                <option value="02">February</option>
                                                <option value="03">March</option>
                                                <option value="04">April</option>
                                                <option value="05">May</option>
                                                <option value="06">June</option>
                                                <option value="07">July</option>
                                                <option value="08">August</option>
                                                <option value="09">September</option>
                                                <option value="10">October</option>
                                                <option value="11">November</option>
                                                <option value="12">December</option>
                                            </select>
                                        </div>
                                        <div class="col-3">
                                            <select class="form-control custom-select">
                                                <option value="">Day</option>
                                            </select>
                                        </div>
                                        <div class="col-4">
                                            <select class="form-control custom-select">
                                                <option value="">Year</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <div class="form-label">Username: <span class="text-danger">*</span></div>
                                    <input @input('name') type="text" class="form-control @error('lastname', 'is-invalid')">
                                    @error('lastname')
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <div class="form-label">E-mail address: <span class="text-danger">*</span></div>
                                    <input type="text" @input('email') class="form-control @error('email', 'is-invalid')">
                                    @error('email')
                                </div>
                            </div>
                        </div>

                        <div class="card-footer text-right pr-0 pb-1">
                            <button type="submit" class="btn btn-primary">Update Profile</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-lg-3 order-lg-1 mb-4"> {{-- Sidenav --}}
                @include('account.partials.sidenav')
            </div> {{-- /// Sidenav --}}
        </div>
    </div>
@endsection
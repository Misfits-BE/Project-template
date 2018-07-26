@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-9">
                <form class="card">
                    <div class="card-body">
                        <h3 class="card-title">Edit account information</h3>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">First name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Last name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>

                            <div class="col-sm-5">
                                <div class="form-group">
                        <label class="form-label">Date of birth</label>
                        <div class="row gutters-xs">
                            <div class="col-5">
                                <select name="user[month]" class="form-control custom-select">
                                    <option value="">Month</option>
                                    <option value="1">January</option>
                                    <option value="2">February</option>
                                    <option value="3">March</option>
                                    <option value="4">April</option>
                                    <option value="5">May</option>
                                    <option value="6">June</option>
                                    <option value="7">July</option>
                                    <option value="8">August</option>
                                    <option value="9">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select>
                            </div>
                            <div class="col-3">
                                <select name="user[day]" class="form-control custom-select">
                                <option value="">Day</option>
                                </select>
                            </div>
                            <div class="col-4">
                                <select name="user[year]" class="form-control custom-select">
                                <option value="">Year</option>
                                </select>
                            </div>
                        </div>
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
                <div class="list-group list-group-transparent mb-0">
				    <a href="#" class="list-group-item list-group-item-action disabled">
                        <h4 class="align-left mb-0">Account settings</h4>
                    </a>

                    <a href="{{ route('account.info') }}" class="list-group-item active list-group-item-action">
                        <span class="icon mr-3"><i class="fe fe-user"></i></span>
                        Account information
                    </a>

                    <a href="" class="list-group-item list-group-item-action">
                        <span class="icon mr-3"><i class="fe fe-lock"></i></span>
                        Account security
                    </a>

                    <a href="" class="list-group-item list-group-item-action">
                        <span class="icon mr-3"><i class="fe fe-x-circle"></i></span> Delete account
                    </a>
			    </div>
            </div> {{-- /// Sidenav --}}
        </div>
    </div>
@endsection
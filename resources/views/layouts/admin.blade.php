<!doctype html>
<html lang="{{ app()->getLocale() }}" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta http-equiv="Content-Language" content="en" />
        <meta name="msapplication-TileColor" content="#2d89ef">
        <meta name="theme-color" content="#4188c9">
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="HandheldFriendly" content="True">
        <meta name="MobileOptimized" content="320">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="icon" href="./favicon.ico" type="image/x-icon"/>
        <link rel="shortcut icon" type="image/x-icon" href="./favicon.ico" />
        
        <title>{{ asset('app.name') }}</title>
        
        {{-- Javascripts --}}
        <script src="{{ asset('js/app.js') }}" async></script>

        {{-- Stylesheets --}}
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    </head>
    <body>
    <div class="page" id="app">
        <div class="page-main">
            <div class="header py-4">
                <div class="container">
                    <div class="d-flex">
                        <a class="header-brand" href="{{ url('/') }}">
                            <img src="{{ asset('images/brand.svg') }}" class="header-brand-img" alt="{{ config('app.name') }} logo">
                        </a>
                
                        <div class="d-flex order-lg-2 ml-auto">
                            @if (auth()->check())
                                <div class="dropdown d-none d-md-flex">
                                    <a class="nav-link icon" data-toggle="dropdown">
                                        <i class="fe fe-bell"></i>
                                        <span class="nav-unread"></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <a href="#" class="dropdown-item d-flex">
                                            <span class="avatar mr-3 align-self-center" style="background-image: url(demo/faces/male/41.jpg)"></span>
                                            
                                            <div>
                                                <strong>Nathan</strong> pushed new commit: Fix page load performance issue.
                                                <div class="small text-muted">10 minutes ago</div>
                                            </div>
                                        </a>

                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item text-center text-muted-dark">Mark all as read</a>
                                    </div>
                                </div>
                
                                <div class="dropdown">
                                    <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
                                        <span class="avatar" style="background-image: url({{ Avatar::create($authUser->name)->setBorder(0, '#ffffff')->toBase64() }})"></span>
                                        <span class="ml-2 d-none d-lg-block">
                                        
                                        <span class="text-default">{{ $authUser->email }}</span>
                                            <small class="text-muted d-block mt-1">{{ $authUser->name }}</small>
                                        </span>
                                    </a>
                  
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <a class="dropdown-item" href="{{ route('account.info') }}">
                                            <i class="dropdown-icon fe fe-user"></i> Settings
                                        </a>
                    
                                        <div class="dropdown-divider"></div>

                                        <a class="dropdown-item" href="#">
                                            <i class="dropdown-icon fe fe-log-out"></i> Sign out
                                        </a>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse" data-target="#headerMenuCollapse">
                            <span class="header-toggler-icon"></span>
                        </a>
                    </div>
                </div>
            </div>

           <div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
	            <div class="container">
		            <div class="row align-items-center">
			            <div class="col-lg-3 ml-auto">
				            <form class="input-icon my-3 my-lg-0">
					            <input type="search" class="form-control header-search" placeholder="Search petition…" tabindex="1">
					            <div class="input-icon-addon">
						            <i class="fe fe-search"></i>
					            </div>
				            </form>
			            </div>
			            
                        <div class="col-lg order-lg-first">
				            <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
	                            <li class="nav-item">
		                            <a href="{{ route('home') }}" class="nav-link"><i class="fe fe-home"></i> Home</a>
	                            </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link"><i class="fe fe-users"></i> Users</a>
                                </li>
                                <li class="nav-item">
                                    <a class="" class="nav-link"><i class="fe fe-file-text"></i> Fragments</a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link"><i class="fe fe-list"></i> Logs</a>
                                </li>
                                
                                @if (! auth()->check())
                                    <li class="nav-item">
                                        <a href="{{ route('register') }}" class="nav-link"><i class="fe fe-user-plus"></i> Register</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('login') }}" class="nav-link"><i class="fe fe-user"></i> Login </a>
                                    </li>
                                @endif
	                        </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="my-3 my-md-5">
                @yield('content')
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <div class="row align-items-center flex-row-reverse">
                    <div class="col-auto ml-lg-auto">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <ul class="list-inline list-inline-dots mb-0">
                                    <li class="list-inline-item"><a href="./docs/index.html">Terms</a></li>
                                    <li class="list-inline-item"><a href="./faq.html">Privacy Policy</a></li>
                                </ul>
                            </div>
                            <div class="col-auto">
                                <a href="https://github.com/tabler/tabler" class="btn btn-outline-primary btn-sm">
                                    <i class="fe fe-chevrons-up"></i> Back to top
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-auto mt-3 mt-lg-0 text-center">
                        Copyright © {{ date('Y') }} <a href=".">{{ config('app.name') }}</a>. All rights reserved.
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
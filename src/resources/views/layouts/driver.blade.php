<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="{{ asset('style/assets/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/scss/style.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/notification.css') }}">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @yield('front-script')

</head>

<body>
    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu"
                    aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="">Laundrex</a>
                <a class="navbar-brand hidden" href="">L</a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="{{ route('driverHome') }}"> <i class="menu-icon fa fa-dashboard"></i>Home </a>
                    </li>

                    <li class="menu-item-has-children active dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"><i class="menu-icon fa fa-id-card"></i>Register new license</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-plus"></i><a href="{{ route('addLicense') }}">New license</a></li>
                            <li><i class="fa fa-spinner"></i><a href="{{ route('licenses') }}">My license</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children active dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"><i class="menu-icon fa fa-car"></i>Register new Car</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-plus"></i><a href="{{ route('addCar') }}">New Car</a></li>
                            <li><i class="fa fa-spinner"></i><a href="{{ route('cars') }}">My Cars</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children active dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"><i class="menu-icon fa fa-cart-plus"></i>Orders</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-plus"></i><a href="{{ route('newRequest') }}">New request</a></li>
                            <li><i class="fa fa-spinner"></i><a href="{{ route('currentOrder') }}">Current Orders</a>
                            </li>
                            <li><i class="fa fa-table"></i><a href="{{ route('history') }}">Order History</a></li>
                        </ul>
                    </li>

                    <!-- <li class="menu-item-has-children active dropdown"> -->

                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..."
                                    aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>

                        {{-- <div class="dropdown for-notification"> --}}
                        {{-- <button class="btn btn-secondary dropdown-toggle" type="button" id="notification"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <span class="count bg-danger">5</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="notification">
                                <a class="dropdown-item media bg-flat-color-1" href="#">
                                    <i class="fa fa-check"></i>
                                    <p>Server #1 overloaded.</p>
                                </a>
                                <a class="dropdown-item media bg-flat-color-4" href="#">
                                    <p>Server #2 overloaded.</p>
                                </a>
                                <a class="dropdown-item media bg-flat-color-5" href="#">
                                    <p>Server #3 overloaded.</p>
                                </a>
                                <a class="dropdown-item media bg-flat-color-5" href="#">
                                    <p>Server #3 overloaded.</p>
                                </a>
                            </div> --}}
                        {{-- </div> --}}
                        @inject('notification', 'App\Models\Notification')
                        @php
                            $notifications = $notification::getNotification('user_request');
                            $notificationCount = $notifications->count();
                        @endphp
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" id="dLabel" role="button"
                                data-toggle="dropdown" data-target="#" href="/page.html">
                                <i class="fa fa-bell"></i>
                                <span id="counter" class="count bg-danger">{{ $notificationCount }}</span>

                                {{-- <i class="glyphicon glyphicon-bell"></i> --}}
                            </button>
                            <ul class="dropdown-menu notifications" role="menu" aria-labelledby="notification">

                                {{-- <div class="notification-heading">
                                    <h4 class="menu-title">Notifications</h4>
                                    <h4 class="menu-title pull-right">View all<i
                                            class="glyphicon glyphicon-circle-arrow-right"></i></h4>
                                </div> --}}
                                <li class="divider"></li>
                                <div class="notifications-wrapper">
                                    <div class="notification-heading">
                                        <h4 class="menu-title" style="color:#272c33 !important;">Notifications</h4>
                                        <h4 class="menu-title pull-right" style="color: #272c33 !important ;">View
                                            all<i class="glyphicon glyphicon-circle-arrow-right"></i></h4>
                                    </div>
                                    <hr class="divider">
                                    </hr>
                                    @php
                                        
                                    @endphp
                                    @foreach ($notifications as $notification)
                                        <a class="content" href="{{ $notification->route_name }}">
                                            <div class="notification-item">
                                                <h4 class="item-title">{{ $notification->message }}</h4>
                                                <p class="item-info">view</p>
                                            </div>
                                        </a>
                                    @endforeach

                                </div>
                                {{-- <hr class="divider"> --}}
                                {{-- </hr> --}}
                                {{-- <div class="notification-footer">
                                    <h4 class="menu-title">View all<i
                                            class="glyphicon glyphicon-circle-arrow-right"></i></h4>
                                </div> --}}
                            </ul>
                        </div>



                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="{{ asset('style/images/admin.jpg') }}"
                                alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="{{ route('profile') }}"><i class="fa fa- user"></i>My
                                Profile</a>


                            <a class="nav-link" href="#"><i class="fa fa- user"></i>Notifications <span
                                    class="count">13</span></a>

                            <a class="nav-link" href="#"><i class="fa fa -cog"></i>Settings</a>

                            <a class="nav-link" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();"><i
                                    class="fa fa-power -off"></i>Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>

                    
                </div>
            </div>
        </header><!-- /header -->
        <!-- Header-->
        @yield('breadcrumbs')
        @include('flash-message')
        @yield('content')
        @yield('script')
        
        
    </div><!-- /#right-panel -->
    <!-- Right Panel -->

    <script src="{{ asset('style/assets/js/vendor/jquery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('style/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('style/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('style/assets/js/main.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script src="//js.pusher.com/3.1/pusher.min.js"></script>
    <script>
        Pusher.logToConsole = true;
        var pusher = new Pusher("{{ env('PUSHER_APP_KEY') }}", {
            encrypted: true,
            cluster: "{{ env('PUSHER_APP_CLUSTER') }}"
        });
        var channel = pusher.subscribe('user-notification');
        channel.bind('App\\Events\\UserNotification', function(data) {
            console.log(data);
            // append the new notificaoitns
            let audio = new Audio("{{ asset('style/assets/sound/not2.wav') }}");
            audio.play();
            $(".notifications-wrapper").append(
                `<a class="content" href="/driver/order/detail/${data.orderId}"><div class="notification-item"><h4 class="item-title">${data.message}</h4><p class="item-info">View</p></div></a>`
            );
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // incrase the coutenr by 1
            var counter = parseInt( $('#counter').html() );
            console.log(counter);
            counter++;
            $('#counter').html(counter)
            // store the new notifactions in databse
            var orderId = data.orderId;

            $.ajax({
                url: "/home/notification",
                data: {
                    user_id: data.userID,
                    message: data.message,
                    route_name: `/driver/order/detail/${orderId}`,
                    category: 'user_request'
                    
                },
                type: "POST",
                dataType: "json",
            });
        })
    </script>

    <!-- map -->

</body>

</html>

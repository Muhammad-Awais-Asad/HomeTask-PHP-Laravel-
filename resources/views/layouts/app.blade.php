<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta charset="UTF-8">
        <title>Home Tasks connects you to safe and riliable help in your neighbourhood</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
        <link href="{{ asset('css/fonts.css') }}" rel="stylesheet">
        <link rel="icon" type="icon/png" href="{{ asset('images/logo.png') }}">
        <script src="{{ asset('js/app.js') }}" defer></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background: #C3C3C3;">
            <div class="container">
                @if(Auth::check())
                    <a class="navbar-brand" href="{{ url('/home') }}">
                        <img src="{{ asset('images/logo3.png') }}" alt="HomeTasks">
                    </a>
                @else
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ asset('images/logo3.png') }}" alt="HomeTasks">
                    </a>
                @endif
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        @if(Auth::check())
                            @if(auth()->user()->user_type == 'Client')
                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i style="margin-right: 4px;" class="fas fa-bell text-success"></i><span class="badge badge-danger" id="count-notification"> {{auth()->user()->unreadNotifications->count()}} </span><span class="caret"></span>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        @if(auth()->user()->notifications->count())
                                            @if(auth()->user()->notifications->count() < 5)
                                                @foreach(auth()->user()->notifications as $notifications)
                                                    @if($notifications->read_at)
                                                        <a href="/client/{{$notifications->data['lesson']['job_id']}}/{{$notifications->data['lesson']['tasker_id']}}/applicatedTask" class="dropdown-item text-dark">
                                                            A tasker has applied on your task, see details.
                                                        </a>
                                                    @else
                                                        <a href="/client/{{$notifications->data['lesson']['job_id']}}/{{$notifications->data['lesson']['tasker_id']}}/applicatedTask" class="dropdown-item text-success">
                                                            A tasker has applied on your task, see details.
                                                        </a>
                                                    @endif
                                                @endforeach
                                            @else
                                                <?php $i = 0; ?>
                                                @foreach(auth()->user()->notifications as $notifications)
                                                    @if($i < 5 )
                                                        @if($notifications->read_at)
                                                            <a href="/client/{{$notifications->data['lesson']['job_id']}}/{{$notifications->data['lesson']['tasker_id']}}/applicatedTask" class="dropdown-item text-dark">
                                                            A tasker has applied on your task, see details.
                                                            </a>
                                                        @else
                                                            <a href="/client/{{$notifications->data['lesson']['job_id']}}/{{$notifications->data['lesson']['tasker_id']}}/applicatedTask" class="dropdown-item text-success">
                                                                A tasker has applied on your task, see details.
                                                            </a>
                                                        @endif
                                                    @endif
                                                    <?php $i++; ?>
                                                @endforeach
                                            @endif
                                            <a style="margin-left: 140px;" href="/client/{{auth()->user()->id}}/notifications" class="btn btn-group text-center">See all</a>
                                        @else
                                        <a href="#" class="dropdown-item text-success">
                                            No Notification
                                        </a>
                                        @endif
                                    </div>
                                </li>
                            @elseif(auth()->user()->user_type == 'Tasker')
                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i style="margin-right: 4px;" class="fas fa-bell text-success"></i><span class="badge badge-danger" id="count-notification"> {{auth()->user()->unreadNotifications->count()}} </span><span class="caret"></span>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        @if(auth()->user()->notifications->count())
                                            @if(auth()->user()->notifications->count() < 5)
                                                @foreach(auth()->user()->notifications as $notifications)
                                                    @if($notifications->read_at)
                                                        <a href="/tasker/{{$notifications->data['lesson']['job_id']}}/confirmedTask" class="dropdown-item text-dark">
                                                            A client has accepted your task request, see details.
                                                        </a>
                                                    @else
                                                        <a href="/tasker/{{$notifications->data['lesson']['job_id']}}/confirmedTask" class="dropdown-item text-success">
                                                            A client has accepted your task request, see details.
                                                        </a>
                                                    @endif
                                                @endforeach
                                            @else
                                                <?php $i = 0; ?>
                                                @foreach(auth()->user()->notifications as $notifications)
                                                    @if($i < 5 )
                                                        @if($notifications->read_at)
                                                            <a href="/tasker/{{$notifications->data['lesson']['job_id']}}/confirmedTask" class="dropdown-item text-success">
                                                                A client has accepted your task request, see details.
                                                            </a>
                                                        @else
                                                            <a href="/tasker/{{$notifications->data['lesson']['job_id']}}/confirmedTask" class="dropdown-item text-primary">
                                                                A client has accepted your task request, see details.
                                                            </a>
                                                        @endif
                                                    @endif
                                                    <?php $i++; ?>
                                                @endforeach
                                            @endif
                                            <a style="margin-left: 140px;" href="/tasker/{{auth()->user()->id}}/notifications" class="btn btn-group text-center">See all</a>
                                        @else
                                        <a href="#" class="dropdown-item text-success">
                                            No Notification
                                        </a>
                                        @endif
                                    </div>
                                </li>
                            @endif
                        @endif
                        @if(!Auth::check())
                            <li class="nav-item">
                                <a class=" text-dark nav-link" href="/services" style="margin-right: 20px;">See Tasks</a>
                            </li>
                        @endif
                        <!--<li class="nav-item">
                            <a class=" text-primary nav-link" href="/home" style="margin-right: 20px;">Dashboard</a>
                        </li>-->
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="text-dark nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <!--<li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            </li>-->
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="text-dark nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->fname }} {{ Auth::user()->lname }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="text-success dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>TaskRabbit connects you to safe and riliable help in your neighbourhood</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
        <link href="{{ asset('css/fonts.css') }}" rel="stylesheet">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="/home">
                    <img src="{{ asset('images/1.png') }}" alt="TaskRabbit">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                                            
                        </li>
                        <li class="nav-item">
                                            
                        </li>
                        <li class="nav-item">
                                            
                        </li>
                        <li class="nav-item">
                                            
                        </li>
                    </ul>
                    <form class="form-inline">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class=" text-success nav-link" href="" style="margin-right: 20px;">Get $10</a>
                            </li>
                            <li class="nav-item">
                                <a class=" text-success nav-link" href="" style="margin-right: 20px;">Services</a>
                            </li>
                            <li class="nav-item">
                                <a class=" text-success nav-link" href="/home" style="margin-right: 20px;">Dashboard</a>
                            </li>
                            <!--<li class="nav-item">
                                <a class=" text-success nav-link" href="" style="margin-right: 20px;">Account</a>
                            </li>-->

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="text-success nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->fname }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('\logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>

                        </ul>
                    </form>
                </div>
            </div>
        </nav>
        <main style="font-family: 'Noto Serif KR', sans-serif;">
            @yield('content')
        </main>
        <script type="text/javascript" src="{{ asset('js/jquery-3.3.1.slim.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/popper.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    </body>
</html>
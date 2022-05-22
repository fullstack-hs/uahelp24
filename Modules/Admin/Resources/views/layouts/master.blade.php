<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Module Client</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.min.css" integrity="sha512-YdYyWQf8AS4WSB0WWdc3FbQ3Ypdm0QCWD2k4hgfqbQbRCJBEgX0iAegkl2S1Evma5ImaVXLBeUkIlP6hQ1eYKQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.min.js" integrity="sha512-RCgrAvvoLpP7KVgTkTctrUdv7C6t7Un3p1iaoPr1++3pybCyCsCZZN7QEHMZTcJTmcJ7jzexTO+eFpHk4OCFAg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/i18n/datepicker.uk-UA.min.js" integrity="sha512-6ZHlOn734I9CsGjXiRxbk8OdEESxb+ZqD2GBOFRdMXNO76gfuMlYl4k35/7NrupdTG7zwtLJlvelGbhF/KV4Yg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">UAhelp24 Адміністрування</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        @if(!auth()->guest())
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link {{ (request()->is('admin/peoples')) ? 'active' : '' }}" aria-current="page" href="{{ url('/admin/peoples') }}">Люди</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ (request()->is('admin/people-requests')) ? 'active' : '' }}" aria-current="page" href="{{ url('/admin/people-requests') }}">Запити</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link {{ (request()->is('admin/registration')) ? 'active' : '' }}" aria-current="page" href="{{ url('/admin/registration') }}">Реєстрація</a>
                                </li>
                                @if(auth()->user()->isAdmin)
                                    <li class="nav-item">
                                        <a class="nav-link {{ (request()->is('admin/links')) ? 'active' : '' }}" aria-current="page" href="{{ url('/admin/links') }}">Посилання</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ (request()->is('admin/users')) ? 'active' : '' }}" aria-current="page" href="{{ url('/admin/users') }}">Адміністратори</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" {{ (request()->is('admin/giving-points')) ? 'active' : '' }}"  aria-current="page" href="{{ url('/admin/giving-points') }}">Точки видачі</a>
                                    </li>
                                @endif
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="{{ url('/logout') }}">Вийти ({{auth()->user()->email}})</a>
                                </li>
                            </ul>
                        </div>
                        @endif
                    </div>
                </nav>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="card mt-2">
                    <div class="card-body">
                    @include('admin::layouts.messages')
                    @yield('content')
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>

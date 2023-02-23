<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('bootstrap5/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap5/css/bootstrap.css') }}">
    <title>Olimen Practical Interview</title>
</head>

<body>

    <div class="container-fluid">
        <div class="shadow-lg mb-4" style="padding-left: 20px; padding-right: 20px;">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="{{ route('department.index') }}">MinBudget</a>
                <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                    aria-label="Toggle navigation"></button>
                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                        @auth
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('department.index') }}"
                                    aria-current="page">Departments <span class="visually-hidden">(current)</span></a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">Manage`Programmes</a>
                                <div class="dropdown-menu" aria-labelledby="dropdownId">
                                    <a class="dropdown-item" href="{{ route('programme.index') }}">Programmes</a>
                                    <a class="dropdown-item" href="{{ route('subprogramme.index') }}">Subprogrammes</a>
                                </div>
                            </li>
                        @endauth
                    </ul>
                    <div class="d-flex my-2 my-lg-0">
                        @guest
                            <a class="btn btn-outline-secondary mr-1 border" href="{{ route('login') }}">Login</a>
                            <a class="btn btn-outline-secondary  border" href="{{ route('register') }}">Register</a>
                        @endguest
                        @auth
                            <a class="btn btn-outline-secondary  border" href="{{ route('logout') }}">Logout</a>
                        @endauth

                        </form>
                    </div>
            </nav>
        </div>



        @yield('content')


    </div>

</body>

<script src="{{ asset('bootstrap5/js/bootstrap.min.js') }}"></script>

</html>

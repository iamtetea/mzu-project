<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    @section('style')
    <link rel="stylesheet" type="text/css" href="/assets/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    @show
</head>
<body>
    @section('topbar')
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container">
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <a class="navbar-brand" href="/admin">
                    <img src="/assets/images/logo.png" alt="Logo" width="25" class="d-inline-block align-text-top">
                    Event Booking Admin
                </a>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/contact">Contact</a>
                  </li>
                </ul>

                <div class="d-flex">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-user"></i>
                            <span class="">{{ auth()->user()->name }}</span>
                        </button>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="#">Profile</a></li>
                          <li><a class="dropdown-item" href="#">Subscriptions</a></li>
                          {{-- <li><a class="dropdown-item" href="#">Logout</a></li> --}}

                          @auth
                          <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class="btn btn-danger">Logout</button>
                          </form>
                          @endauth

                          @guest
                          <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="/login">Login</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="/register">Register</a>
                            </li>
                          </ul>
                          @endguest
                        </ul>
                    </div>
                </div>
              </div>
            </div>
        </nav>
    </header>
    @show

    <main>
        <div class="row">
            <div class="col-2">
                <div>
                    <ul class="list-group">
                        <li class="list-group-item">Dashboard</li>

                        <li class="list-group-item">
                            <a href="/admin/subscriptions">Subscriptions</a>
                        </li>

                        <li class="list-group-item">
                            <a href="/admin/categories">Categories</a>
                        </li>

                        <li class="list-group-item">
                            <a href="/admin/events">Events</a>
                        </li>

                        <li class="list-group-item">Payments</li>
                        <li class="list-group-item">Users</li>
                    </ul>
                </div>
            </div>

            <div class="col-10">
                @yield('breadcrumbs')
                @yield('content')
            </div>
        </div>
    </main>

    @section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    @show
</body>
</html>

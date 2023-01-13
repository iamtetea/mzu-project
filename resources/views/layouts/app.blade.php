<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel App</title>

    @section('style')
    <link rel="stylesheet" type="text/css" href="/assets/css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
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
                <a class="navbar-brand" href="/">
                    <img src="/assets/images/logo.png" alt="Logo" width="25" class="d-inline-block align-text-top">
                    Event Booking
                </a>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/contact">Contact</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/departments">Departments</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/branches">Braches</a>
                  </li>
                </ul>

                <div class="d-flex">
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
                </div>
              </div>
            </div>
        </nav>
    </header>
    @show

    <main>
    @yield('content')
    </main>

    @section('footer')
    <footer class="bg-primary footer mt-5 py-5">
        <div class="row gx-3">
            <div class="col text-center">
                <div>Laravel App</div>
                <div>This is test project</div>
            </div>

            <div class="col">
                <ul>
                    <li>Contact</li>
                    <li>Departments</li>
                </ul>
            </div>

            <div class="col text-center">Third</div>
        </div>

        <div class="pt-5 text-white text-center">All rights reserved</div>
    </footer>
    @show

    @section('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    @show
</body>
</html>

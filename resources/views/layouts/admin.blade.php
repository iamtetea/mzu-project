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
    <div class="container-fluid row">
        <div class="col-2">
            <div>
                <nav class="navbar bg-body-white text-center">
                    <a class="navbar-brand" href="/admin">
                    <img src="/assets/images/logo.png" alt="Logo" width="20%" class="d-inline-block align-text-top">
                    <span class="text-bold">
                        <div>EVENT ADMIN</div>
                    </span>
                    </a>
                </nav>
            </div>

            {{-- @php
                $route = Route::currentRouteName();
            @endphp

            {{ $route }} --}}

            <div class="mt-3">
                <div class="list-group">
                    <a href="/admin">
                        <button type="button" class="list-group-item list-group-item-action">
                            <i class="fa fa-home"></i>
                            <span class="menu-wrapper">Dashboard</span>
                        </button>
                    </a>

                    <a href="/admin/events">
                        <button type="button" class="list-group-item list-group-item-action">
                            <i class="fa fa-calendar"></i>
                            <span class="menu-wrapper">Events</span>
                        </button>
                    </a>

                    <a href="/admin/categories">
                        <button type="button" class="list-group-item list-group-item-action">
                            <i class="fa fa-bookmark"></i>
                            <span class="menu-wrapper">Categories</span>
                        </button>
                    </a>

                    <a href="/admin/subscriptions">
                        <button type="button" class="list-group-item list-group-item-action">
                            <i class="fa fa-tags"></i>
                            <span class="menu-wrapper">Subscriptions</span>
                        </button>
                    </a>

                    <a href="/admin/payments">
                        <button type="button" class="list-group-item list-group-item-action">
                            <i class="fa fa-tags"></i>
                            <span class="menu-wrapper">Payments</span>
                        </button>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-10">
            <nav class="navbar bg-body-light">
                <div class="container-fluid">
                  <a class="navbar-brand" href="/admin">@yield('title')</a>
                  <button type="button" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Logout">
                    <i class="fa fa-home"></i>
                  </button>
                </div>
            </nav>

            @yield('breadcrumbs')
            @yield('content')
        </div>
    </div>

    @section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <script type="text/javascript">
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

        $('.show-confirm').click(function(event) {
          var form =  $(this).closest("form")
          var name = $(this).data("name")
          event.preventDefault()
          swal({
              title: `Are you sure you want to delete this record?`,
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit()
            }
          })
        })
    </script>
    @show
</body>
</html>

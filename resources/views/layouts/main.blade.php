<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact-App</title>
    <!-- Font Awesome -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
    rel="stylesheet"
    />
    <!-- MDB -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.0/mdb.min.css"
    rel="stylesheet"
    />
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container container-fluid">
          <a class="navbar-brand text-uppercase text-danger" href="/">Contact APP</a>
          <button
            class="navbar-toggler"
            type="button"
            data-mdb-toggle="collapse"
            data-mdb-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <i class="fas fa-bars"></i>
          </button>
          <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('companies.index')}}">Companies</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('contacts.index')}}">Contacts</a>
                </li>
            </ul>
            <ul class="navbar-nav d-flex align-items-center gap-2 mr-4">
                <a href="/login" class="btn btn-outline-secondary">Login</a>
                <a href="/register" class="btn btn-outline-primary">Register</a>
                <!-- Dropdown -->
                <li class="nav-item dropdown">
                    <a
                    class="nav-link dropdown-toggle"
                    href="#"
                    id="navbarDropdownMenuLink"
                    role="button"
                    data-mdb-toggle="dropdown"
                    aria-expanded="false"
                    >
                    Back Up <i class="fa fa-trash"></i>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li>
                            <a class="dropdown-item" href="/trash/contacts">Contacts</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="/trash/companies">Companies</a>
                        </li>
                    </ul>
                </li>
            </ul>
          </div>
        </div>
      </nav>
    {{-- Message --}}
    <div class="container p-4">
        @if(session()->has("msg"))
            <div class="alert alert-{{session()->get("status")}} w-50 m-auto text-center">
                {{session()->get("msg")}}
            </div>
        @endif
    </div>

    <div class="container">
        @yield("content")
    </div>

    {{-- Destroy Alert --}}
    <script>
        setTimeout(() => {
            document?.querySelector(".alert")?.remove()
        }, 5000);
    </script>

    <!-- MDB -->
    <script
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.0/mdb.min.js"
    ></script>
</body>
</html>
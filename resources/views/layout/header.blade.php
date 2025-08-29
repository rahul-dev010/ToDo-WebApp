<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Header Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <h1 class="navbar-brand justify-content-center" style="margin-left: 10vw;">Your ToDo-App</h1>
        </div>
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">

                @auth
                    <li class="nav-item px-2">
                        <span class="nav-link">Hello, {{ Auth::user()->name }}</span>
                    </li>
                    <li class="nav-item">
                        <form action="{{route ('')}}" method="POST" class="d-inline ">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger btn-sm mx-2  mt-3">Logout</button>
                        </form>
                    </li>
                @endauth

                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('login')}}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route ('register')}}">Register</a>
                    </li>
                @endguest

            </ul>
        </div>
    </nav>
 


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
  </body>
</html>
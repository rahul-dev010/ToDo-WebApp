<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <title>ToDo-app</title>
</head>
<body>
    <!-- header included here with nav bar -->
    @includeif('layout/header');

    <!-- main section -->
    <main>
        <div class="d-flex justify-content-center">
            <div class="card shadow-sm" style="width: 50vw;">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Create ToDo</h5>
                    <button class="btn btn-primary">
                       <a href="{{route('home')}}" style="color:white">Back</a>
                    </button>
                </div>

                <!-- form for the task input -->
                <div class="card">
                    <div class="card-body">
                          <form action="{{ route ('create')}}"  method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Task-Name</label>
                                    <input type="text" class="form-control" name="name"  placeholder="Enter task name" required>
                                </div>

                                <div class="mb-3">
                                    <label for="work" class="form-label">Work</label>
                                    <input type="text" class="form-control" name="work"  placeholder="Enter task" required>
                                </div>

                                <div class="mb-3">
                                    <label for="date" class="form-label">Due Date</label>
                                    <input type="date" class="form-control" name="date"  required>
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>

                    </div>
                </div>


            </div>
        </div>

      


    </main>





     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>
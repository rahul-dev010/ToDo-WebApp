<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <!-- j query code link -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    
  


    <title>ToDo-app</title>
</head>
<body>
    <!-- header included here with nav bar -->
    @includeif('layout/header');

    <!-- main section -->
    <main>
        <div class="d-flex justify-content-center">
            <div class="card shadow-sm" style="width: 70vw;">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">To Do List</h5>
                    <button class="btn btn-primary">
                        <a href="{{route('create')}}" style="color:white">Add To Do</a>
                    </button>
                </div>
            </div>
        </div>

       <div class="d-flex justify-content-center mt-4">
            <table class="table table-striped table-bordered  text-center justify-content-center"  style="width: 70vw ">
                <thead class="table-dark">
                <tr>
                    <th>Name</th>
                    <th>Work</th>
                    <th>Due Date</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <!-- Example row -->
                 @foreach($tasks as $task)
                <tr>
                    <td>{{$task->task_name}}</td>
                    <td>{{$task->work}}</td>
                    <td>{{$task->date}}</td>
                    <td><a href="{{route('edit',$task->id )}}"><button class="btn btn-sm btn-warning">Edit</button></a></td>
                    <td>
                        <!-- <a href="{{route('delete', $task->id)}}"><button class="btn btn-sm btn-danger">Delete</button></a> -->
                        <form action="{{ route('delete', $task->id) }}" method="POST" id='delete-form'>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger delete-btn">Delete</button>
                        </form>

                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>


    </main>

   
        <!-- botstrap js  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>

        
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

     
   
     <!-- j query code for delete popup -->
    <script>
        $('.delete-btn').click(function(e) {
            e.preventDefault();

            Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
            }).then((result) => {
            if (result.isConfirmed) {
                $('#delete-form').submit();
                Swal.fire({
                title: "Deleted!",
                text: "Your file has been deleted.",
                icon: "success"
                });
            }
            });

        });

    </script>



</body>
</html>
@include('layouts/bootstrap')

<body>
    @include('layouts/nav')
    {{-- <div class="container">
        <h1 class="text-center">Edit Page</h1>
        <hr>
        @foreach ($tasks as $task)
        <div class="card">
            <div class="card-header">
                Due Time-----{{$task->due_time}}
    </div>
    <div class="card-body">
        <p class="card-text">{{$task['task']}}</p>
        <a href="deletePerm/{{$task['id']}}" class="float-end btn btn-warning">Update</a>
    </div>
    </div>
    <br>
    @endforeach
    </div> --}}
    {{-- <div class="container">
        <h1 class="text-center">Edit Page</h1>
        <hr>
        <div class="card">
            <div class="card-header">
                <input type="datetime-local" name="time" class="form-control" id="validationServerUsername"
                        aria-describedby="inputGroupPrepend3" required>
            </div>
            <div class="card-body">
                <input type="text" value="Test" name="task" class="form-control" id="validationServerUsername"
                    aria-describedby="inputGroupPrepend3"required>
                    <br>
                <a href="deletePerm" class="btn btn-warning">Update</a>
            </div>
        </div>
        <br> --}}
    @if($tasks)
    @foreach ($tasks as $task)
    <div class="container">
        <h1 class="text-center">Edit Page</h1>
        <hr>
        <form action="update/{{$task['id']}}" method="POST">
            @csrf
            <div class="card">
            <div class="card-header">
                <input type="datetime-local" name="time" class="form-control" id="validationServerUsername"
                    aria-describedby="inputGroupPrepend3" required>
            </div>
            <div class="card-body text-center">
                <input type="text" value="{{$task['task']}}" name="task" class="form-control"
                    id="validationServerUsername" aria-describedby="inputGroupPrepend3" required>
                <br>
                {{-- <input type="submit" class="btn btn-warning" value="Update"></input> --}}
                <div class="btn-group dropright col">
                    <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Priority Level</span>
                    </button>
                    <div class="dropdown-menu">
                        <button class="dropdown-item text-info" name="priority" value="Low">Low</button>
                        <button class="dropdown-item text-warning" name="priority" value="Medium">Medium</button>
                        <button class="dropdown-item text-danger" name="priority" value="High">High</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
        <br>
        @endforeach
        @endif
    </div>
</body>

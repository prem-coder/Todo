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
    <div class="container">
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
        <br>
    </div>
</body>
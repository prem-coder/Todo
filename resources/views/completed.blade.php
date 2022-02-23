@include('layouts/bootstrap')

<body>
    @include('layouts/nav')
    <div class="container">
        <h1 class="text-center">Completed Task</h1>
        <hr>
        @foreach ($tasks as $task)
        <div class="card">
            <div class="card-header">
                Due Time-----{{$task->due_time}}
            </div>
            <div class="card-body">
                {{-- <h5 class="card-title">Special title treatment</h5> --}}
                <p class="card-text">{{$task['task']}}</p>
                <a href="deletePerm/{{$task['id']}}" class="float-end btn btn-danger">Delete Permanently</a>
            </div>
        </div>
        <br>
        @endforeach
    </div>
</body>
@include('layouts/bootstrap')

<body>
    @include('layouts/nav')
    <form action="addtask" method="POST">
        @csrf
        <div class="container">
            <div class="row" id="timeAndTitle">
                <div class="input-group col">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend3">Time</span>
                    </div>
                    <input type="datetime-local" name="time" class="form-control" id="validationServerUsername"
                        aria-describedby="inputGroupPrepend3" required>
                </div>
            </div>
            <br>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend3">What To Do</span>
                </div>
                <input type="text" name="task" class="form-control" id="validationServerUsername"
                    aria-describedby="inputGroupPrepend3" required>
            </div>
            <div class="text-center">
                <button style="width: 150px; margin-top:10px" class="btn btn-primary">Add</button>
            </div>
        </div>
    </form>
    <hr style="color: rgb(36, 195, 206);" class="container-fluid">
    <br>
    <div class="container">
        @foreach ($tasks as $task)
        <div class="card">
            <div class="card-header">
                Due Time-----{{$task->due_time}}
            </div>
            <div class="card-body">
                {{-- <h5 class="card-title">Special title treatment</h5> --}}
                <p class="card-text">{{$task['task']}}</p>
                <a href="edittask/{{$task['id']}}" class="float-end btn btn-warning">Edit</a>
                <a href="sDelete/{{$task['id']}}" class="btn btn-success">Completed</a>
            </div>
        </div>
        <br>
        @endforeach
    </div>
</body>

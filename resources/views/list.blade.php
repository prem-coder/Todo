@include('layouts/bootstrap')

<body>
    @include('layouts/nav')
    <form action="addtask" method="POST">
        @csrf
        <div class="container">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend3">What To Do</span>
                </div>
                <input type="text" name="task" class="form-control" id="validationServerUsername"
                    aria-describedby="inputGroupPrepend3" required>
            </div>
            <br>
            <div class="row" id="timeAndTitle">
                <div class="input-group col">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend3">Time</span>
                    </div>
                    <input type="datetime-local" name="time" class="form-control" id="validationServerUsername"
                        aria-describedby="inputGroupPrepend3" required>
                </div>
                {{-- Sort Button starts --}}
                {{-- starts Here --}}
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
                {{-- ends Here --}}
                {{-- Sort Button Ends --}}
                {{-- <div class="text-center">
                    <button style="width: 150px; margin-top:10px" class="btn btn-primary">Add</button>
                </div> --}}
            </div>
        </div>
    </form>
    <hr style="color: rgb(36, 195, 206);" class="container-fluid">
    <br>
    {{-- Sort Dropdown starts --}}
    <div class="container text-center">
        <div class="btn-group dropright col">
            <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="sr-only">Sort It By</span>
            </button>
            <div class="dropdown-menu">
                <button class="dropdown-item text-primary" name="priority" value="Low">Created At</button>
                <button class="dropdown-item text-primary" name="priority" value="Medium">Priority</button>
            </div>
        </div>
    </div>
    <br>
    {{-- Sort Dropdown Ends --}}
    <div class="container">
        @foreach ($tasks as $task)
        @if($task['priority'] == "High")
        @php
        $priority = "bg-danger text-white"
        @endphp
        @elseif($task['priority'] == "Medium")
        @php
        $priority = "bg-warning text-black"
        @endphp
        @else
        @php
        $priority = "bg-primary text-white"
        @endphp
        @endif
        <div class="text-center">
            <label>Created At: {{$task['created_at']}}</label>
        </div>
        <div class="card">
            <div class="card-header">
                Due Time-----{{$task->due_time}}
                <p class="float-end {{$priority}}">&nbsp;Priority: {{$task->priority}}&nbsp;</p>
            </div>
            <div class="card-body">
                {{-- <h5 class="card-title">Special title treatment</h5> --}}
                <p class="card-text">{{$task['task']}}</p>
                <a href="sDelete/{{$task['id']}}" class="btn btn-success">Completed</a>
                <a href="edittask/{{$task['id']}}" class="float-end btn btn-warning">Edit</a>
            </div>
        </div>
        <br>
        @endforeach
    </div>
</body>

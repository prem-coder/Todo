@include('layouts/bootstrap')

<body>
    @include('layouts/nav')
    <div class="container">
        <h1 class="text-center">Completed Task</h1>
        <hr>
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
                Completed At-----{{$task->deleted_at}}
                <p class="float-end {{ $priority }}">&nbsp;Priority: {{$task->priority}}&nbsp;</p>
            </div>
            <div class="card-body">
                {{-- <h5 class="card-title">Special title treatment</h5> --}}
                <p class="card-text">{{$task['task']}}</p>
                <a href="deletePerm/{{$task['id']}}" class="float-end btn btn-danger">Delete Permanently</a>
            </div>
        </div>
        <hr>
        @endforeach
    </div>
</body>

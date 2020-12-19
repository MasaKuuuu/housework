<head>
    @livewireStyles
</head>
<body>
    <h1>
        ホーム画面
    </h1>
    <div>
        <ul>
        @foreach ($tasks as $task)
        <li>
            {{ $task->task_name }}:{{ $task->term }}:{{ $task->point }}
        </li>
        @endforeach
        </ul>
    </div>
    <a href="create">タスク追加</a>
    <livewire:counter />
    @livewireScripts
</body>
</html>
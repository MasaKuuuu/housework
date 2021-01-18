<head>
    @livewireStyles
</head>
<body>
    <h1>
        ホーム画面
    </h1>
    <div>
        <h2>当日タスク</h2>
        <ul>
            @each('components.taskcard',$todayTasks,'task')
        </ul>
        <h2>過ぎているタスク</h2>
        <ul>
            @each('components.taskcard',$passTasks,'task')
        </ul>
        <h2>完了タスク</h2>
        <ul>
            @each('components.taskcard',$fixTasks,'task')
        </ul>
    </div>
    <a href="create">タスク追加</a>
    <livewire:counter />
    @livewireScripts
</body>
</html>
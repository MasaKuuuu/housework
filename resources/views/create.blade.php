<head>
    @livewireStyles
</head>
<body>
    <h1>
        新規作成
    </h1>
    <form action="insert" method="POST">
        @csrf
        <div>
            タスク名:
            <input type="text" name="task_name">
        </div>
        <div>
            期間（日ごと）
            <input type="text" name="term">
        </div>
        <div>
            ポイント
            <input type="text" name="point">
        </div>
        <input type="submit">
    </form>
    <livewire:counter />
    @livewireScripts
</body>
</html>
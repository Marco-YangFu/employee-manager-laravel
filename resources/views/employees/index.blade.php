<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>従業員管理</title>
</head>
<body>
    <h1>従業員管理 ({{ $employees->count() }}件)</h1>
    @if (session('status'))
        <p style="color: green">{{ session('status') }}</p>
    @endif
    <p><a href="{{ route('employees.create') }}">＋ 新規登録</a></p>
    <table border="1" cellpadding="6">
        <thead>
            <tr>
                <th>ID</th><th>名前</th><th>部署</th><th>Email</th><th>操作</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($employees as $e)
             <tr>
                <td>{{ $e->id }}</td>
                <td>{{ $e->name }}</td>
                <td>{{ $e->dept }}</td>
                <td>{{ $e->email }}</td> 
                <td>
                    <a href="{{ route('employees.edit',$e) }}">編集</a>
                    <form action="{{ route('employees.destroy', $e) }}" method="post" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('本当に削除しますか？')">削除</button>
                    </form>
                </td>         
             </tr>
            @empty
             <tr><td>データがありません</td></tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
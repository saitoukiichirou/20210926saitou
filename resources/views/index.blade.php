<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>COACHTECH TodoApp</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

<div class="container">
    <div class="card">
        <p class="title mb-15">Todo List</p>
        <div class="todo">
        @if (count($errors) > 0)
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif
        <form action="/todo/create" method="post" class="flex between mb-30">
            @csrf
            <input class="input-add" type="text" name="content" />
            <input class="button-add" type="submit" value="追加" />
        </form>
        <table>
            <tr>
                <th>作成日</th>
                <th>タスク名</th>
                <th>更新</th>
                <th>削除</th>
            </tr>
        @foreach($items as $item)
            <tr>
                <td>
                    {{$item->created_at}}
                    <form action="todo/update?id={{$item->id}}" method="post" >
                    @csrf
                </td>
                <td>
                    <input type="text" class="input-update" value="{{$item->content}}" name="content" />
                </td>
                <td>
                        <button class="button-update">更新</button>
                    </form>
                </td>
                <td>
                    <form action="todo/delete?id={{$item->id}}" method="post">
                        @csrf
                        <button class="button-delete">削除</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </table>
        </div>
    </div>
</div>

</body>

</html>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/date.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
</head>

<body>
    <div class="wrapper">
        <header class="header">
            <div class="header_inner">
                <div class="header-logo">
                    <h1>Atte</h1>
                </div>
                <nav class="header-nav">
                    <ul class="header-nav-list">
                        @if (Auth::check())
                        <li class="header-nav-item">
                            <a style="text-decoration: none;" href="/userList">ユーザー</a>
                        </li>
                        <li class="header-nav-item">
                            <a style="text-decoration: none;" href="/">ホーム</a>
                        </li>
                        <li class="header-nav-item">
                            <a style="text-decoration: none;" href="/attendance">日付一覧</a>
                        </li>
                        <li class="header-nav-item">
                            <form action="/logout" method="post">
                                @csrf
                                <button class="header-nav-btn">ログアウト</button>
                            </form>
                        </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </header>
        <div class="main">
            <div class="attendance_inner">
                <h1>{{$user_name}}</h1>
                <div class="table_box">
                    <table class="date_table">
                        <tr class="date_table-item">
                            <th>日付</th>
                            <th>名前</th>
                            <th>勤務開始</th>
                            <th>勤務終了</th>
                            <th>休憩時間</th>
                            <th>勤務時間</th>
                        </tr>
                        @foreach ($times as $time)
                        <tr>
                            <td>{{$time->date}}</td>
                            <td>{{$time->name}}</td>
                            <td> {{$time->attendance}}</td>
                            <td>{{$time->leaving}}</td>
                            <td>{{$time->breakOut}}</td>
                            <td>{{$time->workTime}}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                <div class="links">{{ $times->links() }}</div>
            </div>
        </div>
        <footer class="footer">
            <p>Atte,inc.</p>
        </footer>
    </div>
</body>

</html>
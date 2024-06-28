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
                    <div class="register_inner">
                        <h1>{{$date}}</h1>
                        <div class="table_box">
                            <table class="date_table">
                                <tr class="date_table-item">
                                    <th align="center">名前</th>
                                    <th align="center">勤務開始</th>
                                    <th align="center">勤務終了</th>
                                    <th align="center">休憩時間</th>
                                    <th align="center">勤務時間</th>
                                </tr>
                                @foreach ($times as $time)
                                    <tr>
                                        <td align="center">{{$time->name}}</td>
                                        <td align="center"> {{$time->attendance}}</td>
                                        <td align="center">{{$time->leaving}}</td>
                                        <td align="center">{{$time->breakOut}}</td>
                                        <td align="center">{{$time->workTime}}</td>
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
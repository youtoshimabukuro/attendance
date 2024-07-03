<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/stamp.css') }}">
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
            <div class="stamp_inner">
                <h1>{{Auth::user()->name}}さんお疲れ様です！</h1>
                <div class="stamp_box">
                    <div class="stamp_box-top">
                        <form action="/timeIn" method="post">
                            @csrf
                            <input type="submit" class="stamp_form-btn" name="" {{--style={{$timeIn_color}}--}} value="勤務開始" />
                        </form>
                        <form action="/timeOut" method="post">
                            @csrf
                            <input type="submit" class="stamp_form-btn" name="" {{--style={{$timeOut_color}}--}} value="勤務終了" />
                        </form>
                    </div>
                    <div class="stamp_box-bottom">
                        <form action="/breakIn" method="post">
                            @csrf
                            <input type="submit" class="stamp_form-btn" name="" {{--style={{$timeIn_color}}--}} value="休憩開始" />
                        </form>
                        <form action="/breakOut" method="post">
                            @csrf
                            <input type="submit" class="stamp_form-btn" name="" {{--style={{$timeIn_color}}--}} value="休憩終了" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <p>Atte,inc.</p>
        </footer>
    </div>
</body>

</html>
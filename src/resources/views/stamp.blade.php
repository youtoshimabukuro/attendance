<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/stamp.css">
    <link rel="stylesheet" href="./css/sanitize.css">
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
            <div class="stamp_inner">
                <h1>福場凜太郎さんお疲れ様です！</h1>
                <div class="stamp_box">
                    <div class="stamp_box-top">
                        <form action="/timeIn" method="post">
                            @csrf
                            <input type="submit" class="stamp_form-btn" name="" value="勤務開始" />
                            <input type="hidden" name="user_id" value="{{Auth::id()}}" readonly>
                            <input type="hidden" name="name" value="{{Auth::user()->name}}" readonly>
                        </form>
                        <form action="/timeOut" method="post">
                            @csrf
                            <input type="submit" class="stamp_form-btn" name="" value="勤務終了" />
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}" readonly>
                            <input type="hidden" name="name" value="{{Auth::user()->name}}" readonly>
                        </form>
                    </div>
                    <div class="stamp_box-bottom">
                        <form action="/breakIn" method="post">
                            @csrf
                            <input type="submit" class="stamp_form-btn" name="" value="休憩開始" />
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}" readonly>
                            <input type="hidden" name="name" value="{{Auth::user()->name}}" readonly>
                        </form>
                        <form action="/breakOut" method="post">
                            @csrf
                            <input type="submit" class="stamp_form-btn" name="" value="休憩終了" />
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}" readonly>
                            <input type="hidden" name="name" value="{{Auth::user()->name}}" readonly>
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
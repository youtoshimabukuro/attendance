<!DOCTYPE html>
<html lang="ja">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="{{ asset('css/user.css')}}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('css/sanitize.css')}}">
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
                                <li class="header-nav-item">
                                    <a style="text-decoration: none;" href="/userList">ユーザー</a>
                                </li>
                                <li class="header-nav-item">
                                    <a style="text-decoration: none;" href="/">ホーム</a>
                                </li>
                                <li class="header-nav-item">
                                    <a style="text-decoration: none;" href="">日付一覧</a>
                                </li>
                                <li class="header-nav-item">
                                    <form>
                                        <button class="header-nav-btn">ログアウト</button>
                                    </form>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </header>
                <div class="main">
                    <div class="register_inner">
                        <h1>
                                ユーザー勤怠
                        </h1>
                        <div class="table_box">
                            <table class="date_table">
                                <tr class="date_table-item">
                                    <th>名前</th>
                                    <th>勤怠一覧</th>
                                </tr>
                                @foreach ($users as $user)
                                <tr>
                                    <form action="/user_attendance" method="post">
                                    @csrf
                                    <td><input type="hidden" name="id" value="{{$user->id}}" readonly /><input type="text" class="user_name" name="name" value="{{$user->name}}" readonly /></td>
                                    <td><input type="submit" class="user_btn" name="user_btn" value="確認する"></td>
                                    </form>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                        <div class="links">{{ $users->links() }}</div>
                    </div>
                </div>
                <footer class="footer">
                    <p>Atte,inc.</p>
                </footer>
        </div>
</body>
</html>
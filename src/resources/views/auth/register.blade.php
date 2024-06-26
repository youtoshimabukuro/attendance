<!DOCTYPE html>
<html lang="ja">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="{{ asset('css/register.css') }}">
        <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
</head>
<body>
        <div class="wrapper">
            <header class="header">
                <div class="header_inner">
                    <div class="header-logo">
                        <h1>Atte</h1>
                    </div>
                </div>
            </header>
            <div class="main">
                <div class="register_inner">
                    <h1>会員登録</h1>
                    <form action="/register" method="post">
                        @csrf
                        <input class="register_form-item" type="name" name="name" value="{{ old('name') }}" />
                        @error('name')
                              {{ $message }}
                        @enderror
                        <input class="register_form-item" type="email" name="email" value="{{ old('email') }}" />
                        @error('email')
                            {{ $message }}
                        @enderror
                        <input class="register_form-item" type="password" name="password" />
                        @error('password')
                            {{ $message }}
                        @enderror
                        <input class="register_form-item" type="password" name="password_confirmation" />
                        <input class="register_form-btn" type="submit" value="会員登録">
                    </form>
                    <p>アカウントをお持ちの方はこちらから</p>
                    <p class="blue^text"><a style="text-decoration: none;" href="/login">ログイン</a></p>
                </div>
            </div>
            <footer class="footer">
                <p>Atte,inc.</p>
            </footer>
        </div>
</body>
</html>
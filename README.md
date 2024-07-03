# Atte(勤怠管理システム)

作成した目的

アプリケーション URL


リポジトリ
https://github.com/youtoshimabukuro/attendance/tree/master

＃＃機能一覧

会員登録
ログイン
ログアウト
勤怠打刻
日付別勤怠情報の取得
ユーザーごとの勤怠情報の取得

使用技術(実行環境)

- PHP8.3.0
- Laravel8.83.27
- MySQL8.0.26

ER図
![alt text](image-1.png)

環境構築

1. `git clone git@github.com:youtoshimabukuro/attendance.git`
2. DockerDesktop アプリを立ち上げる
3. `docker-compose up -d --build`

mysql:
platform: linux/x86_64
image: mysql:8.0.26
image:mailHog
environment:

````

Laravel環境構築

`docker-compose exec php bash`
`composer install`
「.env.example」ファイルを 「.env」ファイルに命名を変更。または、新しく.envファイルを作成
.envに以下の環境変数を追加

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel_db
DB_USERNAME=laravel_user
DB_PASSWORD=laravel_pass

MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="test@example.com"
MAIL_FROM_NAME="${APP_NAME}"

アプリケーションキーの作成
``` bash
php artisan key:generate
````

マイグレーションの実行

```bash
php artisan migrate

URL

- 開発環境：http://localhost/
- phpMyAdmin:：http://localhost:8080/
- MailHog::http://localhost:8025/

mailの受信はlocalhost:8025 (MailHog)で確認できます。


# coachtech もぎたて

## Dockerビルド
git clone git@github.com:https://github.com/Naoya-Tanioka/mogitate--.git
DockerDesktopアプリを立ち上げる
docker-compose up -d --build

mysql:
    platform: linux/x86_64(この文を追加)
    image: mysql:8.0.26
    environment:

## Laravel環境開発
1. docker-compose exec php bash
2. composer install
3. 「.env.example」ファイルを 「.env」ファイルに命名を変更。または、新しく.envファイルを作成
4. .envに以下の環境変数を追加
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel_db
DB_USERNAME=laravel_user
DB_PASSWORD=laravel_pass
5. アプリケーションキーの作成
php artisan key:generate
6. マイグレーションの実行
php artisan migrate
7. シーディングの実行
php artisan db:seed

## 使用技術（実行環境）
php:8.1-fpm
Latavel:8.83.29
MySQL8.0.26

## ER図

![ER図](docs/mogitate.png)

## URL
・開発環境：http://localhost/
・phpMyAdmin:http://localhost/8080
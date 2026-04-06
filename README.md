# アプリケーション名

FashionablyLateのお問い合わせフォーム
ユーザーからのお問い合わせを受け付け、内容をデータベースに保存するシンプルなお問い合わせ管理アプリケーションです。

## アプリの機能概要

本アプリケーションでは、ユーザーからのお問い合わせを受け付けるための以下 3 画面を実装しています。

### お問い合わせフォーム

ユーザーが以下の情報を入力します。

- お名前（必須）
- 性別（必須）
- メールアドレス（必須）
- 電話番号（必須）
- 住所（必須）
- 建物名
- お問い合わせの種類（必須）（categories テーブルから取得）
- お問い合わせ内容（必須）

### お問い合わせ確認画面

フォームで入力した内容を確認し、

- 「送信」
- 「修正」

のいずれかを選択できます。

### サンクスページ

お問い合わせ内容が contacts テーブルに保存された後、
ユーザーに送信完了を知らせるページを表示します。

## 環境構築

### 1. Docker ビルド

- git clone git@github.com:taeko-yanari/test_contact-form.git
- docker-compose up -d --build

### 2. Laravel 環境構築

- docker-compose exec php bash
- composer install
- cp .env.example .env,環境変数を変更
- php artisan key:generate
- php artisan migrate
- php artisan db:seed

## 使用技術

- PHP 8.1（Docker）
- Laravel 8.83.29
- MySQL 8.0.26（Docker）
- nginx 1.21.1（Docker）

## URL

- お問い合わせ画面：http://localhost/
- ユーザー登録：http://localhost/register
- phpMyAdmin：http://localhost:8080/

## ER図

![ER 図](docs/er.png)

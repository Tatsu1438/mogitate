# mogitate

環境構築

Dockerビルド
1git clone 
2
3


 ## 概要（Overview）

テスト課題として作成した Laravel プロジェクトです。


## 使用技術（Tech Stack）

### 言語・フレームワーク
- PHP 8.x
- Laravel 10
- HTML / CSS

### データベース
- MySQL 8.0

### インフラ
- Docker / Docker Compose

### 開発ツール
- VS Code
- phpMyAdmin
- Git / GitHub
- Composer
- Nginx

## 環境構築手順

このプロジェクトは Docker を用いた Laravel 開発環境です。

### 1. リポジトリのクローン

bash
git clone git@github.com:Tatsu1438/mogitate.git
cd mogitate

## env ファイル
cd src
cp .env.example .env
cd ..

## Docker コンテナ
docker compose up -d --build

## PHP コンテナ
docker compose exec php bash

## composer install
php artisan key:generate
php artisan migrate


### アクセスURL
アプリ: http://localhost:8081
phpMyAdmin（必要に応じて）: http://localhost:8080

### ディレクトリ構成
mogitate/
├── docker/
│   └── nginx/
│       └── default.conf
├── src/
│   ├── app/
│   ├── config/
│   ├── public/
│   ├── resources/
│   ├── routes/
│   └── ...
├── docker-compose.yml
└── README.md


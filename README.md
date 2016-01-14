# NutsPages

## Require

1. nodejp & npm
2. bower
3. composer
4. sass

## インストール

### 1. モジュール群のインストール

```bash
$ npm install
$ bower install
$ composer install
$ gulp build
```

### 2. .env ファイルの作成

```bash
$ cp .env.example .env
$ php artisan key:generate
```

### 3. DB 設定

### 4. メール設定

以下の内容で ``.env`` を編集

```bash
$ vim .env

MAIL_DRIVER=smtp
MAIL_HOST=localhost
MAIL_PORT=1025
MAIL_FROM_ADDRESS=nuts@nuts.jp
MAIL_FROM_NAME=Nuts Project
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
```


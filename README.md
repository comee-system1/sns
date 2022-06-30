# sns
snsまとめ
## Raravel+VUE.jsでのSPA開発
## サンプルのURLで公開させるために、`https://ngrok.io/`を利用
## やりたいこと
- 各SNSで登録されている個人ごとのメッセージを一括で表示させる
## 理由
- いろいろな人からいろいろなツールを使って連絡が来るため一括確認したくなった

# 環境
- ローカル環境
	- `http://local-sns:8083/`
	- mysql
- ngrok
	- サンプルの一時的なURLを発行
	- ngrok.exeを実行
	- `ngrok http 8083`
	- 取得したURLでlocal-snsが確認できる

- サーバー実行
	- php artisan serve
## 仕様
- vue.jsでspa開発(フロントエンド)を行う
- laravelでapi開発(バックエンド)を行う

## 開発環境
- gitでプログラムの取得
	- git pull origin main
- composer install
- npm install


## メモ
### 参考URL
https://migisanblog.com/laravel-vue-install/#index_id1

### Laravelのインストール
composer create-project "laravel/laravel=8.*" laravel-vue-project --prefer-dist

### laravel/uiのインストール
composer require laravel/ui "1.x" --dev
### vueスカホールドのインストール
php artisan ui vue

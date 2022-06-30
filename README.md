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

## 仕様
- vue.jsでspa開発(フロントエンド)を行う
- laravelでapi開発(バックエンド)を行う

## 開発環境
- gitでプログラムの取得
	- git pull origin main
- composer install
- npm install


## メモ
- laravel/uiインストール
	`composer require laravel/ui`
- laravel/ui vueインストール
	`php artisan ui vue`
	- いろいろ追加されるので、`npm install`で登録
- Vue Routerインストール
	`npm install --save vue-router`
	- エラーがでたので、`npm -g update` アップデートを行う
	- エラーが解除されないのでエラーメッセージに従いvueのバージョンを2→3に変更したらエラーが消えた
	


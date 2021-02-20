# Admin Logo Hack（ログイン画像置換）

## これは何?

[baserCMS](https://basercms.net/) 管理画面ログイン時に表示される baserCMS のロゴを任意の画像に入れ替えるプラグインです。

## インストール方法

git clone または ZIP ファイルをダウンロードして /app/Plugin ディレクトリ内に配置してください。ZIP ファイルの場合 AdminLogoHack-master というフォルダ名で展開されるので、あらかじめ AdminLogoHack とリネームする必要があります。

インストール後、プラグイン管理画面で『ログイン画像置換』プラグインを有効化してください。

## 使い方

baserCMS ロゴのかわりに表示したい画像を、プラグイン設定画面でアップロードしてください。

### 使用上のご留意点

管理画面のテーマによって推奨サイズが異なります。

* admin-third … 横 460px / 縦 90px
* admin-second … 横 306px / 縦 60px

アップロード可能な画像フォーマットは下記のとおりです。同じ名称のファイルをアップロードしたときには上書き保存で設定されます。

* JPEG
* PNG
* GIF

## 更新履歴

* 1.0.0 ( 2021-02-19 )
	* 公開
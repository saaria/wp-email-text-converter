# wp-email-text-converter
WordPressの記事本文内に記述されたメールアドレス部分を、単純なテキストからJavaScriptで出力するコードに書き換えます。

## インストール
zipの状態でWordPressのプラグイン画面からアップロードするか、FTPでフォルダごとWordPressのプラグインディレクトリへアップロードし、プラグインを有効化して下さい。

## 設定
WordPress管理画面の"設定 > E-mail Text Converter Setting"から、プラグインの動作を設定できます。

### Hyper link of "mailto:":
mailtoを指定するハイパーリンクの出力有無です。このプラグインは、mailtoが含まれるハイパーリンクを削除するので、元々記述していた場合は'add "mailto"'を選択して下さい。
ただし、メールアドレス以外の属性は引き継がれません。classとid追加は後述の設定項目で追加することが出来ます。

### Class attribute (for hyper link):
mailtoを指定するハイパーリンクにclassを追加したいとき、ここにclass属性の内容を記述します。

### ID attribute (for hyper link):
mailtoを指定するハイパーリンクにidを追加したいとき、ここにid属性の内容を記述します。

# プラグインを作った経緯
とあるWordPressサイトの運用にあたり、記事掲載の依頼を受けることが度々あるのですが、連絡先がメールアドレスで記述されていることが多く、メールアドレス収集BOT対策として「メールアドレスの画像を作って貼り付ける」という作業をやっていましたが、あまりにも面倒なので、取集されにくい形に自動置換してくれるプラグインを作りました。

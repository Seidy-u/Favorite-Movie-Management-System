# 実行手順

1. root権限でユーザー名をokiniirimovie、パスワードをSeidy0201とするユーザーを作成する。以下のSQL文を実行させる<br>
<code>
    create user 'okiniirimovie'@'localhost' identified by 'Seidy0201';
</code>

2. root権限でcreateDatabase.sqlを発行し、registedmemberdbというデータベースを作成する。
3. root権限で作成したユーザーにregistedmemberdbデータベースのアクセス許可を与える。以下のSQL文を実行させる<br>
<code>
    grant all privileges ON registedmemberdb.*TO 
'okiniirimovie'@'localhost';
</code>
4. root権限を抜けて、ユーザー名okiniirimovieでログインをする。
5. okiniirimovieデータベースを選択し、movies.sql、users.sqlの2つのファイルを実行させる。<br>
7. DocumentRootにokiniirimovieフォルダを設置する。
8. http://localhost にアクセスするとTOPページが表示される。

# 機能概要
Favorite movie management systemは、ユーザーが登録した動画を表示するするWebアプリションである。アカウントを作成する場合は、新規会員登録画面で、ユーザー名とパスワードを入力。初期情報として、ユーザー名がsampleのデータが登録されている。パスワードは「password」。そして、ログインが完了すると、登録動画と、新規動画の登録が表示される。動画登録で登録した動画を一覧表示で見ることが可能である。検索欄でチャンネルを検索するとその名前のデータのみが表示される。
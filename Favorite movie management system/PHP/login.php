<?php
session_start();
//サブミットボタンが押されたときの処理
if (htmlspecialchars((isset($_POST['username']) && isset($_POST['password'])))) {
    $username = $_POST['username'];              // ユーザ名入力値
    $password = $_POST['password'];              // パスワード入力値
    $hash_password = hash('sha256',$password);   // ハッシュ化したパスワード入力値
    $flg = 0;                                    // 認証失敗:0, 認証成功:1

    //データが渡ってきた場合の処理
    try {
        // PDOインスタンスの生成とSQLの実行
        $db = new PDO('mysql:host=localhost;dbname=registedmemberdb','okiniirimovie','Seidy0201');
        $sql = 'select * from users where username=:username and password=:password';
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':username', $username, PDO::PARAM_STR);
        $stmt->bindValue(':password', $hash_password, PDO::PARAM_STR);
        $stmt->execute();

        // SQLの実行結果を連想配列$dataに格納
        $count = $stmt -> rowCount();
        $i = 0;
        $data = [];
        while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
            foreach ($row as $key => $value) {
                $data[$i][$key] = $value;
            }
            $i++;
        }

        /*--- データベースの中身を操作したくなったら$dataを使う ---*/

        // $dataが一件のみだったら認証成功(入力値が正しいか否かはSQLでの照合で完了済み)
        if ($count == 1) {
            $flg=1;
        }

        // DB捜査関連の変数を初期化
        $stmt = null;
        $db = null;

        //ログイン認証ができたときの処理
        if ($flg==1){
            $_SESSION["username"] = htmlspecialchars($_POST["username"]);
            header('Location: mypage.php');
        //アカウント情報が間違っていたときの処理
        } else {
            $alert = "<script type='text/javascript'>alert('ログイン情報が間違っています');</script>";
            echo $alert;
        }

    //データが渡って来なかったときの処理
    } catch(PDOException $e) {
        print "エラー:".$e->getMessage();
        header('Location: ../index.html');
    }
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../CSS/login.css" rel="stylesheet" type="text/css" media="all">
    <title>ログイン</title>
</head>

<body>
    <div class="bg"></div>
    <div class="bg bg2"></div>
    <div class="bg bg3"></div>
    <form class="box" action="../PHP/login.php" method="post">
        <h1>ログイン</h1>
        <input required type="text" name="username" placeholder="アカウント名">
        <input required type="password" name="password" placeholder="パスワード">
        <input type="submit" value="Login">
        <li><a href="../index.html">トップへ戻る</a><br></li>
    </form>
</body>

</html>


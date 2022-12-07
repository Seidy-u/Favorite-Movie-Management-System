<?php
    session_start();
	$username = $_SESSION['username'];
    if($username=='')
        header('Location: ../index.html');
	$channel = htmlspecialchars($_POST['channel']);
    $title = htmlspecialchars($_POST['title']);
    $url = htmlspecialchars($_POST['url']);
    $count = 0;
    if($title != ''){
        try {
            $db = new PDO('mysql:host=localhost;dbname=registedmemberdb','okiniirimovie','Seidy0201');
            $sql = <<<EOS
                INSERT INTO movies(
                    username,
                    channel,
                    title,
                    url
                )VALUES(
                    :username,
                    :channel,
                    :title,
                    :url
                )
            EOS;
            $stmh = $db->prepare($sql);
            $stmh->bindValue(':username', $username, PDO::PARAM_STR);
            $stmh->bindValue(':channel', $channel, PDO::PARAM_STR);
            $stmh->bindValue(':title', $title, PDO::PARAM_STR);
            $stmh->bindValue(':url', $url, PDO::PARAM_STR);
            $stmh->execute();
            $count++;
        }catch(PDOException $e){
            print "エラー:".$e->getMessage();
            header('Location: ../index.html');
        }
    }
    if($count >= 1){
        echo <<<EOM
        <script>
        alert('登録しました');
        </script>
        EOM;
    }
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../CSS/movieregister.css" rel="stylesheet" type="text/css" media="all">
    <title>Document</title>
</head>

<body>
    <div class="bg"></div>
    <div class="bg bg2"></div>
    <div class="bg bg3"></div>
    <form class="box" action="../PHP/movieregister.php" method="POST">
        <h1>動画登録</h1>
        <input required id="channel" type="text" name="channel" placeholder="チャンネル名">
        <div id='msgArea'>

        </div>
        <input required id="title" type="text" name="title" placeholder="タイトル">
        <input required id="url" type="url" name="url" placeholder="url">
        <input type="submit" name="signup" value="登録">
        <li><a href="mypage.php">トップページへ戻る</a><br></li>
    </form>
</body>

</html>
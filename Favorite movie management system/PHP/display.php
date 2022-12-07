<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../CSS/display.css" rel="stylesheet" type="text/css" media="all">
    <title>登録動画一覧</title>
</head>
<script>
        function remove(num){
            console.log(num);
            var removeTarget = document.getElementById(num);
            removeTarget.remove();
            window.location.href = './delete.php?id='+ num +'';
        }
    </script>
<body>
    <div class="bg"></div>
    <div class="bg bg2"></div>
    <div class="bg bg3"></div>
    <h1>登録一覧表示</h1>
    <a href="mypage.php">トップページへ戻る</a>
    <div>
    <form action="./display(search).php" method="POST">
        <label for="signup-id">チャンネル名</label>
            <input required name="channel_search" id="signup-id">
            <button name="search" type="submit">検索</button><br>
    </form>
    </div>
    <?php
    session_start();
    $username = $_SESSION['username'];
    if($username=='')
        header('Location: ../index.html');
    try{
        $db = new PDO('mysql:host=localhost;dbname=registedmemberdb','okiniirimovie','Seidy0201');
        $sql = <<<EOS
                select * from movies
                where username = :username
        EOS;
        $stmh = $db->prepare($sql);
        $stmh->bindValue(':username', $username, PDO::PARAM_STR);
        $stmh->execute();
        if($stmh->rowCount() >= 1){
            echo '<table>';
            echo '<th>チャンネル名</th><th>タイトル</th><th>削除</th>';
            foreach($stmh as $val) {
                echo '<tr>';
                echo '<li id='.$val['id'].'>';
                echo '<td>';
                echo $val['channel'];
                echo '</td>';
                echo '<td>';
                print '<a href='.$val['url'].' target="_blank" rel="noopener noreferrer">'.$val['title'].'</a>';
                echo '</td>';
                echo '<td>';
                echo  '<button onclick="remove('.$val['id'].')">削除</button>';
                echo '</td>';
                echo '</tr>';
            }
            echo '</table>';
        }
        else{
            echo '登録動画がありません';
        }
    }catch(PDOException $e) {
        print "エラー:".$e->getMessage();
        header('Location: ../index.html');
    }
    ?>

</body>

</html>
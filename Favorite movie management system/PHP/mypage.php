<?php
    session_start();
    $username = $_SESSION['username'];
    if($username=='')
        header('Location: ../index.html');
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="../CSS/mypage.css" rel="stylesheet" type="text/css" media="all">
    <script type="text/javascript" src="../JS/mypage.js"></script>
    <title>Document</title>
</head>

<body>
    <div class="bg"></div>
    <div class="bg bg2"></div>
    <div class="bg bg3"></div>

    <header id="header">
        <nav class="dc-menu">
            <a href="#" class="dc-menu-trigger"><span>Menu</span></a>
            <div class="menu-overlay">
                <ul>
                    <li><a href="../PHP/display.php">登録動画一覧</a></li>
                    <li><a href="../PHP/movieregister.php">動画登録</a></li>
                    <li><a href="../PHP/logout.php">ログアウト</a></li>
                </ul>
            </div>
        </nav>
    </header>
</body>

</html>
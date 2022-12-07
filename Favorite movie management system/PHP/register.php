<?php

	$username = htmlspecialchars($_POST['username']);
	$password = htmlspecialchars($_POST['password']);
	$flg=0;
	if($password!=''){
		try {
			$db = new PDO('mysql:host=localhost;dbname=registedmemberdb','okiniirimovie','Seidy0201');
			$sql1 = <<<EOS
				select * from users
				where username = :username
			EOS;
			$stmh = $db->prepare($sql1);
			$stmh->bindValue(':username', $username, PDO::PARAM_STR);
			$stmh->execute();
			$count=$stmh->rowCount();

			if($count == 0){
				$sql2 = <<<EOS
					INSERT INTO users(
						username,
						password
					)
					VALUES(
						:username,
						:password
				)
			EOS;
			$stmh = $db->prepare($sql2);
			$stmh->bindValue(':username', $username, PDO::PARAM_STR);
			$stmh->bindValue(':password', hash('sha256',$password), PDO::PARAM_STR);
			$stmh->execute();
			$flg=1;
			}
		}catch(PDOException $e){
			print "エラー:".$e->getMessage();
			header('Location: ../index.html');
		}
	}
	if($flg==1){
		header('Location: ../index.html');
	}
	elseif($username!=''){
		$alert = "<script type='text/javascript'>alert('このアカウント名はすでに使用されています。');</script>";
        echo $alert;
	}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../CSS/register.css" rel="stylesheet" type="text/css" media="all">
    <title>新規登録画面</title>
</head>

<body>
    <div class="bg"></div>
    <div class="bg bg2"></div>
    <div class="bg bg3"></div>
    <form class="box" action="../PHP/register.php" method="post">
        <h1>新規登録</h1>
        <input required id="username" type="text" name="username" placeholder="アカウント名">
        <div id="msgArea">

        </div>
        <input required id="password" type="password" name="password" placeholder="パスワード">
        <input type="submit" value="登録">
        <li><a href="../index.html">トップへ戻る</a><br></li>
    </form>
</body>

</html>
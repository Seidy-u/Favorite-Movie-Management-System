<?php
    session_start();
	try {
		$db = new PDO('mysql:host=localhost;dbname=registedmemberdb','okiniirimovie','Seidy0201');
        $sql = <<<EOS
            delete from movies where id = :id
        EOS;
        $stmh = $db->prepare($sql);
        $stmh->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
        $stmh->execute();
	}catch(PDOException $e){
		print "エラー:".$e->getMessage();
        header('Location: ../index.html');

	}
    header('Location: display.php');
?>
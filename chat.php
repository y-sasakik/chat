<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>チャット？？</title>
</head>
<body>
<form method="POST" action="">
  名前  <input name="name" type="text">
    発言  <input name="text" type="text">
    <input  type="submit" value="送信">
</form>

<?php

$dsn = 'mysql:dbname=chatlog;host=localhost';
$user = 'testuser';
$password = 'yasushi';

try {
    $dbh = new PDO($dsn, $user, $password);
    echo "接続成功\n";
}


catch (PDOException $e) {
    echo "接続失敗: " . $e->getMessage() . "\n";
 exit();
}

 $name = $_POST['name'];
$log = $_POST['text'];


echo "「{$name}」さんは ,「{$log}　」と発言しました。";
echo '<br><br>';
echo ("<h2>会話履歴</h2>");

 // SQL作成
 $sql = "INSERT INTO chatlog (id, name, log) VALUES (null, '$name', '$log')";
// $stmt = $pdo->prepare($sql);
// $stmt->execute([$name, $log]);
  // SQL実行
  $res = $dbh->query($sql);


   $data = "SELECT * from chatlog";


 $stmt = $dbh->query($data);

 $disp = 0;
 while ($row = $stmt->fetch()) {
 if ($disp++ > 9) break;
 echo "$disp :";
 print_r($row);
 echo '<br>';
 }



 $dbh = null;


 ?>


</body>
</html>

<!DOCTYPE html>
<html lang = "ja">
<head>
    <meta charset = "utf-8">
    <title>入室データ確認ページ</title>
</head>
<body>

<?php
try{
    $pdo = new PDO(
        'mysql:host = localhost;dbname = mysql; charset = utf8',
        'thaliana',
        'benthamiana'
    );
    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo -> setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
}catch(PDOException $Exception){
    die('接続エラーが起こりました.' .$Exception-> getMessage());
}
try{
    $sql = "SELECT * FROM mysql.enter_table";
    $stmh = $pdo -> prepare($sql);
    $stmh -> execute() ;
}catch(PDOException $Exception){
    die('接続エラー: ' .$Exception ->getMessage());
}
?>

<table border='1' cellpadding='5'><tbody>
    <tr><th>学籍(職員)番号</th><th>氏名</th><th>入室時間</th><th>体温管理</th>

<?php
    while($row = $stmh -> fetch(PDO::FETCH_ASSOC)){
?>
    <tr>
        <th><?=htmlspecialchars($row['name'])?>
        <th><?=htmlspecialchars($row['id'])?>
        <th><?=htmlspecialchars($row['enter_time'])?>
        <th><?=htmlspecialchars($row['temp_status'])?>
    </tr>
<?php
    }
    $pdo = null ;
?>
</tbody></table>
</body>
</html>

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
        'mysql:host = 192.168.1.24;dbname = mysql; charset = utf8',
        'thaliana',
        'benthamiana'
    );
    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo -> setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
}catch(PDOException $Exception){
    die('接続エラーが起こりました.' .$Exception-> getMessage());
}
try{
    $sql = "SELECT * FROM mysql.exit_table";
    $stmh = $pdo -> prepare($sql);
    $stmh -> execute() ;
}catch(PDOException $Exception){
    die('接続エラー: ' .$Exception ->getMessage());
}
?>

<table border='1' cellpadding='5'><tbody>
    <tr><th>学籍(職員)番号</th><th>氏名</th><th>退室時間</th><th>B326</th><th>B328</th><th>B320</th><th>B325</th>
    <th>B324</th><th>i203</th><th>i311</th><th>B126</th><th>島津分析室</th><th>その他</th>

<?php
    while($row = $stmh -> fetch(PDO::FETCH_ASSOC)){
?>
    <b>
    <tr>
        <th align= 'center'><?=htmlspecialchars($row['name'])?></th>
        <th align= 'center'><?=htmlspecialchars($row['id'])?></th>
        <th align = 'center'><?=htmlspecialchars($row['exit_time'])?></th>
        <th align = 'center'><?=htmlspecialchars($row['B326'])?></th>
        <th align = 'center'><?=htmlspecialchars($row['B328'])?></th>
        <th align = 'center'><?=htmlspecialchars($row['B320'])?></th>
        <th align = 'center'><?=htmlspecialchars($row['B325'])?></th>
        <th align = 'center'><?=htmlspecialchars($row['B324'])?></th>
        <th align = 'center'><?=htmlspecialchars($row['i203'])?></th>
        <th align = 'center'><?=htmlspecialchars($row['i311'])?></th>
        <th align = 'center'><?=htmlspecialchars($row['B126'])?></th>
        <th align = 'center'><?=htmlspecialchars($row['shimadzu'])?></th>
        <th align = 'center'><?=htmlspecialchars($row['other'])?></th>
    </tr>
    </b>
<?php
    }
    $pdo = null ;
?>
</tbody></table>
</body>
</html>

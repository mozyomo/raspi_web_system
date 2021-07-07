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
    $sql = "SELECT * FROM mysql.check_list_table";
    $stmh = $pdo -> prepare($sql);
    $stmh -> execute() ;
}catch(PDOException $Exception){
    die('接続エラー: ' .$Exception ->getMessage());
}
?>

<table border = '1' cellpassing = '5'><tbody>
    <tr><th>クレブ部屋ガス</th><th>大部屋ガス</th><th>藻類部屋ガス</th><th>クレブ部屋UV</th><th>大部屋UV</th><th>藻類部屋UV</th>
    <th>-20℃冷凍庫</th><th>-80℃冷凍庫</th><th>ウォーターバス</th><th>電気泳動槽</th><th>エアコン</th><th>水銀灯</th>


<?php
    while($row = $stmh -> fetch(PDO::FETCH_ASSOC)){
?>

    <tr>
        <th align = 'center'><?=htmlspecialchars($row['kleb_gas'])?></th>
        <th align = 'center'><?=htmlspecialchars($row['large_gas'])?></th>
        <th align = 'center'><?=htmlspecialchars($row['algae_gas'])?></th>
        <th align = 'center'><?=htmlspecialchars($row['kleb_uv'])?></th>
        <th align = 'center'><?=htmlspecialchars($row['large_uv'])?></th>
        <th align = 'center'><?=htmlspecialchars($row['algae_uv'])?></th>
        <th align = 'center'><?=htmlspecialchars($row['20_freeze'])?></th>
        <th align = 'center'><?=htmlspecialchars($row['80_freeze'])?></th>
        <th align = 'center'><?=htmlspecialchars($row['water_heater'])?></th>
        <th align = 'center'><?=htmlspecialchars($row['eh_aquarium'])?></th>
        <th align = 'center'><?=htmlspecialchars($row['air_c'])?></th>
        <th align = 'center'><?=htmlspecialchars($row['hg_lamp'])?></th>
    </tr>

<?php
    }
    $pdo = null ;
?>
</tbody></table>
</body>
</html>

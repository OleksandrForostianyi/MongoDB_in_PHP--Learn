<?php
include('connect.php');

$groups = $_GET['groups'];
$cursor = $collections->find(["groups" => $groups],['projection'=>["_id"=>0, 'teacher'=>1, "discipline"=>1, 'date'=>1]]);

echo "<h2>Группа $groups</h2>";
echo "<table border='1'>";
echo "<tr><th colspan=3>Пары</th></tr>";
echo "<tr><td>Имя</td><td>Название Пары</td><td>Дата</td></tr>";
foreach($cursor as $document){
    $doccontent = [$document['teacher'], $document['discipline'], $document['date']];
    echo "<tr><td>$doccontent[0]</td><td>$doccontent[1]</td><td>$doccontent[2]</td></tr>";
}
echo "</table>";
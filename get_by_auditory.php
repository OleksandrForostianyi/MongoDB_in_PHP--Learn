<?php
include("connect.php");

$aud = $_GET['aud'];
$cursor = $collections->find(["aud" => intval($aud)],['projection'=>["_id"=>0, 'teacher'=>1, "discipline"=>1, 'date'=>1]]);

echo "<h2>Аудитория $aud</h2>";
echo "<table border='1'>";
echo "<tr><th colspan=3>Пары</th></tr>";
echo "<tr><td>Имя</td><td>Название Пары</td><td>Дата</td></tr>";
echo "<div id='vivod'></div>";

echo "<script>
    var oldAud = localStorage.getItem('aud');
    var oldTeacher = localStorage.getItem('teacher');
    var oldDiscipline = localStorage.getItem('discipline');
    var oldDate = localStorage.getItem('date');
    var vivod = document.getElementById('vivod');
    vivod.innerHTML = 'Предыдущий запрос: Аудитория: ' + oldAud + ' Учитель: ' + oldTeacher + ' Пара: ' + oldDiscipline + ' Дата: ' + oldDate;
</script>";

foreach($cursor as $document){
    $doccontent = [$document['teacher'], $document['discipline'], $document['date']];
    echo "<tr><td>$doccontent[0]</td><td>$doccontent[1]</td><td>$doccontent[2]</td></tr>";
    
    echo "<script>

    localStorage.setItem('aud', $aud);
    localStorage.setItem('teacher', '$doccontent[0]');
    localStorage.setItem('discipline', '$doccontent[1]'); 
    localStorage.setItem('date', '$doccontent[2]');

    </script>";
}
echo "</table>";

// echo "<script>var saved1 = saveFunc();</script>";

    // console.log(localStorage.getItem('aud'));
    // console.log(localStorage.getItem('teacher'));
    // console.log(localStorage.getItem('discipline'));
    // console.log(localStorage.getItem('date'));
<?php



$sql='select * from tzmk where date_use between

DATE_FORMAT("'.$_POST['date_left'].'","%y-%m-%d")

AND

DATE_FORMAT("'.$_POST['date_right'].'","%y-%m-%d")

 ';

 db_connect();

$result=mysql_query($sql);
//echo '<p>'.$sql.'</p>';

         // echo ' <a href="http://localhost/tstbaggywalk.ru/""> На главную</a>';

echo '<table border="1" cellpading="2" cellspacing="0">';
echo'<tr>
<td>№</td>
<td>№ Реєстрації</td>
<td>Дата</td>
<td>Час</td>
<td>Інспектор</td>
<td>Об"єкт</td>
<td>ТЗМК 1</td>
<td>ТЗМК 1</td>
<td>ТЗМК 1</td>
<td>Результат</td>
<td>№ протоколу</td>
<td>Ст. МКУ</td>
<td>Вартість</td>
<td>Опис</td>



</tr>';
$a=1;
while ($row= mysql_fetch_array($result)){
echo'<tr>

<td>'.$a.'</td>
<td>'.$row['number_registr'].'</td>
<td>'.$row['date_use'].'</td>
<td>'.$row['time_use'].'</td>
<td>'.$row['person_use'].'</td>
<td>'.$row['object_mk'].'</td>
<td>'.$row['tzmk_1_use'].'</td>
<td>'.$row['tzmk_2_use'].'</td>
<td>'.$row['tzmk_3_use'].'</td>
<td>'.$row['result'].'</td>
<td>'.$row['number_protocol'].'</td>
<td>'.$row['st_mku'].'</td>
<td>'.$row['price'].'</td>
<td>'.$row['description'].'</td>


';
$a++;
}

echo '</table>';
?>



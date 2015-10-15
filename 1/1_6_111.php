<?php



$sql = 'SELECT * FROM
auto_act LEFT OUTER JOIN auto_pmp ON auto_act.ident = auto_pmp.ident  LEFT OUTER JOIN auto_md1 ON auto_act.ident = auto_md1.ident 
LEFT OUTER JOIN auto_notice ON auto_act.ident = auto_notice.ident RIGHT OUTER JOIN auto_tzmk ON auto_act.ident = auto_tzmk.ident 
where date_use between
DATE_FORMAT("'.$_POST['date_left'].'","%y-%m-%d")
AND
DATE_FORMAT("'.$_POST['date_right'].'","%y-%m-%d")

';



$result=mysql_query($sql);
//echo '<p>'.$sql.'</p>';

         // echo ' <a href="http://localhost/tstbaggywalk.ru/""> На главную</a>';

echo '<table border="1" cellpading="2" cellspacing="0">';
echo'<tr>
<td>№</td>
<td>№ акту МО</td>
<td>Дата</td>
<td>Час</td>
<td>Тип ТЗ</td>
<td>ТЗМК 1</td>
<td>ТЗМК 2</td>
<td>ТЗМК 3</td>
<td>Результат</td>
<td>№ протоколу</td>
<td>Предмет</td>
<td>Опис місця</td>
<td>Інспектор</td>
<td>Зміна</td>



</tr>';
$a=1;
while ($row= mysql_fetch_array($result)){
echo'<tr>

<td>'.$a.'</td>
<td>'.$row['number_registr'].'</td>
<td>'.$row['date_use'].'</td>
<td>'.$row['time_use'].'</td>
<td>'.$row['type_tz'].'</td>
<td>'.$row['tzmk_1'].'</td>
<td>'.$row['tzmk_2'].'</td>
<td>'.$row['tzmk_3'].'</td>
<td>'.$row['result'].'</td>
<td>'.$row['number_protocol'].' '.$row['number_md1'].'</td>
<td>'.$row['subject'].'</td>
<td>'.$row['description'].'</td>
<td>'.$row['person_use'].'</td>
<td>'.$row['zmina'].'</td>


';
$a++;
}

echo '</table>';
?>



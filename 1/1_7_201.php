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
<td>Дата Час</td>

<td>Тип ТЗ<br>№ ТЗ</td>

<td>ПІБ водія</td>
<td>Вантаж</td>
<td>Вага/<br>Місць</td>

<td>Вдправник<br>Отримувач</td>

<td>Напрямок</td>
<td>Ініціатор<br>Підстава</td>

<td>Результат</td>
<td>№ протоколу<br>Ст. МКУ<br>№№ МД-1<br>№ пов-ня</td>

<td>Зміна<br>Інспектор</td>

</tr>';

$a=1;
while ($row= mysql_fetch_array($result)){
echo'<tr>

<td>'.$a.'</td>
<td>'.$row['number_registr'].'</td>
<td>'.$row['date_use'].'<br>'.$row['time_use'].'</td>

<td>'.$row['type_tz'].'<br>'.$row['number_tz'].'<br>'.$row['number_prich'].'</td>

<td>'.$row['driver_tz'].'</td>
<td>'.$row['vantag'].'</td>
<td>'.$row['weight'].'/<br>'.$row['seat'].'</td>

<td>'.$row['sender'].'<br>'.$row['recipient'].'</td>

<td>'.$row['direction'].'</td>
<td>'.$row['autor'].'<br>'.$row['basis'].'<br>'.$row['number_basis'].'</td>

<td>'.$row['result'].'</td>
<td>'.$row['number_protocol'].'<br>'.$row['st_mku'].'<br>'.$row['number_md1'].'<br>'.$row['number_notice'].' '.$row['who_directed'].'</td>

<td>'.$row['zmina'].'<br>'.$row['person_use'].'</td>



';
$a++;
}

echo '</table>';

?>



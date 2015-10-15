<?php



$sql='select * from auto_pmp LEFT OUTER JOIN auto_act ON auto_pmp.ident = auto_act.ident where date_use between
DATE_FORMAT("'.$_POST['date_left'].'","%y-%m-%d")
AND
DATE_FORMAT("'.$_POST['date_right'].'","%y-%m-%d")

 ';


$result = mysql_query($sql);

var_dump($result);
//echo '<p>'.$sql.'</p>';

         // echo ' <a href="http://localhost/tstbaggywalk.ru/""> На главную</a>';

echo '<table border="1" cellpading="2" cellspacing="0">';
echo'<tr>
<td>№</td>
<td>№ акту МО</td>
<td>Дата</td>
<td>ПІБ порушника<br>Адреса</td>

<td>№ протоколу<br>Ст. МКУ</td>

<td>Предмет порушення</td>
<td>Місце приховування</td>

<td>Вартість</td>
<td>Штраф</td>
<td>Сплачено</td>
<td>Конфіскація</td>

<td>Зміна<br>Інспектор</td>

</tr>';
var_dump($result);
$a=1;
while ($row= mysql_fetch_array($result)){
echo'<tr>

<td>'.$a.'</td>
<td>'.$row['number_registr'].'</td>
<td>'.$row['date_use'].'</td>
<td>'.$row['name_offender'].'<br>'.$row['address'].'</td>

<td>'.$row['number_protocol'].'<br>'.$row['st_mku'].'</td>

<td>'.$row['subject'].'</td>
<td>'.$row['description'].'</td>

<td>'.$row['price'].'</td>
<td>'.$row['penalty'].'</td>
<td>'.$row['status_penalty'].'</td>
<td>'.$row['seizure'].'</td>

<td>'.$row['zmina_pmp'].'<br>'.$row['insp_pmp'].'</td>


';
$a++;
}

echo '</table>';
?>



<?php



$sql='select * from tzmk_act where date_use between

DATE_FORMAT("'.$_POST['date_left'].'","%y-%m-%d")

AND

DATE_FORMAT("'.$_POST['date_right'].'","%y-%m-%d")

AND

number_protocol <> ""

 ';

 db_connect();

$result=mysql_query($sql);
//echo '<p>'.$sql.'</p>';

         // echo ' <a href="http://localhost/tstbaggywalk.ru/""> На главную</a>';

echo '<table border="1" cellpading="2" cellspacing="0">';
echo'<tr>
<td>№</td>
<td>№ акту МО</td>
<td>Дата</td>
<td>ПІБ порушника</td>
<td>Адреса</td>
<td>Резидент</td>
<td>№№ протоколів</td>
<td>Ст. МКУ</td>
<td>Предмет порушення</td>
<td>Місце приховування</td>
<td>Визначено</td>
<td>Вартість</td>
<td>Штраф</td>
<td>Сплачено</td>
<td>Конфіскація</td>
<td>Напрямок</td>
<td>Інспектор</td>
<td>Зміна</td>



</tr>';
$a=1;
while ($row= mysql_fetch_array($result)){
echo'<tr>

<td>'.$a.'</td>
<td>'.$row['number_registr'].'</td>
<td>'.$row['date_use'].'</td>
<td>'.$row['name_offender'].'</td>
<td>'.$row['address'].'</td>
<td>'.$row['sitizen'].'</td>
<td>'.$row['number_protocol'].'</td>
<td>'.$row['st_mku'].'</td>
<td>'.$row['subject'].'</td>
<td>'.$row['description'].'</td>
<td>'.$row['status_price'].'</td>
<td>'.$row['price'].'</td>
<td>'.$row['penalty'].'</td>
<td>'.$row['status_penalty'].'</td>
<td>'.$row['seizure'].'</td>
<td>'.$row['direction'].'</td>
<td>'.$row['person_use'].'</td>
<td>'.$row['zmina'].'</td>


';
$a++;
}

echo '</table>';
?>



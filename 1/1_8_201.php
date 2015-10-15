<?php



$sql='select * from auto_act 

LEFT OUTER JOIN auto_tzmk ON auto_act.ident = auto_tzmk.ident  
LEFT OUTER JOIN auto_notice ON auto_act.ident = auto_notice.ident

where date_use between
DATE_FORMAT("'.$_POST['date_left'].'","%y-%m-%d")
AND
DATE_FORMAT("'.$_POST['date_right'].'","%y-%m-%d")
AND
number_notice != ""


';

$result = mysql_query($sql);
//echo '<p>'.$sql.'</p>';

         // echo ' <a href="http://localhost/tstbaggywalk.ru/""> На главную</a>';

echo '<table border="1" cellpading="2" cellspacing="0">';
echo'<tr>
<td>№</td>
<td>№ акту МО</td>
<td>№ повідомлення</td>
<td>Дата</td>
<td>Направлено в</td>
<td>Предмет правопорушення</td>
<td>Інспектор</td>
<td>Зміна</td>

</tr>';
$a=1;
//var_dump($result);
//var_dump('number_pmp');
while ($row = mysql_fetch_array($result)){
echo'<tr>

<td>'.$a.'</td>
<td>'.$row['number_registr'].'</td>
<td>'.$row['number_notice'].'</td>
<td>'.$row['date_use'].'</td>
<td>'.$row['who_directed'].'</td>
<td>'.$row['subject_offense'].'</td>
<td>'.$row['person_use'].'</td>
<td>'.$row['zmina'].'</td>





';
$a++;
}
//var_dump($result);
echo '</table>';
?>



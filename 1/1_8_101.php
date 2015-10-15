<?php



$sql='select * from tzmk_act where date_use between

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
<td>Дата видачі</td>
<td>Зміна</td>
<td>Видав/прийняв ТЗМК</td>
<td>ТЗМК 1</td>
<td>Стан</td>
<td>ТЗМК 2</td>
<td>Стан</td>
<td>ТЗМК 3</td>
<td>Стан</td>
<td>Отримав/здав</td>






</tr>';
$a=1;
while ($row= mysql_fetch_array($result)){
echo'<tr>

<td>'.$a.'</td>
<td>'.$row['date_use'].'</td>
<td>'.$row['zmina'].'</td>
<td>'.$row['person_issue'].'</td>
<td>'.$row['tzmk_1'].'</td>
<td>'.$row['condition_1'].'</td>
<td>'.$row['tzmk_2'].'</td>
<td>'.$row['condition_2'].'</td>
<td>'.$row['tzmk_3'].'</td>
<td>'.$row['condition_3'].'</td>
<td>'.$row['person_use'].'</td>


';
$a++;
}

echo '</table>';
?>



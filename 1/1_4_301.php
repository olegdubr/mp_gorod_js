<?php



$sql='select * from tzmk_oblic where date_issue between

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
<td>Дата видачі</td>
<td>Видав ТЗМК</td>
<td>Підстава</td>
<td>ТЗМК 1</td>
<td>ТЗМК 2</td>
<td>ТЗМК 3</td>
<td>Отримав ТЗМК</td>
<td>Дата повернення</td>
<td>Прийняв ТЗМК</td>
<td>ТЗМК 1</td>
<td>Стан 1</td>
<td>ТЗМК 2</td>
<td>Стан 2</td>
<td>ТЗМК 3</td>
<td>Стан 3</td>
<td>Повернув</td>



</tr>';
$a=1;
while ($row= mysql_fetch_array($result)){
echo'<tr>

<td>'.$a.'</td>
<td>'.$row['number_registr'].'</td>
<td>'.$row['date_issue'].'</td>
<td>'.$row['person_issue'].'</td>
<td>'.$row['basis_issue'].'</td>
<td>'.$row['tzmk_1_issue'].'</td>
<td>'.$row['tzmk_2_issue'].'</td>
<td>'.$row['tzmk_3_issue'].'</td>
<td>'.$row['person_get'].'</td>
<td>'.$row['date_return'].'</td>
<td>'.$row['person_adopt'].'</td>
<td>'.$row['tzmk_1_return'].'</td>
<td>'.$row['tzmk_1_condition'].'</td>
<td>'.$row['tzmk_2_return'].'</td>
<td>'.$row['tzmk_2_condition'].'</td>
<td>'.$row['tzmk_3_return'].'</td>
<td>'.$row['tzmk_3_condition'].'</td>
<td>'.$row['person_return'].'</td>

';
$a++;
}

echo '</table>';
?>



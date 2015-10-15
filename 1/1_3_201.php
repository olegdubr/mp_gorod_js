<?php



$sql='select * from main_mdp_out where date_execut between

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
<td>Дата оформлення</td>
<td>Порядковий №</td>
<td>Гарантійне об"єднання</td>
<td>Серія</td>
<td>Відправник</td>
<td>Отримувач</td>
<td>№ </td>
<td>Держатель книжки</td>
<td>Вантаж</td>
<td>Вага, кг</td>
<td>Місць/шт</td>
<td>Пломба</td>
<td>№ ТЗ</td>
<td>№ прич</td>
<td>Зауваження</td>
<td>Посадова особа)</td>


</tr>';
$a=1;
while ($row= mysql_fetch_array($result)){
echo'<tr>

<td>'.$a.'</td>
<td>'.$row['date_execut'].'</td>
<td>'.$row['order_number_mdp'].'</td>
<td>'.$row['give_mdp'].'</td>
<td>'.$row['serial_mdp'].'</td>
<td>'.$row['sender'].'</td>
<td>'.$row['recipient'].'</td>
<td>'.$row['number_mdp'].'</td>
<td>'.$row['owner_mdp'].'</td>
<td>'.$row['vantag'].'</td>
<td>'.$row['weight'].'</td>
<td>'.$row['seat'].'</td>
<td>'.$row['seal'].'</td>
<td>'.$row['number_tz'].'</td>
<td>'.$row['number_prich'].'</td>
<td>'.$row['annotation'].'</td>
<td>'.$row['rank_person'].'</td>


';
$a++;
}

echo '</table>';
?>
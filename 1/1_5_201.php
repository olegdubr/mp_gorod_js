<?php



$sql='select * from auto_act 
LEFT OUTER JOIN auto_md1 ON auto_act.ident = auto_md1.ident
LEFT OUTER JOIN md1_product ON auto_md1.md1_id = md1_product.md1_id
where date_use between
DATE_FORMAT("'.$_POST['date_left'].'","%y-%m-%d")
AND
DATE_FORMAT("'.$_POST['date_right'].'","%y-%m-%d")
AND
number_md1 != ""


';

$result = mysql_query($sql);
//echo '<p>'.$sql.'</p>';

         // echo ' <a href="http://localhost/tstbaggywalk.ru/""> На главную</a>';

echo '<table border="1" cellpading="2" cellspacing="0">';
echo'<tr>
<td>№</td>
<td>№ акту МО</td>

<td>Дата</td>

<td>№ квитанціїї</td>
<td>Інд. код<br>ПІБ<br>Адреса</td>

<td>Код товару<br>Назва товару</td>

<td>К-ть<br>Од.</td>

<td>Опис</td>
<td>Підстава</td>
<td>Основа</td>
<td>Фактура</td>
<td>120<br>122<br>128<br>Сума</td>



<td>Зміна<br>Інспектор</td>

</tr>';
$a=1;
//var_dump($result);
//var_dump('number_pmp');
while ($row = mysql_fetch_array($result)){
echo'<tr>

<td>'.$a.'</td>
<td>'.$row['number_registr'].'</td>

<td>'.$row['date_use'].'</td>

<td>'.$row['number_md1'].'</td>
<td>'.$row['personal_code'].'<br>'.$row['name_offender_md1'].'<br>'.$row['address_md1'].'</td>

<td>'.$row['product_code'].'<br>'.$row['product_name'].'</td>

<td>'.$row['product_amount'].' '.$row['product_unit'].'</td>

<td>'.$row['product_description'].'</td>
<td>'.$row['basis_tax'].'</td>
<td>'.$row['basis_calc'].'</td>
<td>'.$row['invoice_value'].'</td>
<td>'.$row['payment_120'].'<br>'.$row['payment_122'].'<br>'.$row['payment_128'].'<br>---------<br>'.$row['sum_payment'].'</td>

<td>'.$row['zmina_md1'].'<br>'.$row['insp_md1'].'</td>



';
$a++;
}
//var_dump($result);
echo '</table>';
?>



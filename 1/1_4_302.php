<?php



$sql = 'update tzmk set 

date_return="'.$_POST['date_return'].'",
person_adopt="'.$_POST['person_adopt'].'",
tzmk_1_return="'.$_POST['tzmk_1_return'].'",
tzmk_2_return="'.$_POST['tzmk_2_return'].'",
tzmk_3_return="'.$_POST['tzmk_3_return'].'",
tzmk_1_condition="'.$_POST['tzmk_1_condition'].'",
tzmk_2_condition="'.$_POST['tzmk_2_condition'].'",
tzmk_3_condition="'.$_POST['tzmk_3_condition'].'",
person_return="'.$_POST['person_return'].'"
WHERE number_registr = "'.$_POST['number_registr'].'"
 ';
 
 db_connect();

 $result=mysql_query($sql);


	if ($result == 'true')
	{
	echo "Оформлення пройшло вдало!";
	}
	else
	{
	echo "Не оформлено.";
	}


//$result=mysql_query($sql)?"Çàïèò âèêîíàíî!":"Помилка".mysql_errno().":".mysql_error();
         // echo ' <a href="http://localhost/tstbaggywalk.ru/""> На главную</a>';


?>

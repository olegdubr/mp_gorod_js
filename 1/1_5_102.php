<?php
// $_POST['owner_mdp']=str_replace('"', "&quot;",$_POST['owner_mdp'] );


$sql = 'insert into tzmk_effect (
	user_id,
	number_registr,
	date_use,
	time_use,
	person_use,
	object_mk,
	result,
	tzmk_1_use,
	tzmk_2_use,
	tzmk_3_use,
	number_act,
	number_protocol,
	st_mku,
	price,
	description)
	 values (
	 	"'.$_SESSION['iduser'].'",
	 	"'.$_POST['number_registr'].'",
	 	"'.$_POST['date_use'].'",
	 	"'.$_POST['time_use'].'",
	 	"'.$_POST['person_use'].'",
	 	"'.$_POST['object_mk'].'",
	 	"'.$_POST['result'].'",
	 	"'.$_POST['tzmk_1_use'].'",
	 	"'.$_POST['tzmk_2_use'].'",
	 	"'.$_POST['tzmk_3_use'].'",
	 	"'.$_POST['number_act'].'",
	 	"'.$_POST['number_protocol'].'",
	 	"'.$_POST['st_mku'].'",
	 	"'.$_POST['price'].'",
	 	"'.$_POST['description'].'") ';

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

//$result=mysql_query($sql)?"Çàïèò âèêîíàíî!":"аів'аіваів".mysql_error().":".mysql_error();
// <a href="index.php?step=0000000">На главную</a>';
//echo $result;
?>
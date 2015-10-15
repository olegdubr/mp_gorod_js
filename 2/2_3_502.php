<?php

$_POST['owner_mdp']=str_replace('"', "&quot;",$_POST['owner_mdp'] );

$sql = 'update main_mdp_out set 

date_execut="'.$_POST['date_execut'].'",
order_number_mdp="'.$_POST['order_number_mdp'].'",
give_mdp="'.$_POST['give_mdp'].'",
serial_mdp="'.$_POST['serial_mdp'].'",
sender="'.$_POST['sender'].'",
recipient="'.$_POST['recipient'].'",
number_mdp="'.$_POST['number_mdp'].'",
owner_mdp="'.$_POST['owner_mdp'].'",
vantag="'.$_POST['vantag'].'",
weight="'.$_POST['weight'].'",
seat="'.$_POST['seat'].'",
seal="'.$_POST['seal'].'",
number_tz="'.$_POST['number_tz'].'",
number_prich="'.$_POST['number_prich'].'",
annotation="'.$_POST['annotation'].'",
rank_person="'.$_POST['rank_person'].'"

WHERE order_number_mdp = "'.$_POST['order_number_mdp'].'"
 ';
 
 db_connect();

 $result=mysql_query($sql);


	if ($result == 'true')
	{
	echo "Запис відредаговано вдало!";
	}
	else
	{
	echo "Запис не відредаговано!";
	}


$result=mysql_query($sql)?"Çàïèò âèêîíàíî!":"Помилка".mysql_errno().":".mysql_error();
         // echo ' <a href="http://localhost/tstbaggywalk.ru/""> На главную</a>';

//echo $result;

?>


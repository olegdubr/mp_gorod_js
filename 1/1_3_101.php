<?php
$_POST['owner_mdp']=str_replace('"', "&quot;",$_POST['owner_mdp'] );


$sql = 'insert into main_mdp_out (
	user_id,
	date_execut,
	order_number_mdp,
	serial_mdp,
	sender,
	recipient,
	number_mdp,
	give_mdp,
	owner_mdp,
	vantag,
	weight,
	seat,
	seal,
	number_tz,
	number_prich,
	annotation,
	rank_person)
	 values (
	 	"'.$_SESSION['iduser'].'",
	 	"'.$_POST['date_execut'].'",
	 	"'.$_POST['order_number_mdp'].'",
	 	"'.$_POST['serial_mdp'].'",
	 	"'.$_POST['sender'].'",
	 	"'.$_POST['recipient'].'",
	 	"'.$_POST['number_mdp'].'",
	 	"'.$_POST['give_mdp'].'",
	 	"'.$_POST['owner_mdp'].'",
	 	"'.$_POST['vantag'].'",
	 	"'.$_POST['weight'].'",
	 	"'.$_POST['seat'].'",
	 	"'.$_POST['seal'].'",
	 	"'.$_POST['number_tz'].'",
	 	"'.$_POST['number_prich'].'",
	 	"'.$_POST['annotation'].'",
	 	"'.$_POST['rank_person'].'") ';

 db_connect();

  $result=mysql_query($sql);


	if ($result == 'true')
	{
	echo "Оформлення пройшло вдало!";
	}
	else
	{
	echo "Не оформлено. Такий порядковий номер книжки МДП вже існує!";
	}

$result=mysql_query($sql)?"Çàïèò âèêîíàíî!":"аів'аіваів".mysql_errno().":".mysql_error();
         // echo ' <a href="http://localhost/tstbaggywalk.ru/""> На главную</a>';
//echo $result;
?>
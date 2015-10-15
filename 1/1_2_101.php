<?php
$_POST['owner_mdp']=str_replace('"', "&quot;",$_POST['owner_mdp'] );
$sql = 'insert into main_mdp_in (
	user_id, date_execut, number_registr, serial_mdp, sender, recipient, number_mdp, give_mdp, owner_mdp,
	vantag, weight, seat, seal, number_tz, number_prich, annotation, rank_person, remark
	)
	 values (
	 	"'.$_SESSION['iduser'].'", "'.$_POST['date_execut'].'", "'.$_POST['number_registr'].'",
	 	"'.$_POST['serial_mdp'].'", "'.$_POST['sender'].'",	"'.$_POST['recipient'].'",
	 	"'.$_POST['number_mdp'].'",	"'.$_POST['give_mdp'].'", "'.$_POST['owner_mdp'].'",
	 	"'.$_POST['vantag'].'",	"'.$_POST['weight'].'",	"'.$_POST['seat'].'", "'.$_POST['seal'].'",
	 	"'.$_POST['number_tz'].'", 	"'.$_POST['number_prich'].'", "'.$_POST['annotation'].'",
	 	"'.$_POST['rank_person'].'", "'.$_POST['remark'].'") ';

$result = mysql_query($sql);
if ($result == 'true') {
echo " Кижка МДП № " . $_POST['number_registr'] . " оформлена! <br>\n";

} else {
    echo " Кижка МДП № " . $_POST['number_registr'] . " оформлена!" . mysql_error() . "<br>\n";
}

?>
       
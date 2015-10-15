<?php

$_POST['owner_mdp']=str_replace('"', "&quot;",$_POST['owner_mdp'] );

$sql = 'update main_mdp_in set 

date_execut="'.$_POST['date_execut'].'",
number_registr="'.$_POST['number_registr'].'",
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
rank_person="'.$_POST['rank_person'].'",
remark="'.$_POST['remark'].'"
WHERE order_number_mdp = "'.$_POST['number_registr'].'"
 ';
 
 db_connect();

$result = mysql_query($sql);
if ($result == 'true') {
    echo " Книжка МДП № " . $_POST['number_registr'] . " відредагована вдало! <br>\n";

} else {
    echo " Книжка МДП № " . $_POST['number_registr'] . " не відредагована!  " . mysql_error() . "<br>\n";
}
?>


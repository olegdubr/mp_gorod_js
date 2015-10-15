<?php

$_POST['vantag']=str_replace('"', "&quot;",$_POST['vantag'] );

$sql_act = 'update auto_act set 

date_use = "'.$_POST['date_use'].'", time_use = "'.$_POST['time_use'].'", type_tz = "'.$_POST['type_tz'].'", number_tz = "'.$_POST['number_tz'].'",
number_prich = "'.$_POST['number_prich'].'", driver_tz = "'.$_POST['driver_tz'].'", vantag = "'.$_POST['vantag'].'", weight = "'.$_POST['weight'].'",
seat = "'.$_POST['seat'].'", sender = "'.$_POST['sender'].'", recipient = "'.$_POST['recipient'].'", direction = "'.$_POST['direction'].'",
autor = "'.$_POST['autor'].'", basis = "'.$_POST['basis'].'", number_basis = "'.$_POST['number_basis'].'", result = "'.$_POST['result'].'"

WHERE number_registr = "'.$_POST['number_registr'].'"
 ';


$result_act = mysql_query($sql_act);
if ($result_act == 'true') {
    echo " Акт митного огляду № " . $_POST['number_registr'] . " - відредаговано! <br>\n";
} else {
    echo "Акт митного огляду № " . $_POST['number_registr'] . " не відредаговано  " . mysql_error() . "<br>\n";
}


 
$sql_tzmk = 'update auto_tzmk set

person_issue = "'.$_POST['person_issue'].'",tzmk_1 = "'.$_POST['tzmk_1'].'", tzmk_2 = "'.$_POST['tzmk_2'].'", tzmk_3 = "'.$_POST['tzmk_3'].'",
person_use = "'.$_POST['person_use'].'", zmina = "'.$_POST['zmina'].'",
condition_1 = "'.$_POST['condition_1'].'", condition_2 = "'.$_POST['condition_2'].'", condition_3 = "'.$_POST['condition_3'].'"

WHERE ident = "'.$_POST['ident'].'"
 ';

$result_tzmk = mysql_query($sql_tzmk);
if ($result_tzmk == 'true') {
    echo " Технічні засоби МК використані при проведені Акту МО № " . $_POST['number_registr'] . " відредаговано! <br>\n";

} else {
    echo " Технічні засоби МК використані при проведені Акту МО № " . $_POST['number_registr'] . " не відредаговано!  " . mysql_error() . "<br>\n";
}



?>


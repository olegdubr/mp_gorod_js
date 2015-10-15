<?php

$sql='DELETE FROM main_mdp_in WHERE number_registr = "'.$_POST['number_registr'].'"';


db_connect();


$result = mysql_query($sql);
if ($result == 'true') {
    echo " Книжка МДП № " . $_POST['number_registr'] . " видалена! <br>\n";

} else {
    echo " Книжка МДП № " . $_POST['number_registr'] . " не видалена!  " . mysql_error() . "<br>\n";
}
?>
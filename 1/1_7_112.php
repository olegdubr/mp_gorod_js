<?php

$_POST['vantag']=str_replace('"', "&quot;",$_POST['vantag'] );

    $sql_pmp = 'insert into auto_pmp (
    ident, name_offender, address, sitizen, number_protocol, st_mku, num_protocol, status_price, price,
    penalty, status_penalty, seizure, description, subject, insp_pmp, zmina_pmp
    )
	 values (
        "' . (int)$_POST['ident'] . '", "' . $_POST['name_offender'] . '", "' . $_POST['address'] . '",
	 	"' . $_POST['sitizen'] . '", "' . $_POST['number_protocol'] . '", "' . $_POST['st_mku'] . '",
	 	"' . $_POST['num_protocol'] . '", "' . $_POST['status_price'] . '", "' . $_POST['price'] . '",
	 	"' . $_POST['penalty'] . '", "' . $_POST['status_penalty'] . '", "' . $_POST['seizure'] . '",
	 	"' . $_POST['description'] . '", "' . $_POST['subject'] . '", "' . $_POST['insp_pmp'] . '", 
	 	"' . $_POST['zmina_pmp'] . '" 
        )
';
var_dump($id_act);
$result=mysql_query($sql_pmp);
if ($result == 'true'){
	echo "Протокол № ".$_POST['number_protocol']. " до Акту МО № ".$_POST['number_registr']." добавлено вдало!";
	}
	else
	{
	echo "Запис не добавлено! " . mysql_error();
	}



?>


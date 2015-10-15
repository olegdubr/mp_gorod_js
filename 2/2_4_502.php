<?php

$_POST['vantag']=str_replace('"', "&quot;",$_POST['vantag'] );

$sql_pmp = 'update auto_pmp set 

        name_offender = "' . $_POST['name_offender'] . '", address = "' . $_POST['address'] . '",
	 	sitizen = "' . $_POST['sitizen'] . '", number_protocol = "' . $_POST['number_protocol'] . '", st_mku = "' . $_POST['st_mku'] . '",
	 	status_price = "' . $_POST['status_price'] . '", price = "' . $_POST['price'] . '", description = "' . $_POST['description'] . '",
	 	subject = "' . $_POST['subject'] . '", penalty = "' . $_POST['penalty'] . '", status_penalty = "' . $_POST['status_penalty'] . '",
	 	seizure = "' . $_POST['seizure'] . '", insp_pmp = "' . $_POST['insp_pmp'] . '", zmina_pmp = "' . $_POST['zmina_pmp'] . '"
	 	

WHERE number_protocol = "'.$_POST['number_protocol'].'"
 ';

    $result_pmp = mysql_query($sql_pmp);
    if ($result_pmp == 'true') {
    echo " Протокол № " . $_POST['number_protocol'] . " відредаговано!" . mysql_error() . "<br>\n";

} else {
    echo " Протокол про ПМП не відредаговано.  " . mysql_error() . "<br>\n";
}



?>


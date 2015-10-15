<?php

    $sql_pmp = 'insert into auto_pmp (
    ident, name_offender, address, sitizen, number_protocol, st_mku, status_price, price,
    description, subject, penalty,	status_penalty, seizure, insp_pmp, zmina_pmp, date_pmp
    )
	 values (
         "' . (int)$_POST['ident'] . '", "' . $_POST['name_offender'] . '", "' . $_POST['address'] . '",
	 	"' . $_POST['sitizen'] . '", "' . $_POST['number_protocol'] . '", "' . $_POST['st_mku'] . '",
	 	"' . $_POST['status_price'] . '", "' . $_POST['price'] . '", "' . $_POST['description'] . '",
	 	"' . $_POST['subject'] . '", "' . $_POST['penalty'] . '", "' . $_POST['status_penalty'] . '",
	 	"' . $_POST['seizure'] . '", "' . $_POST['insp_pmp'] . '", "' . $_POST['zmina_pmp'] . '",
	 	"' . $_POST['date_pmp'] . '"
        )
';
    $result_pmp = mysql_query($sql_pmp);
    if ($result_pmp == 'true') {
    echo " Протокол № " . $_POST['number_protocol'] . " оформлено!" . mysql_error() . "<br>\n";

} else {
    echo " Протокол про ПМП не оформлений.  " . mysql_error() . "<br>\n";
}



//$result=mysql_query($sql)?"Çàïèò âèêîíàíî!":"аів'аіваів".mysql_errno().":".mysql_error();
//<a href="index.php?step=0000000">На главную</a>';
//echo $result;
?>


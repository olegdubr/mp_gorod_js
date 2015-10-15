<?php

$sql_act = 'insert into auto_act (
	user_id, number_registr, date_use, time_use, type_tz, number_tz, number_prich, driver_tz, vantag, weight, seat, sender,
	recipient, direction, autor, basis, number_basis, result
    )
	 values (
        "' . $_SESSION['iduser'] . '", "' . $_POST['number_registr'] . '", "' . $_POST['date_use'] . '",
        "' . $_POST['time_use'] . '", "' . $_POST['type_tz'] . '", "' . $_POST['number_tz'] . '",  "' . $_POST['number_prich'] . '", 
        "' . $_POST['driver_tz'] . '", "' . $_POST['vantag'] . '", "' . $_POST['weight'] . '", "' . $_POST['seat'] . '",
        "' . $_POST['sender'] . '", "' . $_POST['recipient'] . '", "' . $_POST['direction'] . '", "' . $_POST['autor'] . '", 
        "' . $_POST['basis'] . '", "' . $_POST['number_basis'] . '", "' . $_POST['result'] . '"
	 	) 
';

$sql_id = 'SELECT MAX(ident) as id_act FROM auto_act';
$result_id = mysql_query($sql_id);
$row_id = mysql_fetch_row($result_id);
$id_act = $row_id[0];
++$id_act;

$result_act = mysql_query($sql_act);
if ($result_act == 'true') {
    echo " Акт митного огляду № " . $_POST['number_registr'] . " - оформлено! <br>\n";
} else {
    echo "Акт митного огляду № " . $_POST['number_registr'] . " не оформлено  " . mysql_error() . "<br>\n";
}


$sql_tzmk = 'insert into auto_tzmk (
    ident, person_issue, tzmk_1, tzmk_2, tzmk_3, person_use, zmina, condition_1, condition_2, condition_3
    )
	 values (
	 	"' . $id_act . '", "' . $_POST['person_issue'] . '",
        "' . $_POST['tzmk_1'] . '", "' . $_POST['tzmk_2'] . '", "' . $_POST['tzmk_3'] . '",
        "' . $_POST['person_use'] . '", "' . $_POST['zmina'] . '",
	 	"' . $_POST['condition_1,'] . '", "' . $_POST['condition_2'] . '", "' . $_POST['condition_3'] . '"
	 	)
';
$result_tzmk = mysql_query($sql_tzmk);
if ($result_tzmk == 'true') {
    echo " Технічні засоби МК використані при проведені Акту МО № " . $_POST['number_registr'] . " внесені! <br>\n";

} else {
    echo " Технічні засоби МК використані при проведені Акту МО № " . $_POST['number_registr'] . " не внесені!  "
        . mysql_error() . "<br>\n";
}


if (!empty($_POST["number_protocol"])) {
    $sql_pmp = 'insert into auto_pmp (
    ident, name_offender, address, sitizen, number_protocol, st_mku, num_protocol, status_price, price,
    penalty, status_penalty, seizure, description, subject, insp_pmp, zmina_pmp
    )
	 values (
	 	"' . $id_act . '", "' . $_POST['name_offender'] . '", "' . $_POST['address'] . '",
        "' . $_POST['sitizen'] . '", "' . $_POST['number_protocol'] . '", "' . $_POST['st_mku'] . '",
        "' . $_POST['num_protocol'] . '", "' . $_POST['status_price'] . '", "' . $_POST['price'] . '",
        "' . $_POST['penalty'] . '", "' . $_POST['status_penalty'] . '", "' . $_POST['seizure'] . '",
        "' . $_POST['description'] . '", "' . $_POST['subject'] . '", "' . $_POST['person_use'] . '", 
        "' . $_POST['zmina'] . '" 
        )
';
    $result_pmp = mysql_query($sql_pmp);
    $result_pmp == 'true';
    echo " Протокол № " . $_POST['number_protocol'] . " оформлено!" . mysql_error() . "<br>\n";

} else {
    echo " Оформлення ПМП відсутнє.  " . mysql_error() . "<br>\n";
}

$sql_id_pmp = "SELECT pmp_id FROM auto_pmp where ident like '$id_act'";
$result_id_pmp = mysql_query($sql_id_pmp);
$row_id_pmp = mysql_fetch_row($result_id_pmp);
$pmp_id = $row_id_pmp[0];

//var_dump($pmp_id);

if (!empty($_POST["number_md1"])) {
    $sql_md1 = 'insert into auto_md1 (
    ident, pmp_id, type_md, number_md1, name_offender_md1, address_md1, personal_code, insp_md1, zmina_md1
    )
	 values (
	 	"' . $id_act . '", "' . (real)$pmp_id . '", "' . $_POST['type_md'] . '", "' . $_POST['number_md1'] . '", 
        "' . $_POST['name_offender_md1'] . '",  "' . $_POST['address_md1'] . '", "' . $_POST['personal_code'] . '",
        "' . $_POST['person_use'] . '", "' . $_POST['zmina'] . '" 
        )
';
    $result_md1 = mysql_query($sql_md1);
    $result_md1 == 'true';
    echo " Квитанція МД-1 № " . $_POST['number_protocol'] . " оформлена!" . mysql_error() . "<br>\n";

} else {
    echo " Оформлення квитанції МД-1 відсутнє.  " . mysql_error() . "<br>\n";

}

$sql_id_md = 'SELECT MAX(md1_id) as id_md FROM auto_md1';
$result_id_md = mysql_query($sql_id_md);
$row_id_md = mysql_fetch_row($result_id_md);
$id_md = $row_id_md[0];

if ($_POST['type_md'] == "МД-1"){
    $p_120 = $_POST['basis_calc'] * 0.1;
    $p_122 = $_POST['basis_calc'] * 0.1;
    $p_128 = ($_POST['basis_calc'] + $p_120 + $p_122) * 0.2;
    //var_dump($p_128);

} else {
    $p_120 = $_POST['payment_120'];
    $p_122 = $_POST['payment_122'];
    $p_128 = $_POST['payment_128'];
    //var_dump($p_120);
    //var_dump('payment_120';
}

$sum_pay = $p_120 + $p_122 + $p_128;
//var_dump($sum_pay);


if (!empty($_POST["product_name"])) {

    $sql_product = 'insert into md1_product (
    md1_id,  ident, product_code, product_name, product_amount, product_unit, product_description, basis_tax, basis_calc,
    invoice_value, payment_120, payment_122, payment_128, sum_payment
    )
     values (
        "' . $id_md . '", "' . $id_act . '", "' . $_POST['product_code'] . '", "' . $_POST['product_name'] . '",
        "' . $_POST['product_amount'] . '", "' . $_POST['product_unit'] . '", "' . $_POST['product_description'] . '",
        "' . $_POST['basis_tax'] . '", "' . $_POST['basis_calc'] . '", "' . $_POST['invoice_value'] . '",
        "' . (real)$p_120 . '", "' . (real)$p_122 . '", "' . (real)$p_128 . '",
        "' . (real)$sum_pay . '"
        )
';
    $result_product = mysql_query($sql_product);
    $result_product == 'true';
    echo " Товар в " . $_POST['type_md'] . " № " . $_POST['number_md1'] . " добавлено!" . mysql_error() . "<br>\n";
    echo "120 платіж = " . $p_120 . "<br>\n";
    echo "122 платіж = " . $p_122 . "<br>\n";
    echo "128 платіж = " . $p_128 . "<br>\n"; 
    echo "Сума платежів = " . $sum_pay . "<br>\n";   
    } else {

    echo " Товар в " . $_POST['type_md'] . " № " . $_POST['number_md1'] . " не добавлено!" . mysql_error() . "<br>\n";  
    }


if (!empty($_POST["number_notice"])) {
    $sql_notice = 'insert into auto_notice (
    ident, number_notice, who_directed, st_kku, subject_offense
    )
	 values (
	 	"' . $id_act . '", "' . $_POST['number_notice'] . '", "' . $_POST['who_directed'] . '",
	 	"' . $_POST['st_kku'] . '", "' . $_POST['subject_offense'] . '"
        )
';
    $result_notice = mysql_query($sql_notice);
    $result_notice == 'true';
    echo " Повідомлення № " . $_POST['number_notice'] . " в " . $_POST['who_directed'] . " оформлено!" . mysql_error() . "<br>\n";

} else {
    echo " Оформлення повідомлення в правоохоронні органи відсутнє.  " . mysql_error() . "<br>\n";
}


//$result=mysql_query($sql)?"Çàïèò âèêîíàíî!":"аів'аіваів".mysql_errno().":".mysql_error();
//<a href="index.php?step=0000000">На главную</a>';
//echo $result;
?>


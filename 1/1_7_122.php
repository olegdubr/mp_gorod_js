<?php

$_POST['product_name']=str_replace('"', "&quot;",$_POST['product_name'] );




    $sql_md1 = 'insert into auto_md1 (
    ident, pmp_id, type_md, number_md1, name_offender_md1, address_md1, personal_code, insp_md1, zmina_md1
    )
	 values (
	 	"' . (int)$_POST['ident'] . '", "' . (int)$id_pmp . '", "' . $_POST['type_md'] . '", "' . $_POST['number_md1'] . '",
        "' . $_POST['name_offender_md1'] . '",  "' . $_POST['address_md1'] . '", "' . $_POST['personal_code'] . '",
        "' . $_POST['insp_md1'] . '", "' . $_POST['zmina_md1'] . '"
        )
';
    $result_md1 = mysql_query($sql_md1);
    $result_md1 == 'true';
echo " Квитанція МД-1 № " . $_POST['number_protocol'] . " оформлена!" . mysql_error() . "<br>\n";

$sql_id_md = 'SELECT MAX(md1_id) as id_md FROM auto_md1';
$result_id_md = mysql_query($sql_id_md);
$row_id_md = mysql_fetch_row($result_id_md);
$id_md = $row_id_md[0];


$p_120 = $_POST['basis_calc'] * 0.1;
$p_122 = $_POST['basis_calc'] * 0.1;
$p_128 = ($_POST['basis_calc'] + $p_120 + $p_122) * 0.2;


$sum_pay = $p_120 + $p_122 + $p_128;
//var_dump($p_120 = $_POST['basis_calc'] * 0.1);



    $sql_product = 'insert into md1_product (
    md1_id,  ident, product_code, product_name, product_amount, product_unit, product_description, basis_tax, basis_calc,
    invoice_value, payment_120, payment_122, payment_128, sum_payment
    )
     values (
        "' . (int)$id_md . '", "' . (int)$_POST['ident'] . '", "' . $_POST['product_code'] . '", "' . $_POST['product_name'] . '",
        "' . $_POST['product_amount'] . '", "' . $_POST['product_unit'] . '", "' . $_POST['product_description'] . '",
        "' . $_POST['basis_tax'] . '", "' . $_POST['basis_calc'] . '", "' . $_POST['invoice_value'] . '",
        "' . (real)$p_120 . '", "' . (real)$p_122 . '", "' . (real)$p_128 . '",
        "' . (real)$sum_pay . '"
        )
';
    $result_product = mysql_query($sql_product);
    if ($result_product == 'true'){
    echo " Товар в квитанцію МД-1 № " . $_POST['number_md1'] . " добавлено!" . mysql_error() . "<br>\n";
    echo "120 платіж = " . $p_120 . "<br>\n";
    echo "122 платіж = " . $p_122 . "<br>\n";
    echo "128 платіж = " . $p_128 . "<br>\n"; 
    echo "Сума платежів = " . $sum_pay . "<br>\n";
    } else {

    echo " Товар в квитанцію МД-1 № " . $_POST['number_md1'] . " не добавлено!" . mysql_error() . "<br>\n";	
    }


?>


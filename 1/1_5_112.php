<?php

$_POST['product_name']=str_replace('"', "&quot;",$_POST['product_name'] );

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


    $sql_product = 'insert into md1_product (
    md1_id,  ident, product_code, product_name, product_amount, product_unit, product_description, basis_tax, basis_calc,
    invoice_value, payment_120, payment_122, payment_128, sum_payment
    )
     values (
        "' . (int)$_POST['md1_id'] . '", "' . (int)$_POST['ident'] . '", "' . $_POST['product_code'] . '", "' . $_POST['product_name'] . '",
        "' . $_POST['product_amount'] . '", "' . $_POST['product_unit'] . '", "' . $_POST['product_description'] . '",
        "' . $_POST['basis_tax'] . '", "' . $_POST['basis_calc'] . '", "' . $_POST['invoice_value'] . '",
        "' . (real)$p_120 . '", "' . (real)$p_122 . '", "' . (real)$p_128 . '",
        "' . (real)$sum_pay . '"
        )
';
    $result_product = mysql_query($sql_product);
    if ($result_product == 'true'){
    echo " Товар в " . $_POST['type_md'] . " № " . $_POST['number_md1'] . " добавлено!" . mysql_error() . "<br>\n";
    echo "120 платіж = " . $p_120 . "<br>\n";
    echo "122 платіж = " . $p_122 . "<br>\n";
    echo "128 платіж = " . $p_128 . "<br>\n"; 
    echo "Сума платежів = " . $sum_pay . "<br>\n";   
    } else {

    echo " Товар в " . $_POST['type_md'] . " № " . $_POST['number_md1'] . " не добавлено!" . mysql_error() . "<br>\n";  
    }


?>


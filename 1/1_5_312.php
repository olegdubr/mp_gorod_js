<?php
$beetwen_cond = '
date_use between
DATE_FORMAT("' . $_POST['date_left'] . '","%y-%m-%d")
AND
DATE_FORMAT("' . $_POST['date_right'] . '","%y-%m-%d")';


//---------------
$count_report_arr = [];
$summary_stat_arr = [];

$sql_articles = 'SELECT * from auto_act LEFT OUTER JOIN auto_md1 ON auto_act.ident = auto_md1.ident
LEFT OUTER JOIN md1_product ON auto_md1.md1_id = md1_product.md1_id where ' . $beetwen_cond . ' and type_md != "" GROUP BY type_md';
$sql_articles = mysql_query($sql_articles);

//var_dump($sql_articles);

while ($row = mysql_fetch_assoc($sql_articles)) {
    $amount = 'select count(*) from auto_act LEFT OUTER JOIN auto_md1 ON auto_act.ident = auto_md1.ident
LEFT OUTER JOIN md1_product ON auto_md1.md1_id = md1_product.md1_id where type_md = "' . $row['type_md'] . '" and ' . $beetwen_cond;
    $amount = mysql_fetch_row(mysql_query($amount));

    //$in = 'select count(*) from auto_act LEFT OUTER JOIN auto_md1 ON auto_act.ident = auto_md1.ident
//LEFT OUTER JOIN md1_product ON auto_md1.md1_id = md1_product.md1_id where direction = "Вїзд" and st_mku = "' //. $row['st_mku'] . '" and ' . $beetwen_cond;
    //  $in = mysql_fetch_row(mysql_query($in));

    //$out = 'select count(*) from auto_pmp LEFT OUTER JOIN auto_act ON auto_pmp.ident = auto_act.ident where direction = "Виїзд" and st_mku = "' . $row['st_mku'] . '" and ' . $beetwen_cond;
    //$out = mysql_fetch_row(mysql_query($out));

    //$rezident = 'select count(*) from auto_pmp LEFT OUTER JOIN auto_act ON auto_pmp.ident = auto_act.ident where sitizen = "так" and st_mku = "' . $row['st_mku'] . '" and ' . $beetwen_cond;
    //$rezident = mysql_fetch_row(mysql_query($rezident));

    $invoice_value = 'select sum(invoice_value) from auto_act LEFT OUTER JOIN auto_md1 ON auto_act.ident = auto_md1.ident
LEFT OUTER JOIN md1_product ON auto_md1.md1_id = md1_product.md1_id where type_md = "' . $row['type_md'] . '" and ' . $beetwen_cond;
    $invoice_value = mysql_fetch_row(mysql_query($invoice_value));


    $payment_120 = 'select sum(payment_120) from auto_act LEFT OUTER JOIN auto_md1 ON auto_act.ident = auto_md1.ident
LEFT OUTER JOIN md1_product ON auto_md1.md1_id = md1_product.md1_id where type_md = "' . $row['type_md'] . '" and ' . $beetwen_cond;
    $payment_120 = mysql_fetch_row(mysql_query($payment_120));

    $payment_122 = 'select sum(payment_122) from auto_act LEFT OUTER JOIN auto_md1 ON auto_act.ident = auto_md1.ident
LEFT OUTER JOIN md1_product ON auto_md1.md1_id = md1_product.md1_id where type_md = "' . $row['type_md'] . '" and ' . $beetwen_cond;
    $payment_122 = mysql_fetch_row(mysql_query($payment_122));

    $payment_128 = 'select sum(payment_128) from auto_act LEFT OUTER JOIN auto_md1 ON auto_act.ident = auto_md1.ident
LEFT OUTER JOIN md1_product ON auto_md1.md1_id = md1_product.md1_id where type_md = "' . $row['type_md'] . '" and ' . $beetwen_cond;
    $payment_128 = mysql_fetch_row(mysql_query($payment_128));

    $payment_sum = 'select sum(sum_payment) from auto_act LEFT OUTER JOIN auto_md1 ON auto_act.ident = auto_md1.ident
LEFT OUTER JOIN md1_product ON auto_md1.md1_id = md1_product.md1_id where type_md = "' . $row['type_md'] . '" and ' . $beetwen_cond;
    $payment_sum = mysql_fetch_row(mysql_query($payment_sum));

    $count_report_arr[$row['type_md']] = array(
        'amount' => $amount[0],
        //'out' => $out[0],
        //'rezident' => $rezident[0],
        'invoice_value' => $invoice_value[0],
        'payment_120' => $payment_120[0],
        'payment_122' => $payment_122[0],
        'payment_128' => $payment_128[0],
        'sum_payment' => $payment_sum[0],
    );

    $summary_stat_arr = array(
        'amount' => $summary_stat_arr['amount'] + $amount[0],
        //'out' => $summary_stat_arr['out'] + $out[0],
        //'rezident' => $summary_stat_arr['rezident'] + $rezident[0],
        'invoice_value' => $summary_stat_arr['invoice_value'] + $invoice_value[0],
        'payment_120' => $summary_stat_arr['payment_120'] + $payment_120[0],
        'payment_122' => $summary_stat_arr['payment_122'] + $payment_122[0],
        'payment_128' => $summary_stat_arr['payment_128'] + $payment_128[0],
        'sum_payment' => $summary_stat_arr['sum_payment'] + $payment_sum[0],
    );
}

//var_dump($amount);
//-------------------------
$personal_report_arr = [];
$summary_personal_report_arr = [];



$person_sql = 'select * from auto_act LEFT OUTER JOIN auto_md1 ON auto_act.ident = auto_md1.ident  
LEFT OUTER JOIN md1_product ON auto_md1.md1_id = md1_product.md1_id where ' . $beetwen_cond . ' group by insp_md1';
$person_sql = mysql_query($person_sql);

while ($row = mysql_fetch_assoc($person_sql)) {
    $art_arr = [];
    foreach ($count_report_arr as $k => $el) {
        $art_count = 'select count(*) from auto_act LEFT OUTER JOIN auto_md1 ON auto_act.ident = auto_md1.ident  
LEFT OUTER JOIN md1_product ON auto_md1.md1_id = md1_product.md1_id  where ' . $beetwen_cond . ' and type_md = "' . $k . '" and insp_md1 = "' . $row['insp_md1'] . '"';
        $art_count = mysql_fetch_row(mysql_query($art_count));
        $art_arr[$k] = $art_count[0];
        $summary_personal_report_arr[$k] += is_numeric($art_count[0])?$art_count[0]:0;
    }
    $personal_report_arr[$row['insp_md1']] = $art_arr;
}

//-------------------------
$zmina_report_arr = [];
$summary_zmina_report_arr = [];



$zmina_sql = 'select * from auto_act LEFT OUTER JOIN auto_md1 ON auto_act.ident = auto_md1.ident  
LEFT OUTER JOIN md1_product ON auto_md1.md1_id = md1_product.md1_id where ' . $beetwen_cond . ' group by zmina_md1';
$zmina_sql = mysql_query($zmina_sql);

while ($row = mysql_fetch_assoc($zmina_sql)) {
    $art_arr = [];
    foreach ($count_report_arr as $k => $el) {
        $art_count = 'select count(*) from auto_act LEFT OUTER JOIN auto_md1 ON auto_act.ident = auto_md1.ident  
LEFT OUTER JOIN md1_product ON auto_md1.md1_id = md1_product.md1_id where ' . $beetwen_cond . ' and type_md = "' . $k . '" and zmina_md1 = "' . $row['zmina_md1'] . '"';
        $art_count = mysql_fetch_row(mysql_query($art_count));
        $art_arr[$k] = $art_count[0];
        $summary_zmina_report_arr[$k] += is_numeric($art_count[0])?$art_count[0]:0;
    }
    $zmina_report_arr[$row['zmina_md1']] = $art_arr;
}
//-------------------------
$subject_report_arr = [];
$summary_subject_report_arr = [];



$subject_sql = 'select * from auto_act LEFT OUTER JOIN auto_md1 ON auto_act.ident = auto_md1.ident  
LEFT OUTER JOIN md1_product ON auto_md1.md1_id = md1_product.md1_id where ' . $beetwen_cond . '';
$subject_sql = mysql_query($subject_sql);

while ($row = mysql_fetch_assoc($subject_sql)) {
    $art_arr = [];
    foreach ($count_report_arr as $k => $el) {
        $art_count = 'select count(*) from auto_act LEFT OUTER JOIN auto_md1 ON auto_act.ident = auto_md1.ident  
LEFT OUTER JOIN md1_product ON auto_md1.md1_id = md1_product.md1_id where ' . $beetwen_cond . ' and type_md = "' . $k . '" and product_name = "' . $row['product_name'] . '"';
        $art_count = mysql_fetch_row(mysql_query($art_count));
        $art_arr[$k] = $art_count[0];
        $summary_subject_report_arr[$k] += is_numeric($art_count[0])?$art_count[0]:0;
    }
    $subject_report_arr[$row['product_name']] = $art_arr;
}

//var_dump($sql_articles);

//var_dump('product_name');
//var_dump('zmina_md1');

//dump($var);
//-------------------------
?>
<h2 class="headline">Звіт по журналу реєстрації квитанцій МД за період
    з <?= $_POST['date_left'] ?> по <?= $_POST['date_right'] ?> </h2>
<table class="personal_stat_table">
    <tr>
        <td>Тип МД</td>
        <td>К-ть</td>
        <td>Вартість</td>
        <td>120</td>
        <td>122</td>
        <td>128</td>
        <td>Всього</td>
    </tr>
    <? foreach ($count_report_arr as $k => $el): ?>
        <tr>
            <td><?= $k ?></td>
            <? foreach ($el as $el2) : ?>
                <td><?= (is_numeric($el2) ? $el2 : 0) ?></td>
            <? endforeach; ?>
        </tr>
    <? endforeach; ?>
    <tr>
    <tr>
        <td>Всього :</td>
        <? foreach ($summary_stat_arr as $el): ?>
            <td><?=$el?></td>
        <? endforeach ?>
    </tr>
</table>


<table class="personal_stat_table">
    <tr>
        <td></td>
        <? foreach ($count_report_arr as $k => $el): ?>
            <td><?= $k ?></td>
        <? endforeach ?>
    </tr>
    <? foreach ($personal_report_arr as $k => $el) : ?>
        <tr>
            <td><?= $k ?></td>
            <? foreach ($el as $el2): ?>
                <td><?= (is_numeric($el2) ? $el2 : 0) ?></td>
            <? endforeach ?>
        </tr>
    <? endforeach; ?>
    <tr>
        <td>Всього :</td>
        <? foreach ($summary_personal_report_arr as $el): ?>
            <td><?=$el?></td>
        <? endforeach ?>
    </tr>
</table>


<table class="personal_stat_table">
    <tr>
        <td></td>
        <? foreach ($count_report_arr as $k => $el): ?>
            <td><?= $k ?></td>
        <? endforeach ?>
    </tr>
    <? foreach ($zmina_report_arr as $k => $el) : ?>
        <tr>
            <td><?= $k ?></td>
            <? foreach ($el as $el2): ?>
                <td><?= (is_numeric($el2) ? $el2 : 0) ?></td>
            <? endforeach ?>
        </tr>
    <? endforeach; ?>
    <tr>
        <td>Всього :</td>
        <? foreach ($summary_zmina_report_arr as $el): ?>
            <td><?=$el?></td>
        <? endforeach ?>
    </tr>
</table>


<table class="personal_stat_table">
    <tr>
        <td></td>
        <? foreach ($count_report_arr as $k => $el): ?>
            <td><?= $k ?></td>
        <? endforeach ?>
    </tr>
    <? foreach ($subject_report_arr as $k => $el) : ?>
        <tr>
            <td><?= $k ?></td>
            <? foreach ($el as $el2): ?>
                <td><?= (is_numeric($el2) ? $el2 : 0) ?></td>
            <? endforeach ?>
        </tr>
    <? endforeach; ?>
    <tr>
        <td>Всього :</td>
        <? foreach ($summary_subject_report_arr as $el): ?>
            <td><?=$el?></td>
        <? endforeach ?>
    </tr>
</table>

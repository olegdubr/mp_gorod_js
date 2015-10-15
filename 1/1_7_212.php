<?php
$beetwen_cond = '
date_use between
DATE_FORMAT("' . $_POST['date_left'] . '","%y-%m-%d")
AND
DATE_FORMAT("' . $_POST['date_right'] . '","%y-%m-%d")';


//---------------
$count_report_arr = [];
$summary_stat_arr = [];
$sql_articles = 'SELECT * FROM auto_act where' . $beetwen_cond . ' GROUP BY result ';
$sql_articles = mysql_query($sql_articles);

while ($row = mysql_fetch_assoc($sql_articles)) {
    /*$in = 'select sum(num_protocol) from tzmk_act where direction = "Вїзд" and st_mku = "' . $row['st_mku'] . '" and ' . $beetwen_cond;
    $in = mysql_fetch_row(mysql_query($in));*/

    $in = 'select count(*) from auto_act where direction = "Вїзд" and number_registr != "0" and result = "' . $row['result'] . '" and ' . $beetwen_cond;
    $in = mysql_fetch_row(mysql_query($in));

    $out = 'select count(*) from auto_act where direction = "Виїзд" and number_registr != "0" and result = "' . $row['result'] . '" and ' . $beetwen_cond;
    $out = mysql_fetch_row(mysql_query($out));

    $car = 'select count(*) from auto_act where type_tz = "легковий" and number_registr != "0" and result = "' . $row['result'] . '" and ' . $beetwen_cond;
    $car = mysql_fetch_row(mysql_query($car));

    $truck = 'select count(*) from auto_act where type_tz = "вантажний" and number_registr != "0" and result = "' . $row['result'] . '" and ' . $beetwen_cond;
    $truck = mysql_fetch_row(mysql_query($truck));

    $cargo_passenger = 'select count(*) from auto_act where  type_tz = "вантажопасажир" and number_registr != "0" and result = "' . $row['result'] . '" and ' . $beetwen_cond;
    $cargo_passenger = mysql_fetch_row(mysql_query($cargo_passenger));

    $bus = 'select count(*) from auto_act where  type_tz = "автобус" and number_registr != "0" and result = "' . $row['result'] . '" and ' . $beetwen_cond;
    $bus = mysql_fetch_row(mysql_query($bus));

    $walker = 'select count(*) from auto_act where  type_tz = "пішохід" and number_registr != "0" and result = "' . $row['result'] . '" and ' . $beetwen_cond;
    $walker = mysql_fetch_row(mysql_query($walker));

    $count_report_arr[$row['result']] = array(
        'in' => $in[0],
        'out' => $out[0],
        'car' => $car[0],
        'truck' => $truck[0],
        'cargo_passenger' => $cargo_passenger[0],
        'bus' => $bus[0],
        'walker' => $walker[0],

    );

    $summary_stat_arr = array(
        'in' => $summary_stat_arr['in'] + $in[0],
        'out' => $summary_stat_arr['out'] + $out[0],
        'car' => $summary_stat_arr['car'] + $car[0],
        'truck' => $summary_stat_arr['truck'] + $truck[0],
        'cargo_passenger' => $summary_stat_arr['cargo_passenger'] + $cargo_passenger[0],
        'bus' => $summary_stat_arr['bus'] + $bus[0],
        'walker' => $summary_stat_arr['walker'] + $walker[0],
    );
}
//-------------------------


$count_report2_arr = [];
$summary_stat2_arr = [];
$sql_articles2 = 'SELECT * FROM auto_act where' . $beetwen_cond . ' GROUP BY result ';
$sql_articles2 = mysql_query($sql_articles2);

while ($row = mysql_fetch_assoc($sql_articles2)) {
    /*$in = 'select sum(num_protocol) from tzmk_act where direction = "Вїзд" and st_mku = "' . $row['st_mku'] . '" and ' . $beetwen_cond;
    $in = mysql_fetch_row(mysql_query($in));*/

    $p_1 = 'select count(*) from auto_act where basis = "п.1 ПКМУ №467" and result = "' . $row['result'] . '" and ' . $beetwen_cond;
    $p_1 = mysql_fetch_row(mysql_query($p_1));

    $p_6 = 'select count(*) from auto_act where basis = "п.6 ПКМУ №467" and result = "' . $row['result'] . '" and ' . $beetwen_cond;
    $p_6 = mysql_fetch_row(mysql_query($p_6));

    $p_14 = 'select count(*) from auto_act where basis = "п.14 ПКМУ №467" and result = "' . $row['result'] . '" and ' . $beetwen_cond;
    $p_14 = mysql_fetch_row(mysql_query($p_14));


    $st_339 = 'select count(*) from auto_act where basis = "ст.339 МКУ" and result = "' . $row['result'] . '" and ' . $beetwen_cond;
    $st_339 = mysql_fetch_row(mysql_query($st_339));

    $asaur = 'select count(*) from auto_act where basis = "АСАУР" and result = "' . $row['result'] . '" and ' . $beetwen_cond;
    $asaur = mysql_fetch_row(mysql_query($asaur));

    $sur = 'select count(*) from auto_act where basis = "СУР" and result = "' . $row['result'] . '" and ' . $beetwen_cond;
    $sur = mysql_fetch_row(mysql_query($sur));

    $mo = 'select count(*) from auto_act where autor = "МО" and result = "' . $row['result'] . '" and ' . $beetwen_cond;
    $mo = mysql_fetch_row(mysql_query($mo));

    $dpsu = 'select count(*) from auto_act where autor = "ДПСУ" and result = "' . $row['result'] . '" and ' . $beetwen_cond;
    $dpsu = mysql_fetch_row(mysql_query($dpsu));

    $sbu = 'select count(*) from auto_act where autor = "СБУ" and result = "' . $row['result'] . '" and ' . $beetwen_cond;
    $sbu = mysql_fetch_row(mysql_query($sbu));

    $mvs = 'select count(*) from auto_act where autor = "МВС" and result = "' . $row['result'] . '" and ' . $beetwen_cond;
    $mvs = mysql_fetch_row(mysql_query($mvs));

    $count_report2_arr[$row['result']] = array(

        'p_1' => $p_1[0],
        'p_6' => $p_6[0],
        'p_14' => $p_14[0],
        'st_339' => $st_339[0],
        'asaur' => $asaur[0],
        'sur' => $sur[0],
        'mo' => $mo[0],
        'dpsu' => $dpsu[0],
        'sbu' => $sbu[0],
        'mvs' => $mvs[0],
    );

    $summary_stat2_arr = array(

        'p_1' => $summary_stat2_arr['p_1'] + $p_1[0],
        'p_6' => $summary_stat2_arr['p_6'] + $p_6[0],
        'p_14' => $summary_stat2_arr['p_14'] + $p_14[0],
        'st_339' => $summary_stat2_arr['st_339'] + $st_339[0],
        'asaur' => $summary_stat2_arr['asaur'] + $asaur[0],
        'sur' => $summary_stat2_arr['sur'] + $sur[0],
        'mo' => $summary_stat2_arr['mo'] + $mo[0],
        'dpsu' => $summary_stat2_arr['dpsu'] + $dpsu[0],
        'sbu' => $summary_stat2_arr['sbu'] + $sbu[0],
        'mvs' => $summary_stat2_arr['mvs'] + $mvs[0],

    );
}

// -------------------------------------------------------------------
$amo_report_arr = [];
$summary_amo_report_arr = [];



$amo_sql = 'select * from auto_act JOIN auto_pmp USING(ident) where ' . $beetwen_cond . ' group by st_mku';
$amo_sql = mysql_query($amo_sql);

while ($row = mysql_fetch_assoc($amo_sql)) {
    $art_arr = [];
    foreach ($count_report_arr as $k => $el) {
        $art_count = 'select count(*) from auto_act JOIN auto_pmp USING(ident) where number_registr != "0" and ' . $beetwen_cond . ' and result = "' . $k . '" and st_mku = "' . $row['st_mku'] . '"';
        $art_count = mysql_fetch_row(mysql_query($art_count));
        $art_arr[$k] = $art_count[0];
        $summary_amo_report_arr[$k] += is_numeric($art_count[0])?$art_count[0]:0;
    }
    $amo_report_arr[$row['st_mku']] = $art_arr;
}

//-------------------------</form>

?>


<h2 class="headline">Звіт по журналу реєстрації Актів митного огляду товарів та ТЗ комерційного призначення за період
    з <?= $_POST['date_left'] ?> по <?= $_POST['date_right'] ?> </h2>
<table class="personal_stat_table">
    <tr>
        <td>Результат</td>
        <td>Вїзд</td>
        <td>Виїзд</td>
        <td>Легковий</td>
        <td>Вантажний</td>
        <td>ВП</td>
        <td>Автобус</td>
        <td>Пішохід</td>
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
        <td>Всього :</td>
        <? foreach ($summary_stat_arr as $el): ?>
            <td><?= $el ?></td>
        <? endforeach ?>
    </tr>
</table>


<table class="personal_stat_table">
    <tr>
        <td>Результат</td>
        <td>п.1</td>
        <td>п.6</td>
        <td>п.14</td>
        <td>ст.339</td>
        <td>АСАУР</td>
        <td>СУР</td>
        <td>МО</td>
        <td>ДПСУ</td>
        <td>СБУ</td>
        <td>МВС</td>
    </tr>
    <? foreach ($count_report2_arr as $k => $el): ?>
        <tr>
            <td><?= $k ?></td>
            <? foreach ($el as $el2) : ?>
                <td><?= (is_numeric($el2) ? $el2 : 0) ?></td>
            <? endforeach; ?>
        </tr>
    <? endforeach; ?>
    <tr>
        <td>Всього :</td>
        <? foreach ($summary_stat2_arr as $el): ?>
            <td><?= $el ?></td>
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
    <? foreach ($amo_report_arr as $k => $el) : ?>
        <tr>
            <td><?= $k ?></td>
            <? foreach ($el as $el2): ?>
                <td><?= (is_numeric($el2) ? $el2 : 0) ?></td>
            <? endforeach ?>
        </tr>
    <? endforeach; ?>
    <tr>
        <td>Всього :</td>
        <? foreach ($summary_amo_report_arr as $el): ?>
            <td><?=$el?></td>
        <? endforeach ?>
    </tr>
</table>
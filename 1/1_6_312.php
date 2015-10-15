<?php
$beetwen_cond = '
date_use between
DATE_FORMAT("' . $_POST['date_left'] . '","%y-%m-%d")
AND
DATE_FORMAT("' . $_POST['date_right'] . '","%y-%m-%d")';


//---------------
$count_report_arr = [];
$summary_stat_arr = [];

$sql_articles = 'SELECT * FROM auto_act LEFT OUTER JOIN auto_pmp ON auto_act.ident = auto_pmp.ident  
LEFT OUTER JOIN auto_md1 ON auto_act.ident = auto_md1.ident 
LEFT OUTER JOIN auto_notice ON auto_act.ident = auto_notice.ident 
RIGHT OUTER JOIN auto_tzmk ON auto_act.ident = auto_tzmk.ident  
where' . $beetwen_cond . ' and tzmk_1 != "" GROUP BY tzmk_1 ';
$sql_articles = mysql_query($sql_articles);

while ($row = mysql_fetch_assoc($sql_articles)) {
    /*$in = 'select sum(num_protocol) from tzmk_act where direction = "Вїзд" and st_mku = "' . $row['st_mku'] . '" and ' . $beetwen_cond;
    $in = mysql_fetch_row(mysql_query($in));*/

    /*$in = 'select count(*) from tzmk_act where direction = "Вїзд" and tzmk_1 = "' . $row['tzmk_1'] . '" and ' . $beetwen_cond;
    $in = mysql_fetch_row(mysql_query($in));*/

    /*$out = 'select count(*) from tzmk_act where direction = "Виїзд" and tzmk_1 = "' . $row['tzmk_1'] . '" and ' . $beetwen_cond;
    $out = mysql_fetch_row(mysql_query($out));*/

    $car = 'select count(*) from tzmk_act where type_tz = "легковий" and tzmk_1 = "' . $row['tzmk_1'] . '" and ' . $beetwen_cond;
    $car = mysql_fetch_row(mysql_query($car));

    $truck = 'select count(*) from tzmk_act where type_tz = "вантажний" and tzmk_1 = "' . $row['tzmk_1'] . '" and ' . $beetwen_cond;
    $truck = mysql_fetch_row(mysql_query($truck));

    $cargo_passenger = 'select count(*) from tzmk_act where  type_tz = "вантажопасажир" and tzmk_1 = "' . $row['tzmk_1'] . '" and ' . $beetwen_cond;
    $cargo_passenger = mysql_fetch_row(mysql_query($cargo_passenger));

    $bus = 'select count(*) from tzmk_act where  type_tz = "автобус" and tzmk_1 = "' . $row['tzmk_1'] . '" and ' . $beetwen_cond;
    $bus = mysql_fetch_row(mysql_query($bus));

    $walker = 'select count(*) from tzmk_act where  type_tz = "пішохід" and tzmk_1 = "' . $row['tzmk_1'] . '" and ' . $beetwen_cond;
    $walker = mysql_fetch_row(mysql_query($walker));

    $application = 'select count(*) from tzmk_act where result != "" and tzmk_1 = "' . $row['tzmk_1'] . '" and ' . $beetwen_cond;
    $application = mysql_fetch_row(mysql_query($application));

    $detection = 'select sum(num_protocol) from tzmk_act where tzmk_1 = "' . $row['tzmk_1'] . '" and ' . $beetwen_cond;
    $detection = mysql_fetch_row(mysql_query($detection));



    $count_report_arr[$row['tzmk_1']] = array(
        'car' => $car[0],
        'truck' => $truck[0],
        'cargo_passenger' => $cargo_passenger[0],
        'bus' => $bus[0],
        'walker' => $walker[0],
        'application' => $application[0],
        'detection' => $detection[0],
    );

    $summary_stat_arr = array(
        'car' => $summary_stat_arr['car'] + $car[0],
        'truck' => $summary_stat_arr['truck'] + $truck[0],
        'cargo_passenger' => $summary_stat_arr['cargo_passenger'] + $penalty[0],
        'bus' => $summary_stat_arr['bus'] + $bus[0],
        'walker' => $summary_stat_arr['walker'] + $walker[0],
        'application' => $summary_stat_arr['application'] + $application[0],
        'detection' => $summary_stat_arr['detection'] + $detection[0],
    );
}
// tzmk_2 -----------------------------------------


$count_report2_arr = [];
$summary_stat2_arr = [];
$sql_articles = 'SELECT * FROM tzmk_act where' . $beetwen_cond . ' and tzmk_2 != "" GROUP BY tzmk_2 ';
$sql_articles = mysql_query($sql_articles);

while ($row = mysql_fetch_assoc($sql_articles)) {
    /*$in = 'select sum(num_protocol) from tzmk_act where direction = "Вїзд" and st_mku = "' . $row['st_mku'] . '" and ' . $beetwen_cond;
    $in = mysql_fetch_row(mysql_query($in));*/

    /*$in = 'select count(*) from tzmk_act where direction = "Вїзд" and tzmk_1 = "' . $row['tzmk_1'] . '" and ' . $beetwen_cond;
    $in = mysql_fetch_row(mysql_query($in));*/

    /*$out = 'select count(*) from tzmk_act where direction = "Виїзд" and tzmk_1 = "' . $row['tzmk_1'] . '" and ' . $beetwen_cond;
    $out = mysql_fetch_row(mysql_query($out));*/

    $car = 'select count(*) from tzmk_act where type_tz = "легковий" and tzmk_2 = "' . $row['tzmk_2'] . '" and ' . $beetwen_cond;
    $car = mysql_fetch_row(mysql_query($car));

    $truck = 'select count(*) from tzmk_act where type_tz = "вантажний" and tzmk_2 = "' . $row['tzmk_2'] . '" and ' . $beetwen_cond;
    $truck = mysql_fetch_row(mysql_query($truck));

    $cargo_passenger = 'select count(*) from tzmk_act where  type_tz = "вантажопасажир" and tzmk_2 = "' . $row['tzmk_2'] . '" and ' . $beetwen_cond;
    $cargo_passenger = mysql_fetch_row(mysql_query($cargo_passenger));

    $bus = 'select count(*) from tzmk_act where  type_tz = "автобус" and tzmk_2 = "' . $row['tzmk_2'] . '" and ' . $beetwen_cond;
    $bus = mysql_fetch_row(mysql_query($bus));

    $walker = 'select count(*) from tzmk_act where  type_tz = "пішохід" and tzmk_2 = "' . $row['tzmk_2'] . '" and ' . $beetwen_cond;
    $walker = mysql_fetch_row(mysql_query($walker));

    $application = 'select count(*) from tzmk_act where result != "" and tzmk_2 = "' . $row['tzmk_2'] . '" and ' . $beetwen_cond;
    $application = mysql_fetch_row(mysql_query($application));

    $detection = 'select sum(num_protocol) from tzmk_act where tzmk_2 = "' . $row['tzmk_2'] . '" and ' . $beetwen_cond;
    $detection = mysql_fetch_row(mysql_query($detection));



    $count_report2_arr[$row['tzmk_2']] = array(
        'car' => $car[0],
        'truck' => $truck[0],
        'cargo_passenger' => $cargo_passenger[0],
        'bus' => $bus[0],
        'walker' => $walker[0],
        'application' => $application[0],
        'detection' => $detection[0],
    );

    $summary_stat2_arr = array(
        'car' => $summary_stat2_arr['car'] + $car[0],
        'truck' => $summary_stat2_arr['truck'] + $truck[0],
        'cargo_passenger' => $summary_stat2_arr['cargo_passenger'] + $penalty[0],
        'bus' => $summary_stat2_arr['bus'] + $bus[0],
        'walker' => $summary_stat2_arr['walker'] + $walker[0],
        'application' => $summary_stat2_arr['application'] + $application[0],
        'detection' => $summary_stat2_arr['detection'] + $detection[0],
    );
}


// tzmk_3 -----------------------------------------



$count_report3_arr = [];
$summary_stat3_arr = [];
$sql_articles = 'SELECT * FROM tzmk_act where' . $beetwen_cond . ' and tzmk_3 != "" GROUP BY tzmk_3 ';
$sql_articles = mysql_query($sql_articles);

while ($row = mysql_fetch_assoc($sql_articles)) {
    /*$in = 'select sum(num_protocol) from tzmk_act where direction = "Вїзд" and st_mku = "' . $row['st_mku'] . '" and ' . $beetwen_cond;
    $in = mysql_fetch_row(mysql_query($in));*/

    /*$in = 'select count(*) from tzmk_act where direction = "Вїзд" and tzmk_1 = "' . $row['tzmk_1'] . '" and ' . $beetwen_cond;
    $in = mysql_fetch_row(mysql_query($in));*/

    /*$out = 'select count(*) from tzmk_act where direction = "Виїзд" and tzmk_1 = "' . $row['tzmk_1'] . '" and ' . $beetwen_cond;
    $out = mysql_fetch_row(mysql_query($out));*/

    $car = 'select count(*) from tzmk_act where type_tz = "легковий" and tzmk_3 = "' . $row['tzmk_3'] . '" and ' . $beetwen_cond;
    $car = mysql_fetch_row(mysql_query($car));

    $truck = 'select count(*) from tzmk_act where type_tz = "вантажний" and tzmk_3 = "' . $row['tzmk_3'] . '" and ' . $beetwen_cond;
    $truck = mysql_fetch_row(mysql_query($truck));

    $cargo_passenger = 'select count(*) from tzmk_act where  type_tz = "вантажопасажир" and tzmk_3 = "' . $row['tzmk_3'] . '" and ' . $beetwen_cond;
    $cargo_passenger = mysql_fetch_row(mysql_query($cargo_passenger));

    $bus = 'select count(*) from tzmk_act where  type_tz = "автобус" and tzmk_3 = "' . $row['tzmk_3'] . '" and ' . $beetwen_cond;
    $bus = mysql_fetch_row(mysql_query($bus));

    $walker = 'select count(*) from tzmk_act where  type_tz = "пішохід" and tzmk_3 = "' . $row['tzmk_3'] . '" and ' . $beetwen_cond;
    $walker = mysql_fetch_row(mysql_query($walker));

    $application = 'select count(*) from tzmk_act where result != "" and tzmk_3 = "' . $row['tzmk_3'] . '" and ' . $beetwen_cond;
    $application = mysql_fetch_row(mysql_query($application));

    $detection = 'select sum(num_protocol) from tzmk_act where tzmk_3 = "' . $row['tzmk_3'] . '" and ' . $beetwen_cond;
    $detection = mysql_fetch_row(mysql_query($detection));



    $count_report3_arr[$row['tzmk_3']] = array(
        'car' => $car[0],
        'truck' => $truck[0],
        'cargo_passenger' => $cargo_passenger[0],
        'bus' => $bus[0],
        'walker' => $walker[0],
        'application' => $application[0],
        'detection' => $detection[0],
    );

    $summary_stat3_arr = array(
        'car' => $summary_stat3_arr['car'] + $car[0],
        'truck' => $summary_stat3_arr['truck'] + $truck[0],
        'cargo_passenger' => $summary_stat3_arr['cargo_passenger'] + $penalty[0],
        'bus' => $summary_stat3_arr['bus'] + $bus[0],
        'walker' => $summary_stat3_arr['walker'] + $walker[0],
        'application' => $summary_stat3_arr['application'] + $application[0],
        'detection' => $summary_stat3_arr['detection'] + $detection[0],
    );
}

//-------------------------




//-------------------------</form>

?>


<h4 class="headline">Звіт по журналу ефективності використання ТЗМК за період
    з <?= $_POST['date_left'] ?> по <?= $_POST['date_right'] ?> </h4>
<table class="personal_stat_table">
    <tr>
        <td></td>
        <td>Легковий</td>
        <td>Вантажний</td>
        <td>Вантажопасажир</td>
        <td>Автобус</td>
        <td>Пасажир</td>
        <td>К-ть використань</td>
        <td>Результативних</td>
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
        <td></td>
         <td>Легковий</td>
        <td>Вантажний</td>
        <td>Вантажопасажир</td>
        <td>Автобус</td>
        <td>Пасажир</td>
        <td>К-ть використань</td>
        <td>Результативних</td>
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
        <td>Легковий</td>
        <td>Вантажний</td>
        <td>Вантажопасажир</td>
        <td>Автобус</td>
        <td>Пасажир</td>
        <td>К-ть використань</td>
        <td>Результативних</td>
    </tr>
    <? foreach ($count_report3_arr as $k => $el): ?>
        <tr>
            <td><?= $k ?></td>
            <? foreach ($el as $el2) : ?>
                <td><?= (is_numeric($el2) ? $el2 : 0) ?></td>
            <? endforeach; ?>
        </tr>
    <? endforeach; ?>
    <tr>
        <td>Всього :</td>
        <? foreach ($summary_stat3_arr as $el): ?>
            <td><?= $el ?></td>
        <? endforeach ?>
    </tr>
</table>


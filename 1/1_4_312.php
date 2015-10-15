<?php
$beetwen_cond = '
date_use between
DATE_FORMAT("' . $_POST['date_left'] . '","%y-%m-%d")
AND
DATE_FORMAT("' . $_POST['date_right'] . '","%y-%m-%d")';


//---------------
$count_report_arr = [];
$summary_stat_arr = [];

$sql_articles = 'SELECT * FROM auto_pmp LEFT OUTER JOIN auto_act ON auto_pmp.ident = auto_act.ident where' . $beetwen_cond . ' GROUP BY st_mku ';
$sql_articles = mysql_query($sql_articles);

while ($row = mysql_fetch_assoc($sql_articles)) {
    $in = 'select count(*) from auto_pmp LEFT OUTER JOIN auto_act ON auto_pmp.ident = auto_act.ident where direction = "Вїзд" and st_mku = "' . $row['st_mku'] . '" and ' . $beetwen_cond;
    $in = mysql_fetch_row(mysql_query($in));

    /*$in = 'select count(*) from tzmk_act where direction = "Вїзд" and st_mku = "' . $row['st_mku'] . '" and ' . $beetwen_cond;
    $in = mysql_fetch_row(mysql_query($in));*/

    $out = 'select count(*) from auto_pmp LEFT OUTER JOIN auto_act ON auto_pmp.ident = auto_act.ident where direction = "Виїзд" and st_mku = "' . $row['st_mku'] . '" and ' . $beetwen_cond;
    $out = mysql_fetch_row(mysql_query($out));

    $rezident = 'select count(*) from auto_pmp LEFT OUTER JOIN auto_act ON auto_pmp.ident = auto_act.ident where sitizen = "так" and st_mku = "' . $row['st_mku'] . '" and ' . $beetwen_cond;
    $rezident = mysql_fetch_row(mysql_query($rezident));

    $not_rezident = 'select count(*) from auto_pmp LEFT OUTER JOIN auto_act ON auto_pmp.ident = auto_act.ident where sitizen = "ні" and st_mku = "' . $row['st_mku'] . '" and ' . $beetwen_cond;
    $not_rezident = mysql_fetch_row(mysql_query($not_rezident));


    $price = 'select sum(price) from auto_pmp LEFT OUTER JOIN auto_act ON auto_pmp.ident = auto_act.ident where st_mku = "' . $row['st_mku'] . '" and ' . $beetwen_cond;
    $price = mysql_fetch_row(mysql_query($price));

    $penalty = 'select sum(penalty) from auto_pmp LEFT OUTER JOIN auto_act ON auto_pmp.ident = auto_act.ident where st_mku = "' . $row['st_mku'] . '" and ' . $beetwen_cond;
    $penalty = mysql_fetch_row(mysql_query($penalty));

    $status_penalty = 'select sum(penalty) from auto_pmp LEFT OUTER JOIN auto_act ON auto_pmp.ident = auto_act.ident where status_penalty = "так" and st_mku = "' . $row['st_mku'] . '" and ' . $beetwen_cond;
    $status_penalty = mysql_fetch_row(mysql_query($status_penalty));

    $seizure = 'select sum(seizure) from auto_pmp LEFT OUTER JOIN auto_act ON auto_pmp.ident = auto_act.ident where st_mku = "' . $row['st_mku'] . '" and ' . $beetwen_cond;
    $seizure = mysql_fetch_row(mysql_query($seizure));

    $count_report_arr[$row['st_mku']] = array(
        'in' => $in[0],
        'out' => $out[0],
        'rezident' => $rezident[0],
        'not_rezident' => $not_rezident[0],
        'price' => $price[0],
        'penalty' => $penalty[0],
        'status_penalty' => $status_penalty[0],
        'seizure' => $seizure[0],
    );

    $summary_stat_arr = array(
        'in' => $summary_stat_arr['in'] + $in[0],
        'out' => $summary_stat_arr['out'] + $out[0],
        'rezident' => $summary_stat_arr['rezident'] + $rezident[0],
        'not_rezident' => $summary_stat_arr['not_rezident'] + $not_rezident[0],
        'price' => $summary_stat_arr['price'] + $price[0],
        'penalty' => $summary_stat_arr['penalty'] + $penalty[0],
        'status_penalty' => $summary_stat_arr['status_penalty'] + $status_penalty[0],
        'seizure' => $summary_stat_arr['seizure'] + $seizure[0],
    );
}
//-------------------------
$personal_report_arr = [];
$summary_personal_report_arr = [];



$person_sql = 'select * from auto_pmp LEFT OUTER JOIN auto_act ON auto_pmp.ident = auto_act.ident where ' . $beetwen_cond . ' and st_mku != "" group by insp_pmp';
$person_sql = mysql_query($person_sql);

while ($row = mysql_fetch_assoc($person_sql)) {
    $art_arr = [];
    foreach ($count_report_arr as $k => $el) {
        $art_count = 'select count(*) from auto_pmp LEFT OUTER JOIN auto_act ON auto_pmp.ident = auto_act.ident  where ' . $beetwen_cond . ' and st_mku = "' . $k . '" and insp_pmp = "' . $row['insp_pmp'] . '"';
        $art_count = mysql_fetch_row(mysql_query($art_count));
        $art_arr[$k] = $art_count[0];
        $summary_personal_report_arr[$k] += is_numeric($art_count[0])?$art_count[0]:0;
    }
    $personal_report_arr[$row['insp_pmp']] = $art_arr;
}

//-------------------------
$zmina_report_arr = [];
$summary_zmina_report_arr = [];



$zmina_sql = 'select * from auto_pmp LEFT OUTER JOIN auto_act ON auto_pmp.ident = auto_act.ident  where ' . $beetwen_cond . ' and st_mku != "" group by zmina_pmp';
$zmina_sql = mysql_query($zmina_sql);

while ($row = mysql_fetch_assoc($zmina_sql)) {
    $art_arr = [];
    foreach ($count_report_arr as $k => $el) {
        $art_count = 'select count(*) from auto_pmp LEFT OUTER JOIN auto_act ON auto_pmp.ident = auto_act.ident where ' . $beetwen_cond . ' and st_mku = "' . $k . '" and zmina_pmp = "' . $row['zmina_pmp'] . '"';
        $art_count = mysql_fetch_row(mysql_query($art_count));
        $art_arr[$k] = $art_count[0];
        $summary_zmina_report_arr[$k] += is_numeric($art_count[0])?$art_count[0]:0;
    }
    $zmina_report_arr[$row['zmina_pmp']] = $art_arr;
}
//-------------------------
$subject_report_arr = [];
$summary_subject_report_arr = [];



$subject_sql = 'select * from auto_pmp LEFT OUTER JOIN auto_act ON auto_pmp.ident = auto_act.ident  where ' . $beetwen_cond . ' and st_mku != "" group by subject';
$subject_sql = mysql_query($subject_sql);

while ($row = mysql_fetch_assoc($subject_sql)) {
    $art_arr = [];
    foreach ($count_report_arr as $k => $el) {
        $art_count = 'select count(*) from auto_pmp LEFT OUTER JOIN auto_act ON auto_pmp.ident = auto_act.ident where ' . $beetwen_cond . ' and st_mku = "' . $k . '" and subject = "' . $row['subject'] . '"';
        $art_count = mysql_fetch_row(mysql_query($art_count));
        $art_arr[$k] = $art_count[0];
        $summary_subject_report_arr[$k] += is_numeric($art_count[0])?$art_count[0]:0;
    }
    $subject_report_arr[$row['subject']] = $art_arr;
}

//dump($var);
//-------------------------
?>
<h2 class="headline">Звіт по журналу реєстрації протоколів про ПМП за період
    з <?= $_POST['date_left'] ?> по <?= $_POST['date_right'] ?> </h2>
<table class="personal_stat_table">
    <tr>
        <td>Статті</td>
        <td>Вїзд</td>
        <td>Виїзд</td>
        <td>Резидент</td>
        <td>Не резидент</td>
        <td>Вартість</td>
        <td>Штраф</td>
        <td>Сплачено</td>
        <td>Конфіскат</td>
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

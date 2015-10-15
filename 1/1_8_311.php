<?php


db_connect();


echo " Звіт облік використання ТЗМК при здійсненні митного контролю<p>";
echo " за період з ".$_POST['date_left']." по ".$_POST['date_right']."<p>";


$sql = 'SELECT count(*) cs FROM tzmk_act where date_use between

DATE_FORMAT("'.$_POST['date_left'].'","%y-%m-%d")

AND

DATE_FORMAT("'.$_POST['date_right'].'","%y-%m-%d")';

$result = mysql_query($sql) or die(mysql_error());
while ($a = mysql_fetch_assoc($result))
{
echo $a["table"]." - ". $a["cs"]."&nbsp;&nbsp;|&nbsp;&nbsp;";

 }
echo " - Всього оформлено Актів митного огляду<p>";




$sql = 'SELECT result, count(*) cs FROM tzmk_act where date_use between

DATE_FORMAT("'.$_POST['date_left'].'","%y-%m-%d")

AND

DATE_FORMAT("'.$_POST['date_right'].'","%y-%m-%d") GROUP BY result';

$result = mysql_query($sql) or die(mysql_error());

while ($a = mysql_fetch_assoc($result))
{
echo $a["result"]." - ". $a["cs"]."&nbsp;&nbsp;|&nbsp;&nbsp;";

 }
echo " - отримані результати<p>";



$sql = 'SELECT autor, count(*) cs FROM tzmk_act where date_use between

DATE_FORMAT("'.$_POST['date_left'].'","%y-%m-%d")

AND

DATE_FORMAT("'.$_POST['date_right'].'","%y-%m-%d") GROUP BY autor LIMIT 10';

$result = mysql_query($sql) or die(mysql_error());
while ($a = mysql_fetch_assoc($result))
{
echo $a["autor"]." - ". $a["cs"]."&nbsp;&nbsp;|&nbsp;&nbsp;";

 }
echo " - ініціатор проведення МО<p>";



$sql = 'SELECT basis, count(*) cs FROM tzmk_act where date_use between

DATE_FORMAT("'.$_POST['date_left'].'","%y-%m-%d")

AND

DATE_FORMAT("'.$_POST['date_right'].'","%y-%m-%d") GROUP BY basis LIMIT 10';

$result = mysql_query($sql) or die(mysql_error());
while ($a = mysql_fetch_assoc($result))
{
echo $a["basis"]." - ". $a["cs"]."&nbsp;&nbsp;|&nbsp;&nbsp;";

 }
echo " - підстава для проведення МО<p>";



$sql = 'SELECT type_tz, count(*) cs FROM tzmk_act where date_use between

DATE_FORMAT("'.$_POST['date_left'].'","%y-%m-%d")

AND

DATE_FORMAT("'.$_POST['date_right'].'","%y-%m-%d") GROUP BY type_tz LIMIT 10';

$result = mysql_query($sql) or die(mysql_error());
while ($a = mysql_fetch_assoc($result))
{
echo $a["type_tz"]." - ". $a["cs"]."&nbsp;&nbsp;|&nbsp;&nbsp;";

 }
echo " - оглянуті наступні типи ТЗ<p>";




$query=mysql_query('SELECT SUM(num_protocol) FROM tzmk_act where date_use between

DATE_FORMAT("'.$_POST['date_left'].'","%y-%m-%d")

AND

DATE_FORMAT("'.$_POST['date_right'].'","%y-%m-%d")');

$sum_protocol=mysql_result($query,0);
echo $sum_protocol. " - складено протоколів ПМП<p>"; 




$sql = 'SELECT st_mku, count(*) cs FROM tzmk_act where date_use between

DATE_FORMAT("'.$_POST['date_left'].'","%y-%m-%d")

AND

DATE_FORMAT("'.$_POST['date_right'].'","%y-%m-%d") GROUP BY st_mku LIMIT 10';


$result = mysql_query($sql) or die(mysql_error());
while ($a = mysql_fetch_assoc($result))
{
echo $a["st_mku"]." - ". $a["cs"]."&nbsp;&nbsp;|&nbsp;&nbsp;";

 }
echo " - по статтям МКУ<p>";




$query=mysql_query('SELECT SUM(num_sbu) FROM tzmk_act where date_use between

DATE_FORMAT("'.$_POST['date_left'].'","%y-%m-%d")

AND

DATE_FORMAT("'.$_POST['date_right'].'","%y-%m-%d")');

$sum_sbu=mysql_result($query,0);
echo $sum_sbu. " - відправлено повідомлень в УСБУ<p>"; 




$query=mysql_query('SELECT SUM(num_mvs) FROM tzmk_act where date_use between

DATE_FORMAT("'.$_POST['date_left'].'","%y-%m-%d")

AND

DATE_FORMAT("'.$_POST['date_right'].'","%y-%m-%d")');

$sum_mvs=mysql_result($query,0);
echo $sum_mvs. " - відправлено повідомлень в УМВС<p>"; 




$query=mysql_query('SELECT SUM(num_md1) FROM tzmk_act where date_use between

DATE_FORMAT("'.$_POST['date_left'].'","%y-%m-%d")

AND

DATE_FORMAT("'.$_POST['date_right'].'","%y-%m-%d")');

$sum_md1=mysql_result($query,0);
echo $sum_md1. " - оформлено квитанцій МД-1<p>"; 




$query=mysql_query('SELECT SUM(price) FROM tzmk_act where date_use between

DATE_FORMAT("'.$_POST['date_left'].'","%y-%m-%d")

AND

DATE_FORMAT("'.$_POST['date_right'].'","%y-%m-%d")');

  $sum_price=mysql_result($query,0);
  echo $sum_price." - митна вартість<p>"; 




$query=mysql_query('SELECT SUM(penalty) FROM tzmk_act where date_use between

DATE_FORMAT("'.$_POST['date_left'].'","%y-%m-%d")

AND

DATE_FORMAT("'.$_POST['date_right'].'","%y-%m-%d")');

  $sum_penalty=mysql_result($query,0);
  echo $sum_penalty." - штраф<p>"; 




  $query=mysql_query('SELECT SUM(seizure) FROM tzmk_act where date_use between

DATE_FORMAT("'.$_POST['date_left'].'","%y-%m-%d")

AND

DATE_FORMAT("'.$_POST['date_right'].'","%y-%m-%d")');

  $sum_seizure=mysql_result($query,0);
  echo $sum_seizure." - конфіскація<p>"; 




echo " Були використані наступні ТЗМК<p>";

 $sql = 'SELECT tzmk_1, count(*) cs FROM tzmk_act where date_use between

DATE_FORMAT("'.$_POST['date_left'].'","%y-%m-%d")

AND

DATE_FORMAT("'.$_POST['date_right'].'","%y-%m-%d") GROUP BY tzmk_1';

$result = mysql_query($sql) or die(mysql_error());
while ($a = mysql_fetch_assoc($result))
{

echo $a["tzmk_1"]." - ". $a["cs"]."&nbsp;&nbsp;|&nbsp;&nbsp;";

}

echo " +<p>";



 $sql = 'SELECT tzmk_2, count(*) cs FROM tzmk_act where date_use between

DATE_FORMAT("'.$_POST['date_left'].'","%y-%m-%d")

AND

DATE_FORMAT("'.$_POST['date_right'].'","%y-%m-%d") GROUP BY tzmk_2';

$result = mysql_query($sql) or die(mysql_error());
while ($a = mysql_fetch_assoc($result))
{


echo $a["tzmk_2"]." - ". $a["cs"]."&nbsp;&nbsp;|&nbsp;&nbsp;";

}

echo " +<p>";



 $sql = 'SELECT tzmk_3, count(*) cs FROM tzmk_act where date_use between

DATE_FORMAT("'.$_POST['date_left'].'","%y-%m-%d")

AND

DATE_FORMAT("'.$_POST['date_right'].'","%y-%m-%d") GROUP BY tzmk_3';

$result = mysql_query($sql) or die(mysql_error());
while ($a = mysql_fetch_assoc($result))
{


echo $a["tzmk_3"]." - ". $a["cs"]."&nbsp;&nbsp;|&nbsp;&nbsp;";

}



?>

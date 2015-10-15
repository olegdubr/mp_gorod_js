

<?php




db_connect();




my $tbl_str = make_table_from_query (
$dbh, 

'SELECT type_tz, count(*) cs FROM tzmk_act where date_use between

DATE_FORMAT("'.$_POST['date_left'].'","%y-%m-%d")

AND

DATE_FORMAT("'.$_POST['date_right'].'","%y-%m-%d") GROUP BY type_tz LIMIT 10');



print $tbl_str;



?>





$sql = 'SELECT type_tz, count(*) cs FROM tzmk_act where date_use between

DATE_FORMAT("'.$_POST['date_left'].'","%y-%m-%d")

AND

DATE_FORMAT("'.$_POST['date_right'].'","%y-%m-%d") GROUP BY type_tz LIMIT 10';


$result = mysql_query($sql) or die(mysql_error());
while ($a = mysql_fetch_assoc($result))
{
echo $a["type_tz"]." - ". $a["cs"]."&nbsp;&nbsp;|&nbsp;&nbsp;";

 }


//
  var_dump ($sql); 


//
$type = "cars";

$result = mysql_query("SELECT `id` FROM `magazine` WHERE `type` = '$type'");
$numrow = mysql_num_rows($result);
echo "<p>В магазине по типу: $type всего $numrow записей.</p>";




$sql = 'SELECT autor, count(*) cs FROM tzmk_act where date_use between

DATE_FORMAT("'.$_POST['date_left'].'","%y-%m-%d")

AND

DATE_FORMAT("'.$_POST['date_right'].'","%y-%m-%d") GROUP BY type_tz LIMIT 10';

$result = mysql_query($sql) or die(mysql_error());
while ($a = mysql_fetch_assoc($result))
{
echo $a["autor"]." - ". $a["cs"]."&nbsp;&nbsp;|&nbsp;&nbsp;";

 }



SELECT Name 
FROM Teacher
WHERE (Post, Tel) = 
(
SELECT Post, Tel FROM Teacher WHERE UPPER(Name)='КОЛЗУТИН'
) 
AND UPPER(Name) <> 'КОЛЗУТИН';





SELECT имя_столбца FROM имя_таблицы WHERE часть условия IN (SELECT имя_столбца FROM имя_таблицы WHERE часть условия IN (SELECT имя_столбца FROM имя_таблицы WHERE условие) ) ;

SELECT имя_столбца FROM имя_таблицы WHERE часть условия IN (
  SELECT имя_столбца FROM имя_таблицы WHERE часть условия IN (
    SELECT имя_столбца FROM имя_таблицы WHERE условие) 
  ) 
;

//
$type = "ПМП не виявлено";
$sql = SELECT result, count(*) cs FROM tzmk_act where result = '$type' IN (
SELECT * FROM tzmk_act WHERE date_use between

DATE_FORMAT("'.$_POST['date_left'].'","%y-%m-%d")

AND

DATE_FORMAT("'.$_POST['date_right'].'","%y-%m-%d")

)'
;

$numrow = mysql_num_rows($sql);

echo "<p>В магазине по типу: $type всего $numrow записей.</p>";



// цей треба зробити 
 $sql = 'SELECT tzmk_1, count(*) cs FROM tzmk_act 

 where tzmk_1 = (

SELECT tzmk_1 FROM tzmk_act
UNION ALL
SELECT tzmk_2 FROM tzmk_act
UNION ALL
SELECT tzmk_3 FROM tzmk_act

';

$result = mysql_query($sql) or die(mysql_error());
while ($a = mysql_fetch_assoc($result))
{


echo $a["tzmk_1"]." - ". $a["cs"]."&nbsp;&nbsp;|&nbsp;&nbsp;";

}

// цей робочий

echo " Були використані наступні ТЗМК<p>";

 $sql = 'SELECT tzmk_1, count(*) cs FROM tzmk_act where date_use between

DATE_FORMAT("'.$_POST['date_left'].'","%y-%m-%d")

AND

DATE_FORMAT("'.$_POST['date_right'].'","%y-%m-%d") GROUP BY type_tz';

$result = mysql_query($sql) or die(mysql_error());
while ($a = mysql_fetch_assoc($result))
{


echo $a["tzmk_1"]." - ". $a["cs"]."&nbsp;&nbsp;|&nbsp;&nbsp;";

}




//
SELECT name, price, warranty_available, exclusive_offer
FROM Products
UNION ALL
SELECT name, price, guarantee_available, exclusive_offer
FROM Services;

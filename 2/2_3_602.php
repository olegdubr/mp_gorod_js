<?

$sql='DELETE FROM main_mdp_out WHERE order_number_mdp = "'.$_POST['order_number_mdp'].'"';


db_connect();


$result=mysql_query($sql)?"Успіх! Запис ".$_POST['order_number_mdp']." видалений":"Помилка".mysql_errno().":".mysql_error();

echo $result;


?>
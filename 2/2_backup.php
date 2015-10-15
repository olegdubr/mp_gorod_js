<?php

$host = "localhost";  // имя сервера   
$user = "root";       // имя пользователя
$password = "12345";       // пароль
$db_name = "mp_gorod";     // имя базы данных
$dump_dir = "d://www/backup/"; // директория, куда будем сохранять резервную копию БД
$i=0;
$link = mysql_connect($host, $user, $password) or die( "Сервер базы данных не доступен" );
$db = mysql_select_db($db_name) or die( "База данных не доступна" );
$tables = "SHOW TABLES";
$res = mysql_query($tables) or die( "Ошибка при выполнении запроса: ".mysql_error() );
while( $table = mysql_fetch_row($res) )
{
    $fp = fopen('d://www/backup/gorod_'.date("Y-m-d-H-i").'.sql','a+');
    if ( $fp )
    {
        $query = "TRUNCATE TABLE `".$table[0]."`;\n";
        fwrite ($fp, $query);
        $rows = 'SELECT * FROM `'.$table[0].'`';
        $r = mysql_query($rows) or die("Ошибка при выполнении запроса: ".mysql_error());
        while( $row = mysql_fetch_row($r) )
        {
            $query = "";
            foreach ( $row as $field )
            {
                if ( is_null($field) )
                    $field = "NULL";
                else
                    $field = "'".mysql_escape_string( $field )."'";
                if ( $query == "" )
                    $query = $field;
                else
                    $query = $query.', '.$field;
            }
            $query = "INSERT INTO `".$table[0]."` VALUES (".$query.");\n";
            fwrite ($fp, $query);
        }
        fclose ($fp);
    }
}
 
?>
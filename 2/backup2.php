<?php

//Функция для резервного копирования базы данных
function backup_database_tables($host,$user,$pass,$name,$table)
{
 
    $link = mysql_connect($host,$user,$pass,$name,$table);
    mysql_select_db($name,$link);

 
    //Получаем все таблицы
    if($tables == '*')
    {
        $tables = array();
        $result = mysql_query('SHOW TABLES');
        while($row = mysql_fetch_row($result))
        {
            $tables[] = $row[0];
        }
    }
    else
    {
        $tables = is_array($tables) ? $tables : explode(',',$tables);
    }
 
    foreach($tables as $table)
    {
        $result = mysql_query('SELECT * FROM '.$table);
        $num_fields = mysql_num_fields($result);
 
        $return.= 'DROP TABLE '.$table.';';
        $row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
        $return.= "\n\n".$row2[1].";\n\n";
 
        for ($i = 0; $i < $num_fields; $i++)
        {
            while($row = mysql_fetch_row($result))
            {
                $return.= 'INSERT INTO '.$table.' VALUES(';
                for($j=0; $j<$num_fields; $j++)
                {
                    $row[$j] = addslashes($row[$j]);
                    $row[$j] = ereg_replace("\n","\\n",$row[$j]);
    if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; }
else { $return.= '""'; }
                if ($j<($num_fields-1)) { $return.= ','; }
                }
                $return.= ");\n";
            }
        }
        $return.="\n\n\n";
    }


 
    //Сохраняем в файл
    $handle = fopen('d://backup.sql','w+');
    fwrite($handle,$return);
    fclose($handle);

    $result=mysql_query($link)?"Çàïèò âèêîíàíî!":"Помилка".mysql_errno().":".mysql_error();
          //echo ' <a href="http://localhost/tstbaggywalk.ru/""> На главную</a>';

    echo $result;
}


backup_database_tables('localhost','root','12345','mp_sarny','*');

?>
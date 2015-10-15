

<?




$sql = 'SELECT * FROM
auto_act LEFT OUTER JOIN auto_pmp ON auto_act.ident = auto_pmp.ident  LEFT OUTER JOIN auto_md1 ON auto_act.ident = auto_md1.ident 
LEFT OUTER JOIN auto_notice ON auto_act.ident = auto_notice.ident RIGHT OUTER JOIN auto_tzmk ON auto_act.ident = auto_tzmk.ident 
where date_use between
DATE_FORMAT("'.$_POST['date_left'].'","%y-%m-%d")
AND
DATE_FORMAT("'.$_POST['date_right'].'","%y-%m-%d")

';

	 db_connect();

	 $result=mysql_query($sql);
	 $fp = fopen("d://journals/act/act_".date("Y-m-d" ).".csv", "w+"); 
	 while ($row= mysql_fetch_array($result)){

	 
$fp = fopen("d://journals/act/act_".date("Y-m-d" ).".csv", "a+"); 
		$mytext = $row['ident'].';'
                 .$row['number_registr'].';'
                 .$row['date_use'].' '.$row['time_use'].';'
                 
                 .$row['type_tz'].' '.$row['number_tz'].' '.$row['number_tz'].';'
                 
                 .$row['driver_tz'].';'
                 .$row['vantag'].';'
                 .$row['weight'].'/ '.$row['seat'].';'
                
                 .$row['sender'].' '.$row['recipient'].';'
               
                 .$row['direction'].';'
                 .$row['autor'].' '.$row['basis'].' '.$row['number_basis'].';'
                 .$row['result'].';'
                 .$row['number_protocol'].' '.$row['st_mku'].' '.$row['number_md1'].' '.$row['number_notice'].' '.$row['who_directed'].';'
                 
                 .$row['zmina'].' '.$row['person_use']."\r\n"; // Исходная строка

                 

		$test = fwrite($fp, $mytext); // Запись в файл
		if ($test) echo "Дані по Акту МО № " . $_POST['number_registr'] . "в файл успішно занесені.";
		else echo "Помилка при записs в файл. ". mysql_error();
		fclose($fp); //Закрытие файла


	 }
?>

<p>Файл збережено D:\journals\act\act_YYYY-MM-DD.csv </p>
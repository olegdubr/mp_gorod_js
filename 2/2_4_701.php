

<?
	$sql='select * from tzmk where date_use between

	DATE_FORMAT("'.$_POST['date_left'].'","%y-%m-%d")

	AND

	DATE_FORMAT("'.$_POST['date_right'].'","%y-%m-%d")

	 ';

	 db_connect();

	 $result=mysql_query($sql);
	 $fp = fopen("d://journals/tzmk_effect/tzmk_effect_".date("Y-m-d" ).".csv", "w+"); 
	 while ($row= mysql_fetch_array($result)){

	 
		$fp = fopen("d://journals/tzmk_effect/tzmk_effect_".date("Y-m-d" ).".csv", "a+"); 
		$mytext = $row['ident'].';'
		          .$row['number_registr'].';'
		          .$row['date_use'].';'
		          .$row['time_use'].';'
		          .$row['person_use'].';'
		          .$row['object_mk'].';'
		          .$row['tzmk_1_use'].';'
		          .$row['tzmk_2_use'].';'
		          .$row['tzmk_3_use'].';'
		          .$row['result'].';'
		          .$row['number_protocol'].';'
		          .$row['st_mku'].';'
		          .$row['price'].';'
		          .$row['description']."\r\n"; // Исходная строка
		$test = fwrite($fp, $mytext); // Запись в файл
		if ($test) echo 'Данные в файл успешно занесены.';
		else echo 'Ошибка при записи в файл.';
		fclose($fp); //Закрытие файла


	 }
?>

<p>Файл збережено D:\journals\tzmk_effect/tzmk_effect_YYYY-MM-DD.csv </p>


<?
	$sql='select * from tzmk where date_issue between

	DATE_FORMAT("'.$_POST['date_left'].'","%y-%m-%d")

	AND

	DATE_FORMAT("'.$_POST['date_right'].'","%y-%m-%d")

	 ';

	 db_connect();

	 $result=mysql_query($sql);
	 $fp = fopen("d://journals/tzmk_oblic/tzmk_oblic_".date("Y-m-d" ).".csv", "w+"); 
	 while ($row= mysql_fetch_array($result)){

	 
		$fp = fopen("d://journals/tzmk_oblic/tzmk_oblic_".date("Y-m-d" ).".csv", "a+"); 
		$mytext = $row['ident'].';'
		          .$row['number_registr'].';'
		          .$row['date_issue'].';'
		          .$row['person_issue'].';'
		          .$row['tzmk_1_issue'].';'
		          .$row['tzmk_2_issue'].';'
		          .$row['tzmk_3_issue'].';'
		          .$row['person_get'].';'
		          .$row['remark'].';'
		          .$row['date_return'].';'
		          .$row['person_adopt'].';'
		          .$row['tzmk_1_return'].';'
		          .$row['tzmk_1_condition'].';'
		          .$row['tzmk_2_return'].';'
		          .$row['tzmk_2_condition'].';'
		          .$row['tzmk_3_return'].';'
		          .$row['tzmk_3_condition'].';'
		          .$row['person_return']."\r\n"; // Исходная строка
		$test = fwrite($fp, $mytext); // Запись в файл
		if ($test) echo 'Данные в файл успешно занесены.';
		else echo 'Ошибка при записи в файл.';
		fclose($fp); //Закрытие файла


	 }
?>

<p>Файл збережено d://journals/tzmk_oblic/tzmk_oblic_YYYY-MM-DD.csv </p>
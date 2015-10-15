

<?
	$sql='select * from tzmk_act where date_use between
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
		          .$row['date_use'].';'
		          .$row['zmina'].';'
		          .$row['person_issue'].';'
		          .$row['tzmk_1'].';'
		          .$row['condition_1'].';'
		          .$row['tzmk_2'].';'
		          .$row['condition_2'].';'
		          .$row['tzmk_3'].';'
		          .$row['condition_3'].';'		          
		          .$row['person_use']."\r\n"; // Исходная строка
		$test = fwrite($fp, $mytext); // Запись в файл
		if ($test) echo 'Дані в файл успішо записані.';
		else echo 'Помилка запису в файл!' . mysql_error();
		fclose($fp); //Закрытие файла


	 }
?>

<p>Файл збережено D:\journals\act_review\act_review_YYYY-MM-DD.csv </p>
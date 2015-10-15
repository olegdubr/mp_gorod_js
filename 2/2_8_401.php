

<?
	$sql='select * from tzmk_act where date_use between
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
		          .$row['type_tz'].';'
		          .$row['tzmk_1'].';'
		          .$row['tzmk_2'].';'
		          .$row['tzmk_3'].';'
                  .$row['result'].';'
                  .$row['number_protocol'].';'
                  .$row['subject'].';'
		          .$row['description'].';'
		          .$row['person_use'].';'
		          .$row['zmina']."\r\n"; // Исходная строка
         $test = fwrite($fp, $mytext); // Запись в файл
         if ($test) echo 'Дані в файл успішо записані.';
         else echo 'Помилка запису в файл!' . mysql_error();
         fclose($fp); //Закрытие файла



	 }
?>

<p>Файл збережено D:\journals\mdp_in\mdp_in_YYYY-MM-DD.csv </p>
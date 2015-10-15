

<?
	$sql='select * from tzmk_act where date_use between

	DATE_FORMAT("'.$_POST['date_left'].'","%y-%m-%d")

	AND

	DATE_FORMAT("'.$_POST['date_right'].'","%y-%m-%d")
    
    AND

    number_protocol <> "" 


	 ';

	 db_connect();

	 $result=mysql_query($sql);
	 $fp = fopen("d://journals/pmp/pmp_".date("Y-m-d" ).".csv", "w+"); 
	 while ($row= mysql_fetch_array($result)){

	 
$fp = fopen("d://journals/pmp/pmp_".date("Y-m-d" ).".csv", "a+"); 
		$mytext = $row['ident'].';'
		          .$row['number_registr'].';'
		          .$row['date_use'].';'
		          .$row['name_offender'].';'
		          .$row['address'].';'
		          .$row['sitizen'].';'
		          .$row['number_protocol'].';'
		          .$row['st_mku'].';'
		          .$row['subject'].';'
		          .$row['description'].';'
		          .$row['status_price'].';'
		          .$row['price'].';'
		          .$row['penalty'].';'
                  .$row['status_penalty'].';'
		          .$row['seizure'].';'
		          .$row['direction'].';'
		          .$row['person_use'].';'
		          .$row['zmina']."\r\n"; // Исходная строка
		$test = fwrite($fp, $mytext); // Запись в файл
		if ($test) echo 'Данные в файл успешно занесены.';
		else echo 'Ошибка при записи в файл.';
		fclose($fp); //Закрытие файла


	 }
?>

<p>Файл збережено D:\journals\pmp\pmp_YYYY-MM-DD.csv </p>
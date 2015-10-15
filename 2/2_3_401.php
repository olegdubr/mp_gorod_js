

<?
	$sql='select * from main_mdp_out where date_execut between

	DATE_FORMAT("'.$_POST['date_left'].'","%y-%m-%d")

	AND

	DATE_FORMAT("'.$_POST['date_right'].'","%y-%m-%d")

	 ';

	 db_connect();

	 $result=mysql_query($sql);
	 $fp = fopen("d://journals/mdp_out/mdp_out_".date("Y-m-d" ).".csv", "w+"); 
	 while ($row= mysql_fetch_array($result)){

	 
		$fp = fopen("d://journals/mdp_out/mdp_out_".date("Y-m-d" ).".csv", "a+"); 
		$mytext = $row['ident'].';'
		          .$row['date_execut'].';'
		          .$row['order_number_mdp'].';'
		          .$row['give_mdp'].';'
		          .$row['serial_mdp'].';'
		          .$row['sender'].';'
		          .$row['recipient'].';'
		          .$row['number_mdp'].';'
		          .$row['owner_mdp'].';'
		          .$row['vantag'].';'
		          .$row['weight'].';'
		          .$row['seat'].';'
		          .$row['seal'].';'
		          .$row['number_tz'].';'
		          .$row['number_prich'].';'
		          .$row['annotation'].';'
		          .$row['rank_person']."\r\n"; // Исходная строка
		$test = fwrite($fp, $mytext); // Запись в файл
		if ($test) echo 'Данные в файл успешно занесены.';
		else echo 'Ошибка при записи в файл.';
		fclose($fp); //Закрытие файла


	 }
?>

<p>Файл збережено D:\journals\mdp_out\mdp_out_YYYY-MM-DD.csv </p>
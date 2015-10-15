

<?
	$sql='select * from main_mdp_in where date_execut between

	DATE_FORMAT("'.$_POST['date_left'].'","%y-%m-%d")

	AND

	DATE_FORMAT("'.$_POST['date_right'].'","%y-%m-%d")

	 ';

	 db_connect();

	 $result=mysql_query($sql);
	 $fp = fopen("d://journals/mdp_in/mdp_in_".date("Y-m-d" ).".csv", "w+"); 
	 while ($row= mysql_fetch_array($result)){

	 
		$fp = fopen("d://journals/mdp_in/mdp_in_".date("Y-m-d" ).".csv", "a+"); 
		$mytext = $row['ident'].';'
		          .$row['date_execut'].';'
		          .$row['number_registr'].';'
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
		          .$row['rank_person'].';'
		          .$row['remark']."\r\n"; // Исходная строка
		$test = fwrite($fp, $mytext); // Запись в файл
		if ($test) echo 'Дані в файл успішно занесені.';
		else echo 'Помилка при записі в файл.';
        fclose($fp); //Закрытие файла


	 }
?>

<p>Файл збережено D:\journals\mdp_in\mdp_in_YYYY-MM-DD.csv </p>
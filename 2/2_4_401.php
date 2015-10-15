

<?




$sql='select * from auto_pmp LEFT OUTER JOIN auto_act ON auto_pmp.ident = auto_act.ident where date_pmp between
DATE_FORMAT("'.$_POST['date_left'].'","%y-%m-%d")
AND
DATE_FORMAT("'.$_POST['date_right'].'","%y-%m-%d")

 ';



	 $result=mysql_query($sql);
	 $fp = fopen("d://journals/pmp/pmp_".date("Y-m-d" ).".csv", "w+"); 
	 while ($row= mysql_fetch_array($result)){

	 
$fp = fopen("d://journals/pmp/pmp_".date("Y-m-d" ).".csv", "a+"); 
		$mytext = $row['number_registr'].';'
                .$row['date_pmp'].';'
                .$row['name_offender'].' '.$row['address'].';'
                
                .$row['sitizen'].';'
                .$row['number_protocol'].' '.$row['st_mku'].';'
                
                .$row['subject'].';'
                .$row['description'].';'
                
                .$row['price'].';'
                .$row['penalty'].';'
                .$row['status_penalty'].';'
                .$row['seizure'].';'
                                
                .$row['zmina_pmp'].' '.$row['insp_pmp']."\r\n"; // Исходная строка


		$test = fwrite($fp, $mytext); // Запись в файл
		if ($test) echo "Дані по протоколу про порушення ПМП № " . $_POST['number_protocol'] . "в файл успішно занесені.";
		else echo "Помилка при записі в файл. ". mysql_error();
		fclose($fp); //Закрытие файла


	 }
?>

<p>Файл збережено D:\journals\pmp\pmp_YYYY-MM-DD.csv </p>
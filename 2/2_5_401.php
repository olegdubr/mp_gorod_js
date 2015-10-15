

<?


$sql='select * from auto_act LEFT OUTER JOIN auto_md1 ON auto_act.ident = auto_md1.ident  
LEFT OUTER JOIN md1_product ON auto_md1.md1_id = md1_product.md1_id
LEFT OUTER JOIN auto_pmp ON auto_act.ident = auto_pmp.ident
where date_use between
DATE_FORMAT("'.$_POST['date_left'].'","%y-%m-%d")
AND
DATE_FORMAT("'.$_POST['date_right'].'","%y-%m-%d")
AND
number_md1 != ""

';


	 $result=mysql_query($sql);
	 $fp = fopen("d://journals/md1/md1_".date("Y-m-d" ).".csv", "w+"); 
	 while ($row= mysql_fetch_array($result)){

	 
		$fp = fopen("d://journals/md1/md1_".date("Y-m-d" ).".csv", "a+"); 
		$mytext = $row['number_registr'].';'
		
		.$row['date_use'].';'
		
		.$row['number_md1'].';'
		.$row['personal_code'].' '.$row['name_offender_md1'].' '.$row['address_md1'].';'
		
		.$row['product_code'].' '.$row['product_name'].';'
		
		.$row['product_amount'].' '.$row['product_unit'].';'
		
		.$row['product_description'].';'
		.$row['basis_tax'].';'
		.$row['basis_calc'].';'
		.$row['invoice_value'].';'
		.$row['payment_120'].' '.$row['payment_122'].' '.$row['payment_122'].' ------------ '.$row['sum_payment'].';'
		
		.$row['zmina_md1'].' '.$row['insp_md1']."\r\n"; // Исходная строка






		      
		$test = fwrite($fp, $mytext); // Запись в файл
		if ($test) echo "Дані по квитанції МД № " . $_POST['number_md1'] . "в файл успішно занесені.";
		else echo "Помилка при записі в файл. ". mysql_error();
		fclose($fp); //Закрытие файла


	 }
?>

<p>Файл збережено D:\journals\md1\md1_YYYY-MM-DD.csv </p>


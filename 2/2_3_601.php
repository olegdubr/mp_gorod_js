<style>

</style>
<table class="three">
</table>
<?php
$number=$_POST['order_number_mdp'];
$sql="select * from main_mdp_out where order_number_mdp like '$number'";
$result=mysql_query($sql);

if ( $row= mysql_fetch_array($result)){

$row['owner_mdp']=str_replace('"', "&quot;",$row['owner_mdp'] );
 echo '

 
 
<form method="post" action="index.php?step=2_3_602">
<table cellpadding="2" cellspacing="0" border="1" align="center" height="auto">
	<tr>
		<td colspan="2"><h2>Закриття книжок МДП "Виїзд"</h2></td>
	</tr>
	<tr>
		<td>Дата оформлення <input type="date "size="10"name="date_execut" value="'.$row['date_execut'].'"></td>		
		<td>Порядковий номер книжки МДП <input type="text" size="13" name="order_number_mdp" value="'.$row['order_number_mdp'].'"></td>
	</tr>
	<tr>
		<td colspan="2">Гарантійне об"єднання, що видало книжку МДП <input type="text" size="47" name="give_mdp" value="'.$row['give_mdp'].'"></td>
	</tr>
	<tr>
		<td colspan="2">Серія <input type="text" size="4" name="serial_mdp" value="'.$row['serial_mdp'].'"> № <input type="date "size="10" name="number_mdp" value="'.$row['number_mdp'].'"> держатель книжки МДП <input type="text" size="39" name="owner_mdp" value="'.$row['owner_mdp'].'"></td>
	</tr>
	<tr>
		<td>Відправник <input type="text" size="20" name="sender" value="'.$row['sender'].'"></td>
		<td>Отримувач <input type="text" size="20" name="recipient" value="'.$row['recipient'].'"></td>
	</tr>
	<tr>
		<td colspan="2">Вантаж <input type="text" size="30" name="vantag" value="'.$row['vantag'].'"> Вага, кг <input type="text" size="5" name="weight" value="'.$row['weight'].'"> К-ть місць <input type="text" size="3" name="seat" value="'.$row['seat'].'"> Пломба <input type="text" size="7" name="seal" value="'.$row['seal'].'"></td>
	</tr>
	<tr>
		<td>№ ТЗ <input type="text" size="8" name="number_tz" value="'.$row['number_tz'].'">№ причепа <input type="text" size="8" name="number_prich" value="'.$row['number_prich'].'"></td>
		<td>Зауваження <input type="text" size="37" name="annotation" value="'.$row['annotation'].'"></td>
	</tr>
	<tr>
		<td colspan="2">Посадова особа <input type="text" size="15" name="rank_person" value="'.$row['rank_person'].'"></td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit" value="Видалити"></td>
	</tr>
</table>
</form>

';
}
        //echo $_POST['order_number_mdp'];
?>
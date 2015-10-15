<style>

</style>
<table class="three">
</table>
<?php echo '
<form method="post" action="index.php?step=1_2_101">
<table cellpadding="2" cellspacing="0" border="1" align="center" height="auto">
	<tr>
		<td colspan="2"><h2>Закриття книжок МДП "В"їзд"</h2></td>
	</tr>
	<tr>
		<td>Дата оформлення <input type="date "size="10"name="date_execut" value="'.date("Y-m-d" ).'"></td>		
		<td>Порядковий номер книжки МДП <input type="text" size="15" name="number_registr" value="20407/'.date("Y" ).'/'.gen_number('main_mdp_in').'"></td>
	</tr>
	<tr>
		<td colspan="2">Гарантійне об"єднання, що видало книжку МДП <input type="text" size="47" name="give_mdp"></td>
	</tr>
	</tr>
	<tr>
		<td colspan="2">Серія <input type="text" size="4" name="serial_mdp"> № <input type="date "size="10" name="number_mdp" value=""> держатель книжки МДП <input type="text" size="39" name="owner_mdp"></td>
	</tr>
	<tr>
	    <td>Відправник
           <select name="sender" class="editable">
             <option value=""></option>
             <option value="Росія">Росія</option>
			 <option value="Білорусь">Білорусь</option>
             <option value="Латвія">Латвія</option>
             <option value="Литва">Литва</option>
			 <option value="Естонія">Естонія</option>
           </select> 
	    </td>
	    <td>Отримувач
           <select name="recipient" class="editable">
             <option value=""></option>
             <option value="Австрія">Австрія</option>
             <option value="Албанія">Албанія</option>
             <option value="Азейбарджан">Азейбарджан</option>
             <option value="Болгарія">Болгарія</option>
             <option value="Венгрія">Венгрія</option>
             <option value="Грузія">Грузія</option>
             <option value="Італія">Італія</option>
             <option value="Казахстан">Казахстан</option>
             <option value="Македонія">Македонія</option>
             <option value="Німеччина">Німеччина</option>
             <option value="Польща">Польща</option>
             <option value="Румунія">Румунія</option>
             <option value="Словаччина">Словаччина</option>
             <option value="Сербія">Сербія</option>
             <option value="Словенія">Словаччина</option>
             <option value="Туркменістан">Туркменістан</option>
             <option value="Україна">Україна</option>
             <option value="Фінляндія">Фінляндія</option>
           </select> 
	    </td>
	</tr>
	<tr>
		<td colspan="2">Вантаж <input type="text" size="30" name="vantag" value=""> Вага, кг <input type="text" size="5" name="weight" value=""> К-ть місць <input type="text" size="3" name="seat" value=""> Пломба <input type="text" size="7" name="seal" value="1х204/"></td>
	</tr>
	<tr>
		<td>№ ТЗ <input type="text" size="8" name="number_tz" value="">№ причепа <input type="text" size="8" name="number_prich" value=""></td>
		<td>Зауваження <input type="text" size="37" name="annotation" value="Без зауважень"></td>
	</tr>
	<tr>
		<td>Посадова особа <input type="text" size="15" name="rank_person" value="'.IdentToNameUniversal($_SESSION['iduser'],'ident','users',$field='name').' '.IdentToNameUniversal($_SESSION['iduser'],'ident','users',$field='second_name'). '"></td>
		<td>Примітки <input type="text" size="40" name="remark" value=""></td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit" value="Оформити"></td>
	</tr>
</table>
</form>

';?>

<script>
$(".editable").eComboBox();
</script>


<style>

</style>
<table class="three">
</table>
<?php
$number=$_POST['number_registr'];
$sql="select * from auto_act JOIN auto_tzmk USING(ident) where number_registr like '$number'";
$result=mysql_query($sql);

if ( $row= mysql_fetch_array($result)){

$row['vantag']=str_replace('"', "&quot;",$row['vantag'] );
 echo '

 
 
<form method="post" action="index.php?step=2_7_502">
<table cellpadding="2" cellspacing="0" border="1" align="center" height="auto">
	
   <tr>
		<td colspan="2"><h2 align="center">Редагування Акту огляду товарів та ТЗ комерційного призначення</h2></td>
	</tr>
	<tr>
      <td>
        <input type="hidden" size="3" name="ident" value="'.$row['ident'].'">  
        Реєстраційний номер Акту огляду <input type="text" size="15" name="number_registr" value="'.$row['number_registr'].'">   
	  </td>   
      <td>
        Дата <input type="date "size="10"name="date_use" value="'.$row['date_use'].'">
        та час <input type="date "size="5"name="time_use" value="'.$row['time_use'].'"> проведення 
      </td>
	</tr>
    
    <tr>
       <td>
          Тип ТЗ <input type="text" size="20"name="type_tz" value="'.$row['type_tz'].'"> 
          № ТЗ <input type="text" size="10" name="number_tz" value="'.$row['number_tz'].'">
          № причепу <input type="text" size="10" name="number_prich" value="'.$row['number_prich'].'">
       </td>
       <td>
          ПІБ водія <input type="text" size="40" name="driver_tz" value="'.$row['driver_tz'].'">
       </td>
    </tr> 
      <td>
        Назва вантажу <input type="text" size="37"name="vantag" value="'.$row['vantag'].'">
      </td>
      <td>  
        вага, кг <input type="text" size="7" name="weight" value="'.$row['weight'].'">
        к-ть місць <input type="text" size="5" name="seat" value="'.$row['seat'].'">
      </td>
    </tr> 
        <tr>
        <td colspan="2">
            Відправник <input type="text" size="10" name="sender" value="'.$row['sender'].'">
            Отримувач <input type="text" size="10" name="recipient" value="'.$row['recipient'].'">
            Напрямок переміщення <input type="text" size="5" name="direction" value="'.$row['direction'].'">
            Результат <input type="text" size="20" name="result" value="'.$row['result'].'">
        </td>
    </tr>      
	<tr>
		<td colspan="2">
           Ініціатор огляду <input type="text" size="5" name="autor" value="'.$row['autor'].'">
           Підстава для проведення огляду <input type="text" size="15" name="basis" value="'.$row['basis'].'">
           №, дата орієнтування <input type="text" size="20" name="number_basis" value="'.$row['number_basis'].'">
        </td>
    </tr>
    <tr>
      <td colspan="2">
         ТЗМК видав: <input type="text" size="15" name="person_issue" value="'.$row['person_issue'].'">
         ПІБ особи, що отримала ТЗМК та провела огляд <input type="text" size="15" name="person_use" value="'.$row['person_use'].'">
         Зміна № <input type="text" size="1" name="zmina" value="'.$row['zmina'].'">

      </td>
    </tr>
    <tr>
      <td colspan="2">           
          Видано: ТЗМК 1 <input type="text" size="30" name="tzmk_1" value="'.$row['tzmk_1'].'">
          ТЗМК 2 <input type="text" size="30" name="tzmk_2" value="'.$row['tzmk_2'].'">
          ТЗМК 3 <input type="text" size="30" name="tzmk_3" value="'.$row['tzmk_3'].'">
      </td>
    </tr>
    <tr>  
	   <td colspan="2"> 

       </td>
	</tr>
    <tr>
        <td colspan="2">
          Технічний стан: ТЗМК 1 <input type="text" size="15" name="condition_1" value="'.$row['condition_1'].'">
          ТЗМК 2 <input type="text" size="15" name="condition_2" value="'.$row['condition_2'].'">  
          ТЗМК 3 <input type="text" size="15" name="condition_3" value="'.$row['condition_3'].'"> 
        </td>
    </tr>
	<tr>

	<tr>
		<td colspan="2"><input type="submit" value="Перезаписати"></td>
	</tr>
</table>
</form>

';
}
        //echo $_POST['number_registr'];
?>
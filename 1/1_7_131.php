<style>

</style>
<table class="three">
</table>
<?php
$number=$_POST['number_registr'];
$sql="select * from auto_act where number_registr like '$number'";
$result=mysql_query($sql);


if ( $row= mysql_fetch_array($result)){

    $id_act=$row['ident'];
    
$row['vantag']=str_replace('"', "&quot;",$row['vantag'] );

$sql_tzmk = "SELECT person_use, zmina FROM auto_act JOIN auto_tzmk USING(ident) where number_registr like '$number'";
$result_tzmk = mysql_query($sql_tzmk);
$row_tzmk = mysql_fetch_row($result_tzmk);
//var_dump($row_tzmk);
$person = $row_tzmk[0];
$zmina = $row_tzmk[1];

 echo '

 
 
<form method="post" action="index.php?step=1_7_132">
<table cellpadding="2" cellspacing="0" border="1" align="center" height="auto">
	

		    <h1 align="center">Оформлення протоколу про ПМП </h1></td>
        <h1 align="center">до Акту огляду товарів та ТЗ комерційного призначення</h1></td>

    <tr>
		<td colspan="2"><h2 align="center">Акт огляду товарів та ТЗ комерційного призначення</h2></td>
	</tr>
	<tr>
      <td>
        <input type="hidden" size="3" name="ident" value="'.$row['ident'].'">
        Реєстраційний номер Акту огляду <input type="text" size="15" name="number_registr" value="'.$row['number_registr'].'">
        <input type="hidden" size="3" name="ident" value="'.$row['ident'].'">
	  </td>   
      <td>
        Дата <input type="date "size="10"name="date_use" value="'.$row['date_use'].'">
        та час <input type="date "size="5"name="time_use" value="'.$row['time_use'].'"> проведення 
      </td>
	</tr>
    
    <tr>
       <td>
          Тип ТЗ <input type="text" size="20"name="type_tz" value="'.$row['type_tz'].'"> 
          № ТЗ <input type="text" size="20" name="number_tz" value="'.$row['number_tz'].'">
          
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
           ПІБ інспектора, який склав Акт МО <input type="text" size="15" name="person_use" value="'.$person.'">
           № зміни <input type="text" size="3" name="zmina" value="'.$zmina.'">
        </td>
    </tr>
   <tr>
    <tr>
        <td colspan="2"><h2 align="center">Оформлення повідомлення в правоохоронні органи</h2></td>
    </tr>
    <tr>
        <td colspan="2">
          № повідомленя <input type="text" size="2" name="number_notice" value="">
          направлено
            <select name="who_directed">
             <option value="СБУ">СБУ</option>
             <option value="МВС">МВС</option>
            </select>
          стаття ККУ
            <select name="st_kku">
             <option value="201">201</option>
             <option value="305">305</option>
             <option value="309">309</option>
            </select>
          предмет правопорушення <input type="text" size="30" name="subject_offense" value="">
        </td>
    </tr>
  <tr>
    <tr>
   <td colspan="2"><input type="submit" value="Додати повідомленн до Акту МО"></td>
	</tr>
</table>
</form>

';
}
        //echo $_POST['number_registr'];
?>
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

$sql_pmp = "SELECT pmp_id, insp_pmp, zmina_pmp, name_offender, address FROM auto_act JOIN auto_pmp USING(ident) where number_registr like '$number'";
$result_pmp = mysql_query($sql_pmp);
$row_pmp = mysql_fetch_row($result_pmp);
//var_dump($row_pmp);
$id_pmp = $row_pmp[0];
$pmp_insp = $row_pmp[1];
$pmp_zmina = $row_pmp[2];
$pmp_name = $row_pmp[3];
$pmp_address = $row_pmp[4];

$sql_tzmk = "SELECT person_use, zmina FROM auto_act JOIN auto_tzmk USING(ident) where number_registr like '$number'";
$result_tzmk = mysql_query($sql_tzmk);
$row_tzmk = mysql_fetch_row($result_tzmk);
//var_dump($row_tzmk);
$person = $row_tzmk[0];
$zmina = $row_tzmk[1];


 echo '

 
 
<form method="post" action="index.php?step=1_7_122">
<table cellpadding="2" cellspacing="0" border="1" align="center" height="auto">

			<h1 align="center">Додавання квитанції МД-1 </h1></td>
      <h1 align="center">до Акту огляду товарів та ТЗ комерційного призначення</h1></td>
   <tr>
		<td colspan="2"><h2 align="center">Акту огляду товарів та ТЗ комерційного призначення</h2></td>
	</tr>
	<tr>
      <td>
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
           ПІБ інспектора, який склав Акт МО <input type="text" size="15" name="person_use" value="'.$person.'">
           № зміни <input type="text" size="3" name="zmina" value="'.$zmina.'">
        </td>
    </tr>

  <tr>
    <td colspan="2"><h2 align="center">Оформлення квитанції МД-1</h2></td>
   </tr>
       <tr>
    <td colspan="2">
    <input type="hidden" size="3"name="pmp_id" value="'. $id_pmp .'">
    Тип МД
             <select name="type_md">
             <option value="МД-1">МД-1</option>
             <option value="ВМД">ВМД</option>
             </select>
    № МД <input type="text" size="20"name="number_md1" value="">
     ПІБ особи, що склала квитанцію МД <input type="text" size="20"name="insp_md1" value="'. $person .'">
     Зміна № <input type="text" size="2"name="zmina_md1" value="'. $zmina .'">
    </tr>
  </td>
   </tr>
     <tr>
       <td colspan="2">
         ПІБ <input type="text" size="30"name="name_offender_md1" value="'. $pmp_name .'">
         адреса <input type="text" size="30"name="address_md1" value="'. $pmp_address .'">
         інд. код <input type="text" size="5"name="personal_code" value="">
       </td>
    <tr>
    <td colspan="2">
         код товару <input type="text" size="4"name="product_code" value="">
         назва товару <input type="text" size="30"name="product_name" value="">
         к-ть <input type="text" size="2"name="product_amount" value="">
         одиниця
             <select name="product_unit"  class="editable">
             <option value=""></option>
             <option value="шт">шт</option>
             <option value="кг">кг</option>
             <option value="м.кв.">м.кв.</option>
             <option value="упак">упак</option>
            </select>
    </td>
    </tr>
    <tr>
    <td colspan="2">
     Опис товару <input type="text" size="85"name="descriptiom_md" value="">
      </td>
    </tr>
    
       <td colspan="2">
        Підстава для оподаткування ст МКУ
             <select name="basis_tax">
             <option value="374/4">374/4</option>
             <option value="371">371</option>
             <option value="374/2">374/2</option>
             </select>
        Основа нарахування, грн: <input type="text" size="5"name="basis_calc" value="0.00">
        Фактурна вартість, грн  <input type="text" size="10"name="invoice_value" value="0.00">
       </td>    
    <tr>
   <td colspan="2"><input type="submit" value="Додати квитанцію МД-1 ло Акту МО"></td>
	</tr>
</table>
</form>

';
}
        //echo $_POST['number_registr'];
?>

<script>
$(".editable").eComboBox();
</script>
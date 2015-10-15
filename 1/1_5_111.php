<style>

</style>
<table class="three">
</table>
<?php
$number=$_POST['number_md1'];
$sql="select * from auto_md1 where number_md1 like '$number'";
$result=mysql_query($sql);


if ( $row= mysql_fetch_array($result)){

    $id_md=$row['md1_id'];
  

$row['product_name']=str_replace('"', "&quot;",$row['product_name'] );

 echo '

 
 
<form method="post" action="index.php?step=1_5_112">
<table cellpadding="2" cellspacing="0" border="1" align="center" height="auto">

			<h1 align="center">ЖУРНАЛ реєстрації квитанцій МД-1 </h1></td>
      <h1 align="center">Додавання товару до квитанції МД-1 </h1></td>
       
  <tr>
    <td colspan="2"><h2 align="center">Оформлення квитанції МД-1</h2></td>
   </tr>
       <tr>
    <td colspan="2">
    <input type="hidden" size="5"name="ident" value="'.$row['ident'].'">
    <input type="hidden" size="5"name="md1_id" value="'.$row['md1_id'].'">
    Тип МД <input type="text" size="30"name="type_md" value="'.$row['type_md'].'">
    № МД <input type="text" size="20"name="number_md1" value="'.$row['number_md1'].'">
  </td>
   </tr>
     <tr>
       <td colspan="2">
         ПІБ <input type="text" size="30"name="name_offender_md1" value="'.$row['name_offender_md1'].'">
         адреса <input type="text" size="30"name="address_md1" value="'.$row['address_md1'].'">
         інд. код <input type="text" size="5"name="personal_code" value="'.$row['personal_code'].'">
       </td>
    <tr>
    <td colspan="2">
         код товару <input type="text" size="4"name="product_code" value="">
         назва товару <input type="text" size="30"name="product_name" value="">
         к-ть <input type="text" size="2"name="product_amount" value="">
         одиниця
             <select name="product_unit" class="editable">
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
    </tr>
    <tr>    
    <td colspan="2">
        Заповнюється тільки для ВМД - 120, грн: <input type="text" size="7"name="payment_120" value="0.00">
        - 122, грн: <input type="text" size="7"name="payment_122" value="0.00">
        - 128, грн: <input type="text" size="7"name="payment_128" value="0.00">
    </td> 
    </tr>
    <tr>          
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
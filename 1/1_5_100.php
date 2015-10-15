<style>

</style>
<table class="three">
</table>

<form method="post" action="index.php?step=1_5_101">
<h1 align="center">Журнал реєстрації квитанцій МД-1</h1>
<table cellpadding="2" cellspacing="0" border="1" align="center" height="auto">
   <tr>
    <td colspan="2"><h2 align="center">Оформлення квитанції МД-1 без Акту митного огляду</h2></td>
   </tr>
   <tr>
    <td>
        <input type="hidden" size="2" name="ident" value="0">
        <input type="hidden" size="2" name="pmp_id" value="0">
        Тип МД
             <select name="type_md">
             <option value="МД-1">МД-1</option>
             <option value="ВМД">ВМД</option>
             </select>
        № квитанції МД-1 <input type="text" size="10"name="number_md1" value="">
<? $query = "SELECT * FROM users"; 
$res = mysql_query($query); 
if(!$res) exit("Ошибка запроса: ".mysql_error());
if(mysql_num_rows($res)>0) 
{?>
        ПІБ особи, що склала квитанцію МД
        <select name="insp_md1">
<? 
    // В цикле выводим опции селекта 
  while($row = mysql_fetch_array($res)) 
  { ?>
	<option value="<?=$row['name'].$row['second_name']?>"><?=$row['name']." ".$row['second_name']?></option>
<?}?> 
  </select> 
<?}?>
        Зміна №
           <select name="zmina_md1">
             <option value=""></option>
             <option value="1">1</option>
             <option value="2">2</option>
             <option value="3">3</option>
             <option value="4">4</option>
           </select>
    </tr>
    <tr>
        <td colspan="2">
         ПІБ <input type="text" size="30"name="name_offender_md1" value="">
         адреса <input type="text" size="30"name="address_md1" value="">
         інд. код <input type="text" size="5"name="personal_code" value="">
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
        Опис товару <input type="text" size="85"name="product_descriptiom" value="">
        </td>
    </tr>
        <td colspan="2">
        Підстава для оподаткування ст МКУ
             <select name="basis_tax">
             <option value=""></option>
             <option value="371">371</option>
             <option value="374/2">374/2</option>
             <option value="374/4">374/4</option>
             </select>
        Основа нарахування, грн: <input type="text" size="5"name="basis_calc" value="0.00">
        Фактурна вартість, грн  <input type="text" size="10"name="invoice_value" value="0.00">
        </td> 
    </tr>
    <tr>
	<tr>
		<td colspan="2">
		<input type="submit" value="Оформити">
		Дата оформлення протоколу про ПМП <input type="date "size="10"name="date_md1" value="<?= date("Y-m-d" ) ?>"
		</td>
	</tr>
</table>
</form>



<script>
$(".editable").eComboBox();
</script>

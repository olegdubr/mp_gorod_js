<style>

</style>
<table class="three">
</table>
<?php echo '
<form method="post" action="index.php?step=1_4_101">
<h1 align="center">Журнал реєстрації протоколів</h1>
<h1 align="center">про порушення митних правил</h1>
<table cellpadding="2" cellspacing="0" border="1" align="center" height="auto">
   <tr>
    <td colspan="2"><h2 align="center">Складання протоколу про ПМП без Акту митного огляду</h2></td>
   </tr>    
     <tr>
       <td colspan="2">
         <input type="hidden" size="2" name="ident" value="0">
         ПІБ <input type="text" size="35"name="name_offender" value="">
         адреса порушника <input type="text" size="40"name="address" value="">
         резидент
            <select name="sitizen">
             <option value="так">так</option>
             <option value="ні">ні</option>
            </select>
       </td>
    </tr> 
     <tr>
       <td colspan="2">
         № протоколу <input type="text" size="15"name="number_protocol" value="">
         стаття
             <select name="st_mku">
             <option value=""></option>
             <option value="469">469</option>
             <option value="470/1">470/1</option>
             <option value="470/2">470/2</option>
             <option value="470/3">470/3</option>
             <option value="471">471</option>
             <option value="472">472</option>
             <option value="481/1">481/1</option>
             <option value="481/2">481/2</option>
             <option value="481/3">481/3</option>
             <option value="483/1">483/1</option>
             <option value="483/2">483/2</option>
             <option value="000">000</option>
            </select>
         МКУ,
         ПІБ особи, що склала протокол
           <select name="insp_pmp">
             <option value=""></option>
             <option value="Адамчук І.М.">Адамчук І.М.</option>
			 <option value="Белаш Г.С.">Белаш Г.С.</option>
             <option value="Бруяка М.А.">Бруяка М.А.</option>
             <option value="Волошин О.О">Волошин О.О</option>
			 <option value="Власюк С.В.">Власюк С.В.</option>
			 <option value="Ваховський А.М.">Ваховський А.М.</option>
             <option value="Добринський Л.Л.">Добринський Л.Л.</option>
			 <option value="Кузін Т.">Кузін Т.</option>
			 <option value="Собчук В.Л.">Собчук В.Л.</option>
             <option value="Ольховик О.П.">Ольховик О.П.</option>
             <option value="Ососкало Л.Р.">Ососкало Л.Р.</option>
			 <option value="Марковець І.І.">Марковець І.І.</option>
             <option value="Мисько В.П.">Мисько В.П.</option>
			 <option value="Пінчук О.І.">Пінчук О.І.</option>
             <option value="Пінчук Л.В.">Пінчук Л.В..</option>
             <option value="Рудичик С.В.">Рудичик С.В.</option>
             <option value="Руднік В.М.">Руднік В.М.</option>
             <option value="Семенюк Л.П.">Семенюк Л.П.</option>
             <option value="Сірко М.І.">Сірко М.І.</option>
             <option value="Собчук В.Л.">Собчук В.Л.</option>
             <option value="Торчило І.О.">Торчило І.О.</option>
             <option value="Жакун Н.І.">Жакун Н.І.</option>
             <option value="Ютовець Г.І.">Ютовець Г.І.</option>
           </select>
       Зміна №
           <select name="zmina_pmp">
             <option value=""></option>
             <option value="1">1</option>
             <option value="2">2</option>
             <option value="3">3</option>
             <option value="4">4</option>
           </select>
       </td>
    </tr> 
    <tr>
        <td colspan="2">
          Предмети порушень <input type="text" size="30" name="subject" value=""> 
          Опис місця приховування <input type="text" size="25" name="description" value="">
        </td>
    </tr>
    <tr>

         <td colspan="2">
          вартість визначено
          <select name="status_price">
             <option value="ні">ні</option>
             <option value="так">так</option>
             <option value="додатково">додатково</option>
          </select>          
          - <input type="text" size="7" name="price" value="0.00">
          штраф <input type="text" size="7" name="penalty" value="0.00">
          сплачено
          <select name="status_penalty">
             <option value="ні">ні</option>
             <option value="так">так</option>
          </select>
          конфіскація <input type="text" size="7" name="seizure" value="0.00">
        </td>        
    </tr>  
    </tr>
	<tr>
		<td><input type="submit" value="Оформити"></td>
		<td>Дата оформлення протоколу про ПМП <input type="date "size="10"name="date_pmp" value="'.date("Y-m-d" ).'"</td>
	</tr>
</table>
</form>

';?>

<script>
$(".editable").eComboBox();
</script>

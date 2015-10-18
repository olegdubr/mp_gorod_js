<style>

</style>
<table class="three">
</table>


<form method="post" action="index.php?step=1_7_101">
<h1 align="center">Журнал реєстрації актів огляду</h1>
<h1 align="center">товарів та ТЗ комерційного призначення</h1>
<table cellpadding="2" cellspacing="0" border="1" align="center" height="auto">
	<tr>
		<td colspan="2"><h2 align="center">Складання Акту огляду</h2></td>
	</tr>
	<tr>
      <td>
        Реєстраційний номер Акту огляду <input type="text" size="10" name="number_registr" value="<?= date("Y" )?>/<?= gen_number('auto_act')?>">
	  </td>   
      <td>
        Дата <input type="date "size="10"name="date_use" value="<?= date("Y-m-d" )?>">
        та час <input type="date "size="5"name="time_use" value="<?= date("H:i" )?>"> проведення МО
      </td>
	</tr>
    
    <tr>
       <td>
          Тип ТЗ 
            <select name="type_tz">
             <option value=""></option>
             <option value="легковий">легковий</option>
             <option value="вантажний">вантажний</option>
             <option value="вантажопасажир">вантажопасажир</option>
             <option value="автобус">автобус</option>
             <option value="пішохід">пішохід</option>
            </select>    
          № ТЗ <input type="text" size="10" name="number_tz" value="">
          № причепу <input type="text" size="10" name="number_prich" value="">
       </td>
       <td>
          ПІБ водія <input type="text" size="40" name="driver_tz" value="">
       </td>
    </tr> 
      <td>
        Назва вантажу <input type="text" size="37"name="vantag" value="">
      </td>
      <td>  
        вага, кг <input type="text" size="7" name="weight" value="0">
        к-ть місць <input type="text" size="5" name="seat" value="0">
      </td>
    </tr> 
        <tr>
        <td colspan="2">
            Відправник
           <select name="sender" class="editable">
             <option value=""></option>
             <option value="Україна">Україна</option>
             <option value="Росія">Росія</option>
             <option value="Білорусь">Білорусь</option>
             <option value="Латвія">Латвія</option>
             <option value="Литва">Литва</option>
             <option value="Естонія">Естонія</option>
           </select> 
        
            Отримувач
           <select name="recipient" class="editable">
             <option value=""></option>
             <option value="Австрія">Австрія</option>
             <option value="Албанія">Албанія</option>
             <option value="Азейбарджан">Азейбарджан</option>
             <option value="Болгарія">Болгарія</option>
             <option value="Україна">Україна</option>
             <option value="Білорусь">Білорусь</option>
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
             <option value="Туреччина">Туреччина</option>
             <option value="Фінляндія">Фінляндія</option>
           </select> 
            Напрямок переміщення
           <select name="direction">
             <option value=""></option>
             <option value="Вїзд">В"їзд</option>
             <option value="Виїзд">Виїзд</option>
             <option value="Тр-т вїзд">Тр-т в"їзд</option> 
             <option value="Тр-т виїзд">Тр-т виїзд</option>
           </select>
            Результат
            <select name="result">
             <option value=""></option>
             <option value="ПМП не виявлено">ПМП не виявлено</option>
             <option value="виявлено ПМП">виявлено ПМП</option>
             <option value="оподаткування">оподаткування</option>
             <option value="ПМП + оподаткуваня">ПМП + оподаткуваня</option>
             <option value="ПМП + повідомлення">ПМП + повідомлення</option>
             <option value="ПМП + опод. + пов.">ПМП + оподю + пов.</option>
             <option value="повідомлення">повідомлення</option>
             <option value="картка відмови">картка відмови</option>
            </select>
        </td>
    </tr>      
	<tr>
		<td colspan="2">
           Ініціатор огляду
           <select name="autor">
             <option value=""></option>
             <option value="МО">МО</option>
             <option value="ГОУ ДФС">ГОУ ДФС</option>
             <option value="ВВБ ДФС">ВВБ ДФС</option>
             <option value="ДПСУ">ДПСУ</option>
             <option value="СБУ">СБУ</option>
             <option value="МВС">МВС</option>
           </select> 
           Підстава для проведення огляду
           <select name="basis">
             <option value=""></option>
             <option value="п.1 ПКМУ №467">п.1 ПКМУ №467</option>
             <option value="п.6 ПКМУ №467">п.6 ПКМУ №467</option>
             <option value="п.14 ПКМУ №467">п.14 ПКМУ №467</option>
             <option value="ст.339 МКУ">ст.339 МКУ</option>
             <option value="АСАУР">АСАУР</option>
             <option value="СУР">СУР</option>
           </select> 
           №, дата орієнтування <input type="text" size="20"name="number_basis" value="">
         </td>
    </tr>
    <tr>
      <td colspan="2">
<? $query = "SELECT * FROM users"; 
$res = mysql_query($query); 
if(!$res) exit("Ошибка запроса: ".mysql_error());
if(mysql_num_rows($res)>0) 
{?>
        ПІБ особи, що видала ТЗМК
        <select name="person_issue">
<? 
    // В цикле выводим опции селекта 
  while($row = mysql_fetch_array($res)) 
  { ?>
    <option value="<?=$row['name'].$row['second_name']?>"><?=$row['name']." ".$row['second_name']?></option>
<?}?> 
  </select> 
<?}?>

<? $query = "SELECT * FROM users"; 
$res = mysql_query($query); 
if(!$res) exit("Ошибка запроса: ".mysql_error());
if(mysql_num_rows($res)>0) 
{?>
        ПІБ особи, що отримала ТЗМК та провела МО
        <select name="person_use">
<? 
    // В цикле выводим опции селекта 
  while($row = mysql_fetch_array($res)) 
  { ?>
    <option value="<?=$row['name'].$row['second_name']?>"><?=$row['name']." ".$row['second_name']?></option>
<?}?> 
  </select> 
<?}?>
        Зміна №
           <select name="zmina">
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

<? $query_tzmk = "SELECT * FROM tzmk"; 
$res_tzmk = mysql_query($query_tzmk); 
if(!$res_tzmk) exit("Ошибка запроса: ".mysql_error());
if(mysql_num_rows($res_tzmk)>0) 
{?>
        Видано: ТЗМК 1
        <select name="tzmk_1" class="editable">
<? 
    // В цикле выводим опции селекта 
  while($row = mysql_fetch_array($res_tzmk)) 
  { ?>
    <option value="<?=$row['tzmk_name']?>"><?=$row['tzmk_name']?></option>
<?}?> 
  </select> 
<?}?>

<? $query_tzmk = "SELECT * FROM tzmk"; 
$res_tzmk = mysql_query($query_tzmk); 
if(!$res_tzmk) exit("Ошибка запроса: ".mysql_error());
if(mysql_num_rows($res_tzmk)>0) 
{?>
        ТЗМК 2
        <select name="tzmk_2" class="editable">
<? 
    // В цикле выводим опции селекта 
  while($row = mysql_fetch_array($res_tzmk)) 
  { ?>
    <option value="<?=$row['tzmk_name']?>"><?=$row['tzmk_name']?></option>
<?}?> 
  </select> 
<?}?>

<? $query_tzmk = "SELECT * FROM tzmk"; 
$res_tzmk = mysql_query($query_tzmk); 
if(!$res_tzmk) exit("Ошибка запроса: ".mysql_error());
if(mysql_num_rows($res_tzmk)>0) 
{?>
        ТЗМК 3
        <select name="tzmk_3" class="editable">
<? 
    // В цикле выводим опции селекта 
  while($row = mysql_fetch_array($res_tzmk)) 
  { ?>
    <option value="<?=$row['tzmk_name']?>"><?=$row['tzmk_name']?></option>
<?}?> 
  </select> 
<?}?>

      </td>
    </tr>
    
    <tr>
        <td colspan="2">Технічний стан: ТЗМК 1
        <select name="condition_1">
             <option value=""></option>
             <option value="робочий">робочий</option>
             <option value="не робочий">не робочий</option>
        </select>
        ТЗМК 2
        <select name="condition_2">
             <option value=""></option>
             <option value="робочий">робочий</option>
             <option value="не робочий">не робочий</option>
        </select>
        ТЗМК 3
        <select name="condition_3">
             <option value=""></option>
             <option value="робочий">робочий</option>
             <option value="не робочий">не робочий</option>

        </select>
        </td>
   </tr>
   <tr>
        <td colspan="2"><h2 align="center">Оформлення протоколу про ПМП</h2></td>
   </tr>    
   <tr>
       <td colspan="2">
         ПІБ <input type="text" size="35"name="name_offender" value="">
         та адреса порушника <input type="text" size="40"name="address" value="">
         резидент
            <select name="sitizen">
             <option value="так">так</option>
             <option value="ні">ні</option>
            </select>
       </td>
    </tr> 
    <tr>
       <td colspan="2">
         № протоколу <input type="text" size="25"name="number_protocol" value="">
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
         </td>
    </tr> 
    <tr>
        <td colspan="2">
          Предмети порушень <input type="text" size="40" name="subject" value=""> 
          Опис місця приховування <input type="text" size="40" name="description" value="">
        </td>
    </tr>
    <tr>

         <td colspan="2">
          вартість визначено
          <select name="status_price">
             <option value="ні">ні</option>
             <option value="так">так</option>
             
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
    <tr>
   <tr>
        <td colspan="2"><h2 align="center">Оформлення квитанції МД-1</h2></td>
   </tr>
   <tr>
        <td colspan="2">
        Тип МД
             <select name="type_md">
             <option value="МД-1">МД-1</option>
             <option value="ВМД">ВМД</option>
             </select>
        № МД <input type="text" size="20"name="number_md1" value="">
        </td>
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
        Опис товару <input type="text" size="85"name="product_descriptiom" value="">
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
    </tr>
    <td colspan="2">
        Заповнюється тільки для ВМД - 120, грн: <input type="text" size="7"name="payment_120" value="0.00">
        - 122, грн: <input type="text" size="7"name="payment_122" value="0.00">
        - 128, грн: <input type="text" size="7"name="payment_128" value="0.00">
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
		<td colspan="2"><input type="submit" value="Оформити"></td>
	</tr>
</table>
</form>

';

<script>
$(".editable").eComboBox();
</script>

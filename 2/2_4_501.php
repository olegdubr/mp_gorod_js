<style>

</style>
<table class="three">
</table>
<?php
$number=$_POST['number_protocol'];
$sql="select * from auto_pmp where number_protocol like '$number'";
$result=mysql_query($sql);

if ( $row= mysql_fetch_array($result)){

$row['vantag']=str_replace('"', "&quot;",$row['vantag'] );
 echo '

 
 
<form method="post" action="index.php?step=2_4_502">
<table cellpadding="2" cellspacing="0" border="1" align="center" height="auto">
	
<h1 align="center">Журнал реєстрації протоколів</h1>
<h1 align="center">про порушення митних правил</h1>


   <tr>
    <td colspan="2"><h2 align="center">Редагування протоколу про ПМП</h2></td>
   </tr>    
     <tr>
       <td colspan="2">
         <input type="hidden" size="2" name="pmp_id" value="'.$row['pmp_id'].'">
         <input type="hidden" size="2" name="ident" value="'.$row['ident'].'">
         ПІБ <input type="text" size="35"name="name_offender" value="'.$row['name_offender'].'">
         адреса порушника <input type="text" size="40"name="address" value="'.$row['address'].'">
         резидент <input type="text" size="7" name="sitizen" value="'.$row['sitizen'].'">
       </td>
    </tr> 
     <tr>
       <td colspan="2">
         № протоколу <input type="text" size="15"name="number_protocol" value="'.$row['number_protocol'].'">
         стаття <input type="text" size="7" name="st_mku" value="'.$row['st_mku'].'">
         МКУ,
         ПІБ особи, що склала протокол <input type="text" size="7" name="insp_pmp" value="'.$row['insp_pmp'].'">
         Зміна № <input type="text" size="7" name="zmina_pmp" value="'.$row['zmina_pmp'].'">
       </td>
    </tr> 
    <tr>
        <td colspan="2">
          Предмети порушень <input type="text" size="30" name="subject" value="'.$row['subject'].'"> 
          Опис місця приховування <input type="text" size="25" name="description" value="'.$row['description'].'">
        </td>
    </tr>
    <tr>

         <td colspan="2">
          вартість визначено <input type="text" size="2" name="status_price" value="'.$row['status_price'].'"> 
          - <input type="text" size="7" name="price" value="'.$row['price" value'].'">
          штраф <input type="text" size="7" name="penalty" value="'.$row['penalty'].'">
          сплачено <input type="text" size="2" name="status_penalty" value="'.$row['status_penalty'].'">
          конфіскація <input type="text" size="7" name="seizure" value="'.$row['seizure'].'">
        </td>        
    </tr>  
    </tr>
  <tr>
    <td><input type="submit" value="Перезаписати"></td>    
	</tr>
</table>
</form>

';
}
        //echo $_POST['number_registr'];
?>
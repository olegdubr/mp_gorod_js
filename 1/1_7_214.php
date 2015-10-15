<style>

</style>
<table class="three">
</table>
<?php 

db_connect();





$sql = 'SELECT count(*) cs FROM tzmk_act where date_use between

DATE_FORMAT("'.$_POST['date_left'].'","%y-%m-%d")

AND

DATE_FORMAT("'.$_POST['date_right'].'","%y-%m-%d")';


$result = mysql_query($sql) or die(mysql_error());
while ($a = mysql_fetch_assoc($result))
{
echo 

$a["table"]." - ". $a["cs"]."<p>";

 }



echo '
<form method="post" action="index.php?step=1_7_101">
<h1 align="center">Журнал реєстрації актів огляду</h1>
<h1 align="center">товарів та ТЗ комерційного призначення</h1>
<table cellpadding="2" cellspacing="0" border="1" align="center" height="auto">
	<tr>
		<td colspan="2"><h2 align="center">Складання Акту огляду</h2></td>
	</tr>
	<tr>
      <td>
         echo $a["table"]." - ". $a["cs"]."<p>";
      </td>
	</tr>
    
    <tr>
       <td colspan="2">
       </td>
    </tr> 
      <td>
      </td>
      <td>  
      </td>
    </tr> 
        <tr>
        <td colspan="2">
        </td>
    </tr>      
	<tr>
		<td>
        </td>
	     <td> 
         </td>
    </tr>
     <tr>
       <td colspan="2">
       </td>
        </td>
    </tr>
    <tr>
         <td>
        Опис місця приховування <input type="text" size="25" name="description" value="">
        </td>
    </tr>  
    <tr>
	<tr>
		<td colspan="2"><input type="submit" value="Оформити"></td>
	</tr>
</table>
</form>

';?>
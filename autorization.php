

 <?php
  
if ($_SESSION['iduser']>0)
       {
       	   echo '

            <div class="form_aut">
            <span class="greet"> Вітаємо, ви авторизувались як,</br> '.IdentToName($_SESSION['iduser'],'users',$field='name').' '.IdentToName($_SESSION['iduser'],'users',$field='second_name'). '</span>
       	        <form name="" action="index.php" method="post">
                   </br>
                   <input name="iduser" type="hidden" value="-1">
                   <input class="button_aut" type="submit" value="Вийти">

                </form>
                  </div>

                ';




       }
  else
echo ' 


<div class="form_aut">
 
     <form name="" action="index.php?step=000" method="post">

                      <table border="0" align="center"   >
        
         
         
       
        <tr>
         
         <td>Логін : </td> 
          <td><input name="login"   class="log_form" size="10" type="text" value="" placeholder="Ваш логін">
          </td>
        </tr>
        <tr> 
        <td>Пароль : </td>
         <td> 
          <input name="pass"   class="log_form" size="10" type="password" value="" placeholder="Ваше гасло">
          </td>
        </tr>
        <tr>
                    
            <td><input  value="Зайти"  class="button_aut" type="submit"  >
            
         </td>
        </tr>
   
		 

            

		 
   
		
		

                    </table>



     </form>
</div>
 ' ;





?>



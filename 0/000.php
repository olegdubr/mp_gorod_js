<?php
     $sql='select * from users Where  login="'.$_POST['login'].'"';
     db_connect();
     $result=mysql_query($sql);
     $iduser=-1;
     While ($row=mysql_fetch_array($result))
     {
        if ($row['pass']==$_POST['pass'])
        {
        	$iduser=$row['ident'];
        }
     }
     //echo $_POST['login'].'-=-'.$_POST['pass'];
     if ($iduser>0) 
     {
     	 $_SESSION['iduser']=$iduser;
		   // echo '  <meta http-equiv="refresh" content="0.1; url=http://localhost/tstbaggywalk.ru/index.php">';*/
     }
     else
     {

echo 12345;
		    //cho '  <meta http-equiv="refresh" content="0.1; url=http://localhost/tstbaggywalk.ru/index.php">';*/



     }












?>

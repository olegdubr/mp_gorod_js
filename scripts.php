<?php
//include("FaceTop.php");
$dbdoc='u411501620_root';
$dbdic='u411501620_root';
$path='d:/www/tstbaggywalk/';
//$path='d:/www/osvitaplus/';
$www='http://compschool.osvitaplus.org.ua/';

  function db_connect($db='mp_gorod')
  {
     //$id=mysql_connect('mysql.hostinger.com.ua','u411501620_root','123456');
     $id=mysql_connect('localhost','root','12345');
     mysql_select_db($db);
     mysql_query("SET character_set_results='utf8'");
     mysql_query("SET NAMES 'utf8'");
     //mysql_set_charset('utf8');
  }

  function IdentToName($id,$tab,$field='name',$umova='')
  {
  	 db_connect();
  	 $sql='select * from '.$tab.' Where ident='.$id.$umova;
  	 $result=mysql_query($sql);
  	 $row=mysql_fetch_array($result);
  	 //echo ' -=- '.$sql.' qqqq '.$row[$field];
  	 return $row[$field];
  }
 
function IdentToNameUniversal($id,$checkrow,$tab,$field,$umova='')
  {
     db_connect();
     $sql='select * from '.$tab.' Where '.$checkrow.'='.$id;
     $result=mysql_query($sql);
     $row=mysql_fetch_array($result);
     //echo ' -=- '.$sql.' qqqq '.$row[$field];
     return $row[$field];
  }

  function reguser1()
  {
	 GLOBAL $iduser,$dbdic,$role;
     $c='<table width="100%"><tr><td>';
	 $c=$c."Êîðèñòóâà÷ - ".$iduser." - ".IdentToName($iduser,$dbdic,'users','name','');
	 $c=$c.'</td><td>';
	 $c=$c." ".IdentToName($role,$dbdic,'dicroles','name','');
	 $c=$c.'</td><td>';
     $c=$c.'<a href="index.php?step=1009001&role=7">Çì³íèòè ïàðîëü</a>';
	 $c=$c.'</td><td>';
	 $c=$c.' <a href="index.php?iduser=-1">Âèõ³ä</a>';
	 $c=$c.'</td></tr></table>';
	 return $c;
  }

  function reguser()
  {
	 GLOBAL $iduser,$dbdic,$role;
     $c='<table width="100%" align="right"><tr><td width="20%">';
	 $c=$c.' '.IdentToName($iduser,$dbdic,'users','name','');
	 $c=$c.'</td><td width="20%">';
	 $c=$c." ".IdentToName($role,$dbdic,'dicroles','name','');
	 $c=$c.'</td><td width="20%">';
	 $c=$c.'<a href="index.php?step=1009001&role=7">Çì³íèòè ïàðîëü</a>';
	 $c=$c.'</td><td width="20%">';
	 $c=$c.' <a href="index.php?iduser=-1">Âèõ³ä</a>';
	 $c=$c.'</td></tr></table>';
	 return $c;
  }

function naglav($page=0)
{
   If ($page==0)
   {
   	 echo '<p><a href="index.php?step='.$_SESSION['page'.$page].'&id='.$_SESSION['id'.$page].'"title="Íà ãîëîâíó"><img src="bfs/Arrow Up.png" width="20" height="20" alt="Íà ãîëîâíó" border="0"></a>';
   }else{
   	 echo '<p><a href="index.php?step='.$_SESSION['page'.$page].'&id='.$_SESSION['id'.$page].'"title="Íà ãîëîâíó"><img src="bfs/Arrow Back.png" width="20" height="20" alt="Íà ãîëîâíó" border="0"></a>';
   };

}




function result_query($sql) {
		$text = (@mysql_query($sql))?"Çàïèò âèêîíàíî!":"Ïîìèëêà â çàïèò³ '".mysql_errno().":".mysql_error();
		echo '<hr>'.$text;
  }

function go($sql,$sql1) {
		$text = (@mysql_query($sql))?"Çàïèò âèêîíàíî!":"Ïîìèëêà â çàïèò³ '".mysql_errno().":".mysql_error();
		echo '<hr>'.$text;

    if (mysql_affected_rows()==0) {

        $text = (@mysql_query($sql1))?"Çàïèò âèêîíàíî!":"Ïîìèëêà â çàïèò³ '".mysql_errno().":".mysql_error();
    echo '<hr>'.$text;

}
  }



 function repeat_search($repeat_vallue , $search_condition ,$repeat_vallue_details  ){
 db_connect();
 $col=count($arr);
 $sql='select * from '.$repeat_vallue.'';
 $result=mysql_query($sql);
      While ($row=mysql_fetch_array($result)){
          $arr[] =  $row[$repeat_vallue] ;
      }
      for ($i = 0; $i <= $col; $i++){
        if ( $search_condition == $arr[$i]){
          $a=1;

        }
        else{
          $a=0;

        }
      }
    return $a;
  }


  function gen_number($tablename){
     db_connect(); // конект до БД
    

    $row[100][100]; // створюємо масив для збереження рядків

    // провіряємо чи є перший рядок
    $sql='select * from '.$tablename.'  where ident = 1';
    $result=mysql_query($sql);
    while($row=mysql_fetch_array($result)){
      $flag =true; // якшо є то мітка = правда
    
    }
      

    if(!$flag){ // якшо мітка хиба то 
      $a=1; // порядковий номер = 1
      
      return $a;

    }else{
      $i=0;

      // визначаємо ксть записів в БД для того шоб відслідкувати останній елемент
      $res = mysql_query("SELECT COUNT(*) FROM ".$tablename."");
      $row = mysql_fetch_row($res);
      $total = $row[0]; // ксть елементів

      $sql='select * from '.$tablename.' where ident ='.$total;  // вибираємо останній елемент
      //echo $total;
      $result=mysql_query($sql);
      if($row=mysql_fetch_array($result)){

        $string = $row['number_registr'];  // вибираємо поле з порядковим номером

        
        $tok = strtok($string, "/");  // розбиваємо рядок шо був у полі на окремі підрядки які розділені  /
        while ($tok) { // цикл перебору підрядків , триває поки не закінчаться підряки  в основному рядку
            
            $row[$i]=$tok; // заносимо підрядок в масив слів
          //  echo 'Word='.$row[$i].'<br />';

            $i++;
            
            $tok = strtok("/"); // переходимо до наступного підрядка
            
        }
        
        $a=$row[$i-1]+1; // порядковий номер дорівнює значенню останнього слова в масиві (порядковий номер попереднього запису) + 1
      }
    }
    return $a;  // повертаємо порядковий номер
  }


 function gen_number_act($tablename){
     db_connect(); // конект до БД
    

    $row[100][100]; // створюємо масив для збереження рядків

    // провіряємо чи є перший рядок
    $sql='select * from '.$tablename.'  where act_id = 1';
    $result=mysql_query($sql);
    while($row=mysql_fetch_array($result)){
      $flag =true; // якшо є то мітка = правда
    
    }
      

    if(!$flag){ // якшо мітка хиба то 
      $a=1; // порядковий номер = 1
      
      return $a;

    }else{
      $i=0;

      // визначаємо ксть записів в БД для того шоб відслідкувати останній елемент
      $res = mysql_query("SELECT COUNT(*) FROM ".$tablename."");
      $row = mysql_fetch_row($res);
      $total = $row[0]; // ксть елементів

      $sql='select * from '.$tablename.' where act_id ='.$total;  // вибираємо останній елемент
      //echo $total;
      $result=mysql_query($sql);
      if($row=mysql_fetch_array($result)){

        $string = $row['number_registr'];  // вибираємо поле з порядковим номером

        
        $tok = strtok($string, "/");  // розбиваємо рядок шо був у полі на окремі підрядки які розділені  /
        while ($tok) { // цикл перебору підрядків , триває поки не закінчаться підряки  в основному рядку
            
            $row[$i]=$tok; // заносимо підрядок в масив слів
          //  echo 'Word='.$row[$i].'<br />';

            $i++;
            
            $tok = strtok("/"); // переходимо до наступного підрядка
            
        }
        
        $a=$row[$i-1]+1; // порядковий номер дорівнює значенню останнього слова в масиві (порядковий номер попереднього запису) + 1
      }
    }
    return $a;  // повертаємо порядковий номер
  }


?>


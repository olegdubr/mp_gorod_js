<?SESSION_START();
require 'scripts.php';
   if ($_POST['iduser']==-1) {
      $iduser=0;
      session_destroy();
   }else {
      if (isset($_SESSION['iduser']))
      {
         $iduser=$_SESSION['iduser'];
      }
      else
      {
          $iduser=0;
      }
      //echo $iduser;
   }
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>М/П "Городище"</title>

  <link type="text/css" rel="stylesheet" href="css/main.css"></link>
  <link type="text/css" rel="stylesheet" href="css/dropdownmenu_horiz.css"></link> 
  <link type="text/css" rel="stylesheet" href="css/table.css"></link> 
  <link rel="stylesheet" href="css/ui-lightness/jquery-ui-1.10.2.custom.min.css" />
  <script src="js/jquery-1.9.1.js"></script>
  <script src="js/jquery-ui-1.10.2.custom.min.js"></script>
  <script src="js/eComboBox.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css" />

    <script type="text/javascript">
    $(function(){
      $.datepicker.setDefaults(
          $.extend($.datepicker.regional["ru"])
      );
      $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
      });


    $(function() {
   
    $( "#date_left" ).datepicker({
    defaultDate: "",
    dateFormat: 'yy-mm-dd',
    changeMonth: true,
    numberOfMonths: 1,
    showWeek: true,
    onClose: function( selectedDate ) {
    $( "#date_right" ).datepicker( "option", "minDate", selectedDate );
    }

    });
    $( "#date_right" ).datepicker({
    defaultDate: "",
    dateFormat: 'yy-mm-dd',
    changeMonth: true,
    numberOfMonths: 1,
    showWeek: true,
    onClose: function( selectedDate ) {
    $( "#date_left" ).datepicker( "option", "maxDate", selectedDate );
    }

    });

    });
    </script>




  <style type="text/css">
    img{
      border: 0px;
    }
  </style>

</head>

 <body>

  <div id="container">
   <div id="header">
    <table class="one"> 
       <tr>
         <th width="118" scope="col"><a href="index.php"><img src="../mp_gorod/img/Customs.png" width="100" height="100"></a></th>
         <th width="100%" scope="col"><p>Митний пост "ГОРОДИЩЕ"</p></th>
         <th width="141" scope="col">            
             <? 
             //include 'autorization.php';
             ?>
         </th>
       </tr>
    </table>

   </div>    
             <? 
                include 'pages.php';
             ?>         
   
   <div id="content">
    <?
     include 'autorization.php';

    include 'textpage.php';
    ?> 
  </div>

  <div id="footer">
    &copy; Lopachuk&K
  </div>
 </body>

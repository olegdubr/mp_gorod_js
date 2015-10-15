<?php
    $role=0;
    $step='000000';

       if ($iduser>0)
       {
          $role=IdentToName($iduser,'users','priv');
          $step=$role.'1_00000';
          if (isset($_GET['step']) && $_GET['step']!='000')
          {
             $role=substr($_GET['step'],0,1);
             $step=$_GET['step'];
          }
       }
       else
       {
       $role=0;
          $step=$role.'1_00000';
          if (isset($_GET['step']) && $_GET['step']!='000')
          {
             $role=substr($_GET['step'],0,1);
             $step=$_GET['step'];
          }

       }
  include $role.'/'.$step.'.php';
?>




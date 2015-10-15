<?php
    $role=0;
    $step='000000';

    if ($_GET['step']=='000')
    {
       $step=$_GET['step'];
       include $role.'/'.$step.'.php';
    }

       if ($iduser>0)
       {
          $role=IdentToName($iduser,'users','priv');
          $step=$role.'000000';
       }


else
 {
          $role=0;
          $step=$role.'000000';
       }


  include $role.'/'.$step.'.php';
?>
<?php
//include_once 'dbconfig.php';
include_once 'dbconfig.php';
// delete condition
if(isset($_GET['delete_id']))
{
    $sql_query="DELETE FROM users WHERE ident=".$_GET['delete_id'];
    mysql_query($sql_query);
    header("Location: $_SERVER'DOCUMENT_ROOT'");
}
// delete condition
?>
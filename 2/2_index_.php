<?php
//include_once 'dbconfig.php';

// delete condition

if(isset($_GET['delete_id']))
{
    $sql_query="DELETE FROM users WHERE ident=".$_GET['delete_id'];
    mysql_query($sql_query);
    header("Location: $_SERVER[PHP_SELF]");
}
// delete condition
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>CRUD Operations With PHP and MySql - By Cleartuts</title>
    <link rel="stylesheet" href="style.css" type="text/css" />
    <script type="text/javascript">
        function edt_id(id)
        {
            if(confirm('Sure to edit ?'))
            {
                window.location.href='index.php?step=2_edit.php?edt_id='+id;
            }
        }
        function delete_id(id)
        {
            if(confirm('Sure to Delete ?'))
            {
                window.location.href='index.php?step=2_index.php?delete_id='+id;
            }
        }
    </script>
    <div id="body">
        <div id="content">
            <table align="center">
                <tr>
                    <th colspan="5"><a href="index.php?step=2_add_data">Додати користувача</a></th>
                </tr>
                <th>Логін</th>
                <th>Пароль</th>
                <th>Фамілія</th>
                <th>Ініціали</th>
                <th>Права</th>
                <th colspan="2">Операції</th>
                </tr>
                <?php
                $sql_query="SELECT * FROM users";
                $result_set=mysql_query($sql_query);
                while($row=mysql_fetch_row($result_set))
                {
                    ?>
                    <tr>
                        <td><?php echo $row[1]; ?></td>
                        <td><?php echo $row[2]; ?></td>
                        <td><?php echo $row[3]; ?></td>
                        <td><?php echo $row[4]; ?></td>
                        <td><?php echo $row[5]; ?></td>
                        <td align="center"><a href="javascript:edt_id('<? echo $row[0] ?>')"><img src="../mp_gorod/img/b_edit.png" align="EDIT" /></a></td>
                        <td align="center"><a href="javascript:delete_id('<? echo $row[0] ?>')"><img src="../mp_gorod/img/b_drop.png" align="DELETE" /></a></td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </div>

</center>
</body>
</html>
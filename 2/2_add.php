<?php
include_once 'dbconfig.php';
if(isset($_POST['btn-save']))
{
 // variables for input data
 $login = $_POST['login'];
 $pass = $_POST['pass'];
 $name = $_POST['name'];
 $second_name = $_POST['second_name'];
 $priv = $_POST['priv'];
 // variables for input data

 // sql query for inserting data into database
 $sql_query = 'INSERT INTO users(
 login, pass, name, second_name, priv
 )
 VALUES(
 "' . $_POST['login'] . '", "' . $_POST['pass'] . '", "' . $_POST['name'] . '",
 "' . $_POST['second_name'] . '", "' . (real)$_POST['priv'] . '"
 )';
 // sql query for inserting data into database
 
 // sql query execution function
 if(mysql_query($sql_query))
 {
  ?>
  <script type="text/javascript">
  alert('Data Are Inserted Successfully ');
  window.location.href="add_data.php';
  </script>
  <?php
 }
 else
 {
  ?>
  <script type="text/javascript">
  alert('error occured while inserting your data'). mysql_error();
  </script>

  <?php
 }
 // sql query execution function
}
?>





<div id="body">
 <div id="content">
    <form method="post">
    <table align="center">
    <tr>
    <td align="center"><a href="index.php?step=2_index">Назад</a></td>
    </tr>
    <tr>
    <td><input type="text" name="login" placeholder="Логін" required /></td>
    </tr>
    <tr>
    <td><input type="text" name="pass" placeholder="Пароль" required /></td>
    </tr>
    <tr>
    <td><input type="text" name="name" placeholder="Фамілія" required /></td>
    </tr>
    <tr>
    <td><input type="text" name="second_name" placeholder="Ініціали" required /></td>
    </tr>
    <tr>
    <td><input type="text" name="prive" placeholder="Права" required /></td>
    </tr>
    <tr>
    <td><button type="submit" name="btn-save"><strong>SAVE</strong></button></td>
    </tr>
    </table>
    </form>
    </div>
</div>

</center>
</body>
</html>
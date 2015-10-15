<?php
include_once 'dbconfig.php';
if(isset($_GET['edt_id']))
{
 $sql_query = 'SELECT * FROM users WHERE ident = "' .$_GET['edt_id']. '"';
 $result_set=mysql_query($sql_query);
 $fetched_row=mysql_fetch_array($result_set);
}
//var_dump('edt_id');
if(isset($_POST['btn-update']))
{
 //var_dump($_GET['edt_id']);
 // variables for input data
 $login = $_POST['login'];
 $pass = $_POST['pass'];
 $name = $_POST['name'];
 $second_name = $_POST['second_name'];
 $priv = $_POST['priv'];

 // variables for input data

 // sql query for update data into database
 $sql_query = "UPDATE users SET 
 login='$login',pass='$pass',name='$name',second_name='$second_name',priv='$priv' WHERE ident=".$_GET['edt_id'];
 // sql query for update data into database
 
 // sql query execution function
 if(mysql_query($sql_query))
 {
  ?>
  <script type="text/javascript">
  alert('Data Are Updated Successfully');
  window.location.href='index.php';
  </script>
  <?php
 }
 else
 {
  ?>
  <script type="text/javascript">
  alert('error occured while updating data');
  </script>
  <?php
 }
 // sql query execution function
}
if(isset($_POST['btn-cancel']))
{
 header("Location: index.php");
}
?>


<div id="body">
 <div id="content">
    <form method="post">
    <table align="center">
    <tr>
    <td><input type="text" name="login" placeholder="Логін" value="<?php echo $fetched_row['login']; ?>" required /></td>
    </tr>
    <tr>
    <td><input type="text" name="pass" placeholder="Пароль" value="<?php echo $fetched_row['pass']; ?>" required /></td>
    </tr>
    <tr>
    <td><input type="text" name="name" placeholder="Імя" value="<?php echo $fetched_row['name']; ?>" required /></td>
    </tr>
        <tr>
            <td><input type="text" name="second_name" placeholder="Фамілія" value="<?php echo $fetched_row['second_name']; ?>" required /></td>
        </tr>
        <tr>
            <td><input type="text" name="priv" placeholder="Права" value="<?php echo $fetched_row['priv']; ?>" required /></td>
        </tr>
    <tr>
    <td>
    <button type="submit" name="btn-update"><strong>UPDATE</strong></button>
    <button type="submit" name="btn-cancel"><strong>Cancel</strong></button>
    </td>
    </tr>
    </table>
    </form>
    </div>
</div>


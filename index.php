<?php SESSION_START();
require 'scripts.php';
if ($_POST['iduser'] == -1) {
    $iduser = 0;
    session_destroy();
} else {
    if (isset($_SESSION['iduser'])) {
        $iduser = $_SESSION['iduser'];
    } else {
        $iduser = 0;
    }

}
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>М/П "Городище"</title>

    <link type="text/css" rel="stylesheet" href="css/main.css">
    <link type="text/css" rel="stylesheet" href="css/dropdownmenu_horiz.css">
    <link type="text/css" rel="stylesheet" href="css/table.css">
    <link rel="stylesheet" href="css/ui-lightness/jquery-ui-1.10.2.custom.min.css"/>
    <script src="js/jquery-1.9.1.js"></script>
    <script src="js/jquery-ui-1.10.2.custom.min.js"></script>
    <script src="js/eComboBox.js"></script>
    <script src="js/my_data.js"></script>


    <style type="text/css">
        img {
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
                <th width="118" scope="col"><a href="index.php"><img src="" width="1" height="100"></a></th>
                <th width="118" scope="col"><a href="index.php"><img src="../mp_gorod/img/gorod.png" width="400" height="100"></a></th>
                <th width="118" scope="col"><a href="index.php"><img src="" width="1" height="100"></a></th>
                <th width="118" scope="col"><a href="index.php"><img src="../mp_gorod/img/gorod_titl.jpg" width="250" height="100"></a></th>
                <th width="141" scope="col">
                    <?php
                   // include 'autorization.php';
                    ?>
                </th>
            </tr>
        </table>

    </div>
    <?php
    include 'pages.php';
    ?>

    <div id="content">
        <?php
        include 'autorization.php';

        include 'textpage.php';
        ?>
    </div>

    <div id="footer">
        &copy; Lopachuk&K
    </div>
</body>

<?php


/*by oleg*/
/*master change*/
/*dev changes*/
?>

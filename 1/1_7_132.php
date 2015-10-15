<?php

$_POST['vantag']=str_replace('"', "&quot;",$_POST['vantag'] );

    $sql_notice = 'insert into auto_notice (
    ident, number_notice, who_directed, st_kku, subject_offense
    )
	 values (
        "' . (int)$_POST['ident'] . '", "' . $_POST['number_notice'] . '", "' . $_POST['who_directed'] . '",
	 	"' . $_POST['st_kku'] . '", "' . $_POST['subject_offense'] . '"
        )
';

$result=mysql_query($sql_notice);
if ($result == 'true'){
	echo "Повідомлення № ".$_POST['number_notice']. " до Акту МО № ".$_POST['number_registr']." добавлено вдало!";
	}
	else
	{
	echo "Запис не добавлено! " . mysql_error();
	}


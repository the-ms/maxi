<?php
/***********************************************
-=Ms Site=-

�����: ������������ ������ <ms@ensk.ru>
��������: ������ ������ ������
***********************************************/
	require_once('inc/init.php');
    $page = new Page('cats', '�������');
	
	$cats = $sql->SqlGetRows('SELECT * FROM ' . $module->NAME . '_' . $module->CONFIG['database']['cat'] . ' ORDER BY id;');

	require_once($site->PATH_TPL . '/main.tpl');
?>
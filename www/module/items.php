<?php
/***********************************************
-=Ms Site=-

�����: ������������ ������ <ms@ensk.ru>
��������: ������ �������� ������
***********************************************/
	require_once('inc/init.php');
    $page = new Page('items', '�������');
	
	$items = $sql->SqlGetRows('SELECT * FROM ' . $module->NAME . '_' . $module->CONFIG['database']['item'] . ' ORDER BY id;');

	require_once($site->PATH_TPL . '/main.tpl');
?>
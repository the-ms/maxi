<?php
/***********************************************
-=Ms Site=-

�����: ������������ ������ <ms@ensk.ru>
��������: ������ �������� �������
***********************************************/
	require_once('inc/init.php');
    $page = new Page('cat', '������� �������');
	
	$cat_id = $cat->EntityId('cat_id', $module->TABLE_CATS);
	if (!$cat_id) $site->SiteGoTo($module->URL);
	
	$items = $sql->SqlGetRows('SELECT * FROM ' . $module->NAME . '_' . $module->CONFIG['database']['item'] . ' WHERE cat = "' . $cat_id . '" ORDER BY id;');

	require_once($site->PATH_TPL . '/main.tpl');
?>
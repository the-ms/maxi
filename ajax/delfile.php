<?php
/***********************************************
-=Ms Site=-

Автор: Миропольский Михаил <ms@ensk.ru>
Описание: Удаление файла
***********************************************/
	//site
	require_once('../lib/site.class');
    $site = new Site;
	
	//sql
	require_once('../lib/sql.class');
	$sql = new Sql;
	
	//validation
	if (
		!isset($_GET['id']) ||
		!isset($_GET['module']) ||
		!isset($_GET['entity']) ||
		!isset($_GET['type']) ||
		!isset($_GET['name']) ||
		!preg_match('/^\d+$/', $_GET['id']) ||
		!preg_match('/^\w+$/', $_GET['module']) ||
		($_GET['entity'] != 'comment' && $_GET['entity'] != 'item' && $_GET['entity'] != 'cat') ||
		($_GET['type'] != 'file' && $_GET['type'] != 'image') ||
		!preg_match('/^\w+$/', $_GET['name']) ||
		!isset($_GET['module']) ||
		!isset($_SESSION['current_user']['id'])
		) exit;	
		
	//init
	$id = $_GET['id'];
	$module_name = $_GET['module'];
	$entity = $_GET['entity'];
	$type = $_GET['type'];
	$name = $_GET['name'];
	
	//module
	require_once('../lib/module.class');
    $module = new Module($module_name);	
	$table = ($entity == 'cat') ? $module->TABLE_CATS : $module->TABLE_ITEMS;
	$path = ($entity == 'cat') ? $module->PATH_DATA_CATS : $module->PATH_DATA_ITEMS;
	
	$info = $sql->SqlGetRow('SELECT * FROM ' . $table . ' WHERE id = ' . $id . ';');
	
	//validation
	if (!$info) exit;
	if ($type == 'cat' && $_SESSION['current_user']['access'] < 2) exit;
	if ( isset($info['user']) && $info['user'] != $_SESSION['current_user']['id'] && $_SESSION['current_user']['access'] < 2) exit;
	
	//delete
	if ($info[$name] != '')
	{
		$sql->SqlExecute('UPDATE `' . $table . '` SET ' . $name . ' = "" WHERE id = ' . $id . ';');
		unlink($path . '/' . $info[$name]);
		if ($type == 'image') unlink($path . '/s_' . $info[$name]);
	}
	
	echo TRUE;
?>
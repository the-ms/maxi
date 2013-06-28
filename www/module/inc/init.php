<?php
	//site
	require_once('../lib/site.class');
    $site = new Site;
	
	//module
	require_once('../lib/module.class');	
    $module = new Module('module');
	if ( isset($site->CONFIG['database']) )
	{
		require_once('../lib/sql.class');
		$sql = new Sql;
	}
	if ( isset($module->CONFIG['general']['image']) && $module->CONFIG['general']['image'] == 1 )
	{
		require_once('../lib/fs.class');
		require_once('../lib/image.class');
		//$image = new Image;
	}
	if ( isset($module->CONFIG['general']['mail']) && $module->CONFIG['general']['mail'] == 1 )
	{
		require_once('../lib/mail.class');
	}
	if ( isset($module->CONFIG['general']['confirm']) && $module->CONFIG['general']['confirm'] == 1 && $site->AUTH < 2)
	{
		require_once('../lib/confirm.class');
		$confirm = new Confirm;	
	}
	
	//page
	require_once('../lib/page.class');
	
	//entity
	require_once('../lib/entity.class');
	$item = new Entity($module->PATH . '/items.ini');
	if ( isset($module->CONFIG['database']['comment']) ) $comment = new Entity($module->PATH . '/comments.ini');
	if ( isset($module->CONFIG['database']['cat']) ) $cat = new Entity($module->PATH . '/cats.ini');
	
	//vars
	$item_id = $comment_id = $cat_id = $alert = '';
	$result = TRUE;	
?>
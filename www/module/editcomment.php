<?php
/***********************************************
-=Ms Site=-

Автор: Миропольский Михаил <ms@ensk.ru>
Описание: Редактирование объекта модуля
***********************************************/

	require_once('inc/init.php');
    $page = new Page('editcomment', 'Редактирование комментария');
	
	$comment_id = $comment->EntityId('comment_id', $module->TABLE_COMMENT);
	if (!$comment_id) $site->SiteGoTo($module->URL);
	$comment->FieldsRead($comment_id, $module->TABLE_COMMENT);
	
	if ($site->AUTH < 2 && $comment->FIELDS['user']['value'] != $_SESSION['current_user']['id'])
		$site->SiteGoTo($module->URL);
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$comment->FieldsSet($_POST);
		$result = $comment->FieldsValidate();
						
		//process
		if ($result === TRUE)
		{
			$comment->FieldsUpdate($comment_id, $module->TABLE_COMMENT);
			$site->SiteOk($module->URL);
		}
	}

	require_once($site->PATH_TPL . '/main.tpl');
?>
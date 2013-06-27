<?php
/***********************************************
-=Ms Site=-

Автор: Миропольский Михаил <ms@ensk.ru>
Описание: Восстановление пароля
***********************************************/
	require_once('inc/init.php');	
    $page = new Page('help', 'Восстановление пароля');	
	
	//post from view and edit
	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		//initialization
		if ( isset($_POST['email']) ) $item->FIELDS['email']['value'] = $_POST['email'];
		
		//validation
		if ( !preg_match('/\w+@\w+\.\w{2,4}/i', $item->FIELDS['email']['value']) )
		{
			$item->FIELDS['email']['error'] = 'Введите настоящий Email';
			$result = false;
		}
		else
		{
			$item_info = $sql->SqlGetRow('SELECT * FROM ' . $module->TABLE_ITEMS . ' WHERE email = "' . $item->FIELDS['email']['value'] . '";');
			if ( $item_info === false )
			{
				$item->FIELDS['email']['error'] = 'Пользователей с таким адресом не зарегистрировано';
				$result = false;
			}
		}
		
		//process
		if ($result)
		{
			$password = mt_rand(0, 9999999999);
			$sql->SqlExecute('UPDATE `' . $module->TABLE_ITEMS . '` SET password = "' . md5($password) . '" WHERE id = "' . $item_info['id'] . '";');
			$message = 'Доступ к сайту ' . $_SERVER['HTTP_HOST'] . ': ' . "\r\n\r\n" . 'Логин: ' . $item_info['title'] . "\r\n" . 'Пароль: ' . $password . "\r\n\r\n" . 'После входа, вы можете изменить пароль на странице ' . $module->URL . '/edit.php';
							
			Mail::Mailer($item->FIELDS['email']['value'], 'Пароль для ' . $_SERVER['HTTP_HOST'], $message);
			
			$site->SiteOk($module->URL);
		}
	}

	require_once($site->PATH_TPL . '/main.tpl');
?>
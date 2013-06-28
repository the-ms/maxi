<?php
	$sql->SqlExecute("INSERT IGNORE INTO users_items SET id='1',title='admin',password='7cbb3252ba6b7e9c422fac5334d22054',text='Admin account',name='Администратор',gender='1',email='" . $site->EMAIL_ADMIN . "',ip='" . $_SERVER['REMOTE_ADDR'] . "',date='" . date('Y-m-d') . "',access='2';");
?>
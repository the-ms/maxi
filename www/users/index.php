<?php
/***********************************************
-=Ms Site=-

�����: ������������ ������ <ms@ensk.ru>
��������: ������ �������� ������
***********************************************/
	require_once('inc/init.php');
	if ($site->AUTH < 1) require_once('add.php');
	elseif ($site->AUTH < 2) require_once('info.php');
	elseif ($site->AUTH > 1) require_once('items.php');
?>
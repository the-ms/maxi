<?php
/***********************************************
-=Ms Site=-

������: Main
�����: ������������ ������ <ms@ensk.ru>
��������: ���������� ��������
***********************************************/

	require_once('../lib/site.class');
	require_once('../lib/module.class');
	require_once('../lib/page.class');
    $site = new Site;
    $module = new Module('ok');
    $page = new Page();

	require_once($site->PATH_TPL . '/main.tpl');
?>
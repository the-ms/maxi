<?php
/***********************************************
-=Ms Site=-

Модуль: Main
Автор: Миропольский Михаил <ms@ensk.ru>
Описание: Главная страница
***********************************************/

	require_once('lib/site.class');
	require_once('lib/module.class');
	require_once('lib/page.class');
    $site = new Site;
    $module = new Module();
    $page = new Page();

	require_once($site->PATH_TPL . '/main.tpl');
?>
<h3><?=$page->TITLE;?></h3>
<script type="text/javascript" src="js/login.js"></script>
<form id="loginForm" name="loginForm" action="" method="get" class="mainform">
	<label>Логин: </label>
	<input id="login" name="login" type="text" maxlength="255" value=""/>
	<label>Пароль: </label>
	<input id="password" name="password" type="password" maxlength="255" value=""/>
	<button type="submit" class="submit">Войти</button>
</form>
<div id="loginAlert" class="error"></div>
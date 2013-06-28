<h3><?=$page->TITLE;?></h3>
<form name="" action="" method="post" class="mainform">
	<?
		$item->FieldViewInput('email', $item->FIELDS['email']);
	?>
	<div class="comment">Данные для доступа будут отправлены на указанный email.</div>
	<button type="submit" class="submit">Отправить</button>
	<div class="error"><?=$alert;?></div>
</form>
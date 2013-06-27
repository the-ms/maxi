<h3><?=$page->TITLE;?></h3>
<form name="<?=$module->NAME;?>" method="post" action="<?=$page->URL;?>" class="mainform">
	<?	
		foreach ($comment->FIELDS as $name => $field) $comment->FieldViewInput($name, $field);
		
		if ( isset($module->CONFIG['general']['confirm']) && $module->CONFIG['general']['confirm'] == 1 && $site->AUTH < 2)
			$confirm->ConfirmView();
	?>	
	
	<button type="submit" class="submit">Сохранить</button>
	<div class="error"><?=$alert;?></div>
</form>
<h3><?=$page->TITLE;?></h3>
<form name="<?=$module->NAME;?>" method="post" action="<?=$page->URL;?>" enctype="multipart/form-data" class="mainform">
	<?	
		foreach ($item->FIELDS as $name => $field) $item->FieldViewInput($name, $field);
		
		if ( isset($module->CONFIG['general']['confirm']) && $module->CONFIG['general']['confirm'] == 1 && $site->AUTH < 2)
			$confirm->ConfirmView();
	?>	
	
	<button type="submit" class="submit">Зарегистрироваться</button>
	<div class="error"><?=$alert;?></div>
</form>
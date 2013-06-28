<h3><?=$page->TITLE;?></h3>
<form name="<?=$module->NAME;?>" method="post" action="<?=$page->URL;?>" enctype="multipart/form-data" class="mainform">
	<?	
		foreach ($cat->FIELDS as $name => $field) $cat->FieldViewInput($name, $field);
	?>	
	
	<button type="submit" class="submit">Сохранить</button>
	<div class="error"><?=$alert;?></div>
</form>
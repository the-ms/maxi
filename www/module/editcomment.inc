<h3><?=$page->TITLE;?></h3>
<form name="<?=$module->NAME;?>" method="post" action="<?=$page->URL;?>" class="mainform">
	<input type="hidden" name="comment_id" value="<?=$comment_id;?>"/>
	<?	
		foreach ($comment->FIELDS as $name => $field)
			$comment->FieldViewInput($name, $field);
	?>
	<button type="submit" class="submit">Сохранить</button>
	<div class="error"><?=$error;?></div>
</form>
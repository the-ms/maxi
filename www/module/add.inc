<h3><?=$page->TITLE;?></h3>
<form name="<?=$module->NAME;?>" method="post" action="<?=$page->URL;?>" enctype="multipart/form-data" class="mainform">
	<?	
		foreach ($item->FIELDS as $name => $field)
		{
			if ( isset($module->CONFIG['database']['cat']) && $name == 'cat')
			{
				echo '<label>' . $field['title'] . ':</label>';				
				echo '<select name="' . $name . '">';
					foreach ($cats as $cat_params)
						echo '<option value="' . $cat_params['id'] . '">' . $cat_params['title'] . '</option>';
				echo '</select>';
			}
			else $item->FieldViewInput($name, $field);
		}
		
		if ( isset($module->CONFIG['general']['confirm']) && $module->CONFIG['general']['confirm'] == 1 && $site->AUTH < 2)
			$confirm->ConfirmView();
	?>	
	
	<button type="submit" class="submit">Сохранить</button>
	<div class="error"><?=$alert;?></div>
</form>
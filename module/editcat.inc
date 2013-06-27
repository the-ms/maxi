<script type="text/javascript" src="js/edit.js"></script>
<h3><?=$page->TITLE;?></h3>
<form name="<?=$module->NAME;?>" method="post" action="<?=$page->URL;?>" enctype="multipart/form-data" class="mainform">
	<input type="hidden" name="cat_id" value="<?=$cat_id;?>"/>
	<?	
		foreach ($cat->FIELDS as $name => $field)
		{
			$cat->FieldViewInput($name, $field);
			if ($field['type'] == 'image' && $field['value'] != '')
			{
				echo '<div id="' . $name . 'Control">
						<a href="' . $module->URL_DATA_CATS . '/' . $field['value'] . '" rel="lightbox"><img src="' . $module->URL_DATA_CATS . '/s_' . $field['value'] . '" alt=""/></a><br/>
						<button type="button" onclick="delfile(' . $cat_id . ',\'' . $module->NAME . '\',\'cat\',\'' . $field['type'] . '\',\'' . $name . '\')">удалить</button>
					</div>';
			}
			if ($field['type'] == 'file' && $field['value'] != '')
			{
				echo '<div id="' . $name . 'Control">
							<a href="' . $module->URL_DATA_CATS . '/' . $field['value'] . '">' . $module->URL_DATA_CATS . '/' . $field['value'] . '</a><br/>
							<button type="button" onclick="delfile(' . $cat_id . ',\'' . $module->NAME . '\',\'cat\',\'' . $field['type'] . '\',\'' . $name . '\')">удалить</button>
					</div>';
			}
		}
	?>
	<button type="submit" class="submit">Сохранить</button>
	<div class="error"><?=$error;?></div>
</form>
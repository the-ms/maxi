<script type="text/javascript" src="js/edit.js"></script>
<h3><?=$page->TITLE;?></h3>
<form name="<?=$module->NAME;?>" method="post" action="<?=$page->URL;?>" enctype="multipart/form-data" class="mainform">
	<input type="hidden" name="item_id" value="<?=$item_id;?>"/>
	<?	
		foreach ($item->FIELDS as $name => $field)
		{
			if ( isset($module->CONFIG['database']['cat']) && $name == 'cat')
			{
				echo '<label>' . $field['title'] . ':</label>';				
				echo '<select name="' . $name . '">';
					foreach ($cats as $cat_params)
					{
						echo '<option value="' . $cat_params['id'] . '"';
							if ($cat_params['id'] == $item->FIELDS['cat']['value']) echo ' selected=""';
						echo '>' . $cat_params['title'] . '</option>';
					}
				echo '</select>';
			}
			else
			{
				$item->FieldViewInput($name, $field);
				if ($field['type'] == 'image' && $field['value'] != '')
				{
					echo '<div id="' . $name . 'Control">
							<a href="' . $module->URL_DATA_ITEMS . '/' . $field['value'] . '" rel="lightbox"><img src="' . $module->URL_DATA_ITEMS . '/s_' . $field['value'] . '" alt=""/></a><br/>
							<button type="button" onclick="delfile(' . $item_id . ',\'' . $module->NAME . '\',\'item\',\'' . $field['type'] . '\',\'' . $name . '\')">удалить</button>
						</div>';
				}
				if ($field['type'] == 'file' && $field['value'] != '')
				{
					echo '<div id="' . $name . 'Control">
							<a href="' . $module->URL_DATA_ITEMS . '/' . $field['value'] . '">' . $module->URL_DATA_ITEMS . '/' . $field['value'] . '</a><br/>
							<button type="button" onclick="delfile(' . $item_id . ',\'' . $module->NAME . '\',\'item\',\'' . $field['type'] . '\',\'' . $name . '\')">удалить</button>
						</div>';
				}
			}
		}
	?>
	<button type="submit" class="submit">Сохранить</button>
	<div class="error"><?=$error;?></div>
</form>
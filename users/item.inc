<?
	foreach ($item->FIELDS as $name => $field)
	{
		if ($field['value'] == '') continue;
		
		switch ($field['type'])
		{		
			case 'image': 
				echo '<a href="' . $module->URL_DATA_ITEMS . '/' . $field['value'] . '" rel="lightbox" class="image-view"><img src="' . $module->URL_DATA_ITEMS . '/' . 's_' . $field['value'] . '" alt="' . $field['title'] . '"/></a>';
				break;
			case 'file': 
				echo '<div><a href="' . $module->URL_DATA_ITEMS . '/' . $field['value'] . '">' . $field['title'] . '</a></div>';
				break;
			default:
				$item->FieldView($name, $field);
		}		
	}
?>
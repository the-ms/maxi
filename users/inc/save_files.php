<?php	foreach ($item->FIELDS as $name => $field)	{		if ($field['type'] == 'image' && $field['value'] != '' && $_FILES[$name]['error'] != '4')		{				$image_name = $item_id . '.' . Image::ImageType($_FILES[$name]['tmp_name']);			Fs::FsMove($_FILES[$name]['tmp_name'], $module->PATH_DATA_ITEMS . '/' . $image_name);				Image::ImageCreatePreview($module->PATH_DATA_ITEMS . '/' . $image_name, $module->PATH_DATA_ITEMS . '/s_' . $image_name, 100);							$sql->SqlExecute('UPDATE `' . $module->TABLE_ITEMS . '` SET ' . $name . ' = "' . $image_name . '" WHERE id = ' . $item_id . ';');		}		if ($field['type'] == 'file' && $field['value'] != '' && $_FILES[$name]['error'] != '4')		{			$file_name = $_FILES[$name]['name'];			Fs::FsMove($_FILES[$name]['tmp_name'], $module->PATH_DATA_ITEMS . '/' . $file_name);			$sql->SqlExecute('UPDATE `' .$module->TABLE_ITEMS . '` SET ' . $name . ' = "' . $file_name . '" WHERE id = ' . $item_id . ';');		}	}?>
<?php
	//site
	require_once('lib/site.class');
    $site = new Site;
	
	if ( !file_exists($site->PATH_DATA) ) mkdir($site->PATH_DATA);
	
	if ( isset($site->CONFIG['database']) )
	{
		require_once('lib/sql.class');
		$sql = new Sql;
		
		//database
		$sql->SqlExecute('CREATE DATABASE IF NOT EXISTS ' . $site->CONFIG['database']['name']);
		
		//for every module
		foreach ($site->CONFIG['modules'] as $module => $module_title)
		{
			$module_config = $site->SiteGetConfig($site->PATH . '/' . $module . '/module.ini');
			
			if ( isset($module_config['database']) )
			{
				//for every entity
				foreach ($module_config['database'] as $entity_name => $entity_title)
				{
					$sql_entity = 'CREATE TABLE IF NOT EXISTS `' . $module . '_' . $entity_title . '` (`id` int(10) unsigned NOT NULL auto_increment,';
					
					$entity_fields = array();
					
					require_once('lib/entity.class');
					$entity = new Entity($site->PATH . '/' . $module . '/' . $entity_title . '.ini');
					
					//for every field
					foreach ($entity->FIELDS as $field_name => $field_params)
					{						
						switch ($field_params['type'])
						{
							case 'text':
								$entity_fields[] = '`' . $field_name . '` text collate utf8_unicode_ci NOT NULL default \'' . $field_params['value'] . '\'';
								break;
							case 'price':
								$entity_fields[] = '`' . $field_name . '` int(' . $field_params['maxlength'] . ') unsigned NOT NULL default \'' . $field_params['value'] . '\'';
								break;
							case 'image':
								$entity_fields[] = '`' . $field_name . '` varchar(' . $field_params['maxlength'] . ') collate utf8_unicode_ci NOT NULL default \'' . $field_params['value'] . '\'';
								break;
							case 'file':
								$entity_fields[] = '`' . $field_name . '` varchar(' . $field_params['maxlength'] . ') collate utf8_unicode_ci NOT NULL default \'' . $field_params['value'] . '\'';
								break;
							case 'icq':
								$entity_fields[] = '`' . $field_name . '` int(' . $field_params['maxlength'] . ') unsigned NOT NULL default \'' . $field_params['value'] . '\'';
								break;
							case 'url':
								$entity_fields[] = '`' . $field_name . '` varchar(' . $field_params['maxlength'] . ') collate utf8_unicode_ci NOT NULL default \'' . $field_params['value'] . '\'';
								break;
							case 'email':
								$entity_fields[] = '`' . $field_name . '` varchar(' . $field_params['maxlength'] . ') collate utf8_unicode_ci NOT NULL default \'' . $field_params['value'] . '\'';
								break;
							case 'user':
								$entity_fields[] = '`' . $field_name . '` int(10) unsigned NOT NULL';
								break;
							case 'ip':
								$entity_fields[] = '`' . $field_name . '` varchar(' . $field_params['maxlength'] . ') collate utf8_unicode_ci NOT NULL default \'0\'';
								break;
							case 'date':
								$entity_fields[] = '`' . $field_name . '` date NOT NULL default \'0000-00-00\'';
								break;
							case 'access':
								$entity_fields[] = '`' . $field_name . '` tinyint(' . $field_params['maxlength'] . ') unsigned NOT NULL default \'' . $field_params['value'] . '\'';
								break;
							case 'rate':
								$entity_fields[] = '`' . $field_name . '` int(' . $field_params['maxlength'] . ') unsigned NOT NULL default \'' . $field_params['value'] . '\'';
								break;
							default:
								$entity_fields[] = '`' . $field_name . '` varchar(' . $field_params['maxlength'] . ') collate utf8_unicode_ci NOT NULL default \'' . $field_params['value'] . '\'';
						}
					}
					
					$sql_entity .= implode($entity_fields, ',') . ',PRIMARY KEY  (`id`) ) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;';
					
					$sql->SqlExecute($sql_entity);
				}
			}
			if ( 
				(isset($module_config['general']['image']) && $module_config['general']['image'] = 1) ||
				(isset($module_config['general']['file']) && $module_config['general']['file'] = 1)
				)
			{
				if ( !file_exists($site->PATH_DATA . '/' . $module) ) mkdir($site->PATH_DATA . '/' . $module);
				if ( !file_exists($site->PATH_DATA . '/' . $module . '/items') ) mkdir($site->PATH_DATA . '/' . $module . '/items');
				if ( isset($module_config['database']['cat']) && !file_exists($site->PATH_DATA . '/' . $module . '/cats') ) mkdir($site->PATH_DATA . '/' . $module . '/cats');
			}
			if ( file_exists($site->PATH . '/' . $module . '/' . 'setup.php') ) include_once($site->PATH . '/' . $module . '/' . 'setup.php');
		}
	}
	echo 'done';
?>
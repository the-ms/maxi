<script type="text/javascript" src="js/edit.js"></script>
<?
	foreach ($item->FIELDS as $name => $field)
	{
		if ($field['value'] == '') continue;
		
		switch ($field['type'])
		{		
			case 'id': break;
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
	if ( isset($module->CONFIG['database']['comment']) )
	{
		echo '<h3 style="margin-top: 10px;" class="clear">Комментарии:</h3>';
		if ($comments)
			foreach ($comments as $comment)
			{
				echo '<p id="comment' . $comment['id'] . '"><strong>';
				if ($comment['email'] != '') echo '<a href="mailto:' . $comment['email'] . '">' . $comment['name'] . '</a>';
				else echo $comment['name'];
				echo ':</strong> &nbsp; ';
				if ($site->AUTH > 1 || (isset($_SESSION['current_user']['id']) && $_SESSION['current_user']['id'] === $item_params['user']))		
						echo '<a href="' . $module->URL . '/editcomment.php?comment_id=' . $comment['id'] . '">редактировать</a> | 
										<a id="delComment" href="javascript:delcomment(' . $comment['id'] . ',\'' . $module->NAME . '\')">удалить</a>';
				echo '<br/>' . $comment['text'] . '</p>';
			}
		else echo '<p>Комментариев нет.</p>';
		echo '<a href="' . $module->URL . '/addcomment.php?item_id=' . $item_id . '">Добавить комментарий</a>';
	}
?>

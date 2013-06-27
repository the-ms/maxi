<script type="text/javascript" src="js/edit.js"></script>
<ul>
	<?
		if ($items)
		{
			foreach ($items as $item_id => $item_params)
			{
				echo '<li id="item' . $item_id . '">
						<a href="' . $module->URL . '/item.php?item_id=' . $item_id . '">' . $item_params['title'] . '</a> ';
							echo '<a href="' . $module->URL . '/edit.php?item_id=' . $item_id . '">редактировать</a> 
									<a id="delItem" href="javascript:delitem(' . $item_id . ',\'' . $module->NAME . '\')">удалить</a>';
				echo '</li>';
			}
		}
		else echo '<li>Пользователей нет</li>';
	?>
</ul>
<a href="<?=$module->URL . '/add.php';?>">Добавить</a>
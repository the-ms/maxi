<script type="text/javascript" src="js/edit.js"></script>
<ul>
	<?
		if ($cats)
		{
			foreach ($cats as $cat_id => $cat_params)
			{
				echo '<li id="cat' . $cat_id . '">
						<a href="' . $module->URL . '/cat.php?cat_id=' . $cat_id . '">' . $cat_params['title'] . '</a> &nbsp; ';
						if ($site->AUTH > 1)		
							echo '<a href="' . $module->URL . '/editcat.php?cat_id=' . $cat_id . '">редактировать</a> |
									<a href="javascript:delentity(' . $cat_id . ',\'' . $module->NAME . '\',\'cat\')">удалить</a>';
				echo '</li>';
			}
		}
		else echo '<li>Рубрик нет</li>';
	?>
</ul>
<? if ($site->AUTH > 1):?>
<p style="margin-top: 10px;"><a href="<?=$module->URL . '/addcat.php';?>">Добавить</a></p>
<? endif; ?>
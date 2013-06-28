<script type="text/javascript" src="js/edit.js"></script>
<ul>
	<?
		if ($items)
		{
			$page->PagePagerInit(count($items), 10);		
		
			$i = 1;
			foreach ($items as $item_id => $item_params)
			{
				if ($i >= $page->PAGER['start'] && $i <= $page->PAGER['end'] )
				{
					echo '<li id="item' . $item_id . '">
							<a href="' . $module->URL . '/item.php?item_id=' . $item_id . '">' . $item_params['title'] . '</a> &nbsp; ';
							if ($site->AUTH > 1 || (isset($_SESSION['current_user']['id']) && $_SESSION['current_user']['id'] === $item_params['user']))		
								echo '<a href="' . $module->URL . '/edit.php?item_id=' . $item_id . '">редактировать</a> |
										<a href="javascript:delentity(' . $item_id . ',\'' . $module->NAME . '\',\'item\')">удалить</a>';
					echo '</li>';
				}
				$i++;
			}
			
			$page->PagePagerShow();				
		}
		else echo '<li>Данных нет</li>';
	?>
</ul>
<p style="margin-top: 10px;"><a href="<?=$module->URL . '/add.php';?>">Добавить</a></p>
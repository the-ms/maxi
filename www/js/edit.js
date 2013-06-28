//delete
function delfile(id, module, entity, type, name)
{
	if (type == 'image')
	{
		if ( !confirm('Вы действительно хотите удалить изображение?') ) return false;
	}
	else
	{
		if ( !confirm('Вы действительно хотите удалить файл?') ) return false;
	}
	
	var item = $("#"+name+"Control");
	$(item).append(loader);
	$.get('/ajax/delfile.php', { id: id, module: module, entity: entity, type: type, name: name },function(data){$(item).remove(); $(loader).remove();});	
	
	return true;
}
function delentity(id, module, entity)
{
	switch (entity)
	{
		case 'comment':
			if ( !confirm('Вы действительно хотите удалить комментарий?') ) return false;
			break;
		case 'cat':
			if ( !confirm('Вы действительно хотите удалить рубрику и все ее содержимое?') ) return false;
			break;
		default: if ( !confirm('Вы действительно хотите удалить?') ) return false;
	}
	
	var item = $("#"+entity+id);
	$(item).append(loader);
	$.get('/ajax/delentity.php', { id: id, module: module, entity: entity },function(data){$(item).remove(); $(loader).remove();});	
}
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/main.js"></script>

<? if ( isset($page->CONFIG['javascript']['page']) ): ?>
	<script type="text/javascript" src="js/<?=$module->NAME . '/' . $page->NAME;?>.js"></script>
<? endif; ?>

<? if ( isset($page->CONFIG['javascript']['jtip']) ): ?>
	<script type="text/javascript" src="js/jquery.delegate.js"></script>
	<script type="text/javascript" src="js/jquery.jtip.js"></script>
	<link type="text/css" href="css/jquery.jtip.css" rel="stylesheet"/>
<? endif; ?>

<? if ( isset($page->CONFIG['javascript']['lightbox']) ): ?>
	<script type="text/javascript" src="js/jquery.lightbox.js"></script>
	<link type="text/css" href="css/jquery.lightbox.css" rel="stylesheet"/>
<? endif; ?>

<? if ( isset($page->CONFIG['javascript']['datepicker'])  ): ?>
	<script type="text/javascript" src="js/jquery.ui.core.js"></script>
	<script type="text/javascript" src="js/jquery.ui.datepicker.js"></script>
	<link type="text/css" href="css/jquery.ui.datepicker.css" rel="stylesheet"/>		
<? endif; ?>

<?
	if ( isset($page->CONFIG['javascript']['validate']) )
	{
		if ($page->CONFIG['javascript']['validate'] == 'item')	echo $item->FieldsJSValidate($module->NAME);
		if ($page->CONFIG['javascript']['validate'] == 'cat')	echo $cat->FieldsJSValidate($module->NAME);
	}
?>

<? if ( isset($page->CONFIG['javascript']['wysiwyg'])  ): ?>
	<script type="text/javascript" src="js/jquery.wysiwyg.js"></script>
	<link type="text/css" href="css/jquery.wysiwyg.css" rel="stylesheet"/>
<? endif; ?>

<? if ( isset($page->CONFIG['javascript']['edit'])  ): ?>
	<script type="text/javascript" src="js/edit.js"></script>	
<? endif; ?>
//loader
var loader = $("<img id='loader' src='/images/ajax-loader.gif'/>");

$(function() 
{
	$("input,select,textarea").change(function () { 
		$('div.error').remove();
	});	
	$("#passwordLink").click(function () {
		$("#passwordBlock").slideToggle("slow");
		$("#passwordLink").remove();
		return false;
	});
});
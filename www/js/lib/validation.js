function is_system(string)
{
	   if (/\W/.test(string)) return(false);
	   return(true);
}

function is_digital(string)
{
	   if (/\d+/.test(string)) return(true);
	   return(false);
}

function is_right_length(string,min,max)
{
	   if ( string.length>max ) return(false);
	   if ( string.length<min ) return(false);
	   return(true);
}

function is_empty(string)
{
	   if ( string.length > 0 ) return(false);
	   return(true);
}

function is_email(string)
{
	if (/\w+@\w+\.\w{1,4}/.test(string)) return(true);
	return(false);
}

function is_url(string)
{
	if (/\w+\.\w{1,4}/.test(string)) return(true);
	return(false);
}

function is_icq(string)
{
   if (/\d{5,9}/.test(string)) return(true);
   return(false);
}

function is_ip(string)
{
	   if (/\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}/.test(string)) return(true);
	   return(false);
}

function is_image(string)
{
	string = string.toLowerCase();	
	if (string.indexOf('.jpg') != -1) return(true);
	if (string.indexOf('.jpeg') != -1) return(true);
	if (string.indexOf('.gif') != -1) return(true);
	if (string.indexOf('.png') != -1) return(true);
	return(false);
}
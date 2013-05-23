<?php

if(!function_exists('config'))
{
	function config($item)
	{
		return get_instance()->config->item($item);
	}
}
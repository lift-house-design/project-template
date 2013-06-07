<?php

if(!function_exists('config'))
{
	function config($item)
	{
		return get_instance()->config->item($item);
	}
}

if(!function_exists('trace'))
{
	function trace()
	{
		$backtrace=debug_backtrace();
		
		echo '<table width="100%">';
		
		echo '<tr>';
		echo 	'<th>Line No.</th>';
		echo 	'<th>Filename</th>';
		echo 	'<th>Method/Function</th>';
		echo 	'<th>Args</th>';
		echo '</tr>';
		
		foreach($backtrace as $trace)
		{
			echo '<tr>';
			echo 	'<td>'.$trace['line'].'</td>';
			echo 	'<td>'.$trace['file'].'</td>';
			echo 	'<td>'.( isset($trace['class']) ? $trace['class'].'::'.$trace['function'] : $trace['function'] ).'</td>';
			echo 	'<td>'.count($trace['args']).'</td>';
			echo '</tr>';
			
		}
		
		echo '</table>';
	}
}

if(!function_exists('post'))
{
	function post($key=NULL)
	{
		$args=func_get_args();
		$CI=get_instance();
		
		if(count($args)==0)
			return $CI->input->post();
		elseif(count($args)==1)
		{
			if(is_array($args[0]))
			{
				$post=array();
				foreach($args[0] as $key)
					$post[$key]=$CI->input->post($key);
				
				return $post;
			}
			else
				return $CI->input->post($args[0]);
		}
		else
		{
			$post=array();
			foreach($args as $key)
				$post[$key]=$CI->input->post($key);
			
			return $post;
		}
	}
}

if(!function_exists('session'))
{
	function session()
	{
		$args=func_get_args();
		$CI=get_instance();
		
		if(count($args)==0)
			return $CI->session->all_userdata();
		elseif(count($args)==1)
		{
			if(is_array($args[0]))
				return $CI->session->set_userdata($args[0]);
			else
				return $CI->session->userdata($args[0]);
		}
		elseif(count($args)==2)
			return $CI->session->set_userdata($args[0],$args[1]);
	}
}

if(!function_exists('set_error'))
{
	function set_error($message,$field=FALSE)
	{
		$CI=get_instance();

		return $CI->form_validation->set_error($message,$field);
	}
}

if(!function_exists('get_errors'))
{
	function get_errors()
	{
		$CI=get_instance();

		return $CI->get_errors();
	}
}

if(!function_exists('set_notification'))
{
	function set_notification($message)
	{
		$CI=get_instance();

		return $CI->set_notification($message);
	}
}

if(!function_exists('get_notifications'))
{
	function get_notifications($erase=TRUE)
	{
		$CI=get_instance();

		return $CI->get_notifications($erase);
	}
}

if(!function_exists('form_submitted'))
{
	function form_submitted($slug)
	{
		$CI=get_instance();

		return $CI->form_validation->run($slug);
	}
}

if(!function_exists('states_array'))
{
	function states_array($merge_with=array())
	{
		$states_array=array(
			'AL'=>'Alabama',  
			'AK'=>'Alaska',  
			'AZ'=>'Arizona',  
			'AR'=>'Arkansas',  
			'CA'=>'California',  
			'CO'=>'Colorado',  
			'CT'=>'Connecticut',  
			'DE'=>'Delaware',  
			'DC'=>'District Of Columbia',  
			'FL'=>'Florida',  
			'GA'=>'Georgia',  
			'HI'=>'Hawaii',  
			'ID'=>'Idaho',  
			'IL'=>'Illinois',  
			'IN'=>'Indiana',  
			'IA'=>'Iowa',  
			'KS'=>'Kansas',  
			'KY'=>'Kentucky',  
			'LA'=>'Louisiana',  
			'ME'=>'Maine',  
			'MD'=>'Maryland',  
			'MA'=>'Massachusetts',  
			'MI'=>'Michigan',  
			'MN'=>'Minnesota',  
			'MS'=>'Mississippi',  
			'MO'=>'Missouri',  
			'MT'=>'Montana',
			'NE'=>'Nebraska',
			'NV'=>'Nevada',
			'NH'=>'New Hampshire',
			'NJ'=>'New Jersey',
			'NM'=>'New Mexico',
			'NY'=>'New York',
			'NC'=>'North Carolina',
			'ND'=>'North Dakota',
			'OH'=>'Ohio',  
			'OK'=>'Oklahoma',  
			'OR'=>'Oregon',  
			'PA'=>'Pennsylvania',  
			'RI'=>'Rhode Island',  
			'SC'=>'South Carolina',  
			'SD'=>'South Dakota',
			'TN'=>'Tennessee',  
			'TX'=>'Texas',  
			'UT'=>'Utah',  
			'VT'=>'Vermont',  
			'VA'=>'Virginia',  
			'WA'=>'Washington',  
			'WV'=>'West Virginia',  
			'WI'=>'Wisconsin',  
			'WY'=>'Wyoming',
		);
		
		return array_merge($merge_with,$states_array);
	}
}

/* End of file project_helper.php */
/* Location: ./application/helpers/project_helper.php */
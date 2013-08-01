<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Modules
{
	protected $_ci;

	protected $_module_instances=array();

	public function __construct()
	{
		$this->_ci=get_instance();
		$this->_ci->load->helper('file');
	}

	public function get_module_types()
	{
		$module_path=$this->_ci->config->item('module_path');
		return get_directories($module_path);
	}

	public function get_modules($type)
	{
		$module_path=$this->_ci->config->item('module_path');
		if($this->type_exists($type)===FALSE)
			return FALSE;

		$modules=array();

		foreach(get_directories($module_path.'/'.$type) as $dir)
		{
			if($this->module_exists($dir,$type)===TRUE)
				$modules[]=$dir;
		}

		return $modules;
	}

	/**
	 * Checks to see if specified module type exists (does the directory exist)
	 */
	public function type_exists($type)
	{
		$module_path=$this->_ci->config->item('module_path');
		return file_exists($module_path.'/'.$type);
	}

	/**
	 * Checks to see if the specified module and module type exists (does the module file exist)
	 */
	public function module_exists($name,$type)
	{
		$module_path=$this->_ci->config->item('module_path');
		return file_exists($module_path.'/'.$type.'/'.$name.'/'.$name.'.php');
	}

	public function get_instance($name,$type)
	{
		if(!empty($this->_module_instances))
		{
			if(!empty($this->_module_instances[$type][$name]))
				return $this->_module_instances[$type][$name];
		}

		if($this->module_exists($name,$type)===FALSE)
			return FALSE;

		$module_path=$this->_ci->config->item('module_path');
		require_once($module_path.'/'.$type.'/'.$name.'/'.$name.'.php');

		$module_class=$name.'_'.$type.'_module';

		$CI=get_instance();
		$module=new $module_class($CI);
		$this->_module_instances[$type][$name]=$module;

		return $module;
	}
}

class Module
{
	public $key;
	
	public $type;

	protected $_ci;

	public function __construct($CI)
	{
		$this->_ci=$CI;

		// Determine the module type and key
		$classname=strtolower(get_class($this));
		$classname_parts=explode('_',$classname);

		array_pop($classname_parts); // Remove the "_module" part
		$this->type=array_pop($classname_parts);
		$this->key=implode('_',$classname_parts);
	}
}

class Admin_module extends Module
{
	public $name;

	public function init($controller)
	{
		$controller->nav[$this->key]=$this->name;
	}
}
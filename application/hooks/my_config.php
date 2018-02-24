<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  //Loads configuration from database into global CI config
function load_config()
{
	$CI =& get_instance();
	foreach($CI->config_model->getAll()->result() as $site_config)
	{
		$CI->config->set_item($site_config->key,$site_config->value);
	}
}
?>
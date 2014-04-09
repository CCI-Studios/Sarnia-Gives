<?php

class ComGivesDispatcher extends ComDefaultDispatcher {
	
	protected function _initialize(KConfig $config)
	{
		$config->append(array(
			'controller_default'	=> 'dashboard',
			'request'				=> array('enabled' => KRequest::get('get.enabled', 'boolean', false)),
			'request_persistent' 	=> true
		));
		
		parent::_initialize($config);
	}
}
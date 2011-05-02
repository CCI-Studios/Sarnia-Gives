<?php
 
class ComGivesDispatcher extends ComDefaultDispatcher {
     
    protected function _initialize(KConfig $config)
    {
		$config->append(array('controller_default' => 'volunteers'));
        parent::_initialize($config);
    }
}
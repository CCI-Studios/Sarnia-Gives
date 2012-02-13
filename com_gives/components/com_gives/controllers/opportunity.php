<?php

class ComGivesControllerOpportunity extends ComDefaultControllerDefault
{
    public function __construct(KConfig $config)
    {
        parent::__construct($config);
        
        $this->registerCallback('after.save', array($this, 'afterSave'));
    }
    
    protected  function _initialize(KConfig $config)
    {
        $config->append(array(
            'behaviors' => array('site::com.default.controller.behavior.editable')
        ));
        
        parent::_initialize($config);
    }
    
    public function getRequest()
    {
    	if ($this->_request->layout === 'map' && is_numeric($this->_request->distance)) {
    		$this->_request->sort = 'distance';
    	}
    	
    	$this->_request->enabled = 1;
    	
    	return parent::getRequest();
    }
    
    public function afterSave(KCommandContext $context)
    {	
        $this->setRedirect('index.php?option=com_gives&view=opportunity&id='. $context->result->id);
		return true;
    }
}
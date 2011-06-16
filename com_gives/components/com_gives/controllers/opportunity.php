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
    
    public function afterSave(KCommandContext $context)
    {	
        $this->setRedirect('index.php?option=com_gives&view=organization&id='. $context->result->gives_organization_id);
		return true;
    }
}
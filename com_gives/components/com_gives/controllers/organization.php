<?php

class ComGivesControllerOrganization extends ComDefaultControllerDefault
{
    public function __construct(KConfig $config)
    {
        parent::__construct($config);
        
        $this->registerCallback('after.save', array($this, 'afterSave'));
		$command = KFactory::get('site::com.gives.command.validate');
		$this->getCommandChain()->enqueue($command);
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
    	$this->_request->enabled = 1;
    	return parent::getRequest();
    }
    
    public function afterSave(KCommandContext $context)
    {
		$this->setRedirect(JRoute::_('index.php?option=com_user&view=login'));
    }
}
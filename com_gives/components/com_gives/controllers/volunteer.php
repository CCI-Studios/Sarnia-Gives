<?php

class ComGivesControllerVolunteer extends ComDefaultControllerDefault
{
    public function __construct(KConfig $config)
    {
        parent::__construct($config);
        
		$this->registerCallback(
			array('before.edit', 'before.apply', 'before.save'), 
			array($this, 'checkPermission'));
		$this->registerCallback(
			array('after.save'),
			array($this, 'afterSave'));
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

	public function checkPermission() {
		$me = $this->getModel()->getMe();
		$vol = $this->getModel()->getItem();

		return $me->id === $vol->user_id;	
	}
	
	protected function _actionRead(KCommandContext $context)
	{
		$request = $this->getRequest();
		$row	 = parent::_actionRead($context);
		
		if (!isset($request->id))
			$request->id = KFactory::get('lib.joomla.user')->id;
			
		$me = $this->getModel()->getMe();
			
		if ($me->id && $me->id !== $row->user_id) {
			if ($request->layout == 'form')
				$message = "You cannot edit other volunteers profile.";
			else 
				$message = "You cannot view other volunteers profiles.";
				
			KFactory::get('lib.joomla.application')
				->redirect(JRoute::_('/'), JText::_($message), 'error');
			return $row;
		}
		
		return $row;
	}
	
	public function afterSave(KCommandContext $context)
	{
		if ($this->getRequest()->layout === 'form') {
			$this->setRedirect('index.php?option=com_user&view=login');
		} else {			
			$this->setRedirect('index.php?option=com_gives&view=volunteer&id='. KRequest::get('get.id', 'int'));
		}
		
		return true;
	}
}
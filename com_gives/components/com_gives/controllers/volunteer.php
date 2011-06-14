<?php

class ComGivesControllerVolunteer extends ComDefaultControllerDefault
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
        $action = $this->getModel()->getState()->isUnique() ? 'edit' : 'add';
        $params = JComponentHelper::getParams('com_gives');


        if ($action === 'add') {
            $this->setRedirect($params->get('volunteer_redirect', '/'));
        } else {
            $this->setRedirect('index.php?option=com_gives&view=profile');
        }
    }
}
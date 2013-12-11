<?php

class ComGivesControllerRegistration extends ComDefaultControllerDefault
{
    public function __construct(KConfig $config)
    {
        parent::__construct($config);

        $this->registerCallback('after.save', array($this, 'afterSave'));
    }

    protected  function _initialize(KConfig $config)
    {
        $config->append(array(
            'behaviors' => array('com://site/default.controller.behavior.editable')
        ));

        parent::_initialize($config);
    }

    public function afterSave(KCommandContext $context)
    {
    	$this->setRedirect('index.php?option=com_gives&view=events&thanks=1');

    	return true;
    }
}
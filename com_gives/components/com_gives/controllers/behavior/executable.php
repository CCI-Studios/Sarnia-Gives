<?php

class ComGivesControllerBehaviorExecutable extends ComDefaultControllerBehaviorExecutable
{
    
    protected function _beforeAdd(KCommandContext $context)
    {
        $caller = $context->caller->getIdentifier()->name;
        
        if ($caller == 'volunteer' || $caller == 'organization')
            return true;
        return parent::_beforeAdd($context);
    }

	protected function _beforeEdit(KCommandContext $context)
	{
		$caller = $context->caller->getIdentifier()->name;

		if ($caller == 'volunteer' || $caller == 'organization') {
			$me = $this->getModel()->getMe();
			$row = $this->getModel()->getItem();
			
			return $me->id == $row->user_id;
		}
		
		return parent::_beforeEdit($context);
	}

}
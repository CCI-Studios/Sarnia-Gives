<?php

class ComGivesControllerBehaviorExecutable extends ComDefaultControllerBehaviorExecutable
{
    
    public function canAdd()
    {
		$caller = $this->_mixer->getIdentifier()->name;
	
		if ($caller == 'volunteer' || 
			$caller == 'organization' || 
			$caller = 'opportunity')
            return true;

        return parent::_beforeAdd($context);
    }

	public function scanEdit()
	{
		$caller = $this->_mixer->getIdentifier()->name;

		if ($caller == 'volunteer' || 
			$caller == 'organization') {
			
			$me = $this->getModel()->getMe();
			$row = $this->getModel()->getItem();
			
			return $me->id == $row->user_id;
		}
		
		return parent::_beforeEdit($context);
	}

}
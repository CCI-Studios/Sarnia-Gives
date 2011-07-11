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

        return parent::canAdd($context);
    }

	public function canEdit()
	{
		$caller = $this->_mixer->getIdentifier()->name;

		if ($caller == 'volunteer' || 
			$caller == 'organization' ||
			$caller == 'opportunity') {
			
			$me = KFactory::get('lib.joomla.user');
			$row = $this->getModel()->getItem();
			
			if ($caller == 'opportunity') {
				$model = KFactory::get('site::com.gives.model.organization');
				$org = $model->set('id', $row->gives_organization_id)->getItem();
				
				return $me->id === $org->user_id;
			}
			
			return $me->id == $row->user_id;
		}
		
		return parent::canEdit($context);
	}

}
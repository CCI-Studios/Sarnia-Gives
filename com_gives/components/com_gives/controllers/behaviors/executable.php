<?php

class ComGivesControllerBehaviorExecutable extends ComDefaultControllerBehaviorExecutable
{

    public function canAdd()
    {
		$caller = $this->_mixer->getIdentifier()->name;

		if ($caller == 'volunteer' ||
			$caller == 'organization' ||
			$caller == 'opportunity')
            return true;

        return parent::canAdd($context);
    }

	public function canEdit()
	{
		$caller = $this->_mixer->getIdentifier()->name;

		if ($caller == 'volunteer' ||
			$caller == 'organization' ||
			$caller == 'opportunity') {

			$me = JFactory::getUser();
			$row = $this->getModel()->getItem();

			if ($caller == 'opportunity') {
				$model = $this->getService('com://site/gives.model.organizations');
				$org = $model->set('id', $row->gives_organization_id)->getItem();

				return $me->id === $org->user_id;
			}

			return $me->id == $row->user_id;
		}

		return parent::canEdit($context);
	}

	protected function _checkToken(KCommandContext $context)
    {
        $caller = $this->_mixer->getIdentifier()->name;

        if ($caller == 'renew') {
        	return true;
        }

        return parent::_checkToken($context);
    }
}
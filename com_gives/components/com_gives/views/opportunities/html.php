<?php

class ComGivesViewOpportunitiesHtml extends ComGivesViewHtml
{
	
	public function display()
	{
		$params = &JComponentHelper::getParams('com_gives');
		$this->assign('params', $params);
		
		$this->assign('user', KFactory::get('site::com.gives.model.volunteers')->getMe());

		if ($this->getLayout() == 'default') {
			$this->assign('opps_is', KFactory::tmp('site::com.gives.model.opportunity')
				->set('interests', KRequest::get('interests', 'raw'))
				->set('skills', KRequest::get('skills', 'raw'))
				->set('locations', null)
				->getList());
				
			$this->assign('opps_il', KFactory::tmp('site::com.gives.model.opportunity')
				->set('interests', KRequest::get('interests', 'raw'))
				->set('skills', null)
				->set('locations', KRequest::get('locations', 'raw'))
				->getList());
				
			$this->assign('opps_sl', KFactory::tmp('site::com.gives.model.opportunity')
				->set('interests', null)
				->set('skills', KRequest::get('skills', 'raw'))
				->set('locations', KRequest::get('locations', 'raw'))
				->getList());
				
			$this->assign('opps_i', KFactory::tmp('site::com.gives.model.opportunity')
				->set('interests', KRequest::get('interests', 'raw'))
				->set('skills', null)
				->set('locations', null)
				->getList());
				
			$this->assign('opps_s', KFactory::tmp('site::com.gives.model.opportunity')
				->set('interests', null)
				->set('skills', KRequest::get('skills', 'raw'))
				->set('locations', null)
				->getList());
				
			$this->assign('opps_l', KFactory::tmp('site::com.gives.model.opportunity')
				->set('interests', null)
				->set('skills', null)
				->set('locations', KRequest::get('locations', 'raw'))
				->getList());
		}
		
		return parent::display();
	}
}
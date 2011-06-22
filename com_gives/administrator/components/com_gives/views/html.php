<?php

class ComGivesViewHtml extends ComDefaultViewHtml {
	
	public function __construct(KConfig $config) {
		$config->views = array(
		    'dashboard'        => JText::_('Dashboard'),
			'opportunities'		=> JText::_('Opportunities'),
			'volunteers'		=> JText::_('Volunteers'),
			'organizations'		=> JText::_('Organizations'),
		);
		
		parent::__construct($config);
	}
	
	public function display()
	{
		if (KInflector::isPlural($this->getName())) {
			$this->getToolbar()
				->prepend('disable')
				->prepend('enable');
		}
		
		echo parent::display();
	}
	
}
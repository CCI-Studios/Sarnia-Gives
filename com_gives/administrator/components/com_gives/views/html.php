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
}
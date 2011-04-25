<?php

class ComGivesViewHtml extends ComDefaultViewHtml {
	
	public function __construct(KConfig $config) {
		$config->views = array(
			'opportunities'		=> JText::_('Opportunities'),
			'volunteers'		=> JText::_('Volunteers'),
			'organizations'		=> JText::_('Organizations'),
		);
		
		parent::__construct($config);
	}
}
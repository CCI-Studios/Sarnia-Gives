<?php

class ComGivesModelCtwhours extends ComDefaultModelDefault
{
	
	public function __construct(KConfig $config)
	{
		parent::__construct($config);
	}

	public function validate($data)
	{
		$errors = array();

		print_r($data);
		die('got here');
		
		if ($data->name === '') {
			$errors[] = JText::_('Please provide your name.');
		}
		
		if ($data->email === '') {
			$errors[] = JText::_('An email address is required.');
		}
		
		if ($data->school === '') {
			$errors[] = JText::_('A school is required.');
		}
		
		if ($data->organization === '') {
			$errors[] = JText::_('An organization address is required.');
		}

		if ($data->hours === '' || !is_numeric($data->hours) || $data->hours <= 0) {
			$errors[] = JText::_('Invalid number of hours. Must be a number greater than zero.');
		}

		return $errors;
	}
}
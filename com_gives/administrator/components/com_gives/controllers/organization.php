<?php

class ComGivesControllerOrganization extends ComDefaultControllerDefault
{
	
	public function __construct(KConfig $config)
	{
		parent::__construct($config);
		
		//$command = $this->getService('com://admin/gives.command.validate');
		//$this->getCommandChain()->enqueue($command);
	}
}
<?php

class ComGivesControllerOrganization extends ComDefaultControllerDefault
{
	
	public function __construct(KConfig $config)
	{
		parent::__construct($config);
		
		//$command = KFactory::get('admin::com.gives.command.validate');
		//$this->getCommandChain()->enqueue($command);
	}
}
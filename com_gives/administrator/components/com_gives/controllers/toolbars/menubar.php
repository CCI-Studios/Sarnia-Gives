<?

class ComGivesControllerToolbarMenubar extends ComDefaultControllerToolbarMenubar
{
	
	public function getCommands()
	{
		$name = $this->getController()->getIdentifier()->name;
		
		$this->addCommand('overview', array(
			'href'		=> 'index.php?option=com_gives&view=dashboard',
			'active'	=> ($name === 'dashboard')
		));
		
		$this->addCommand('volunteers', array(
			'href'		=> 'index.php?option=com_gives&view=volunteers',
			'active'	=> ($name === 'volunteer')
		));
		
		$this->addCommand('organization', array(
			'href'		=> 'index.php?option=com_gives&view=organizations',
			'active'	=> ($name === 'organization')
		));
		
		$this->addCommand('opportunities', array(
			'href'		=> 'index.php?option=com_gives&view=opportunities',
			'active'	=> ($name === 'opportunity')
		));
		
		return parent::getCommands();
	}
}
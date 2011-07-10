<?

class ComGivesControllerToolbarDashboard extends ComDefaultControllerToolbarDefault
{
	
	public function getCommands()
	{
		$this->addModal(array(
			'href'	=> 'index.php?option=com_config&cotroller=component&component=com_gives',
			'icon'	=> 'icon-32-config',
			'label'	=> 'Parameters',
		));
		
		return parent::getCommands();
	}
	
}
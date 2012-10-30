<?

class ComGivesControllerToolbarDashboard extends ComDefaultControllerToolbarDefault
{

	public function getCommands()
	{
		$this->addModal(array(
			'href'	=> 'index.php?option=com_config&view=component&component=com_gives&tmpl=component',
			'icon'	=> 'icon-32-config',
			'label'	=> 'Parameters',
		));

		return parent::getCommands();
	}

}
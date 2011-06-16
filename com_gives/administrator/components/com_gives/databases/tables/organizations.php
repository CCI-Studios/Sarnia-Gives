<?php

class ComGivesDatabaseTableOrganizations extends KDatabaseTableAbstract
{
    
    protected function _initialize(KConfig $config)
    {
        $reg = KDatabaseBehavior::factory('admin::com.gives.database.behavior.registerable', array(
		   'name'	=> array('first_name', 'last_name')
		));
		
		$config->append(array(
		   'behaviors'	=> array($reg, 'admin::com.gives.database.behavior.editable')
		));
        
        parent::_initialize($config);
    }

	public function insert(KDatabaseRowInterface $row)
	{
		$affected = parent::insert($row);
		
		if ($affected > 0) {
			$this->afterInsert($row);
		}
		
		return $affected;
	}
	
	public function afterInsert(KDatabaseRowInterface $row)
	{
		$data = $row->getData();
		
		$params = &JComponentHelper::getParams('com_gives');
		if ($params->get('send_emails')) {
			$this->_emailUser($data['title'], $data['first_name'], $data['email'], $data['password']);
		}
	}
	
	protected function _emailUser($title, $name, $email, $password)
	{
		$mailer = JFactory::getMailer();
		$config = JFactory::getConfig();

		$mailer->setSender(array(
			$config->getValue('config.mailfrom'),
			$config->getValue('config.fromname')
		));
		$mailer->addRecipient($email);
		$mailer->setSubject('Sarnia Gives - Organization Registration');
		$mailer->setBody(
			"<p>
				<img src=\"http://dev.sarniagives.com/images/stories/default/logo.png\" style=\"float: right; margin: 0 0 10px 10px;\" alt=\"Sarnia Gives\" />
				Hello {$name},</p>".
			"<p>Thank you for registering {$title} for Sarnia Gives!</p>".
			"<p>You can access your account <a href=\"http://sarniagives.com/login\">here</a></p>".
			"<p>Your temporary password is: <b>{$password}</b></p>".
			"<p>Once again, thank you,<br/>The Sarnia Gives Team</p>"
		);
		
		$mailer->isHtml(true);
		$mailer->send();
	}
}
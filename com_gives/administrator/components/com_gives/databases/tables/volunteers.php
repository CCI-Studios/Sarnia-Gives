<?php

class ComGivesDatabaseTableVolunteers extends KDatabaseTableAbstract
{
 
	protected function _initialize(KConfig $config)
	{
		$reg = KDatabaseBehavior::factory('admin::com.gives.database.behavior.registerable', array(
		   'name'	=> array('first_name', 'last_name')
		));
		
		$config->append(array(
		   'behaviors'	=> array($reg, 'admin::com.gives.database.behavior.editable', 'admin::com.gives.database.behavior.passwordable')
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
			$this->_emailUser($data['first_name'], $data['email'], $data['password']);
			$this->_emailAdmin($data['first_name'] .' '. $data['last_name']);
		}
	}
	
	protected function _emailUser($name, $email, $password)
	{
		$view = KFactory::tmp("admin::com.default.template.default");
		$view->loadIdentifier('admin::com.gives.view.volunteer.email_user', array(
			'name'	=> $name,
			'email'	=> $email, 
			'password' => $password,
		));
		
		$this->_sendMail($email, "Thank You for Registering with Sarnia Gives", $view->render());
	}
	
	protected function _emailAdmin($name)
	{
		$params = &JComponentHelper::getParams('com_gives');
		$admins = $params->get('email_list');
		if ($admins === '')
			return;
		
		$view = KFactory::tmp("admin::com.default.template.default");
		$view->loadIdentifier('admin::com.gives.view.volunteer.email_admin', array(
			'name'	=> $name
		));
		
		$this->_sendMail($admins, "New Sarnia Gives Volunteer Registration", $view->render());
	}
	
	protected function _sendMail($to, $subject, $body)
	{
		$mailer		= JFactory::getMailer();
		$config		= JFactory::getConfig();
		
		$mailer->setSender(array(
			$config->getValue('config.mailfrom'),
			$config->getValue('config.fromname')
		));
		
		$mailer->addRecipient($to);
		$mailer->setSubject($subject);
		$mailer->setBody($body);
		$mailer->isHtml(true);
		$mailer->send();
	}
}
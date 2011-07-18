<?php

class ComGivesDatabaseTableOrganizations extends KDatabaseTableAbstract
{
    
    protected function _initialize(KConfig $config)
    {
        $reg = KDatabaseBehavior::factory('admin::com.gives.database.behavior.registerable', array(
			'name'	=> array('contact'),
			'email'	=> 'contact_email',
		));
        
        $uploadable = KDatabaseBehavior::factory('admin::com.gives.database.behavior.uploadable', array(
        	'fieldname'	=> 'logo',
        	'thumbs'	=> array(
        		array('width'=>50,'height'=>50,'prefix'=>'small'),
        		array('width'=>150,'height'=>75,'prefix'=>'large'),
        	),
        	'location'	=> 'media/com_gives/uploads/organizations/'
        ));
		
		$config->append(array(
		   'behaviors'	=> array($reg, $uploadable, "editable")
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
			$this->_emailUser($data['contact'], $data['title'], $data['email'], $data['password']);
			$this->_emailAdmin($data['title'], $data['contact']);
		}
	}
	
	protected function _emailUser($name, $organization, $email, $password)
	{
		$params = &JComponentHelper::getParams('com_gives');
		$admins = $params->get('email_list');
		if ($admins === '')
			return;
		
		$view = KFactory::tmp("admin::com.default.template.default");
		$view->loadIdentifier('admin::com.gives.view.organization.email_user', array(
			'name'	=> $name,
			'title'	=> $organization,
			'email'	=> $email,
			'password'	=> $password,
		));
		
		$this->_sendMail($email, "Thank you for registering", $view->render());
	}
	
	protected function _emailAdmin($title, $name)
	{
		$params = &JComponentHelper::getParams('com_gives');
		$admins = $params->get('email_list');
		if ($admins === '')
			return;
		
		$view = KFactory::tmp("admin::com.default.template.default");
		$view->loadIdentifier('admin::com.gives.view.organization.email_admin', array(
			'name'	=> $name,
			'title' => $title,
		));
		
		$this->_sendMail($admins, "New Organization Registered", $view->render());
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
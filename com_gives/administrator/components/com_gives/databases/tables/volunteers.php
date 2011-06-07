<?php

class ComGivesDatabaseTableVolunteers extends KDatabaseTableAbstract
{
 
    protected function _initialize(KConfig $config)
    {
        $reg = KDatabaseBehavior::factory('admin::com.gives.database.behavior.registerable', array(
           'name'   => array('first_name', 'last_name')
        ));
        
        $config->append(array(
           'behaviors'  => array($reg)
        ));
        
        parent::_initialize($config);
    }
    
    public function insert(KDatabaseRowInterface $row)
    {
        $affected = parent::insert($row);
        
        if ($affected > 0)
            $this->afterInsert($row);
        
        return $affected;
    }
    
    public function afterInsert(KDatabaseRowInterface $row)
    {
        $data = $row->data;
        $this->_emailUser($data->first_name, $data->email, $data->password);
    }
    
    
    protected function _emailUser($name, $email, $password)
       {
           $mailer = JFactory::getMailer();
           $config = JFactory::getConfig();
	public function afterInsert(KDatabaseRowInterface $row)
	{
		$data = $row->getData();
		$this->_emailUser($data['first_name'], $data['email'], $data['password']);
	}

           $mailer->setSender(array(
               $config->getValue('config.mailfrom'),
               $config->getValue('config.fromname')
           ));
           $mailer->addRecipient($email);
           $mailer->setSubject('Account Registration');
           $mailer->setBody(
               "<p>Hello {$name},</p>".
               "<p>Thank you for registering as a volunteer for Sarnia Gives!</p>".
               "<p>You can access your account <a href=\"http://sarniagives.com/login\">here</a></p>".
               "<p>Your temporary password is: <b>{$password}</b></p>".
               "<p>Once again, thank you,<br/>The Sarnia Gives Team</p>"
           );
           $mailer->isHtml(true);
           $mailer->send();
       }
 
}
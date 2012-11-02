<?php

class ComGivesDatabaseTableTransactions extends KDatabaseTableAbstract
{

	protected function _initialize(KConfig $config)
	{

		$config->append(array(
		   'behaviors'	=> array('creatable', 'modifiable')
		));

		parent::_initialize($config);
	}

	public function insert(KDatabaseRowInterface $row)
	{
		$affected = parent::insert($row);

		if ($affected > 0 && $row->completed == 1) {
			$organization = $this->getService('com://site/gives.model.organizations')
								->set('id', $row->gives_organization_id)
								->getItem();
			$expiry = $organization->expires;

			if (strtotime($expiry) > time()) { // expire 1 year from current expiry date
				$expiry = date("Y-m-d", strtotime(date("Y-m-d", strtotime($expiry)) . " + 365 day"));
			} else { // expire 1 year from today
				$expiry = date("Y-m-d", strtotime(date("Y-m-d", time()) . " + 365 day"));
			}

			$organization->expires = $expiry; // add 1 year
			$organization->save();

			$params = &JComponentHelper::getParams('com_gives');
			if ($params->get('send_emails')) {
				$this->_emailUser($organization->contact, $organization->title, $organization->email);
				$this->_emailAdmin($organization->contact, $organization->title);
			}
		}

		return $affected;
	}

	protected function _emailUser($name, $organization, $email)
	{
		$params = &JComponentHelper::getParams('com_gives');
		$admins = $params->get('email_list');
		if ($admins === '')
			return;

		$view = $this->getService('com://admin/default.template.default');
		$view->loadIdentifier('com://admin/gives.view.organization.email_renew_user', array(
			'name'	=> $name,
			'title'	=> $organization,
		));

		$this->_sendMail($email, "Sarnia Gives Organization Renewal", $view->render());
	}

	protected function _emailAdmin($name, $organization)
	{
		$params = &JComponentHelper::getParams('com_gives');
		$admins = $params->get('email_list');
		if ($admins === '')
			return;

		$view = $this->getService('com://admin/default.template.default');
		$view->loadIdentifier('com://admin/gives.view.organization.email_renew_admin', array(
			'name'	=> $name,
			'title'	=> $organization,
		));

		$this->_sendMail($admins, "Sarnia Gives Organization Renewal", $view->render());
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


